<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['barber', 'service'])->orderBy('created_at', 'desc')->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function create()
    {
        $barbers = Barber::all();
        $services = Service::all();
        return view('booking.create', compact('barbers', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'barber_id' => 'required',
            'service_id' => 'required',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        $isBooked = Appointment::where('barber_id', $request->barber_id)
            ->where('service_id', $request->service_id)
            ->where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->where('status', '!=', 'batal')
            ->exists();

        if ($isBooked) {
            return back()->withErrors(['booking_time' => 'Barber sudah ada jadwal di jam tersebut. Pilih jam lain ya!'])->withInput();
        }

        Appointment::create($request->all());

        return redirect()->back()->with('success', 'Booking berhasil! Kami tunggu kedatangannya.');
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        // Prevent changing status if already 'batal'
        if ($appointment->status == 'batal') {
            return back()->with('error', 'Status batal tidak dapat diubah.');
        }

        // Prevent changing from 'selesai' to other status
        if ($appointment->status == 'selesai') {
            return back()->with('error', 'Status selesai tidak dapat diubah.');
        }

        $appointment->update(['status' => $request->status]);

        return back()->with('success', 'Status jadwal berhasil diupdate!');
    }
}
?>
