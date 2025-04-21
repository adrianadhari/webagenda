<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_agenda.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <div class="">
        <!-- SIDEBAR -->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main">
            @include('include.navbar', ['pageTitle' => 'Agenda'])
            @include('include.dropdown')

            <!-- CARDS -->
            <!-- ... di dalam <div class="cards"> -->
            <div class="cards">
                <div style="width: 50%;">
                    <h2>Kalender</h2>
                    <div class="calendar">
                        <div class="header">
                            <div id="prev" class="btn"><i class="fa-solid fa-arrow-left"></i></div>
                            <div id="month-year"></div>
                            <div id="next" class="btn"><i class="fa-solid fa-arrow-right"></i></div>
                        </div>
                        <div class="weekdays">
                            <div>Sen</div>
                            <div>Sel</div>
                            <div>Rab</div>
                            <div>Kam</div>
                            <div>Jum</div>
                            <div class="red">Sab</div>
                            <div class="red">Min</div>
                        </div>
                        <div class="days" id="days"></div>
                    </div>
                </div>

                <div style="width: 48%;">
                    <h2>Agenda</h2>
                    <div class="agenda-container" id="agenda-list">
                        <div class="btn-group mb-3">
                            <button class="btn btn-outline-primary filter-btn active" data-status="all">All</button>
                            <button class="btn btn-outline-primary filter-btn" data-status="draft">Draft</button>
                            <button class="btn btn-outline-primary filter-btn"
                                data-status="tentative">Tentative</button>
                            <button class="btn btn-outline-primary filter-btn"
                                data-status="confirmed">Confirmed</button>
                            <button
                                class="btn btn-out<thinking>
I have the current contents of `agenda.blade.php`. I will now make the necessary modifications in smaller increments to ensure that the changes can be applied successfully.

I will first add the filtering buttons and the agenda table structure without altering the existing calendar functionality.
</thinking>

<edit_file>
<path>resources/views/agenda.blade.php</path>
<content>
<!DOCTYPE html>
<html lang="id">

                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Agenda</title>
                                    <!-- CSS -->
                                    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
                                    <link href="{{ asset('css/style_agenda.css') }}" rel="stylesheet">
                                    <link rel="stylesheet"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
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
                                            <div class="cards">
                                                <div style="width: 50%;">
                                                    <h2>Kalender</h2>
                                                    <div class="calendar">
                                                        <div class="header">
                                                            <div id="prev" class="btn"><i
                                                                    class="fa-solid fa-arrow-left"></i></div>
                                                            <div id="month-year"></div>
                                                            <div id="next" class="btn"><i
                                                                    class="fa-solid fa-arrow-right"></i></div>
                                                        </div>
                                                        <div class="weekdays">
                                                            <div class="red">Min</div>
                                                            <div>Sen</div>
                                                            <div>Sel</div>
                                                            <div>Rab</div>
                                                            <div>Kam</div>
                                                            <div>Jum</div>
                                                            <div class="red">Sab</div>
                                                        </div>
                                                        <div class="days" id="days"></div>
                                                    </div>
                                                </div>

                                                <div style="width: 48%;">
                                                    <h2>Agenda</h2>
                                                    <div class="agenda-container" id="agenda-list">
                                                        <div class="btn-group">
                                                            <button class="btn btn-outline-primary filter-btn active"
                                                                data-status="all">All</button>
                                                            <button class="btn btn-outline-primary filter-btn"
                                                                data-status="draft">Draft</button>
                                                            <button class="btn btn-outline-primary filter-btn"
                                                                data-status="tentative">Tentative</button>
                                                            <button class="btn btn-outline-primary filter-btn"
                                                                data-status="confirmed">Confirmed</button>
                                                            <button class="btn btn-outline-primary filter-btn"
                                                                data-status="cancel">Canceled</button>
                                                        </div>
                                                        <table class="table table-hover" id="agenda-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Time</th>
                                                                    <th>Activity</th>
                                                                    <th>Location</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Agenda items will be populated here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SCRIPTS -->
                                    <script src="{{ asset('js/main.js') }}"></script>
                                    <script src="{{ asset('js/agenda.js') }}"></script>

                                    <!-- ION ICONS -->
                                    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                                    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                                </body>

</html>
</div>
</div>
</div>
</div>

<!-- SCRIPTS -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/agenda.js') }}"></script>

<!-- ION ICONS -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
