<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- SIDEBAR-->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main">
            @include('include.navbar')
            @include('include.dropdown')

            <!-- CARDS CSS -->
            <style>
                .cardBox {
                    display: flex;
                    justify-content: space-between;
                    gap: 20px;
                    padding: 20px;
                    flex-wrap: wrap;
                    /* Agar responsif saat layar kecil */
                }

                .card {
                    flex: 1;
                    /* Membuat semua card punya ukuran proporsional */
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background: white;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                    min-width: 200px;
                    max-width: 250px;
                }

                .numbers {
                    font-size: 24px;
                    font-weight: bold;
                }

                .cardName {
                    font-size: 16px;
                    color: #555;
                }

                .iconBox {
                    font-size: 24px;
                    color: #555;
                }
            </style>

            <!-- CARDS -->
            <div class="cardBox">
                <a href="{{ route('agenda.status', ['status' => 'draft']) }}"
                    style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $draft ? count($draft) : 0 }}</div>
                            <div class="cardName">Draft</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ route('agenda.status', ['status' => 'tentative']) }}"
                    style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $tentative ? count($tentative) : 0 }}</div>
                            <div class="cardName">Tentative</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="help-circle-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ route('agenda.status', ['status' => 'confirm']) }}"
                    style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $confirm ? count($confirm) : 0 }}</div>
                            <div class="cardName">Confirm</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ route('agenda.status', ['status' => 'cancel']) }}"
                    style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $cancel ? count($cancel) : 0 }}</div>
                            <div class="cardName">Cancel</div>
                        </div>
                        <div class="iconBox">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <!-- LOG ACTIVITY -->
                <div class="log-activity">
                    <h2>Log Activity</h2>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date Time</th>
                                    <th>Activity</th>
                                    <th>By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($logs) && $logs->count())
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $log->subject }}</td>
                                            <td>{{ $log->user->name ?? 'Unknown' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="no-data">No logs available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CSS LOG ACTIVITY-->
                <style>
                    .log-activity {
                        margin-top: 20px;
                        padding: 20px;
                        background: white;
                        border-radius: 10px;
                        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                    }

                    .log-activity h2 {
                        text-align: center;
                        margin-bottom: 15px;
                        font-size: 22px;
                        font-weight: bold;
                    }

                    .table-container {
                        overflow-x: auto;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        text-align: left;
                    }

                    thead {
                        background: #f0f0f0;
                    }

                    th,
                    td {
                        padding: 12px;
                        border-bottom: 1px solid #ddd;
                    }

                    .no-data {
                        text-align: center;
                        font-style: italic;
                        color: #888;
                    }
                </style>
            </div>
        </div>

        <!-- FOOTER -->
        {{-- @include('include.footer') --}}
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- ION ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
