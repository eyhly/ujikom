<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['animal', 'user'])->get();

        return view('reservations.index', ['reservations'=> $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $animals = Animal::all();
        return view('reservations.create', compact('users', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'animal_id' => 'required|exists:animals,id',
            'tanggal' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->animal_id = $request->animal_id;
        $reservation->tanggal = $request->tanggal;
        $reservation->total = $request->total;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show($reservasi_id)
    {
        $reservation = Reservation::with('details')->findOrFail($reservasi_id);

        // Pass $reservation and $reservasi_id to the view
        return view('reservations.show', compact('reservation'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $users = User::all();
        $animals = Animal::all();
        return view('reservations.edit', compact('reservation', 'users', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'animal_id' => 'required|exists:animals,id',
            'tanggal' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reservasi Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);
        
        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'Reservasi tidak ditemukan');
        }

        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dihapus');
    }
}
