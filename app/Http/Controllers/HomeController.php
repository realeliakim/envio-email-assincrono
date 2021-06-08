<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emails = Email::get()->where('user_id', auth()->user()->id);
        return view('home', compact('emails'));
    }
}
