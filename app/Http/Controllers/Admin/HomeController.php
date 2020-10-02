<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    /**
     * Muestra la home del admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(){
        return view('admin.home.home');
    }


}
