<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Личный кабинет - список бронирований пользователя
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('tour')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('bookings.index', compact('bookings'));
    }
    
    // Страница бронирования тура
    public function create(Tour $tour)
    {
        return view('bookings.create', compact('tour'));
    }
    
    // Сохранение бронирования
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
        
        return redirect()->route('bookings.index')
            ->with('success', 'Тур успешно забронирован!');
    }
}
