@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Tugas & Ujian</p>
    <p class="text-sm text-slate-500">Daftar Tugas & Ujian</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 font-semibold text-center">Jenis</th>
                    <th class="px-6 py-3 font-semibold text-center">Deadline</th>
                    <th class="px-6 py-3 font-semibold text-center">Status</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-1.5">1</td>
                    <td class="px-6 py-1.5 font-medium">Tugas Aljabar</td>
                    <td class="px-6 py-1.5">Matematika</td>
                    <td class="px-6 py-1.5 text-center">Tugas</td>
                    <td class="px-6 py-1.5 text-center">2025-06-03</td>
                    <td class="px-6 py-1.5 text-center">
                        <span class="inline-block bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Belum Dikerjakan</span>
                    </td>
                    <td class="px-6 py-1.5 text-center">
                        <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-md text-sm transition">Kerjakan</a>
                    </td>
                </tr>

                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-6 py-1.5">2</td>
                    <td class="px-6 py-1.5 font-medium">Ujian Fiqih Bab 3</td>
                    <td class="px-6 py-1.5">Fiqih</td>
                    <td class="px-6 py-1.5 text-center">Ujian</td>
                    <td class="px-6 py-1.5 text-center">2025-06-05</td>
                    <td class="px-6 py-1.5 text-center">
                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Selesai</span>
                    </td>
                    <td class="px-6 py-1.5 text-center">
                        <a href="#" class="bg-gray-400 text-white px-4 py-1 rounded-md text-sm cursor-not-allowed opacity-60">Terkirim</a>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-1.5">3</td>
                    <td class="px-6 py-1.5 font-medium">Latihan Qawaid</td>
                    <td class="px-6 py-1.5">Bahasa Arab</td>
                    <td class="px-6 py-1.5 text-center">Tugas</td>
                    <td class="px-6 py-1.5 text-center">2025-06-08</td>
                    <td class="px-6 py-1.5 text-center">
                        <span class="inline-block bg-red-100 text-red-700 text-xs px-2 py-1 rounded">Terlambat</span>
                    </td>
                    <td class="px-6 py-1.5 text-center">
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded-md text-sm transition">Periksa</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection