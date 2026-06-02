<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'tour']);
        
        if ($request->tour_id) {
            $query->where('tour_id', $request->tour_id);
        }
        
        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);
        $tours = Tour::all();
        
        return view('admin.index', compact('bookings', 'tours'));
    }
}