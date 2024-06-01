<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mediplus - Free Medical and Doctor Directory HTML Template</title>
    <link rel="icon" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/icofont.css">
    <style>  
        .searchBar{
            transform: translateX(30%);
            font-size: 20px;
        }
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }
        .custom-table th {
            background-color: #1a68b3;
            color: white;
        }
        .custom-table th,
        .custom-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .custom-table td {
            text-align: left;
        }
        .custom-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .custom-table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header class="header">
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="index.html"><img src="../img/logo.png" alt="#"></a>
                            </div>
                            <!-- End Logo -->
                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
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
                            <!--/ End Main Menu -->
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
        <!--/ End Header Inner -->
    </header>
    <div class="container" style="widht:1700px">
        <h1>Doctor List</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('searchDoctors') }}" class="mb-4" id="searchForm">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or specialization" id="searchInput" value="{{ request('search') }}">
            </div>
        </form>

        <!-- Doctor Table -->
        <table class="custom-table" id="doctorTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Appointment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td scope="row">{{ $doctor->user_id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>
                            <a href="{{ route('doctorProfile', ['id' => $doctor->id]) }}" style="background-color: rgb(74, 157, 235); color:white;" class="btn btn-info">View Profile</a>
                        </td>   
                        <td>
                            <form action="{{ route('appointmentPa', ['doctor_id' => $doctor->user_id]) }}" method="GET">
                                @csrf
                                <input type="hidden" name="doctor_id" value="{{ $doctor->user_id }}">
                                <button type="submit" style="background-color: rgb(74, 157, 235); color:white;" class="btn btn-info">Book Appointment</button>
                            </form>
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center" style="margin-top: 8px">
            {{ $doctors->links() }}
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var search = $(this).val();
                $.ajax({
                    url: '{{ route('searchDoctors') }}',
                    method: 'GET',
                    data: { search: search },
                    success: function(data) {
                        var doctorTable = $('#doctorTable tbody');
                        doctorTable.empty();
                        if (data.length > 0) {
                            data.forEach(function(doctor) {
                                doctorTable.append(
                                    '<tr>' +
                                        '<td>' + doctor.user_id + '</td>' +
                                        '<td>' + doctor.name + '</td>' +
                                        '<td>' + doctor.specialization + '</td>' +
                                        '<td><a href="/doctorProfile/' + doctor.id + '" style="background-color: rgb(74, 157, 235); color:white;" class="btn btn-info">View Profile</a></td>' +
                                        '<td>' +
                                            '<form action="/appointmentPa/' + doctor.user_id + '" method="GET">' +
                                                '@csrf' +
                                                '<input type="hidden" name="doctor_id" value="' + doctor.user_id + '">' +
                                                '<button type="submit" style="background-color: rgb(74, 157, 235); color:white;" class="btn btn-info">Book Appointment</button>' +
                                            '</form>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            doctorTable.append('<tr><td colspan="5">No doctors found</td></tr>');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
