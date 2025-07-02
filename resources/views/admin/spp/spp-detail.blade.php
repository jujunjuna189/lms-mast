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
                    <td>: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Username</td>
                    <td>: {{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Tingkat</td>
                    <td>: {{ $student->grade->title }}</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Jurusan</td>
                    <td>: {{ $student->major->title }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    <h2 class="text-center">Total SPP Yang Belum Dibayar</h2>
    <div class="mt-2 text-center">
        <div class="flex gap-2 justify-center items-center">
            <label for="amount" class="font-bold text-2xl" data-spp="{{ $spp }}">{{ $controller->formatCurrentcy($spp->amount ?? '0') }}</label>
            <div class="bg-blue-600 hover:bg-blue-700 py-1 px-2 rounded-sm text-white flex items-center gap-1 cursor-pointer open-modal" data-id="modalEditSPP">
                <svg xmlns=" http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                    <path d="M13.5 6.5l4 4" />
                </svg>
                Edit
            </div>
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
<!-- Modal -->
<x-modal id="modalEditSPP" title="Edit SPP">
    <form id="formEditSPP" action="{{ route('admin.spp.detail.create') }}" method="POST">
        @csrf
        <input type="text" name="user_id" value="{{ $user->id }}" hidden>

        <x-field.text-input name="amount" label="Nominal" type="number" value="{{ $spp->amount ?? '' }}" required />

        <x-slot:footer>
            <button form="formEditSPP" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection