<?php

namespace App\Repositories\Backend;

use App\Interfaces\Backend\SalesInterface;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use TCPDF;

class SalesRepository implements SalesInterface
{
    public function purchase($request)
    {
        try {
            $sale = Sales::latest()->first();
            if ($sale) {
                $initialNumber = '0000';
                $newNumber = (int)$initialNumber + $sale->id;
                $invId = 'INV-' . (str_pad($newNumber, 4, '0', STR_PAD_LEFT));
            } else {
                $invId = 'INV-0001';
            }

            $id = Auth::user()->id;

            $sale =  Sales::create([
                'user_id' => $id,
                'inv_no' => $invId,
                'payement_method' => $request->paymentMethod,
                'sub_total' => $request->subTotal,
                'discount' => $request->discount,
                'total' => $request->total,
                'created_at' => Carbon::now()
            ]);

            $cartItems = Cart::where('user_id', $id)->get();

            foreach ($cartItems as $cartItem) {
                $product = Product::findOrFail($cartItem->product_id);
                SalesItem::create([
                    'sales_id'  => $sale->id,
                    'product_id' => $cartItem->product_id,
                    'qty' => $cartItem->qty,
                    'amount' => $product->selling_price,
                    'created_at' => Carbon::now()
                ]);
            }

            Cart::where('user_id', $id)->delete();

            $notification = [
                'message' => 'Product purchase Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('invoice.print', ['id' => $sale->id])->with($notification);
        } catch (Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function invoicePrint($id)
    {
        $sales = Sales::where('id', $id)->first();
        $allSell = SalesItem::where('sales_id', $id)->get();
        return view('pos.print_invoice', compact('allSell', 'sales'));
    }

    public function invoiceGenerate($id)
    {
        $sales = SalesItem::where('sales_id', $id)->get();

        $html = View::make('sales/invoice_pdf', compact('sales'))->render();

        $pdf = new TCPDF();
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('MYPHARMACY_BILL');

        // Add a page
        $pdf->AddPage();

        // Set content
        $pdf->SetFont('helvetica', '', 12);
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF (inline display)
        return response($pdf->Output('MYPHARMACY_BILL.pdf', 'I'))->header('Content-Type', 'application/pdf');
    }

    public function allSales()
    {
        $allSell = Sales::latest()->get();
        return view('sales.all_sales', compact('allSell'));
    }

    public function deleteInvoice($id)
    {
        try {
            SalesItem::where('sales_id', $id)->delete();
            Sales::find($id)->delete();

            $notification = [
                'message' => 'Invoice Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sales')->with($notification);
        } catch (Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function deletedSales()
    {
        $allSell = Sales::onlyTrashed()->latest()->get();
        return view('sales.delete_sales', compact('allSell'));
    }

    public function deletedInvoice($id)
    {
        $sales = Sales::withTrashed()->where('id', $id)->first();
        $allSell = SalesItem::withTrashed()->where('sales_id', $id)->get();
        return view('pos.print_invoice', compact('allSell', 'sales'));
    }

    public function deletedInvoiceDelete($id)
    {
        try {
            Sales::withTrashed()->where('id', $id)->forceDelete();
            SalesItem::withTrashed()->where('sales_id', $id)->forceDelete();
            $notification = [
                'message' => 'Invoice Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('deleted.sales')->with($notification);
        } catch (Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
