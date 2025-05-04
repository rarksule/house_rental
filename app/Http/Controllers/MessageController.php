<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $pageTitle  = 'message';
        $tenant = (object)['property_id' => '','unit_id'=>''];
        $issues = [];
        return view('owner.message',compact(['issues','tenant','pageTitle']));
    }

    public function store(){

    }
}
