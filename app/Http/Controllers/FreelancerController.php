<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index(Request $request)
    {
        $query = Freelancer::with('user');

        if ($request->filled('field')) {
            $query->where('field', 'like', '%' . $request->input('field') . '%');
        }

        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->input('rating'));
        }

        if ($request->filled('hourly_rate')) {
            $query->where('hourly_rate', '<=', $request->input('hourly_rate'));
        }

        $freelancers = $query->paginate(9);
        $freelancers->appends($request->query());

        return view('freelancers.index', compact('freelancers'));
    }

    public function show(Freelancer $freelancer)
    {
        $freelancer->load('user');
        return view('freelancers.show', compact('freelancer'));
    }

    public function showJson(Freelancer $freelancer)
    {
        $freelancer->load('user');
        return response()->json([
            'success' => true,
            'freelancer' => $freelancer
        ]);
    }
}