<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Supplier;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        try {

            $username = Auth::User()->username;
            $welcome = array(
                'message' => 'Welcome ' . $username,
                'alert-type' => 'success',
            );

            $userCount = User::where('role', 'user')->count();
            $supplierCount = User::where('role', 'supplier')->count();

            return view("admin.index", compact("welcome", "userCount", "supplierCount"));
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function Users()
    {
        try {
            $users = User::where('role', 'user')->get();
            return view('admin.users', compact('users'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
