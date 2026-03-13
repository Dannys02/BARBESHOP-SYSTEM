<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Activity;

class AppointmentController extends Controller
{
  public function index() {
    $appointments = Appointment::with(['barber', 'service'])->orderBy('created_at', 'desc')->get();
    return view('admin.appointment.index', compact('appointments'));
  }

  public function create() {
    $barbers = Barber::all();
    $services = Service::all();
    return view('booking.create', compact('barbers', 'services'));
  }

  public function store(Request $request) {
    $request->validate([
      'customer_name' => 'required',
      'customer_phone' => 'required',
      'barber_id' => 'required',
      'service_id' => 'required',
      'booking_date' => 'required|date|after_or_equal:today',
      'booking_time' => 'required',
      'g-recaptcha-response' => 'required|captcha',
    ]);
    
    $bookingTime = $request->booking_time . ':00';

    $isBooked = Appointment::where('barber_id', $request->barber_id)
    ->where('booking_date', $request->booking_date)
    ->where('booking_time', $bookingTime)
    ->whereIn('status', ['pending', 'konfirmasi'])
    ->exists();

    if ($isBooked) {
      return back()->withErrors(['booking_time' => 'Barber sudah ada jadwal di jam tersebut. Pilih jam lain ya!'])->withInput();
    }

    $isActiveBooking = Appointment::where('customer_phone', $request->customer_phone)
    ->whereIn('status', ['pending', 'konfirmasi'])
    ->exists();

    if ($isActiveBooking) {
      return back()->withErrors(['customer_phone' => 'Anda masih memiliki reservasi yang aktif. Selesaikan atau batalkan dulu ya!'])->withInput();
    }

    $data = $request->all();
    $data['booking_time'] = $bookingTime;
    Appointment::create($data);

    return redirect()->back()->with('success', 'Booking berhasil! Cek status jadwal kamu. Kami tunggu kedatangannya.');
  }

  public function cekStatusForm() {
    return view('booking.cek-status'); // Tampilkan form input nomor HP
  }

  public function cekStatusResult(Request $request) {
    $request->validate(['customer_phone' => 'required']);

    // Cari booking terakhir dari nomor HP tersebut
    $booking = Appointment::where('customer_phone', $request->customer_phone)
    ->latest()
    ->first();

    return view('booking.cek-status', compact('booking'));
  }


  public function updateStatus(Request $request, Appointment $appointment) {
    // Prevent changing status if already 'batal'
    if ($appointment->status == 'batal') {
      return back()->with('error', 'Status batal tidak dapat diubah.');
    }

    // Prevent changing from 'selesai' to other status
    if ($appointment->status == 'selesai') {
      return back()->with('error', 'Status selesai tidak dapat diubah.');
    }

    $oldStatus = strtoupper($appointment->status);
    $appointment->update(['status' => $request->status]);
    $newStatus = strtoupper($request->status);

    Activity::log("Update status {$appointment->customer_name}: $oldStatus -> $newStatus", "booking");

    return back()->with('success', 'Status jadwal berhasil diupdate!');
  }

  public function destroy($id) {
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();
    $customer = $appointment->customer_name;
    $date = $appointment->booking_date;

    Activity::log("Menghapus reservasi: $customer ($date)", "booking");

    return redirect()->route('booking.index')->with('success', 'Data reservasi berhasil dihapus');
  }

}
?>