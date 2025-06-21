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

            </div>
        </div>
    </div>
    <div class="grow">
        <div class="bg-white px-4 py-5 border border-slate-200 rounded-sm mt-2">
            <h2 class="font-semibold">Bayar SPP</h2>
            <div class="mt-2">
                <x-field.text-input name="deadline" label="Tanggal Pembayaran" type="date" required />
            </div>
            <div class="flex gap-4">
                <div class="mt-1">
                    <label for="" class="text-sm">Jumlah Yang Harus Dibayar</label>
                    <div class="px-4 py-2 rounded-md bg-green-100 text-green-600 text-lg font-bold">Rp 2000</div>
                </div>
                <div class="mt-2 grow">
                    <x-field.text-input name="deadline" label="Masukan Nominal Uang Yang Dibayarkan" required />
                </div>
            </div>
            <div class="mt-2">
                <textarea name="" id="" cols="30" rows="5" placeholder="Masukan Catatan Pembayaran Disini..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm"></textarea>
            </div>
            <div class="flex justify-end mt-3">
                <button type="submit" class="bg-green-800 w-full text-white font-bold px-4 py-2 rounded hover:bg-green-700 cursor-pointer">Bayar</button>
            </div>
        </div>
    </div>
</div>
@endif
@endsection