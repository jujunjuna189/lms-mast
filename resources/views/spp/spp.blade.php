@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Keuangan</p>
    <p class="text-sm text-slate-500">Keuangan Siswa, SPP</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    <h2 class="text-center">Total SPP Yang Belum Dibayar</h2>
    <div class="mt-2 text-center">
        <div class="flex gap-2 justify-center items-center">
            <label for="amount" class="font-bold text-2xl" data-spp="{{ $spp }}">{{ $controller->formatCurrentcy($spp->amount ?? '0') }}</label>
        </div>
    </div>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    <h2 class="font-bold">Riwayat pembayaran spp</h2>
    <table class="min-w-full table-auto text-sm text-left mt-2">
        <thead class="bg-slate-200 text-sm sticky top-0 z-10">
            <tr>
                <th class="px-6 py-3 font-semibold">#</th>
                <th class="px-6 py-3 font-semibold">Tanggal</th>
                <th class="px-6 py-3 font-semibold">Waktu</th>
                <th class="px-6 py-3 font-semibold">Jumlah</th>
                <!-- <th class="px-6 py-3 font-semibold text-center">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($history as $index => $val)
            <tr>
                <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                <td class="px-6 py-1.5 font-medium">{{ $val->date }}</td>
                <td class="px-6 py-1.5 font-medium">{{ $val->time }}</td>
                <td class="px-5 py-1.5">{{ $controller->formatCurrentcy($val->amount ?? '0') }}</td>
                <!-- <td class="px-6 py-1.5"></td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection