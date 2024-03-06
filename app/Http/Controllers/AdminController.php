<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard()
    {

        $username = Auth::User()->username;
        $welcome = array(
            'message' => 'Welcome ' . $username,
            'alert-type' => 'success',
        );

        $userCount = User::where('role', 'user')->count();
        $supplierCount = User::where('role', 'supplier')->count();

        return view("admin.index", compact("welcome", "userCount", "supplierCount"));
    }

    public function Users()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));

    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
