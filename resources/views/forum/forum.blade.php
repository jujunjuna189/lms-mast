@extends('components/layout/layout-dashboard')
@section('content')
<!-- Header Actions -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Topik Diskusi</h2>
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
        ➕ Buat Topik Baru
    </button>
</div>
<div class="space-y-2">
    <!-- Card -->
    <div class="bg-white border border-slate-200 rounded-lg p-5 hover:shadow-md transition">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-green-700">Bagaimana cara mengerjakan soal essay Fiqih?</h3>
                <p class="text-sm text-gray-500 mt-1">Diposting oleh <span class="font-medium text-gray-700">Ustadz Ahmad</span> • 2 jam yang lalu</p>
            </div>
            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">📚 Fiqih</span>
        </div>
        <div class="mt-4 flex items-center justify-between text-sm text-gray-600">
            <p>💬 12 Komentar</p>
            <p>⏱️ Terakhir dibalas 30 menit lalu</p>
        </div>
    </div>

    <!-- Another Card -->
    <div class="bg-white border border-slate-200 rounded-lg p-5 hover:shadow-md transition">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-semibold text-green-700">Perbedaan antara himpunan dan irisan di Matematika</h3>
                <p class="text-sm text-gray-500 mt-1">Diposting oleh <span class="font-medium text-gray-700">Ibu Siti</span> • 1 hari yang lalu</p>
            </div>
            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">📘 Matematika</span>
        </div>
        <div class="mt-4 flex items-center justify-between text-sm text-gray-600">
            <p>💬 8 Komentar</p>
            <p>⏱️ Terakhir dibalas 2 jam lalu</p>
        </div>
    </div>
    @endsection