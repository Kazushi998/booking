<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $booking = Booking::all();

        if(Auth::user()->hasRole('user')){
            return view('user-dashboard');
        }
        elseif(Auth::user()->hasRole('admin')){
            return view('dashboard', [
                'booking' => $booking
            ]);
        }
        elseif(Auth::user()->hasRole('pengurus')){
            return view('dashboard');
        }
    }
}
