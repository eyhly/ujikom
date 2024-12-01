<?php
namespace App\Http\Controllers;

use App\Models\DetailReservation;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DetailReservationController extends Controller
{
    public function create($reservasi_id)
    {
        $services = Service::all();
        $doctors = Doctor::all();
        return view('details.create', compact('reservasi_id', 'services', 'doctors'));
    }

    public function store(Request $request, $reservasi_id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'dokter_id' => 'required|exists:doctors,id'
        ]);

        $detailReservation = new DetailReservation();
        $detailReservation->reservasi_id = $reservasi_id;
        $detailReservation->service_id = $request->service_id;
        $detailReservation->dokter_id = $request->dokter_id;
        $detailReservation->save();

        // Update total on reservation
        $this->updateReservationTotal($reservasi_id);

        return redirect()->route('reservations.show', $reservasi_id)->with('success', 'Detail reservasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $detailReservation = DetailReservation::find($id);
        $services = Service::all();
        $doctors = Doctor::all();
        return view('details.edit', compact('detailReservation', 'services', 'doctors'));
    }

    public function update($reservasi_id, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'dokter_id' => 'required|exists:doctors,id'
        ]);

        $detailReservation = DetailReservation::find($id);
        $detailReservation->service_id = $request->service_id;
        $detailReservation->dokter_id = $request->dokter_id;
        $detailReservation->save();

        // Update total on reservation
        $this->updateReservationTotal($detailReservation->reservasi_id);

        return redirect()->route('reservations.show', $detailReservation->reservasi_id)->with('success', 'Detail reservasi berhasil diperbarui');
    }

    private function updateReservationTotal($reservasi_id)
    {
        $reservation = Reservation::find($reservasi_id);
        $total = $reservation->details->sum(function ($detail) {
            return $detail->service->harga;
        });
        $reservation->total = $total;
        $reservation->save();
    }

    public function destroy($reservasi_id, $id)
    {
        $reservation = Reservation::find($reservasi_id);
    
        if (!$reservation) {
            return redirect()->route('reservations.index')->with('error', 'Reservasi tidak ditemukan');
        }
    
        $detail = $reservation->details()->find($id);
    
        if (!$detail) {
            return redirect()->route('reservations.show', ['id' => $reservasi_id])->with('error', 'Detail reservasi tidak ditemukan');
        }

        $reservation->total -= $detail->service->harga;

        $reservation->save();
    
        $detail->delete();
    
        return redirect()->route('reservations.show', ['id' => $reservasi_id])->with('success', 'Detail reservasi berhasil dihapus');
    }
    
}
