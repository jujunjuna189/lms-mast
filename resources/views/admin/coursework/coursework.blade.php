@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Tugas & Ujian</p>
    <p class="text-sm text-slate-500">Daftar Tugas & Ujian</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-end">
        <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahTugas">Tambah</button>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-5 py-3 font-semibold">Kelas</th>
                    <th class="px-6 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 font-semibold text-center">Jenis</th>
                    <th class="px-6 py-3 font-semibold text-center">Deadline</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($coursework as $index => $val)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5 font-medium">{{ $val->title }}</td>
                    <td class="px-5 py-1.5">{{ $val->class->name }}</td>
                    <td class="px-6 py-1.5">{{ $val->subject->title }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->type }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->deadline }}</td>
                    <td class="px-6 py-1.5 text-center">
                        <a href="{{ route('admin.student.coursework', ['coursework_id' => $val->id]) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition cursor-pointer">Pengerjaan</a>
                        <button type="button" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition cursor-pointer btn-update" data-class='@json($val)'>Edit</button>
                        <button type="button" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-1 ml-1 rounded-sm font-medium text-sm transition cursor-pointer btn-delete" data-id='{{ $val->id }}'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-modal id="modalTambahTugas" title="Tambah Tugas">
    <form id="formTambahTugas" action="{{ route('admin.coursework.create') }}" method="POST">
        @csrf
        <x-field.text-input name="title" label="Judul" required />
        <x-field.select-input
            name="type"
            label="Pilih Jenis"
            :options="[
                'Tugas' => 'Tugas',
                'Ujian' => 'Ujian',
            ]"
            placeholder="-- Pilih Jenis --"
            required />

        <x-field.text-input name="deadline" label="Deadline" type="date" required />

        <x-field.select-input
            name="class_id"
            label="Pilih Kelas"
            :options="$class"
            placeholder="-- Pilih Kelas --"
            required />

        <x-field.select-input
            name="subject_id"
            label="Pilih Mata Pelajaran"
            :options="$subject"
            placeholder="-- Pilih Mata Pelajaran --"
            required />

        <x-field.select-input
            name="status"
            label="Pilih Status"
            :options="[
                'Dibuka' => 'Dibuka',
                'Ditutup' => 'Ditutup',
            ]"
            placeholder="-- Pilih Status --"
            required />

        <x-slot:footer>
            <button form="formTambahTugas" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- Edit -->
<x-modal id="modalEditTugas" title="Edit Tugas">
    <form id="formEditTugas" action="" method="POST">
        @csrf
        <x-field.text-input name="title" label="Judul" required />
        <x-field.select-input
            name="type"
            label="Pilih Jenis"
            :options="[
                'Tugas' => 'Tugas',
                'Ujian' => 'Ujian',
            ]"
            placeholder="-- Pilih Jenis --"
            required />

        <x-field.text-input name="deadline" label="Deadline" type="date" required />

        <x-field.select-input
            name="class_id"
            label="Pilih Kelas"
            :options="$class"
            placeholder="-- Pilih Kelas --"
            required />

        <x-field.select-input
            name="subject_id"
            label="Pilih Mata Pelajaran"
            :options="$subject"
            placeholder="-- Pilih Mata Pelajaran --"
            required />

        <x-field.select-input
            name="status"
            label="Pilih Status"
            :options="[
                'Belum Dikerjakan' => 'Belum Dikerjakan',
                'Selesai' => 'Selesai',
                'Terlambat' => 'Terlambat',
            ]"
            placeholder="-- Pilih Status --"
            required />

        <x-slot:footer>
            <button form="formEditTugas" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusTugas" title="Konfirmasi Hapus">
    <form id="formHapusTugas" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>tugas <span id="tugas"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusTugas" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');

        $('#formEditTugas').attr('action', `/admin/coursework/${data.id}`);
        $('#formEditTugas input[name="title"]').val(data.title);
        $('#formEditTugas select[name="type"]').val(data.type);
        $('#formEditTugas input[name="deadline"]').val(data.deadline);
        $('#formEditTugas select[name="class_id"]').val(data.class_id);
        $('#formEditTugas select[name="subject_id"]').val(data.subject_id);
        $('#formEditTugas select[name="status"]').val(data.status);

        $('#modalEditTugas').removeClass('hidden').addClass('flex');
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusTugas').attr('action', `/admin/coursework/${id}`);
        $('#modalHapusTugas').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection