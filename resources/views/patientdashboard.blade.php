<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <title>Mediplus - Free Medical and Doctor Directory HTML Template</title>
       <link rel="icon" href="img/favicon.png">
       <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="style.css">
       <link rel="stylesheet" href="css/responsive.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="css/icofont.css">
		<style>
            #patientDash{
                height: 500px;
                width: 500px;
                transform: translate(800px,100px)
            }
            .text{
                transform: translate(50px,-500px);
            }
          .text h1 {
        font-size: 2.5rem; 
        color: #333; 
        margin-bottom: 10px; 
    }

    .text h2 {
        font-size: 1.8rem; 
        color: #666; 
        font-style: italic;
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
                                
                                <a href="index.html"><img src="img/logo.png" alt="#"></a>
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
                                        <li class="active"><a href="{{ route('patientdashboard') }}" style="text-decoration: none;">Home</a></li>
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
                                        <li><a href="{{ route('DoctorListPa') }}" style="text-decoration: none;">Docotr List</a></li>
                                       
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
                                        this.closest('form').submit();" class="btn" style="background-color: #1a68b3; ">
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
    <img src="images/patientDash.jpg" id="patientDash" alt="">
    <div class="text">
        @php
        use App\Models\DetailPatient;
        $details = DetailPatient::where('user_id', Auth::id())->first();
        $name = $details ? $details->name : 'No Name Found'; // Handle case when details are not found
    @endphp  
        <h1>{{ $name }}</h1>
        <h2>Your health it's our first prioriti</h2>
    </div>
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/colors.js"></script>
    <script src="js/slicknav.min.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/magnific-popup.js"></script>
    <script src="js/facnybox.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery-counterup.min.js"></script>
    <script src="js/finalcountdown.min.js"></script>
    <script src="js/niceselect.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/scrollup.js"></script>
    <script src="js/onepage-nav.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/active.js"></script>
</body>
</html>
  
 
