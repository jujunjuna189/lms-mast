@extends('components/layout/layout-dashboard')
@section('content')
<div class="">
    <div class="bg-white border border-slate-300 p-5 rounded-lg">
        <h1 class="text-sm font-medium text-slate-500">Selamat datang di aplikasi LMS</h1>
        <p class="text-xl font-bold text-slate-800">MAST Pakunagara</p>
    </div>
</div>
<!-- Content Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
    <!-- Card 1 -->
    <div class="bg-white p-4 rounded-xl border border-slate-300 relative overflow-hidden">
        <h3 class="text-lg font-semibold mb-2">Matematika</h3>
        <p class="text-sm text-gray-600">3 Materi | 1 Tugas Aktif</p>
        <!-- Hiasan pojok -->
        <div class="absolute bottom-[-20px] right-[-20px] w-20 h-20 bg-gradient-to-br from-green-400 to-blue-500 opacity-30 blur-2xl rounded-full"></div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white p-4 rounded-xl border border-slate-300 relative overflow-hidden">
        <h3 class="text-lg font-semibold mb-2">Bahasa Arab</h3>
        <p class="text-sm text-gray-600">5 Materi | 2 Tugas</p>
        <div class="absolute bottom-[-20px] right-[-20px] w-20 h-20 bg-gradient-to-br from-pink-400 to-purple-500 opacity-30 blur-2xl rounded-full"></div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white p-4 rounded-xl border border-slate-300 relative overflow-hidden">
        <h3 class="text-lg font-semibold mb-2">Aqidah Akhlak</h3>
        <p class="text-sm text-gray-600">2 Materi | Tidak ada tugas</p>
        <div class="absolute bottom-[-20px] right-[-20px] w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 opacity-30 blur-2xl rounded-full"></div>
    </div>
</div>
<section class="bg-white rounded-xl border border-slate-200 p-6 mb-8 mt-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">📢 Pengumuman</h2>
        <a href="#" class="text-sm text-green-700 hover:underline">Lihat Semua</a>
    </div>

    <ul class="space-y-4">
        <li class="border-l-4 border-green-600 pl-4">
            <p class="font-medium text-gray-900">Penilaian Tengah Semester dimulai 10 Juni 2025</p>
            <span class="text-sm text-gray-500">Diumumkan oleh Admin - 28 Mei 2025</span>
        </li>
        <li class="border-l-4 border-yellow-500 pl-4">
            <p class="font-medium text-gray-900">Pengumpulan tugas Bahasa Arab diperpanjang hingga 2 Juni</p>
            <span class="text-sm text-gray-500">Diumumkan oleh Ustadzah Mariam - 27 Mei 2025</span>
        </li>
        <li class="border-l-4 border-blue-500 pl-4">
            <p class="font-medium text-gray-900">Jadwal piket kelas semester ini sudah diperbarui</p>
            <span class="text-sm text-gray-500">Diumumkan oleh BK - 25 Mei 2025</span>
        </li>
    </ul>
</section>

@endsection