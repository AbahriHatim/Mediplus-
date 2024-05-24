<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mediplus - Book an Appointment</title>
    <link rel="icon" href="../../img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/icofont.css">

</head>
<body>
    <header class="header">
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="logo">
                                <a href="index.html"><img src="../../img/logo.png" alt="#"></a>
                            </div>
                            <div class="mobile-nav"></div>
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <div class="main-menu" style="transform: translateX(-10%)">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="{{ route('patientdashboard') }}" style="text-decoration: none;">Home</a></li>
                                        <li>
                                            <a style="text-decoration: none;">Notifications 
                                                <span class="badge text-bg-secondary">{{ Auth::user()->unreadNotifications->count() }}</span>
                                            </a>
                                            <ul class="dropdown">
                                                @foreach (Auth::user()->unreadNotifications as $notification)
                                                    <li>{{ $notification->data['data'] }}</li>
                                                @endforeach
                                                @if(Auth::user()->unreadNotifications->count() > 0)
                                                    <li><a href="{{ route('notifications.markAsRead') }}" style="text-decoration: none;">Mark all as read</a></li>
                                                @endif
                                                @if(Auth::user()->unreadNotifications->count() == 0)
                                                    <li><a style="text-decoration: none;">No notification</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('medicament') }}" style="text-decoration: none;">Medicament</a></li>
                                        <li class="active"><a href="{{ route('DoctorListPa') }}" style="text-decoration: none;">Doctor List</a></li>
                                        <li><a href="{{ route('chatify') }}" style="text-decoration: none;">Messenger <i class="fa fa-comment" aria-hidden="true"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="color: white">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn" style="background-color: #1a68b3;">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                                <a href="{{ route('profilePa') }}" style="background-color: #1a68b3; transform: translate(-120%, -100%); padding: 8px;" class="btn">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Book an Appointment</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('appointmentsStore', ['doctor_id' => $doctor_id]) }}" method="POST" id="appointmentForm">
            @csrf
            <div class="form-group">
                <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                <label for="appointment_date">Select Date</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="appointment_time">Select Time</label>
                <select name="appointment_time" id="appointment_time" class="form-control" required>
                    <option value="" disabled selected>Select time</option>
                    @for ($hour = 8; $hour < 13; $hour++)
                        @php
                            $hourFormatted = str_pad($hour, 2, '0', STR_PAD_LEFT);
                        @endphp
                        <option value="{{ $hourFormatted }}:00">{{ $hourFormatted }}:00</option>
                        <option value="{{ $hourFormatted }}:30">{{ $hourFormatted }}:30</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="purpose">Purpose (optional)</label>
                <input type="text" name="purpose" id="purpose" class="form-control">
            </div>
            <input type="hidden" name="patient_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </form>
    </div>

    <script>
        document.getElementById('appointment_date').addEventListener('change', function() {
            var selectedDate = new Date(this.value);
            var day = selectedDate.getUTCDay();

            if (day === 0 || day === 6) {
                alert('Weekends are not available for appointments. Please select a weekday.');
                this.value = '';
            }
        });

        @if ($errors->any())
            alert("{{ $errors->first() }}");
        @endif

        @if(session('success'))
            alert('Your Appointment was booked ');
        @endif
    </script>
</body>
</html>
