<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Restaurant $restaurant)
    {
        try {
            $foods = Food::where('restaurant_id', $restaurant->id)->get();
            return view("admin.food.foods", compact('foods', 'restaurant'));
        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'Failed to add food for the restaurant.');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred ');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Restaurant $restaurant)
    {
        try {
            return view('admin.food.create', compact('restaurant'));
        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'Failed to add food for the restaurant.');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred ');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Restaurant $restaurant)
    {
        try {

            $data = $request->validate([
                'name' => 'required|string|max:255',
                'photo' => 'nullable|mimes:png,jpg,jpeg',
                'price' => 'required|integer|min:0',
                'discount' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
            ]);

            if ($request->has('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'uploads/foods/';


                $file->move($path, $filename);
            }

            Food::create([
                'name' => $request->name,
                'photo' => $path . $filename,
                'price' => $request->price,
                'discount' => $request->discount ?? 0,
                'description' => $request->description,
                'restaurant_id' => $restaurant->id,
            ]);

            Alert::success('Success', 'Added Successfully');

            return redirect(route('admin.restaurant.foods', $restaurant->id));
        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'Failed to add food for the restaurant.');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant, Food $food)
    {
        try {
            return view("admin.food.edit", compact('restaurant', 'food'));
        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'Failed to add food for the restaurant.');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred ');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant, Food $food)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'photo' => 'nullable|mimes:png,jpg,jpeg',
                'price' => 'required|integer|min:0',
                'discount' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
            ]);

            $food1 = Food::findOrFail($food->id);
            if ($request->has('photo')) {

                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalName();
                $path = 'uploads/foods/';

                $file->move($path, $filename);

                // Delete previous photo if exists
                if (File::exists(public_path($food1->photo))) {
                    File::delete(public_path($food1->photo));
                }

                $food1->update([
                    'name' => $request->name,
                    'photo' => $path . $filename,
                    'price' => $request->price,
                    'discount' => $request->discount ?? 0,
                    'description' => $request->description,
                    'restaurant_id' => $restaurant->id,
                ]);
            } else {
                $food1->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'discount' => $request->discount ?? 0,
                    'description' => $request->description,
                    'restaurant_id' => $restaurant->id,
                ]);
            }

            Alert::success('Success', 'Updated Successfully');

            return redirect(route('admin.restaurant.foods', $restaurant->id));
        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'Failed to update food for the restaurant.');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while updating food for a Restaurant.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Restaurant $restaurant, Food $food)
    {
        try {
            if (File::exists($food->photo)) {
                File::delete($food->photo);
            }


            $food->delete();

            Alert::success('Success', 'Deleted Successfully');
            return redirect(route('admin.restaurant.foods', $restaurant->id));

        } catch (\Exception $e) {
            \Log::error($e);
            Alert::error('Error', 'An error occured');
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred ');
        }

    }
}
