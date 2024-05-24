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
  </head>
  <body>
    <div class="header">
      <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
          class="search-toggle-icon bi bi-search"
          data-toggle="header_search"
        ></div>
        <div class="header-search">
          <form>
            <div class="form-group mb-0">
              <i class="dw dw-search2 search-icon"></i>
              <input
                type="text"
                class="form-control search-input"
                placeholder="Search Here"
              />
              <div class="dropdown">
                <a
                  class="dropdown-toggle no-arrow"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                >
                  <i class="ion-arrow-down-c"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"
                      >From</label
                    >
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"
                      >Subject</label
                    >
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control form-control-sm form-control-line"
                        type="text"
                      />
                    </div>
                  </div>
                  <div class="text-right">
                    <button class="btn btn-primary">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="header-right">
        <div class="dashboard-setting user-notification">
          <div class="dropdown">
            <a
              class="dropdown-toggle no-arrow"
              href="javascript:;"
              data-toggle="right-sidebar"
            >
              <i class="dw dw-settings2"></i>
            </a>
          </div>
        </div>

        <div class="user-info-dropdown">
          <div class="dropdown">
            <a
              class="dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
            >
              <span class="user-icon">
                <img src="vendors/images/photo1.jpg" alt="" />
              </span>
              <span class="user-name">Ross C. Lopez</span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
              <a class="dropdown-item" href="profile.html"
                ><i class="dw dw-user1"></i> Profile</a
              >

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();" >
                    <i class="dw dw-logout"></i>  {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            </div>
          </div>
        </div>
        ¡
      </div>
    </div>

    <div class="right-sidebar">
      <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
          Layout Settings
          <span class="btn-block font-weight-400 font-12"
            >User Interface Settings</span
          >
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
          <i class="icon-copy ion-close-round"></i>
        </div>
      </div>
      <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
          <h4 class="weight-600 font-18 pb-10">Header Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-white active"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-dark"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-light"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-dark active"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
          <div class="sidebar-radio-group pb-10 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-1"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebaricon-1"
                ><i class="fa fa-angle-down"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-2"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-2"
              />
              <label class="custom-control-label" for="sidebaricon-2"
                ><i class="ion-plus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-3"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-3"
              />
              <label class="custom-control-label" for="sidebaricon-3"
                ><i class="fa fa-angle-double-right"></i
              ></label>
            </div>
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
          <div class="sidebar-radio-group pb-30 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-1"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-1"
                ><i class="ion-minus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-2"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-2"
              />
              <label class="custom-control-label" for="sidebariconlist-2"
                ><i class="fa fa-circle-o" aria-hidden="true"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-3"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-3"
              />
              <label class="custom-control-label" for="sidebariconlist-3"
                ><i class="dw dw-check"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-4"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-4"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-4"
                ><i class="icon-copy dw dw-next-2"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-5"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-5"
              />
              <label class="custom-control-label" for="sidebariconlist-5"
                ><i class="dw dw-fast-forward-1"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-6"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-6"
              />
              <label class="custom-control-label" for="sidebariconlist-6"
                ><i class="dw dw-next"></i
              ></label>
            </div>
          </div>

          <div class="reset-options pt-30 text-center">
            <button class="btn btn-danger" id="reset-settings">
              Reset Settings
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="left-side-bar">
      <div class="brand-logo">
        <a href="index.html">
          <img src="img/logo.png" alt="" class="dark-logo" />
          <img
            src="img/logo.png"
            alt=""
            class="light-logo"
          />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
          <i class="ion-close-round"></i>
        </div>
      </div>
      <div class="menu-block customscroll">
        <div class="sidebar-menu">
          <ul id="accordion-menu">
            <a href="{{ route('admindashboard') }}" class="dropdown-toggle no-arrow">
              <span class="micon bi bi-diagram-3"></span
              ><span class="mtext">Home</span>
            </a>

            <a  href="{{ route('PatientList') }}" class="dropdown-toggle no-arrow">
              <span class="micon bi bi-person"></span
              ><span class="mtext">Patient</span>
            </a>

            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon bi bi-hospital"></span
                ><span class="mtext">Doctor</span>
              </a>
              <ul class="submenu">
                <li><a href="{{ route('addDoctor') }}">Add</a></li>
                <li><a href="{{ route('DoctorListAd') }}">List</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('listInvoice')}}" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-file-earmark-pdf"></span
                ><span class="mtext">Invoice</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
      <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
          <div class="row align-items-center">
            <div class="col-md-4">
              <img src="vendors/images/banner-img.png" alt="" />
            </div>
            <div class="col-md-8">
              <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
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
                  <canvas id="chart1"></canvas>
                </div>
                @php
                use App\Models\User;
        
                  $patient = User::whereHas('roles', function ($query) {
                    $query->where('name', 'patient');
                  })->count(); 
                @endphp
                <div class="widget-data">
                  <div class="h4 mb-0" id="patient-count">{{ $patient }}</div>
                  <div class="weight-400 font-14">Patient</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
              <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                  <canvas id="chart2"></canvas>
                </div>
                <div class="widget-data">
                  @php
                  $doctor = User::whereHas('roles', function ($query) {
                    $query->where('name', 'doctore');
                  })->count(); 
                  @endphp
                  <div class="h4 mb-0" id="doctor-count">{{ $doctor }}</div>
                  <div class="weight-400 font-14">Doctors</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
              <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                  <canvas id="chart3"></canvas>
                </div>
                <div class="widget-data">
                  @php
                  use App\Models\Appointment;
                  $appointmentCount = Appointment::count();
                  @endphp
                  <div class="h4 mb-0" id="appointment-count">{{ $appointmentCount }}</div>
                  <div class="weight-600 font-14">Appointments</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
              <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                  <canvas id="chart4"></canvas>
                </div>
                <div class="widget-data">
                  @php
                  use App\Models\PdfFile;
                  $invoiceAmount = PdfFile::count();
                  @endphp
                  <div class="h4 mb-0" id="invoice-amount">{{ $invoiceAmount }}</div>
                  <div class="weight-600 font-14">Invoice</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
              <h2 class="h4 mb-20">Activity</h2>
              <div id="chart5"></div>
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

   
<!-- Include Chart.js -->
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



