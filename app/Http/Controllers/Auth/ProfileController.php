<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $pageTitle = 'Edit Profile';
        $data = ['previous_address'=>'jigjoga','previous_country_id'=>'ethiopia','previous_state_id'=>'somali','previous_city_id'=>'somali','previous_zip_code'=>'5020','permanent_address'=>'hhh','permanent_country_id'=>2,'permanent_state_id'=>'','permanent_city_id'=>'','permanent_zip_code'=>''];
        $details = (object)$data;
        $tenant = (object)['job'=>'hhh','family_member'=>'ds','age'=>35,];
        $owner = (object)['print_name'=>'name','print_address'=>'print_address','print_contact'=>'print_contact','folder_name'=>'folder_name','file_name'=>'file_name'];
        return view('common.profile.my-profile',compact(['pageTitle','details','tenant','owner']));
    }

    public function update(Request $request) {

    }
}
