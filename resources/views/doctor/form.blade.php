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
    transform: translateY(50%)
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
                                        <li class="active"><a href="{{ route('PatientList') }}" style="text-decoration: none;">Patient List</a></li>
                                        <li ><a href="{{ route('showSchedule') }}" style="text-decoration: none;">Schedule</a></li>

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
<div class="searchBar">
    <form action="{{ route('searchBarPatientDoc') }}" method="GET"  >
        <input type="text" name="search" placeholder="Name of the patient" style=" width: 430px;">
        <button type="submit"  style="background-color: #1a68b3; transform: translate(5%, -10%); padding-top: 8px ;color:white" class="btn">Search</button>
    </form>
</div>
<table class="custom-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Treatment</th>
            <th>Prescription</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td><a href="{{ route('treatmentDetails', ['patientId' => $patient->id]) }}" style="text-decoration: none; "> <button style="padding: 8px ;background-color: hsl(209, 44%, 66%);">traitemen</button> </a>
                  
                </td>
                <td><a href="{{ route('addForm', ['patientId' => $patient->id]) }}"style="text-decoration: none;"><button style="padding: 8px ;background-color: hsl(209, 44%, 66%)">Prescription</button> </a></td>
            </tr>
        @endforeach
    </tbody>
</table>




    

</body>
</html>    