<?php

namespace App\Http\Controllers;

use App\Models\Voting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:autogestion');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_time = \Carbon\Carbon::now();

        $vontings = Voting::all()
            ->where('public', true)
            ->where('end_at', '>', $current_time);

        return view('home')
            ->with('vontings', $vontings);
    }
}
