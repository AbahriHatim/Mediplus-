<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Site keywords here">
<meta name="description" content="">
<meta name='copyright' content=''>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title -->
    <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>

<!-- Favicon -->
    <link rel="icon" href="../img/favicon.png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">


<!-- Medipro CSS -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

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
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu" >
                                    <li ><a href="{{ route('doctordashboard') }}" style="text-decoration: none">Home </a></li>
                                    <li class="active" ><a href="{{ route('PatientList') }}"  style="text-decoration: none;">PatientList </a></li>
                                 
                                    <li><a href="{{ route('chatify') }}" style="text-decoration: none;">Messageri  <i class="fa fa-comment" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="color: white" >
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                              <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();" class="btn" style="background-color: #1a68b3;">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            <a href="{{ route('register') }}" style="background-color: #1a68b3; transform: translate(-120%,-100%) ;padding-top:8px"  class="btn ">Profile</a>

                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<form action="{{ route('searchBarPatientDoc')}}" method="GET">
  <input type="text" name="search">
  <button type="submit">Search</button>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
       
     
            @foreach ($patients as $patient)
            <tr>
                <th scope="row">{{ $patient->id }}</th>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td><a href="{{ route('addForm', ['patientId' => $patient->id]) }}">Edit</a></td>

            
            
              </tr>
            @endforeach
      
    </tbody>
</body>
</html>

   