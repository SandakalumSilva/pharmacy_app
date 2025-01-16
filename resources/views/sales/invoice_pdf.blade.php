<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPHARMACY</title>

    <style>
        .center-text {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }

        .table-border {
            border: 2px solid black;
            padding: 8px;
        }

        th {
            background-color: aqua;
            color: aqua
        }
    </style>
</head>

<body>
    <h1 class="center-text">MYPHARMACY</h1>
    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Date :-</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Invoice No :-</td>
                <td></td>
            </tr>
        </thead>
    </table>
    <br><br>
    <table>
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Product Name</b></td>
                <td><b>Qty</b></td>
                <td><b>Unit Price</b></td>
                <td><b>Amount</b></td>
            </tr>
        </thead>
        @foreach ($sales as $key => $sale)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $sale['product']['name'] }}</td>
                <td>{{ $sale->qty }}</td>
                <td>{{ number_format($sale->amount, 2) }}</td>
                <td>{{ number_format($sale->amount * $sale->qty, 2) }}</td>
            </tr>
        @endforeach
        <tr><td></td></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Sub Total</b></td>
            <td>0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Discount</b></td>
            <td>0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total</b></td>
            <td>0</td>
        </tr>
    </table>

</body>

</html>
