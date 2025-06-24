@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Tugas & Ujian</p>
    <p class="text-sm text-slate-500">Daftar Tugas & Ujian</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
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
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if(count($coursework) == 0)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5 text-center" colspan="6">Tidak ada tugas dan ujian</td>
                </tr>
                @endif
                @foreach($coursework as $index => $val)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5 font-medium">{{ $val->title }}</td>
                    <td class="px-5 py-1.5">{{ $val->class->name ?? '' }}</td>
                    <td class="px-6 py-1.5">{{ $val->subject->title ?? '' }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->type }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->deadline }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection