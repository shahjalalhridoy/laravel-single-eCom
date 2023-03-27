<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('dashboard/assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('page_title')</title>

    <meta name="description" content="" />

    

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/') }}img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>

{{-- sweet Alert --}}

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">




  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
             
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Laravel eCom</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Categories</span>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Categories </div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('addcategory') }}" class="menu-link">
                        <div data-i18n="Account">Add Category</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{ route('allcategory') }}" class="menu-link">
                        <div data-i18n="Notifications">All Categories</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Sub Categories</span>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Sub Categories </div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('addsubcategory') }}" class="menu-link">
                        <div data-i18n="Account">Add Sub-Category</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{ route('allsubcategory') }}" class="menu-link">
                        <div data-i18n="Notifications">All Sub-Categories</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Products</span>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Products </div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('addproduct') }}" class="menu-link">
                        <div data-i18n="Account">Add Product</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{ route('allproduct') }}" class="menu-link">
                        <div data-i18n="Notifications">All Products</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Manage Orders</span>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Manage Orders </div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">All Orders</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{ route('pendingorder') }}" class="menu-link">
                        <div data-i18n="Notifications">Pending Orders</div>
                      </a>
                    </li>

                    <li class="menu-item">
                        <a href="pages-account-settings-notifications.html" class="menu-link">
                          <div data-i18n="Notifications">Completed Orders</div>
                        </a>
                      </li>

                      <li class="menu-item">
                        <a href="pages-account-settings-notifications.html" class="menu-link">
                          <div data-i18n="Notifications">Cancel Orders</div>
                        </a>
                      </li>
                    
                  </ul>
                </li>

                {{-- user list --}}
                <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">User Management</span>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">User Management </div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{ route('alluserlist') }}" class="menu-link">
                        <div data-i18n="Account">User List</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="{{ route('adduser') }}" class="menu-link">
                        <div data-i18n="Notifications">User Add</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{ route('AjaxDataTable') }}" class="menu-link">
                        <div data-i18n="Account">Ajax List</div>
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{ route('WithOutDataTable') }}" class="menu-link">
                        <div data-i18n="Account">Without Ajax </div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

        
           

           



           
          
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              {{-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div> --}}
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                {{-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> --}}

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    
                    <div class="avatar avatar-online">
                      <img src="{{ asset('dashboard/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('dashboard/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> --}}
                    
                   
                    

                    <li>
                      <a class="dropdown-item" href="{{ route('profile.passupdate') }}">
                        <i class="bx bx-link-alt me-1"></i>
                        <span class="align-middle">Password Change</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
<div class="content-wrapper">


<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> All Users</h4>
        <a class="btn btn-primary" href="{{ URL::to('/students/generate-pdf') }}" target="_blank">Export to PDF</a>
        <div class="card">
            
            <h5 class="card-header">All Users Information</h5> 

            
            
            {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif --}}
            <div class="table-responsive text-nowrap">
                  <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>User- username</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
    <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(function () {
        
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'username', name: 'username'},
                {data: 'phone', name: 'phone'},
                {data: 'userName', name: 'userName'},
                {data: 'role_name', name: 'role_name'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
      });
    </script>

</div>


          
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script> --}}
    <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 6000);
    </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        {{-- <script>
          swal('Assalamu Walaikum', 'Hi, data laoded!', 'success', {
            button: "Ok"
          });
        </script> --}}
  </body>
</html>