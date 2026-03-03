@extends('layouts.admin')

@section('appointment')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-semibold">Daftar <span class="text-gold">Appointment</span></h2>
</div>

<div class="bg-slate-800 rounded-2xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-gray-300">
            <thead class="bg-slate-900 text-gold uppercase text-sm font-bold">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Barber</th>
                    <th class="px-6 py-4">Service</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Jam</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($appointments as $index => $appointment)
                <tr class="hover:bg-slate-700 transition">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-white">{{ $appointment->customer_name }}</div>
                        <div class="text-sm text-gray-500">{{ $appointment->customer_phone }}</div>
                    </td>
                    <td class="px-6 py-4">{{ $appointment->barber->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $appointment->service->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($appointment->booking_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $appointment->booking_time }}</td>
                    <td class="px-6 py-4">
                        @if($appointment->status == 'pending')
                            <span class="bg-yellow-600 text-white text-xs px-3 py-1 rounded-full">Pending</span>
                        @elseif($appointment->status == 'konfirmasi')
                            <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full">Konfirmasi</span>
                        @elseif($appointment->status == 'selesai')
                            <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">Selesai</span>
                        @elseif($appointment->status == 'batal')
                            <span class="bg-red-600 text-white text-xs px-3 py-1 rounded-full">Batal</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('booking.updateStatus', $appointment->id) }}" method="POST" class="flex flex-col gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="bg-slate-700 text-white text-xs px-3 py-2 rounded-lg border border-gray-600 focus:border-gold focus:outline-none">
                                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="konfirmasi" {{ $appointment->status == 'konfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                                <option value="selesai" {{ $appointment->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="batal" {{ $appointment->status == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>Belum ada appointment</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($appointments->count() > 0)
<div class="mt-6 bg-slate-800 rounded-2xl border border-gray-700 p-6">
    <h3 class="text-lg font-semibold text-gold mb-4">Ringkasan Status</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-slate-700 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-yellow-500">{{ $appointments->where('status', 'pending')->count() }}</div>
            <div class="text-sm text-gray-400">Pending</div>
        </div>
        <div class="bg-slate-700 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-blue-500">{{ $appointments->where('status', 'konfirmasi')->count() }}</div>
            <div class="text-sm text-gray-400">Konfirmasi</div>
        </div>
        <div class="bg-slate-700 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-green-500">{{ $appointments->where('status', 'selesai')->count() }}</div>
            <div class="text-sm text-gray-400">Selesai</div>
        </div>
        <div class="bg-slate-700 rounded-lg p-4 text-center">
            <div class="text-2xl font-bold text-red-500">{{ $appointments->where('status', 'batal')->count() }}</div>
            <div class="text-sm text-gray-400">Batal</div>
        </div>
    </div>
</div>
@endif
@endsection
