@extends('components/layout/layout')
@section('content')
<div class="flex justify-center mt-10">
    <div class="w-[50%]">
        <div class="">
            <div class="bg-white border border-slate-300 p-5 rounded-lg">
                <h1 class="text-sm font-medium text-slate-500">Selamat datang di aplikasi LMS</h1>
                <p class="text-xl font-bold text-slate-800">MAST Pakunagara</p>
            </div>
        </div>
        <div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
            <h2 class="font-bold">Biodata</h2>
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
                            <td class="text-start w-56 text-slate-600 py-1">Status</td>
                            <td>: Dalam Pendaftaran</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <small class="text-blue-800">Cek berkala akun anda untuk melihat status pendaftaran</small>
            </div>
            <div class="flex gap-2 mt-3">
                <div class="px-4 py-2 text-sm text-green-600 rounded bg-green-100 cursor-pointer font-semibold" onclick="window.location.reload()">Muat Halaman</div>
                <div class="px-4 py-2 text-sm text-red-600 rounded bg-red-100 cursor-pointer font-semibold" onclick="window.location.href='<?= route('logout.auth') ?>'">Logout</div>
            </div>
        </div>
    </div>
</div>

@endsection