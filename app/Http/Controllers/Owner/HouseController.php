<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;
use Auth;
use Mews\Purifier\Facades\Purifier;
use App\DataTables\OwnerHousesDataTable;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OwnerHousesDataTable $dataTable)
    {
        
        $pageTitle = 'Houses List';
        if(!empty(request('status'))) {
            $pageTitle = __('message.pending_list_form_title',['form' => __('message.driver')] );
        }
        $assets = ['datatable'];return $dataTable->render('common.tables', compact('assets','pageTitle',));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle  = 'Add House';
        return view('owner.add-house',compact(['pageTitle']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Assuming this is the title
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'rooms' => 'required|integer|min:0',
            'area' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'privateNotes' => 'nullable|string',
            'payment_date' => 'nullable|string',
        ]);

        $amenities = [
            'tapWater' => $request->has('tapWater'),
            'kitchen' => $request->has('kitchen'),
            'acceptMarried' => $request->has('acceptMarried'),
            'hasDog' => $request->has('hasDog'),
        ];

        $cleanDescription = Purifier::clean($request->input('description'));
        // Create the house record
        $house = House::create([
            'owner_id' => Auth::id(),
            'name' => $request->name, // Assuming this is the title
            'address' => $request->address,
            'payment_date' => $request->payment_date,
            'description' => $cleanDescription,
            'rooms' => $request->rooms,
            'area' => $request->area,
            'price' => $request->price,
            'amenities' => $amenities,
            'privateNotes' => $request->privateNotes,
            'rented' => ($request->has('rented') ? 1 : 0),
            'map_link' => "https://www.google.com/maps?q={$request->latitude},{$request->longitude}",
        ]);


        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $house->addMedia($image)
                    ->toMediaCollection('images'); 
            }
        }

        return redirect()->back()->with('success', 'House created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show( $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($r)
    {
        //
    }
}
