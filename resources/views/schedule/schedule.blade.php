@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Jadwal Kelas</p>
    <p class="text-sm text-slate-500">Daftar Jadwal Kelas</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-between items-center">
        <p class="text-base font-medium">Jadwal: <span class="text-green-800">{{$filter['day']}}<span></p>
        <div class="flex items-center gap-4">
            <label for="filterHari" class="text-sm font-medium">Pilih Hari:</label>
            <select id="filterHari" name="filterHari"
                class="border w-40 rounded border-slate-300 px-3 py-1 ring-0"
                onchange="window.location.href = '<?= url('schedule') ?>?' + (this.value ? 'day=' + this.value : '')">
                <option value="">Semua</option>
                <option value="Senin" <?= $filter['day'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                <option value="Selasa" <?= $filter['day'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                <option value="Rabu" <?= $filter['day'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                <option value="Kamis" <?= $filter['day'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                <option value="Jumat" <?= $filter['day'] == 'Jumat' ? 'selected' : '' ?>>Jumat</option>
                <option value="Sabtu" <?= $filter['day'] == 'Sabtu' ? 'selected' : '' ?>>Sabtu</option>
            </select>

            <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahJadwal">Tambah</button>
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-2">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-5 py-3 font-semibold">#</th>
                    <th class="px-5 py-3 font-semibold">Hari</th>
                    <th class="px-5 py-3 font-semibold">Jam</th>
                    <th class="px-5 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-5 py-3 font-semibold">Guru</th>
                    <th class="px-5 py-3 font-semibold text-center">Kelas</th>
                    <th class="px-5 py-3 font-semibold text-center">Ruangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if(count($schedule) == 0)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5 text-center" colspan="7">Tidak ada jadwal</td>
                </tr>
                @endif
                @foreach($schedule as $index => $val)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-5 py-1.5">{{ $val->day }}</td>
                    <td class="px-5 py-1.5 font-medium">{{ $val->time_from }} – {{ $val->time_to }}</td>
                    <td class="px-5 py-1.5">{{ $val->subject->title ?? '' }}</td>
                    <td class="px-5 py-1.5">{{ $val->teacher }}</td>
                    <td class="px-5 py-1.5 text-center">{{ $val->class->name ?? '' }}</td>
                    <td class="px-5 py-1.5 text-center">{{ $val->room->title ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection