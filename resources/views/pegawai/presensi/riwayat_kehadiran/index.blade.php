@extends('layouts.theme')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="font-bold text-2xl text-blue-600">Manajemen Kehadiran Pegawai</h2>
            <p class="text-gray-600">Kirimkan kehadiran Anda dan lihat riwayat kehadiran pada kalender di bawah ini.</p>
        </div>

        <div class="text-center mb-5">
            <button id="submitAttendance"
                class="py-2 px-4 inline-flex items-center rounded-md bg-green-500 text-white hover:bg-green-600 transition duration-150 ease-in-out shadow-md focus:outline-none focus:ring-2 focus:ring-green-500">
                Submit Kehadiran
            </button>
        </div>

        <div id="loadingSpinner" class="hidden text-center mb-4">
            <svg class="animate-spin h-8 w-8 text-gray-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0116 0h2a10 10 0 10-10 10V12z"></path>
            </svg>
            <p class="text-gray-600 mt-2">Loading...</p>
        </div>

        <div id="calendar" class="border border-gray-300 rounded-lg shadow-md p-3"></div>

        <script>
            $(document).ready(function() {
                function showLoading(show) {
                    if (show) {
                        $('#loadingSpinner').removeClass('hidden');
                    } else {
                        $('#loadingSpinner').addClass('hidden');
                    }
                }

                // Handle Attendance Submission
                $('#submitAttendance').click(function() {
                    showLoading(true);
                    $.ajax({
                        url: `{{ route('riwayatkehadiran.store') }}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            showLoading(false);
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                });
                                loadCalendarData
                                    (); // Reload the calendar after successful attendance
                            }
                        },
                        error: function(xhr) {
                            showLoading(false);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: xhr.responseJSON.message,
                            });
                        }
                    });
                });

                // Load Calendar Data
                function loadCalendarData() {
                    showLoading(true);
                    $.ajax({
                        url: `{{ route('riwayatkehadiran.absensi') }}`,
                        success: function(response) {
                            showLoading(false);
                            let i = 1;
                            let absensi = response.data.map(item => ({
                                "id": i++,
                                "start": item.tanggal_kehadiran,
                                "title": item.status === 'hadir' ? 'HADIR' : 'TIDAK HADIR',
                                "display": "background",
                                "backgroundColor": item.status === 'hadir' ? 'green' : 'red',
                                "textColor": "white",
                                "borderColor": item.status === 'hadir' ? 'green' : 'red'
                            }));

                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                },
                                events: absensi,
                                eventContent: function(arg) {
                                    let boldTitleEl = document.createElement('div');
                                    boldTitleEl.innerHTML =
                                        `<b style="color: white; font-weight: bold; font-size: 0.8em;">${arg.event.title}</b>`;
                                    boldTitleEl.style.textAlign =
                                    'center';
                                    return {
                                        domNodes: [boldTitleEl]
                                    };
                                }
                            });
                            calendar.render();
                        }
                    });
                }


                // Initial load of calendar data
                loadCalendarData();
            });
        </script>
    </div>
@endsection
