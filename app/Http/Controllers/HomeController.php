<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredFreelancers = Freelancer::with('user')->take(3)->get();
        return view('welcome', compact('featuredFreelancers'));
    }

    public function dashboard()
    {
        $bookings = auth()->user()->bookings()->with('freelancer.user')->latest()->get();
        $fields = Freelancer::select('field')->distinct()->pluck('field');
        return view('dashboard', compact('bookings', 'fields'));
    }
}