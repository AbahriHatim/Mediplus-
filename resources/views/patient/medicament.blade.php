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
        .pop-up {
            width: 500px;
            height: 550px; /* Adjust height as needed */
            display: flex;
            flex-direction: column;
            background-color: aliceblue;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Center the pop-up exactly */
            visibility: hidden;
            z-index: 1000; /* Ensure it is above other elements */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 8px;
        }

        .pop-up.display {
            visibility: visible;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            z-index: 999;
        }

        .overlay.display {
            visibility: visible;
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
                                        <li ><a href="{{ route('patientdashboard') }}" style="text-decoration: none;">Home</a></li>
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
                                        <li class="active"><a href="{{ route('medicament') }}" style="text-decoration: none;">Medicament</a></li>
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

    <div class="overlay" id="overlay"></div>

    <main class="container">
        <div class="pop-up" id="popUp">
            <h2>Add Prescription</h2>
            <form action="{{ route('addMed') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="uri">Medicine URI</label>
                    <input type="text" name="uri" id="uri" placeholder="Medicine URI" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="dosage">Dosage</label>
                    <input type="text" name="dosage" id="dosage" placeholder="Dosage" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" name="startDate" id="startDate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" name="endDate" id="endDate" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Prescription</button>
            </form>
        </div>
    
        <h2>Your Prescribed Medicines</h2>
        @if(isset($medicines) && !$medicines->isEmpty())
        <ul class="list-group">
            @foreach($medicines as $medicine)
            <li class="list-group-item">
                <strong>Name:</strong> {{ $medicine['name'] }}<br>
                <strong>Dosage:</strong> {{ $medicine['dosage'] }}<br>
                <strong>Start Date:</strong> {{ $medicine['startDate'] }}<br>
                <strong>End Date:</strong> {{ $medicine['endDate'] }}<br>
                <form method="POST" action="{{ route('deleteMedi', ['idMedicament' => $medicine['idMedicament']]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
            <p>No medicines found.</p>
        @endif
    
    <button class="info btn btn-primary" style="margin-top: 20px">Add med</button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const popUpBox = document.getElementById("popUp");
            const overlay = document.getElementById("overlay");
            const btnInfos = document.querySelectorAll(".info");

            btnInfos.forEach(btn => {
                btn.addEventListener("click", () => {
                    if (popUpBox.style.visibility === "visible") {
                        popUpBox.style.visibility = "hidden";
                        overlay.style.visibility = "hidden";
                        document.body.style.overflow = "auto";
                    } else {
                        popUpBox.style.visibility = "visible";
                        overlay.style.visibility = "visible";
                        document.body.style.overflow = "hidden";
                    }
                });
            });

            overlay.addEventListener("click", () => {
                popUpBox.style.visibility = "hidden";
                overlay.style.visibility = "hidden";
                document.body.style.overflow = "auto";
            });
        });
    </script>
    
    <!-- Scripts -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/nicesellect.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/datepicker.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
