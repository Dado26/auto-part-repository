<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\PartRequest;
use App\Http\Requests\StorePartRequest;
use App\Http\Requests\UpdatePartRequest;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Part::query();

        $query->when($request->input('name') != null, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->input('name') . '%');
        });

        $query->when($request->input('serial_number') != null, function ($q) use ($request) {
            return $q->where('serial_number', 'like', '%' . $request->input('serial_number') . '%');
        });

        $query->when($request->input('car_id') != null, function ($q) use ($request) {
            return $q->whereHas('car', function ($q) use ($request) {
                $q->where('id', $request->input('car_id'));
            });
        });
        
        $parts = $query->with('car:id,name')->get();


        return Inertia::render('Part/Index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::query()->get();

        return Inertia::render('Part/Create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartRequest $request)
    {
        $data = $request->validated();

        Part::create($data);

        return redirect()->back()->with('message', 'You have successfuly created part for  car');
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        $car = $part->car()->select('name', 'registration_number', 'is_registered')->first();

        return Inertia::render('Part/Show', compact('car', 'part'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part)
    {
        $part = $part->load('car:id');

        $cars = Car::query()->get();

        return Inertia::render('Part/Edit', compact('part', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartRequest $request, Part $part)
    {
        $data = $request->validated();

        $part->update($data);

        return redirect()->back()->with('message', 'Successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->delete();

        return redirect()->back()->with('message', 'Successfuly deleted');
    }
}
