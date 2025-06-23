<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>LMS</title>
</head>

<body class="bg-slate-50">
    <nav class="bg-green-800 relative overflow-hidden px-4">
        <div class="max-w-screen-xl mx-auto w-full flex gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <div class="py-5 px-5 flex gap-3 items-center">
                    <div class="w-16 h-16 rounded-full">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="w-full h-full">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="grow">
                        <h2 class="text-white text-xl font-bold">MAST Pakunagara</h2>
                    </div>
                    <ul class="flex">
                        <li class="pr-5 py-2 text-white/90 flex justify-between items-center cursor-pointer" onclick="window.location.href='<?= route('dashboard') ?>'">
                            <div class="mr-2 hover:font-semibold"><span>Beranda</span></div>
                        </li>
                        <li class="pr-5 py-2 text-white/90 flex justify-between items-center cursor-pointer" onclick="window.location.href='<?= route('subject') ?>'">
                            <div class="mr-2 hover:font-semibold"><span>Mata Pelajaran</span></div>
                        </li>
                        <li class="pr-5 py-2 text-white/90 flex justify-between items-center cursor-pointer" onclick="window.location.href='<?= route('coursework') ?>'">
                            <div class="mr-2 hover:font-semibold"><span>Tugas & Ujian</span></div>
                        </li>
                        <li class="pr-5 py-2 text-white/90 flex justify-between items-center cursor-pointer" onclick="window.location.href='<?= route('schedule') ?>'">
                            <div class="mr-2 hover:font-semibold"><span>Jadwal Kelas</span></div>
                        </li>
                        <li class="pr-5 py-2 text-white/90 flex justify-between items-center cursor-pointer" onclick="window.location.href='<?= route('forum') ?>'">
                            <div class="mr-2 hover:font-semibold"><span>Forum Diskusi</span></div>
                        </li>
                    </ul>
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
                <div id="profile-btn" class="px-4 py-2 bg-green-700 rounded-lg flex justify-end gap-2 items-center cursor-pointer relative">
                    <h3 class="text-white">Ikbal</h3>
                    <div class="w-6 h-6 bg-green-600 rounded-full"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-screen-xl mx-auto w-full flex items-center justify-between relative">
        <!-- Popup -->
        <div id="profile-menu" class="absolute right-0 lg:-right-4 -top-7 mr-4 w-40 bg-white rounded-md shadow-md p-2 z-50 hidden">
            <div class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer" onclick="window.location.href='#'">Profil Saya</div>
            <hr class="my-1 border-gray-200">
            <div class="px-4 py-2 text-sm text-red-600 hover:bg-red-100 cursor-pointer" onclick="window.location.href='<?= route('logout.auth') ?>'">Logout</div>
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto w-full py-5">
        @yield('content')
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

            // Popup profile
            // Toggle profile menu
            $('#profile-btn').on('click', function(e) {
                e.stopPropagation();
                $('#profile-menu').toggleClass('hidden');
            });

            // Tutup kalau klik di luar
            $(document).on('click', function() {
                $('#profile-menu').addClass('hidden');
            });
        });
    </script>
</body>

</html>