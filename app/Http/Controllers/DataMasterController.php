<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;

 class DataMasterController extends Controller
 {
    public function index()
    {
        return view('data_master.layouts.main');
    }
 }