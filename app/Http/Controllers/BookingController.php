<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show all bookings for logged-in user
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('room.roomtype')
            ->orderBy('check_in', 'DESC')
            ->get();

        return view('pages.list-bookings', compact('orders'));
    }

    // Create a booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $room = Room::findOrFail($validated['room_id']);

        // Check if room is already booked
        $overlap = Order::where('room_id', $room->id)
            ->where(function ($query) use ($validated) {
                $query->whereBetween('check_in', [$validated['check_in'], $validated['check_out']])
                      ->orWhereBetween('check_out', [$validated['check_in'], $validated['check_out']]);
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'room_unavailable' => 'This room is not available for your selected dates.'
            ]);
        }

        // Save booking
        Order::create([
            'room_id' => $room->id,
            'user_id' => Auth::id(),
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
        ]);

        return redirect()->route('bookings.index')
            ->with('message', 'Booking created successfully!');
    }
}
