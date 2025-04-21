<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #C9E6F0;">
    <div class="d-flex">
        <!-- SIDEBAR -->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main flex-grow-1">
            @include('include.navbar', ['pageTitle' => 'Laporan'])
            @include('include.dropdown')

            <!-- TITLE -->
            <h2 class="fw-bold text-center mt-4">Laporan</h2>

            <!-- CONTENT -->
            <section class="content mt-4">
                <div class="container">
                    <div class="bg-white p-4 rounded-3 shadow-sm">
                        <!-- Filter Tanggal & Tombol Print PDF sejajar -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Filter Tanggal</h5>
                            <button class="btn fw-bold" style="background-color: #F96E2A; color: #ffffff;">
                                <ion-icon name="print"></ion-icon> <span>Print PDF</span>
                            </button>
                        </div>

                        <form class="d-flex align-items-center gap-2 mb-4">
                            <label for="tanggal-awal">Tanggal Awal</label>
                            <input type="date" id="tanggal-awal" class="form-control" style="width: 150px;">
                            <span class="px-3 py-1 fw-bold rounded"
                                style="background-color: #78B3CE; color: #FFFFFF;">s/d</span>
                            <label for="tanggal-akhir">Tanggal Akhir</label>
                            <input type="date" id="tanggal-akhir" class="form-control" style="width: 150px;">
                        </form>

                        <!-- Table Section -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Uraian Kegiatan</th>
                                        <th>Tempat</th>
                                        <th>Oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-center">1</td>
                                        <td>20 Februari 2025</td>
                                        <td>Acara Pisah Sambut Pj. Wali Kota Bogor dengan Wali Kota Bogor 2025-2030</td>
                                        <td>Plaza Balai Kota</td>
                                        <td>Adelia Meilani Dewi</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-center">2</td>
                                        <td>21 Februari 2025</td>
                                        <td>Pelatihan Pengolahan Big Data menggunakan Python</td>
                                        <td>Gedung DPRD Kota Bogor</td>
                                        <td>Adelia Meilani Dewi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
