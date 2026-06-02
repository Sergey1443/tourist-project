<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('tours.index', compact('tours'));
    }
    
    public function create(Tour $tour)
    {
        return view('tours.create', compact('tour'));
    }
    
    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'places' => 'required|integer|min:1',
        ]);
        
        $total_price = $tour->price * $request->places;
        
        Booking::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'places' => $request->places,
            'total_price' => $total_price,
        ]);
        
        return redirect()->route('tours.bookings')->with('success', 'Забронировано!');
    }
    
    public function bookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('tour')->get();
        return view('tours.bookings', compact('bookings'));
    }
}