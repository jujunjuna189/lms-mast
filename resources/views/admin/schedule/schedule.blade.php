@extends('components/layout/layout-admin-dashboard')
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
                <option>Semua</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
            <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahJadwal">Tambah</button>
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-2">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-5 py-3 font-semibold">Jam</th>
                    <th class="px-5 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-5 py-3 font-semibold">Guru</th>
                    <th class="px-5 py-3 font-semibold text-center">Ruangan</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($schedule as $index => $val)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-1.5 font-medium">{{ $val->time_from }} – {{ $val->time_to }}</td>
                    <td class="px-5 py-1.5">{{ $val->subject->title }}</td>
                    <td class="px-5 py-1.5">{{ $val->teacher }}</td>
                    <td class="px-5 py-1.5 text-center">{{ $val->room->title }}</td>
                    <td class="px-6 py-1.5 text-center">
                        <button type="button" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition cursor-pointer btn-update" data-class='@json($val)'>Edit</button>
                        <button type="button" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-1 ml-1 rounded-sm font-medium text-sm transition cursor-pointer btn-delete" data-id='{{ $val->id }}'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-modal id="modalTambahJadwal" title="Tambah Jadwal">
    <form id="formTambahJadwal" action="{{ route('admin.schedule.create') }}" method="POST">
        @csrf
        <x-field.select-input
            name="day"
            label="Pilih Hari"
            :options="[
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            ]"
            placeholder="-- Pilih Hari --"
            required />

        <div class="flex gap-2">
            <div class="grow">
                <x-field.text-input name="time_from" label="Dari" type="time" required />
            </div>
            <div class="grow">
                <x-field.text-input name="time_to" label="Sampai" type="time" required />
            </div>
        </div>

        <x-field.select-input
            name="subject_id"
            label="Pilih Mata Pelajaran"
            :options="$subject"
            placeholder="-- Pilih Mata Pelajaran --"
            required />

        <x-field.text-input name="teacher" label="Guru" required />

        <x-field.select-input
            name="room_id"
            label="Pilih Ruangan"
            :options="$room"
            placeholder="-- Pilih Ruangan --"
            required />

        <x-slot:footer>
            <button form="formTambahJadwal" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- Edit -->
<x-modal id="modalEditJadwal" title="Edit Jadwal">
    <form id="formEditJadwal" action="" method="POST">
        @csrf
        <x-field.select-input
            name="day"
            label="Pilih Hari"
            :options="[
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            ]"
            placeholder="-- Pilih Hari --"
            required />

        <div class="flex gap-2">
            <div class="grow">
                <x-field.text-input name="time_from" label="Dari" type="time" required />
            </div>
            <div class="grow">
                <x-field.text-input name="time_to" label="Sampai" type="time" required />
            </div>
        </div>

        <x-field.select-input
            name="subject_id"
            label="Pilih Mata Pelajaran"
            :options="$subject"
            placeholder="-- Pilih Mata Pelajaran --"
            required />

        <x-field.text-input name="teacher" label="Guru" required />

        <x-field.select-input
            name="room_id"
            label="Pilih Ruangan"
            :options="$room"
            placeholder="-- Pilih Ruangan --"
            required />

        <x-slot:footer>
            <button form="formEditJadwal" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusJadwal" title="Konfirmasi Hapus">
    <form id="formHapusJadwal" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>jadwal <span id="jadwal"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusJadwal" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');
        console.log(data);

        $('#formEditJadwal').attr('action', `/admin/schedule/${data.id}`);
        $('#formEditJadwal select[name="day"]').val(data.day);
        $('#formEditJadwal input[name="time_from"]').val(data.time_from);
        $('#formEditJadwal input[name="time_to"]').val(data.time_to);
        $('#formEditJadwal select[name="subject_id"]').val(data.subject_id);
        $('#formEditJadwal input[name="teacher"]').val(data.teacher);
        $('#formEditJadwal select[name="room_id"]').val(data.room_id);

        $('#modalEditJadwal').removeClass('hidden').addClass('flex');
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusJadwal').attr('action', `/admin/schedule/${id}`);
        $('#modalHapusJadwal').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection