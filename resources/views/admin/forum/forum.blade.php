@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Forum</p>
    <p class="text-sm text-slate-500">Daftar Forum</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-end">
        <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahPengumuman">Tambah</button>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Konten</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            </tbody>
        </table>
    </div>
</div>
<x-modal id="modalTambahPengumuman" title="Tambah Pengumuman">
    <form id="formTambahPengumuman" action="{{ route('admin.announcement.create') }}" method="POST">
        @csrf
        <x-field.text-input name="title" label="Judul" required />
        <x-field.text-input name="content" label="Konten" required />
        <x-slot:footer>
            <button form="formTambahPengumuman" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- Update -->
<x-modal id="modalEditPengumuman" title="Edit Pengumuman">
    <form id="formEditPengumuman" method="POST">
        @csrf

        <x-field.text-input name="title" label="Judul" required />
        <x-field.text-input name="content" label="Konten" required />

        <x-slot:footer>
            <button form="formEditPengumuman" type="submit" class="bg-blue-800 text-white px-4 py-1 rounded hover:bg-blue-700 cursor-pointer">Update</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusPengumuman" title="Konfirmasi Hapus">
    <form id="formHapusPengumuman" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>Pengumuman <span id="PengumumanNama"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusPengumuman" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');

        $('#formEditPengumuman').attr('action', `/admin/announcement/${data.id}`);
        $('#formEditPengumuman input[name="title"]').val(data.title);
        $('#formEditPengumuman input[name="content"]').val(data.content);

        $('#modalEditPengumuman').removeClass('hidden').addClass('flex');
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusPengumuman').attr('action', `/admin/announcement/${id}`);
        $('#modalHapusPengumuman').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection