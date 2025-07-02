@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Pembayaran SPP</p>
    <p class="text-sm text-slate-500">Halaman Pembayaran SPP</p>
</div>
@if(!isset($user))
<div class="bg-white px-4 py-10 border border-slate-200 rounded-sm mt-2">
    <h2 class="text-center font-semibold">Cari Siswa Berdasarkan Username</h2>
    <div class="mt-2 text-center flex justify-center">
        <form action="{{ route('admin.spp.payment') }}" method="get">
            <div class="w-[50rem]">
                <label for="" class="block text-sm font-medium text-gray-700 mb-1">Masukan Username Siswa</label>
                <input type="text" name="username" id="username" class="text-center w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm">
                <div class="flex justify-center mt-5">
                    <button type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Cari Siswa</button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="flex gap-2">
    <div class="">
        <div class="bg-white px-4 py-5 border border-slate-200 rounded-sm mt-2">
            <h2 class="font-semibold">Data Siswa</h2>
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
        <div class="bg-white px-4 py-5 border border-slate-200 rounded-sm mt-2">
            <h2 class="font-semibold">Riwayat SPP</h2>
            <div class="mt-2">
                @foreach($history as $val)
                <div class="py-1">
                    <div class="px-4 py-2 rounded-md bg-slate-100 text-slate-600">
                        <p class="text-lg font-bold">{{ $controller->formatCurrentcy($val->amount ?? '0') }}</p>
                        <small>Tanggal Pembayaran: {{ $val->date }}</small>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.spp.detail', ['user_id' => $user->id]) }}" class="text-sm text-blue-500 underline">Lihat Pembayaran SPP Siswa</a>
        </div>
    </div>
    <div class="grow">
        <div class="bg-white px-4 py-5 border border-slate-200 rounded-sm mt-2">
            <form action="{{ route('admin.spp.payment.create') }}" method="post">
                @csrf
                <h2 class="font-semibold">Bayar SPP</h2>
                <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                <input type="text" name="username" value="{{ $user->email }}" hidden>

                <div class="mt-2 flex gap-3">
                    <div class="grow">
                        <x-field.text-input name="date" label="Tanggal Pembayaran" :value="old('date', now()->format('Y-m-d'))" type="date" required />
                    </div>
                    <x-field.text-input name="time" label="Waktu Pembayaran" type="time" required :value="old('time', now()->format('H:i'))" />
                </div>
                <div class="flex gap-4">
                    <div class="mt-1">
                        <label for="" class="text-sm">Jumlah Yang Harus Dibayar</label>
                        <div class="px-4 py-2 rounded-md bg-green-100 text-green-600 text-lg font-bold">{{ $controller->formatCurrentcy($spp->amount ?? '0') }}</div>
                    </div>
                    <div class="mt-2 grow">
                        <x-field.text-input name="amount" label="Masukan Nominal Uang Yang Dibayarkan" type="number" required />
                    </div>
                </div>
                <div class="mt-2">
                    <textarea name="note" id="note" cols="30" rows="5" placeholder="Masukan Catatan Pembayaran Disini..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm"></textarea>
                </div>
                <div class="flex justify-end mt-3">
                    <button type="submit" class="bg-green-800 w-full text-white font-bold px-4 py-2 rounded hover:bg-green-700 cursor-pointer">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection