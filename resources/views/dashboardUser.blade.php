<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Menarik</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Font Awesome -->
    <style>
        body {
            background-color: #76aeeb;
            overflow: hidden;
            position: relative;
            color: #ffffff;
        }

        .bubble {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
            animation: float 5s infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-100px) rotate(180deg);
            }

            100% {
                transform: translateY(0) rotate(360deg);
            }
        }

        .logo-container {
            text-align: center;
            margin-top: 50px;
        }

        .logo {
            width: 150px;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            transition: transform 0.5s;
        }

        .logo:hover {
            transform: translateY(-5px);
        }

        .school-name {
            font-size: 1.5rem;
        }

        .box {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 20px;
            text-align: center;
            margin: 20px;
            border-radius: 20px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .box:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .box .icon {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .box .title {
            font-size: 1.5rem;
            color: #333333;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        .box .icon.animated {
            animation: bounce 1s infinite;
        }

        .form-container {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #007bff;
        }

        span.select2.select2-container.select2-container--classic {
            width: 100% !important;
        }
    </style>
</head>

<body>

    <div class="bubble" style="top: 10%; left: 10%; width: 60px; height: 60px;"></div>
    <div class="bubble" style="top: 20%; left: 40%; width: 40px; height: 40px;"></div>
    <div class="bubble" style="top: 30%; left: 70%; width: 80px; height: 80px;"></div>
    <div class="bubble" style="top: 50%; left: 20%; width: 50px; height: 50px;"></div>
    <div class="bubble" style="top: 60%; left: 50%; width: 30px; height: 30px;"></div>
    <div class="bubble" style="top: 80%; left: 80%; width: 70px; height: 70px;"></div>

    <div class="logo-container">
        <img src="logo_pi.png" alt="Logo" class="mx-auto">
        <div class="school-name">SMK PRAKARYA INTERNASIONAL</div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <button type="button" class="col-md-4 box" data-hs-overlay="#hs-vertically-centered-modal">
                <div class="icon animated">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="title">
                    Surat Izin Keluar
                </div>
            </button>

            <div class="col-md-4 box">
                <div class="icon animated">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <div class="title">
                    Perpindahan Kelas
                </div>
            </div>
            <div class="col-md-4 box">
                <div class="icon animated">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="title">
                    Keterlambatan
                </div>
            </div>
        </div>
    </div>

    <div id="hs-vertically-centered-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div
            class="hs-overlay-open:opacity-100 mx-auto hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="flex flex-col w-full p-5 text-black bg-white border shadow-sm pointer-events-auto rounded-xl">
                <form action="{{ route('keluar-kampus.storeIzinkeluar') }}" method="POST" id="createFormIzinkeluar">
                    @csrf
                    <div class="text-black form-group">
                        <label for="siswa_id">Nama Siswa</label>
                        <select name="siswa_id[]" id="siswa_id" class="w-full text-black bg-gray-300" multiple
                            required>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}" class="text-black">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alasan">Alasan</label>
                        <input type="text" name="alasan" class="form-control" id="alasan" required>
                    </div>

                    <div class="form-group">
                        <label for="mapel">Mapel</label>
                        <input type="text" name="mapel" class="form-control" id="mapel" required>
                    </div>

                    <div>
                        <button type="reset" class="text-white btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function createBubbles() {
            const container = document.body;
            const bubbleCount = 20;

            for (let i = 0; i < bubbleCount; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';
                bubble.style.width = `${Math.random() * 100}px`;
                bubble.style.height = bubble.style.width;
                bubble.style.left = `${Math.random() * container.clientWidth}px`;
                bubble.style.animationDuration = `${Math.random() * 5 + 2}s`;
                container.appendChild(bubble);
            }
        }

        window.onload = createBubbles;
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // $(document).ready(function() {
        $('#siswa_id').select2({
            placeholder: 'Cari Siswa...',
            allowClear: true,
            data: [],
            theme: "classic",
        });
        // });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
