<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Buku;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        {
            if (Auth::check()) {
                if (Auth::user()->role == 'admin') {
                    return view('partial.template');
                    
                } elseif (Auth::user()->role == 'siswa') {
                    $buku = Buku::all();
                    return view('template.dashboard',compact('buku'));

                } else {
                    abort(404, 'Tampilan dengan Role ' . Auth::user()->role . ' tidak ada');
                }
            } else {
                // Redirect to login or handle unauthenticated user
                return redirect()->route('login');
    }
}
}
}