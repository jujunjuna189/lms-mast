@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Jadwal Kelas</p>
    <p class="text-sm text-slate-500">Daftar Jadwal Kelas</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-between items-center">
        <p class="text-base font-medium">Jadwal Hari Senin</p>
        <div class="flex items-center gap-4">
            <label for="filterHari" class="text-sm font-medium">Pilih Hari:</label>
            <select id="filterHari" name="filterHari" class="border w-40 rounded border-slate-300 px-3 py-1 ring-0">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-2">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-5 py-3 w-1/6 font-semibold">Jam</th>
                    <th class="px-5 py-3 w-1/3 font-semibold">Mata Pelajaran</th>
                    <th class="px-5 py-3 w-1/3 font-semibold">Guru</th>
                    <th class="px-5 py-3 w-1/6 font-semibold text-center">Ruangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-1.5 font-medium">07:00 – 07:45</td>
                    <td class="px-5 py-1.5">Matematika</td>
                    <td class="px-5 py-1.5">Ibu Siti Mulyani</td>
                    <td class="px-5 py-1.5 text-center">10-A</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-5 py-1.5 font-medium">07:45 – 08:30</td>
                    <td class="px-5 py-1.5">Bahasa Indonesia</td>
                    <td class="px-5 py-1.5">Pak Rudi Hartono</td>
                    <td class="px-5 py-1.5 text-center">10-A</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-1.5 font-medium">08:45 – 09:30</td>
                    <td class="px-5 py-1.5">Bahasa Inggris</td>
                    <td class="px-5 py-1.5">Ibu Yani Marlina</td>
                    <td class="px-5 py-1.5 text-center">Lab Bahasa</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100">
                    <td class="px-5 py-1.5 font-medium">09:45 – 10:30</td>
                    <td class="px-5 py-1.5">Fiqih</td>
                    <td class="px-5 py-1.5">Ustadz Ahmad</td>
                    <td class="px-5 py-1.5 text-center">Ruang 3</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection