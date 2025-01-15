<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserRepository implements UserInterface
{

    public  function allUsers()
    {
        $allUsers = User::latest()->get();
        return view('users.all_users', compact('allUsers'));
    }

    public function addUser()
    {
        return view('users.add_user');
    }

    public function storeUser($request)
    {
        try {
            $manager = new ImageManager(new Driver());
            $saveUrl = null;

            if ($request->file('image')) {
                $image = $request->file('image');
                $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $file = $manager->read($image);
                $file->resize(300, 300)->save('upload/users/' . $nameGen);
                $saveUrl = 'upload/users/' . $nameGen;
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $saveUrl
            ]);

            $notification = [
                'message' => 'User Added Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.users')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->image) {
                unlink($user->image);
            }
            $user->delete();
            $notification = [
                'message' => 'User Deleted Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.users')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function editUser($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.edit_user', compact('user'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function updateUser($request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
            ], [
                'name.required' => 'Please Enter User Name.',
                'email.required' => 'Please Enter User Email.',
                'email.email' => 'Please Enter valid Email.'
            ]);
            $id = $request->id;
            $user = User::findOrFail($id);

            $manager = new ImageManager(new Driver());
            $saveUrl = null;

            if ($request->file('image')) {
                $image = $request->file('image');
                $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $file = $manager->read($image);
                $file->resize(300, 300)->save('upload/users/' . $nameGen);
                $saveUrl = 'upload/users/' . $nameGen;

                if ($user->image) {
                    unlink($user->image);
                }
            }

            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $saveUrl ? $saveUrl : $user->image
            ]);



            $notification = [
                'message' => 'User Updated Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.users')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function profileUser($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.user', compact('user'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function changePassword($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.change_password', compact('user'));
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function updatePassword($request)
    {
        try {
            $request->validate([
                'currentPassword' => ['required'],
                'password' => ['required', 'min:8', 'confirmed']
            ]);

            if (!Hash::check($request->currentPassword, Auth::user()->password)) {
                $notification = [
                    'message' => 'Current password is incorrect',
                    'alert-type' => 'error'
                ];
                return back()->with($notification);
            }

            $id = $request->id;

            User::findOrFail($id)->update([
                'password' => Hash::make($request->password)
            ]);

            $notification = [
                'message' => 'Password Change Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.users')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
