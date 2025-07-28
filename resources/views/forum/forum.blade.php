@extends('components/layout/layout-dashboard')
@section('content')
<!-- Header Actions -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Topik Diskusi</h2>
    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition open-modal cursor-pointer" data-id="modalTambahForum">
        ➕ Buat Topik Baru
    </button>
</div>
<div class="space-y-2">
    @foreach($forum as $val)
        <!-- Card -->
        <div class="bg-white border border-slate-200 rounded-lg p-5 hover:shadow-md transition">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-semibold text-green-700">{{ $val->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Diposting oleh <span class="font-medium text-gray-700">{{ $val->author->name }}</span> • {{ $val->created_at->diffForHumans(now(), true); }} yang lalu</p>
                </div>
                @if($val->category)
                    <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">📚 {{ $val->category }}</span>
                @endif
            </div>
            {{-- <div class="mt-4 flex items-center justify-between text-sm text-gray-600">
                <p>💬 12 Komentar</p>
                <p>⏱️ Terakhir dibalas 30 menit lalu</p>
            </div> --}}
        </div>
    @endforeach
</div>
<x-modal id="modalTambahForum" title="Tambah Forum">
    <form id="formTambahForum" action="{{ route('forum.create') }}" method="POST">
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
@endsection