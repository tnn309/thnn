<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Freelancer $freelancer)
    {
        return view('bookings.create', compact('freelancer'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'freelancer_id' => 'required|exists:freelancers,id',
            'booking_date' => 'required|date|after:now',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'freelancer_id' => $data['freelancer_id'],
            'booking_date' => $data['booking_date'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Đặt lịch thành công!');
    }
}