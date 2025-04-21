<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="">
        <!-- SIDEBAR -->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main">
            @include('include.navbar', ['pageTitle' => 'New'])
            @include('include.dropdown')

            <!-- CARDS -->
            <h2 class="text-center">Tambah Agenda</h2>

            <div class="form-container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="p-4" action="{{ route('agenda.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="time" class="form-control" name="jam" required>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Kegiatan</label>
                        <textarea class="form-control" name="title" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="description" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="draft">Draft</option>
                            <option value="tentative">Tentative</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancel">Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="disposition" class="form-label">Disposisi</label>
                        <input type="text" class="form-control" name="disposition" required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Simpan Agenda</button>
                </form>
            </div>


            <style>
                .form-container {
                    max-width: 600px;
                    background-color: #f8f9fa;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    margin: auto;
                    margin-top: 20px;
                }

                .form-label {
                    font-weight: bold;
                }

                .input-group-text {
                    background-color: #e9ecef;
                    border: 1px solid #ced4da;
                    border-radius: 0.375rem;
                }

                h1,
                h2 {
                    font-family: 'Poppins', sans-serif;
                    /* Sesuaikan dengan font yang digunakan */
                    font-weight: 700;
                    /* Pastikan tebal */
                    font-size: 24px;
                    /* Sesuaikan dengan desain */
                    color: #333;
                    /* Pastikan warna jelas */
                }
            </style>
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
