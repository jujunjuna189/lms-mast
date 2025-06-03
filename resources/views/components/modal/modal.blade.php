@props([
'id' => 'modal-id',
'title' => 'Modal Title',
])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-4 relative">
        <!-- Header -->
        <div class="flex justify-between items-center px-4 py-3 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            <button class="text-gray-500 hover:text-gray-700 text-xl close-modal cursor-pointer" data-id="{{ $id }}">&times;</button>
        </div>

        <!-- Body -->
        <div class="p-4">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="flex justify-end items-center px-4 py-2 border-t border-slate-200 gap-2">
            <button class="bg-gray-200 text-gray-700 px-4 py-1 rounded hover:bg-gray-300 close-modal cursor-pointer" data-id="{{ $id }}">Tutup</button>
            {{ $footer ?? '' }}
        </div>
    </div>
</div>