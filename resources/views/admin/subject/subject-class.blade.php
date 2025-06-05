@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Kelas {{ $class->name }}</p>
    <p class="text-sm text-slate-500">Daftar Mata Pelajaran</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-end">
        <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahMataPelajaran">Tambah</button>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 font-semibold">Guru Pengampu</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($subject_class as $index => $val)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5 font-medium">{{ $val->subject->title }}</td>
                    <td class="px-6 py-1.5">{{ $val->subject->supervising }}</td>
                    <td class="px-6 py-1.5 text-center">
                        <button type="button" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-1 ml-1 rounded-sm font-medium text-sm transition cursor-pointer btn-delete" data-id='{{ $val->id }}'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-modal id="modalTambahMataPelajaran" title="Tambah Mata Pelajaran">
    <form id="formTambahMataPelajaran" action="{{ route('admin.subject.class.create') }}" method="POST">
        @csrf
        <input type="text" name="class_id" value="{{ $class->id }}" hidden>
        <input type="text" name="status" value="1" hidden>
        <x-field.select-input
            name="subject_id"
            label="Pilih Mata Pelajaran"
            :options="$subject"
            placeholder="-- Pilih Mata Pelajaran --"
            required />

        <x-slot:footer>
            <button form="formTambahMataPelajaran" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusMataPelajaran" title="Konfirmasi Hapus">
    <form id="formHapusMataPelajaran" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>mata pelajaran <span id="MataPelajaranNama"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusMataPelajaran" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusMataPelajaran').attr('action', `/admin/subject/class/${id}`);
        $('#modalHapusMataPelajaran').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection