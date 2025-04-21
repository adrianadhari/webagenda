<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
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
            @include('include.navbar')
            @include('include.dropdown')

            <!-- CARDS -->
            <section class="cards">
                <div class="container mt-4">
                    @php $status = 'confirm'; @endphp
                    <h3 class="text-center fw-bold">{{ ucfirst($status) }}</h3>
                    <div class="cards">
                        <div class="agenda-container p-4 bg-white border rounded-3 shadow-sm">

                            @if ($agendas->isEmpty())
                                <div class="alert alert-info text-center"
                                    style="background-color: #87CEEB; color: black; padding: 10px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                                    Tidak Ada Agenda.
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Kegiatan</th>
                                                <th>Keterangan</th>
                                                <th>Tempat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agendas as $index => $agenda)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $agenda->date }}</td>
                                                    <td>{{ $agenda->jam }}</td>
                                                    <td>{{ $agenda->title }}</td>
                                                    <td>{{ $agenda->description }}</td>
                                                    <td>{{ $agenda->tempat }}</td>
                                                    <td><span
                                                            class="badge bg-success">{{ ucfirst($agenda->status) }}</span>
                                                    </td>
                                                    <td>
                                                        {{-- Tombol Delete --}}
                                                        <form action="{{ route('agenda.destroy', $agenda->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <ion-icon name="trash"></ion-icon>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
