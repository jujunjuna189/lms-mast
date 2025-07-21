@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Forum</p>
    <p class="text-sm text-slate-500">Daftar Forum</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-end">
        <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahForum">Tambah</button>
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
            @foreach($forum as $index => $val)
            <tr class="hover:bg-gray-100">
                <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                <td class="px-6 py-1.5 font-medium">{{ $val->title }}</td>
                <td class="px-6 py-1.5">{{ $val->content }}</td>
                <td class="px-6 py-1.5 text-center">
                    <button type="button" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition cursor-pointer btn-update" data-class='@json($val)'>Edit</button>
                    <button type="button" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-1 ml-1 rounded-sm font-medium text-sm transition cursor-pointer btn-delete" data-id='{{ $val->id }}'>Hapus</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<x-modal id="modalTambahForum" title="Tambah Forum">
    <form id="formTambahForum" action="{{ route('admin.forum.create') }}" method="POST">
        @csrf
        <input type="text" name="author_id" id="author_id" value="{{ Auth::user()->id }}" hidden>
        <x-field.text-input name="title" label="Judul" required />
        <x-field.text-input name="content" label="Konten" required />
        <x-field.text-input name="category" label="Bidang" required />
        <x-slot:footer>
            <button form="formTambahForum" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- Update -->
<x-modal id="modalEditForum" title="Edit Forum">
    <form id="formEditForum" action="{{ route('admin.forum') }}" method="POST">
        @csrf

        <x-field.text-input name="title" label="Judul" required />
        <x-field.text-input name="content" label="Konten" required />

        <x-slot:footer>
            <button form="formEditForum" type="submit" class="bg-blue-800 text-white px-4 py-1 rounded hover:bg-blue-700 cursor-pointer">Update</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusForum" title="Konfirmasi Hapus">
    <form id="formHapusForum" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>Forum <span id="ForumNama"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusForum" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');

        $('#formEditForum').attr('action', `/admin/forum/${data.id}`);
        $('#formEditForum input[name="title"]').val(data.title);
        $('#formEditForum input[name="content"]').val(data.content);

        $('#modalEditForum').removeClass('hidden').addClass('flex');
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusForum').attr('action', `/admin/forum/${id}`);
        $('#modalHapusForum').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection