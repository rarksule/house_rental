<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'Add House';
        
        $tenant = (object)['property_id' => '','unit_id'=>''];
        
        $issues = [];
        return view('owner.house-list',compact(['pageTitle','tenant','issues']));
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
        print_r($request);
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
