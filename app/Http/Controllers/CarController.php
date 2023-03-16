<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Car::query();

        $search = $request->input('search');

        $query->when($search && $search['name'], function ($q) use ($search) {
            return $q->where('name', 'like', '%' . $search['name'] . '%');
        });
    
        $query->when($search && $search['registration_number'] !== null, function ($q) use ($search) {
            return $q->where('registration_number', 'like' ,'%' . $search['registration_number'] . '%');
        });

        $query->when($search && $search['is_registered'] !== null, function ($q) use ($search) {
            return $q->where('is_registered', $search['is_registered']);
        });

        $cars = $query->get();


        return Inertia::render('Car/Index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Car/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $data = $request->validated();

        Car::create($data);

        return redirect()->back()->with('message', 'You have successfuly created car');

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $parts = $car->parts()->select('name', 'serial_number')->get();

        return Inertia::render('Car/Show', compact('car', 'parts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return Inertia::render('Car/Edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $data = $request->validated();

        $car->update($data);

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        // v realnom projekte by som zabranil vytriet car ak ma na sebe model part

        if($car->parts()->exists()){
          
            $car->parts()->delete();
        }
       
        $car->delete();

        return redirect()->back()->with('message', 'Successfuly deleted');
    }
}
