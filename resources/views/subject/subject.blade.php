@extends('components/layout/layout-dashboard')
@section('content')
<div class="leading-3">
    <p class="text-xl font-bold">Mata Pelajaran</p>
    <p class="text-sm text-slate-500">Daftar Mata Pelajaran</p>
</div>
<div class="bg-white p-4 border border-slate-200 rounded-sm">
    <div class="overflow-x-auto bg-white rounded-sm border border-slate-200 ring-1 ring-gray-200 mt-4">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-slate-200 text-sm sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 font-semibold">Guru Pengampu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if(count($subject) == 0)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5 text-center" colspan="3">Tidak ada mata pelajaran</td>
                </tr>
                @endif
                @foreach($subject as $index => $val)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-1.5">{{ $index + 1 }}</td>
                    <td class="px-6 py-1.5 font-medium">{{ $val->subject->title ?? '' }}</td>
                    <td class="px-6 py-1.5">{{ $val->subject->supervising ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection