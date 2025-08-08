@extends('components/layout/layout-dashboard')
@section('content')
<div class="">
    <div class="bg-white border border-slate-300 p-5 rounded-lg">
        <h1 class="text-sm font-medium text-slate-500">Selamat datang di aplikasi LMS</h1>
        <p class="text-xl font-bold text-slate-800">MASTERPAK</p>
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
                    <td class="text-start w-56 text-slate-600 py-1">Tingkat</td>
                    <td>: {{ $student->grade->title ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-start w-56 text-slate-600 py-1">Jurusan</td>
                    <td>: {{ $student->major->title ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Content Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
    @foreach($schedule as $val)
    <div class="bg-white p-4 rounded-xl border border-slate-300 relative overflow-hidden">
        <h3 class="text-lg font-semibold mb-2">{{ $val->subject->title }}</h3>
        <p class="text-sm text-gray-600">Jadwal Hari Ini</p>
        <div class="absolute bottom-[-20px] right-[-20px] w-20 h-20 bg-gradient-to-br from-green-400 to-blue-500 opacity-30 blur-2xl rounded-full"></div>
    </div>
    @endforeach
</div>
<section class="bg-white rounded-xl border border-slate-200 p-6 mb-8 mt-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">📢 Pengumuman</h2>
        <a href="#" class="text-sm text-green-700 hover:underline">Lihat Semua</a>
    </div>

    <ul class="space-y-4">
        @foreach($announcement as $val)
        <li class="border-l-4 border-green-600 pl-4">
            <p class="font-medium text-gray-900">{{ $val->content }}</p>
            <span class="text-sm text-gray-500">Diumumkan pada - {{ Carbon\Carbon::parse($val->created_at)->format('d-M-y') }}</span>
        </li>
        @endforeach
    </ul>
</section>

@endsection