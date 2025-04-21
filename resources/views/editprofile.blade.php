<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="">
        <!-- SIDEBAR -->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main">
            @include('include.navbar', ['pageTitle' => 'Edit Profile'])
            @include('include.dropdown')

            <!-- CARDS -->
            <section class="cards">
                <div class="container mt-4">
                    <h3 class="text-center fw-bold">Edit Profile</h3>
                    <div class="card">
                        <div class="card-header bg-light text-dark">

                        </div>
                        <div class="card-body">
                            <!-- Form User -->
                            <form>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Username</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Password</label>
                                    <input type="password" class="form-control" placeholder="*isi jika ingin diubah">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
            </section>
            <style>
                .cards {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-top: 20px;
                }

                .cards .container {
                    width: 100%;
                    /* Sesuaikan lebar card */
                    max-width: 600px;
                    /* Agar tidak terlalu lebar di layar besar */
                }

                .card {
                    border-radius: 10px;
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                }

                .card-header {
                    text-align: center;
                    font-size: 20px;
                    font-weight: bold;
                    background-color: #f8f9fa;
                    /* Warna latar belakang header */
                    padding: 10px;
                    border-bottom: 2px solid #dee2e6;
                }

                .card-body {
                    padding: 20px;
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
