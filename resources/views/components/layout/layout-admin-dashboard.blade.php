<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>LMS</title>
</head>

<body class="bg-slate-50">
    <nav class="bg-green-800 relative overflow-hidden px-4 z-10">
        <div class="w-full flex gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <div class="py-5 px-5 flex gap-3 items-center">
                    <div class="w-10 h-10 rounded-full">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="w-full h-full">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="grow">
                        <h2 class="text-white text-xl font-bold">MAST Pakunagara</h2>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M17.451 2.344a1 1 0 0 1 1.41 -.099a12.05 12.05 0 0 1 3.048 4.064a1 1 0 1 1 -1.818 .836a10.05 10.05 0 0 0 -2.54 -3.39a1 1 0 0 1 -.1 -1.41z" />
                    <path d="M5.136 2.245a1 1 0 0 1 1.312 1.51a10.05 10.05 0 0 0 -2.54 3.39a1 1 0 1 1 -1.817 -.835a12.05 12.05 0 0 1 3.045 -4.065z" />
                    <path d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" />
                    <path d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z" />
                </svg>
                <div class="px-4 py-2 bg-green-700 rounded-lg flex justify-end gap-2 items-center">
                    <h3 class="text-white">Admin</h3>
                    <div class="w-6 h-6 bg-green-600 rounded-full"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="w-full flex">
        <aside class="w-60 h-full bg-white border border-slate-200 hidden md:block fixed top-0 bottom-0">
            <nav class="pt-20">
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer">Dashboard</div>
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.class') ?>'">Kelas</div>
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.subject') ?>'">Mata Pelajaran</div>
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.schedule') ?>'">Jadwal Kelas</div>
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.coursework') ?>'">Tugas & Ujian</div>
                <hr class="border border-slate-200" />
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.announcement') ?>'">Pengumuman</div>
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.forum') ?>'">Forum Diskusi</div>
                <hr class="border border-slate-200" />
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.forum') ?>'">Keuangan</div>
                <hr class="border border-slate-200" />
                <div class="block px-4 py-2 hover:bg-gray-200 text-sm font-semibold cursor-pointer" onclick="window.location.href='<?= route('admin.class') ?>'">Siswa</div>
            </nav>
        </aside>
        <div class="w-60"></div>
        <div class="p-5 grow">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Buka modal
            $('.open-modal').on('click', function() {
                const id = $(this).data('id');
                $('#' + id).removeClass('hidden').addClass('flex');
            });

            // Tutup modal
            $('.close-modal').on('click', function() {
                const id = $(this).data('id');
                $('#' + id).removeClass('flex').addClass('hidden');
            });
        });
    </script>
    @yield('script')
</body>

</html>