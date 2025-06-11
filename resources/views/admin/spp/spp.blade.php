@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">SPP Siswa</p>
    <p class="text-sm text-slate-500">Daftar Siswa</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="flex gap-2">
        <div class="grow">
            <label for="Tingkat" class="block text-sm font-medium text-gray-700 mb-1">
                Pilih Tingkat
            </label>
            <select id="filterTingkat" name="filterTingkat"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm"
                onchange="window.location.href = '<?= url('admin/spp') ?><?= $filter['major'] != null ? '?major=' . $filter['major'] . '&' : '?' ?>' + (this.value ? 'grade=' + this.value : '')">
                <option value="">--Pilih--</option>
                @foreach($grade as $key => $val)
                <option value="{{ $key }}" <?= $filter['grade'] == $key ? 'selected' : '' ?>>{{ $val }}</option>
                @endforeach
            </select>
        </div>
        <div class="grow">
            <label for="Jurusan" class="block text-sm font-medium text-gray-700 mb-1">
                Pilih Jurusan
            </label>
            <select id="filterJurusan" name="filterJurusan"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 text-sm"
                onchange="window.location.href = '<?= url('admin/spp') ?><?= $filter['grade'] != null ? '?grade=' . $filter['grade'] . '&' : '?' ?>' + (this.value ? 'major=' + this.value : '')">
                <option value="">--Pilih--</option>
                @foreach($major as $key => $val)
                <option value="{{ $key }}" <?= $filter['major'] == $key ? 'selected' : '' ?>>{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm mt-2">
    @if(!$filter['grade'] || !$filter['major'])
    <div class="h-60 flex justify-center items-center text-center">
        <div class="flex flex-col">
            <p class="font-bold text-black">Data Belum Difilter</p>
            <small>Silahkan pilih kelas dan jurusan terlebih dahulu</small>
        </div>
    </div>
    @endif
    @if($filter['grade'] && $filter['major'])
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Nama Lengkap</th>
                    <th class="px-6 py-3 font-semibold">Tingkat</th>
                    <th class="px-6 py-3 font-semibold">Jurusan</th>
                    <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($student as $index => $val)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5">{{ $val->user->name }}</td>
                    <td class="px-6 py-1.5">{{ $val->grade->title }}</td>
                    <td class="px-6 py-1.5">{{ $val->major->title }}</td>
                    <td class="px-6 py-1.5 text-center">
                        <a href="{{ route('admin.spp.detail', ['user_id' => $val->user_id]) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-sm font-medium text-sm transition cursor-pointer">Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection