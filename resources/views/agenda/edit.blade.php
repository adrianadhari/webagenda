@extends('layouts.app')

@section('title', 'Edit Agenda')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@section('content')
    <div class="container mt-4" style="max-width: 600px; background-color: #d3eaf2; padding: 20px; border-radius: 10px;">
        <h2 class="mb-4 text-center">Edit Agenda</h2>

        <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-borderless">
                <tr>
                    <td><label for="tanggal" class="form-label fw-bold">Tanggal</label></td>
                    <td><input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="{{ $agenda->tanggal }}" required></td>
                </tr>
                <tr>
                    <td><label for="jam" class="form-label fw-bold">Jam</label></td>
                    <td><input type="time" name="jam" id="jam" class="form-control" value="{{ $agenda->jam }}"
                            required></td>
                </tr>
                <tr>
                    <td><label for="kegiatan" class="form-label fw-bold">Kegiatan</label></td>
                    <td>
                        <textarea name="kegiatan" id="kegiatan" class="form-control" required>{{ $agenda->kegiatan }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="keterangan" class="form-label fw-bold">Keterangan</label></td>
                    <td>
                        <textarea name="keterangan" id="keterangan" class="form-control" required>{{ $agenda->keterangan }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="tempat" class="form-label fw-bold">Tempat</label></td>
                    <td><input type="text" name="tempat" id="tempat" class="form-control"
                            value="{{ $agenda->tempat }}" required></td>
                </tr>
                <tr>
                    <td><label for="status" class="form-label fw-bold">Status</label></td>
                    <td>
                        <select name="status" id="status" class="form-select">
                            <option value="draft" {{ $agenda->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="tentative" {{ $agenda->status == 'tentative' ? 'selected' : '' }}>Tentative
                            </option>
                            <option value="confirm" {{ $agenda->status == 'confirm' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancel" {{ $agenda->status == 'cancel' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </td>
                </tr>
            </table>

            <button type="submit" class="btn btn-danger w-100">Simpan Agenda</button>
            <a href="javascript:history.back()">Kembali</a>


        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert("Data berhasil diperbarui!");
                        location.reload(); // Refresh halaman setelah update
                    }
                });
            });
        });
    </script>
@endsection
