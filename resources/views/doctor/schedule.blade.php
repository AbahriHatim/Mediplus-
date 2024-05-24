<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Calendar</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include FullCalendar CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'>
    <html lang="en">
        <title>Mediplus - Free Medical and Doctor Directory HTML Template</title>
        <link rel="icon" href="../img/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/icofont.css">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="logo">
                                <a href="index.html"><img src="../img/logo.png" alt="#"></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="{{ route('doctordashboard') }}" style="text-decoration: none;">Home</a></li>
                                        <li ><a href="{{ route('PatientListDo') }}" style="text-decoration: none;">Patient List</a></li>
                                        <li class="active"><a href="{{ route('showSchedule') }}" style="text-decoration: none;">Schedule</a></li>
                                        <li><a href="{{ route('chatify') }}" style="text-decoration: none;">Messageri <i class="fa fa-comment" aria-hidden="true"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="color: white">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();" class="btn" style="background-color: #1a68b3;">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                                <a href="{{ route('profile') }}" style="background-color: #1a68b3; transform: translate(-120%, -100%); padding-top: 8px" class="btn">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        
        <div class="card">
           
            <div class="card-body">
                <!-- Calendar Container -->
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Moment.js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <!-- Include FullCalendar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function () {
            var events = {!! json_encode($events) !!};
            console.log('Events:', events); // Log events to inspect
            $('#calendar').fullCalendar({
                events: events,
                eventRender: function(event, element) {
                    element.attr('title', event.title); // Add a tooltip
                }
            });
        });
    </script>
</body>
</html>
