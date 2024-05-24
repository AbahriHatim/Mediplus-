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
    <!DOCTYPE html>
    <html>
      <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>
    
        <!-- Site favicon -->
        <link
          rel="apple-touch-icon"
          sizes="180x180"
          href="vendors/images/apple-touch-icon.png"
        />
        <link
          rel="icon"
          type="image/png"
          sizes="32x32"
          href="vendors/images/favicon-32x32.png"
        />
        <link
          rel="icon"
          type="image/png"
          sizes="16x16"
          href="vendors/images/favicon-16x16.png"
        />
    
        <!-- Mobile Specific Metas -->
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1"
        />
    
        <!-- Google Font -->
        <link
          href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
        <link
          rel="stylesheet"
          type="text/css"
          href="vendors/styles/icon-font.min.css"
        />
        <link
          rel="stylesheet"
          type="text/css"
          href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
        />
        <link
          rel="stylesheet"
          type="text/css"
          href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
        />
        <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script
          async
          src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
        ></script>
        <script
          async
          src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
          crossorigin="anonymous"
        ></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag() {
            dataLayer.push(arguments);
          }
          gtag("js", new Date());
    
          gtag("config", "G-GBZ3SGGX85");
        </script>
        <!-- Google Tag Manager -->
        <script>
          (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
              j = d.createElement(s),
              dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
          })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
        </script>
        <!-- End Google Tag Manager -->
     
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/normalize.css">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<style>
.header1 {
    background-color: #fff;
    position: relative;
}
.header1 .navbar-collapse {
    padding: 0;
}
/* Topbar */
.header1 .topbar {
    background-color: #fff;
    border-bottom: 1px solid #eee;
}
.header1 .topbar {
    padding: 15px 0;
}
.header1 .top-link {
    float: left;
}
.header1 .top-link li {
    display: inline-block;
    margin-right: 15px;
}
.header1 .top-link li:last-child {
    margin-right: 0px;
}
.header1 .top-link li a {
    color: #2c2d3f;
    font-size: 14px;
    font-weight: 400;
}
.header1 .top-link li:hover a {
    color: #1a76d1;
}
.header1 .top-contact {
    float: right;
}
.header1 .top-contact li {
    display: inline-block;
    margin-right: 25px;
    color: #2c2d3f;
}
.header1 .top-contact li:last-child {
    margin-right: 0;
}
.header1 .top-contact li a {
    font-size: 14px;
}
.header1 .top-contact li a:hover {
    color: #1a76d1;
}
.header1 .top-contact li i {
    color: #1a76d1;
    margin-right: 8px;
}
.header1 .header1-inner {
    background: #fff;
    z-index: 999;
    width: 100%;
}
.get-quote {
    margin-top: 12px;
}
.get-quote .btn {
    color: #fff;
}
.header1 .logo {
    float: left;
    margin-top: 18px;
}
.header1 .navbar {
    background: none;
    box-shadow: none;
    border: none;
    margin: 0;
    height: 0px;
    min-height: 0px;
}
.header1 .nav li {
    margin-right: 15px;
    float: left;
    position: relative;
}
.header1 .nav li:last-child {
    margin: 0;
}
.header1 .nav li a {
    color: #2c2d3f;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
    padding: 25px 12px;
    position: relative;
    display: inline-block;
    position: relative;
}
.header1 .nav li a::before {
    position: absolute;
    content: "";
    left: 0;
    bottom: 0;
    height: 3px;
    width: 0%;
    background: #1a76d1;
    border-radius: 5px 5px 0 0;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.header1 .nav li.active a:before {
    opacity: 1;
    visibility: visible;
    width: 100%;
}
.header1 .nav li.active a {
    color: #1a76d1;
}
.header1 .nav li:hover a:before {
    opacity: 1;
    width: 100%;
    visibility: visible;
}
.header1 .nav li:hover a {
    color: #1a76d1;
}
.header1 .nav li a i {
    display: inline-block;
    margin-left: 1px;
    font-size: 13px;
}
/* Middle header1 */
.header1.style2 .header1-inner {
    border-top: 1px solid #eee;
}
.header1.style2 .logo {
    margin-top: 6px;
}
.header1 .middle-header1 {
    background: #fff;
    padding: 20px 0px;
}
.header1 .widget-main {
    float: right;
}
.header1.style2 .get-quote {
    margin-top: 0;
}
.header1 .single-widget {
    position: relative;
    float: left;
    margin-right: 30px;
    padding-left: 55px;
}
.header1 .single-widget:last-child {
    margin: 0;
}
.header1 .single-widget .logo {
    margin: 0;
    padding: 0;
    margin-top: 7px;
}
.header1 .single-widget i {
    position: absolute;
    left: 0;
    top: 6px;
    height: 40px;
    width: 40px;
    line-height: 40px;
    color: #fff;
    background: #1a76d1;
    border-radius: 4px;
    text-align: center;
    font-size: 15px;
}
.header1 .single-widget h4 {
    font-size: 15px;
    font-weight: 500;
}
.header1 .single-widget p {
    margin-bottom: 5px;
    text-transform: capitalize;
}
.header1 .single-widget.btn {
    margin-left: 0;
}
/* Dropdown Menu */
.header1 .nav li .dropdown {
    background: #fff;
    width: 220px;
    position: absolute;
    left: -20px;
    top: 100%;
    z-index: 999;
    -webkit-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 3px 5px #3333334d;
    transform-origin: 0 0 0;
    transform: scaleY(0.2);
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    opacity: 0;
    visibility: hidden;
    top: 74px;
    border-left: 3px solid #2889e4;
}
.header1 .nav li:hover .dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0px);
}
.header1 .nav li .dropdown li {
    float: none;
    margin: 0;
    border-bottom: 1px dashed #eee;
}
.header1 .nav li .dropdown li:last-child {
    border: none;
}
.header1 .nav li .dropdown li a {
    padding: 12px 15px;
    color: #666;
    display: block;
    font-weight: 400;
    text-transform: capitalize;
    background: transparent;
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
.header1 .nav li .dropdown li a:before {
    display: none;
}
.header1 .nav li .dropdown li:last-child a {
    border-bottom: 0px;
}
.header1 .nav li .dropdown li:hover a {
    color: #1a76d1;
}
.header1 .nav li .dropdown li a:hover {
    border-color: transparent;
}
/* Right Bar */
.header1.style2 .main-menu {
    display: inline-block;
    float: left;
}
.header1 .right-bar {
    float: right;
}
.header1 .right-bar {
    padding-top: 20px;
}
.header1 .right-bar {
    display: inline-block;
}
.header1 .right-bar a {
    color: #fff;
    height: 35px;
    width: 35px;
    line-height: 35px;
    text-align: center;
    background: #1a76d1;
    border-radius: 4px;
    display: block;
    font-size: 12px;
}
.header1 .right-bar li a:hover {
    color: #fff;
    background: #27ae60;
}
.header1 .search-top.active .search i:before {
    content: "\eee1";
    font-size: 15px;
}
/* Search */
.header1 .search-form {
    position: absolute;
    right: 0;
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    top: 74px;
    box-shadow: 0px 0px 10px #0000001c;
    border-radius: 4px;
    overflow: hidden;
    transform: scale(0);
}
.header1 .search-top.active .search-form {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
}
.header1 .search-form input {
    width: 282px;
    height: 50px;
    line-height: 50px;
    padding: 0 70px 0 20px;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    border-radius: 3px;
    border: none;
    background: #fff;
    color: #2c2d3f;
}
.header1 .search-form button {
    position: absolute;
    right: 0;
    height: 50px;
    top: 0;
    width: 50px;
    background: #1a76d1;
    border: none;
    color: #fff;
    border-radius: 0 4px 4px 0;
    border-left: 1px solid transparent;
}
.header1 .search-form button:hover {
    background: #fff;
    color: #1a76d1;
    border-color: #e6e6e6;
}
/* header1 Sticky */
.header1.sticky .header1-inner {
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    bottom: initial;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    animation: fadeInDown 0.5s both 0.1s;
    box-shadow: 0px 0px 13px #00000054;
}
    </style>
</head>
<body>
    <header1 class="header1">
        <!-- header1 Inner -->
        <div class="header1-inner">
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
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li class="active"><a href="{{ route('doctordashboard') }}" style="text-decoration: none;">Home</a></li>
                                        <li><a href="{{ route('PatientListDo') }}" style="text-decoration: none;">Patient List</a></li>
                                        <li ><a href="{{ route('showSchedule') }}" style="text-decoration: none;">Schedule</a></li>

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
                                <a href="{{ route('profile') }}" style="background-color: #1a68b3; transform: translate(-120%, -100%); padding-top: 8px" class="btn">Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End header1 Inner -->
    </header1>
    
    <div class="container">
        <div class="pd-ltr-20">
          <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
              <div class="col-md-4">
                <img src="vendors/images/banner-img.png" alt="" />
              </div>
              <div class="col-md-8">
                @php
                use App\Models\DetailsDoctor;
                $details = DetailsDoctor::where('user_id', Auth::id())->first();
                $name = $details ? $details->name : 'No Name Found'; // Handle case when details are not found
            @endphp  
            
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">{{ $name }}</div>
            </h4>
            
                </h4>
                <p class="font-18 max-width-600">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                  hic non repellendus debitis iure, doloremque assumenda. Autem
                  modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                  mollitia animi error corporis.
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 mb-30">
              <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                  <div class="progress-data">
                    <div id="chart2"></div>
                  </div>
                  <div class="widget-data">
                    <div class="h4 mb-0">{{ Auth::user()->notifications->count() }}</div>
                    <div class="weight-600 font-14">Notification</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 mb-30">
              <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                  <div class="progress-data">
                    <div id="chart3"></div>
                  </div>
                  <div class="widget-data">
                    @php
                    use App\Models\appointment;
                    $appointment = appointment::where('doctor_id', Auth::id())->count();                
                    @endphp   
                    <div class="h4 mb-0">
                      {{$appointment}}
                    </div>
                    <div class="weight-600 font-14">Apointment</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 mb-30">
              <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                  <div class="progress-data">
                    <div id="chart4"></div>
                  </div>
                  <div class="widget-data">
                    @php
                    use App\Models\PdfFile;
                    $invoiceAmount = PdfFile::where('doctor_id', Auth::id())->count();                
                    @endphp
                    <div class="h4 mb-0">{{$invoiceAmount}}</div>
                    <div class="weight-600 font-14">Invoice</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    {{ Auth::user()->notifications->count() }}
                    <ul>
                        @foreach (Auth::user()->unreadNotifications as $notification)
                            <li>{{ $notification->data['data'] }}</li>
                        @endforeach
                    
                        @if(Auth::user()->unreadNotifications->count() > 0)
                            <li><a href="{{ route('notifications.markAsRead') }}" style="text-decoration: none;">Mark all as read</a></li>
                        @endif
                    
                        @if(Auth::user()->unreadNotifications->count() == 0)
                            <li><a style="text-decoration: none;">No notifications</a></li>
                        @endif
                    </ul>
                  </div>
            </div>
            <div class="col-xl-4 mb-30">
              <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Lead Target</h2>
                <div id="chart6"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- js -->
      <script src="vendors/scripts/core.js"></script>
      <script src="vendors/scripts/script.min.js"></script>
      <script src="vendors/scripts/process.js"></script>
      <script src="vendors/scripts/layout-settings.js"></script>
      <script src="plugins/apexcharts/apexcharts.min.js"></script>
      <script src="plugins/datatables/js/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
      <script src="plugins/datatables/js/dataTables.responsive.min.js"></script>
      <script src="plugins/datatables/js/responsive.bootstrap4.min.js"></script>
      <script src="vendors/scripts/dashboard.js"></script>
      <!-- Google Tag Manager (noscript) -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <!-- JavaScript to render the charts with stylish customization -->
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Function to create a chart with stylish customization
          function createStylishChart(elementId, data, label, gradient) {
            const ctx = document.getElementById(elementId).getContext('2d');
      
            // Create gradient
            const gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, gradient.start);
            gradientStroke.addColorStop(1, gradient.end);
      
            new Chart(ctx, {
              type: 'doughnut',
              data: {
                labels: [label],
                datasets: [{
                  data: [data, 100 - data],
                  backgroundColor: [gradientStroke, '#e9ecef'],
                  hoverBackgroundColor: [gradientStroke, '#e9ecef'],
                  borderWidth: 0,
                }]
              },
              options: {
                cutoutPercentage: 70,
                tooltips: {
                  enabled: true,
                  backgroundColor: '#ffffff',
                  borderColor: '#dee2e6',
                  borderWidth: 1,
                  titleFontColor: '#000',
                  bodyFontColor: '#000',
                  callbacks: {
                    label: function(tooltipItem, data) {
                      return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index] + '%';
                    }
                  }
                },
                legend: {
                  display: false,
                },
                animation: {
                  animateScale: true,
                  animateRotate: true
                }
              }
            });
          }
      
          // Define gradients for each chart
          const gradients = {
            patient: {start: '#4caf50', end: '#8bc34a'},
            doctor: {start: '#2196f3', end: '#03a9f4'},
            appointment: {start: '#ff9800', end: '#ffc107'},
            invoice: {start: '#f44336', end: '#e57373'}
          };
      
          // Get data from the elements
          const patientCount = parseInt(document.getElementById('patient-count').textContent);
          const doctorCount = parseInt(document.getElementById('doctor-count').textContent);
          const appointmentCount = parseInt(document.getElementById('appointment-count').textContent);
          const invoiceAmount = parseFloat(document.getElementById('invoice-amount').textContent);
      
          // Create the stylish charts
          createStylishChart('chart1', patientCount, 'Patients', gradients.patient);
          createStylishChart('chart2', doctorCount, 'Doctors', gradients.doctor);
          createStylishChart('chart3', appointmentCount, 'Appointments', gradients.appointment);
          createStylishChart('chart4', invoiceAmount, 'Invoices', gradients.invoice);
        });
      </script>
          <!-- Google Tag Manager (noscript) -->
          <noscript
            ><iframe
              src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
              height="0"
              width="0"
              style="display: none; visibility: hidden"
            ></iframe
          ></noscript>
          <!-- End Google Tag Manager (noscript) -->
        </body>
      </html>
      