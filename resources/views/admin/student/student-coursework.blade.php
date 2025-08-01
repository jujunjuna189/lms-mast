@extends('components/layout/layout-admin-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Pengerjaan Tugas</p>
    <p class="text-sm text-slate-500">Daftar Siswa yang Sudah Mengerjakan</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Nama Lengkap</th>
                    <th class="px-6 py-3 font-semibold">Hasil Pengerjaan</th>
                    <th class="px-6 py-3 font-semibold text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($student_coursework as $index => $val)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5">{{ $val->user->name }}</td>
                    <td class="px-6 py-1.5">
                        @if($val->work)
                        <a href="{{ asset($val->work) }}" download="file.pdf" class="font-semibold bg-green-100 text-green-900 px-8 py-1 cursor-pointer">Unduh</a>
                        @else
                        <span>-</span>
                        @endif
                    </td>
                    <td class="px-6 py-1.5 text-center">
                        @if($val->status == 1)
                        <span class="font-semibold text-green-900 px-8 py-1">Sudah Mengerjakan</span>
                        @else
                        <span class="font-semibold text-red-900 px-8 py-1">Belum Mengerjakan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection