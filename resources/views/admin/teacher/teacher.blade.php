@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Guru</p>
    <p class="text-sm text-slate-500">Daftar Guru</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex justify-end">
        <button type="button" class="cursor-pointer inline-block bg-green-800 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition open-modal" data-id="modalTambahGuru">Tambah</button>
    </div>
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Nama Lengkap</th>
                    <th class="px-6 py-3 font-semibold">Email</th>
                    <th class="px-6 py-3 font-semibold">Nomor Telepon</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($teacher as $index => $val)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5">{{ $val->full_name }}</td>
                    <td class="px-6 py-1.5">{{ $val->email ?? '-' }}</td>
                    <td class="px-6 py-1.5">{{ $val->phone_number ?? '-' }}</td>
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
<x-modal id="modalTambahGuru" title="Tambah Guru">
    <form id="formTambahGuru" action="{{ route('admin.teacher.create') }}" method="POST">
        @csrf

        <x-field.text-input name="full_name" label="Nama Guru" required />
        <x-field.text-input name="email" label="Email" required />
        <x-field.text-input name="phone_number" label="Nomor Telepon" required />
        <x-slot:footer>
            <button form="formTambahGuru" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- Update -->
<x-modal id="modalEditGuru" title="Edit Guru">
    <form id="formEditGuru" method="POST">
        @csrf

        <x-field.text-input name="full_name" label="Nama Guru" required />
        <x-field.text-input name="email" label="Email" required />
        <x-field.text-input name="phone_number" label="Nomor Telepon" required />
        <x-slot:footer>
            <button form="formEditGuru" type="submit" class="bg-blue-800 text-white px-4 py-1 rounded hover:bg-blue-700 cursor-pointer">Update</button>
        </x-slot:footer>
    </form>
</x-modal>
<!-- delete confirm -->
<x-modal id="modalHapusGuru" title="Konfirmasi Hapus">
    <form id="formHapusGuru" method="POST">
        @csrf
        @method('DELETE')

        <p class="text-sm text-gray-700 mb-4">
            Apakah Anda yakin ingin menghapus <strong>guru <span id="guruNama"></span></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>

        <x-slot:footer>
            <button form="formHapusGuru" type="submit" class="bg-red-700 text-white px-4 py-1 rounded hover:bg-red-600">Hapus</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');

        $('#formEditGuru').attr('action', `/admin/teacher/${data.id}`);
        $('#formEditGuru input[name="full_name"]').val(data.full_name);
        $('#formEditGuru input[name="email"]').val(data.email);
        $('#formEditGuru input[name="phone_number"]').val(data.phone_number);

        $('#modalEditGuru').removeClass('hidden').addClass('flex');
    });

    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        $('#formHapusGuru').attr('action', `/admin/teacher/${id}`);
        $('#modalHapusGuru').removeClass('hidden').addClass('flex');;
    });
</script>
@endsection