@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">SPP Siswa</p>
    <p class="text-sm text-slate-500">Detail SPP Siswa</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <h2 class="font-bold">Detail Siswa</h2>
    <div class="mt-2">
        <table>
            <tbody>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Nama Lengkap</td>
                    <td>: Nama Saya</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Username</td>
                    <td>: Username</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Tingkat</td>
                    <td>: X</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Jurusan</td>
                    <td>: Informatika</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    <h2 class="text-center">Total SPP Yang Belum Dibayar</h2>
    <div class="mt-2 text-center">
        <label for="amount" class="font-bold text-2xl">Rp 20.000</label>
    </div>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    <h2 class="font-bold">Riwayat pembayaran spp</h2>
    <table class="min-w-full table-auto text-sm text-left mt-2">
        <thead class="bg-slate-200 text-sm sticky top-0 z-10">
            <tr>
                <th class="px-6 py-3 font-semibold">#</th>
                <th class="px-6 py-3 font-semibold">Tanggal</th>
                <th class="px-6 py-3 font-semibold">Jumlah</th>
                <th class="px-6 py-3 font-semibold text-center">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection