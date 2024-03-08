<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function index()
    {
        try {
            $suppliers = Supplier::all();

            $title = 'Delete User!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            return view('admin.supplier.suppliers', compact('suppliers'));
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while retrieving suppliers.');
        }
    }
    public function create()
    {
        try {
            return view('admin.supplier.create');
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while retrieving suppliers.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                "name" => "required",
                "username" => "required|unique:suppliers,username",
                "email" => "required|email|unique:suppliers,email",
                "password" => "required|min:6",
                "photo" => "nullable|image|max:2048",
                "phone" => "nullable|string|max:20",
                "address" => "nullable|string",
            ]);

            Alert::success('Success', 'Added Successfully');
            $newSupplier = Supplier::create($data);


            return redirect(route("admin.suppliers"));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while retrieving suppliers.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        try {
            return view('admin.supplier.edit', compact('supplier'));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect(route('admin.suppliers'))->with('error', 'there is an error displaying  this supplier');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            "name" => "required",
            "username" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            "photo" => "nullable|image|max:2048",
            "phone" => "nullable|string|max:20",
            "address" => "nullable|string",
        ]);

        $supplier->update($data);
        Alert::success('Success', 'Updated Successfully');

        return redirect(route('admin.suppliers'))->with('success', 'Supplier updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        return redirect(route('admin.suppliers'))->with('success', 'Supplier deleted Successfully');
    }
}
