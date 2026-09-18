<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    //
    public function index()
    {
        $name = 'Alex';
        $habits = ['Estudar Php','Jogar Futebol','Ler','Trabalhar','Dormir'];

        return view('home' , compact('name','habits'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
