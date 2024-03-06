<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function SupplierDashboard(){
        return view("supplier.supplier_dashboard");
    }
}
