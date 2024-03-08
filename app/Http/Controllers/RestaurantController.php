<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $restaurants = Restaurant::all();

        return view('admin.restaurant.restaurants', compact("restaurants"));
        } catch(\Exception $e){
            \Log::error($e);
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while geeting Restaurants.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurant.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // dd($request);
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'open' => 'nullable|date_format:H:i',
                'close' => 'nullable|date_format:H:i',
                'photo' => 'nullable|mimes:png,jpg,jpeg',
                'website' => 'nullable|url|max:255',
                'description' => 'nullable|string',
            ]);

            if ($request->has('photo')) {
                $file = $request->file('photo');
                // $extention = $file->getClientOriginalExtension();

                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'uploads/restaurants/';


                $file->move($path, $filename);
            }

            Restaurant::create(
                [
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'open' => $request->open,
                    'close' => $request->close,
                    'photo' => $path . $filename,
                    'website' => $request->website,
                    'description' => $request->description,
                ]
            );
            return redirect(route("admin.restaurants"));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while adding a Restaurant.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        try {
            return view('admin.restaurant.edit', compact('restaurant'));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect(route('admin.restaurants'))->with('error', 'there is an error displaying  this Restaurant');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        try{
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'open' => 'nullable|date_format:H:i',
            'close' => 'nullable|date_format:H:i',
            'photo' => 'nullable|mimes:png,jpg,jpeg',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
        ]);

        $restaurant1 = Restaurant::findOrFail($restaurant->id);
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalName();
            $path = 'uploads/restaurants/';

            $file->move(public_path($path), $filename);

            if (File::exists(public_path($restaurant1->photo))) {
                File::delete(public_path($restaurant1->photo));
            }

        }

        $restaurant1->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'open' => $request->open,
            'close' => $request->close,
            'photo' => $path . $filename,
            'website' => $request->website,
            'description' => $request->description,
        ]);

        return redirect(route('admin.restaurants'))->with('success', 'Restaurant updated Successfully');

    }catch(\Exception $e){
        \Log::error($e);
        return redirect()->route('admin.dashboard')->with('error', 'An error occurred while updating the Restaurant.');
    }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Restaurant $restaurant)
    {
        try{
        if (File::exists($restaurant->photo)) {
            File::delete($restaurant->photo);
        }
        $restaurant->delete();
        return redirect(route('admin.restaurants'))->with('success', 'Supplier deleted Successfully');
    }catch(\Exception $e){
        \Log::error($e);
        return redirect()->route('admin.dashboard')->with('error', 'An error occurred while deleting the Restaurant.');
    }
    }
}
