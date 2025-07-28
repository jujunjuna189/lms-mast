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
                    <!-- <th class="px-5 py-3 font-semibold">Kelas</th> -->
                    <th class="px-6 py-3 font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 font-semibold text-center">Jenis</th>
                    <th class="px-6 py-3 font-semibold text-center">Deadline</th>
                    <th class="py-3 font-semibold text-center">File</th>
                    <th class="py-3 font-semibold text-center">Upload File</th>
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
                    <!-- <td class="px-5 py-1.5">{{ $val->class->name ?? '' }}</td> -->
                    <td class="px-6 py-1.5">{{ $val->subject->title ?? '' }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->type }}</td>
                    <td class="px-6 py-1.5 text-center">{{ $val->deadline }}</td>
                    <td class="py-1.5 text-center">
                        @if($val->file)
                        <a href="{{ asset($val->file) }}" download="file.pdf" class="font-semibold bg-green-100 text-green-900 px-8 py-1 cursor-pointer">Unduh</a>
                        @else
                        <span>-</span>
                        @endif
                    </td>
                    <td>
                        <div class="flex justify-center">
                            @if($val->work == 1)
                            <span class="text-green-900 font-semibold">Sudah Mengerjakan</span>
                            @else
                            <button type="button" class="font-semibold bg-blue-100 text-blue-900 px-8 py-1 cursor-pointer btn-update" data-class='@json($val)'>Unggah Jawaban</button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-modal id="modalUploadTugas" title="Upload Tugas">
    <form id="formUploadTugas" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <x-field.text-input name="file" label="Upload File" type="file" />

        <x-slot:footer>
            <button form="formUploadTugas" type="submit" class="bg-green-800 text-white px-4 py-1 rounded hover:bg-green-700 cursor-pointer">Simpan</button>
        </x-slot:footer>
    </form>
</x-modal>
@endsection
@section('script')
<script>
    $(document).on('click', '.btn-update', function() {
        const data = $(this).data('class');

        $('#formUploadTugas').attr('action', `/admin/coursework/upload/${data.id}`);

        $('#modalUploadTugas').removeClass('hidden').addClass('flex');
    });
</script>
@endsection