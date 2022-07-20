 <!-- Top -->
 <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
     <div class="container-xxl navbar-nav-right">

         <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
             <a href="{{ url('/home') }}" class="app-brand-link gap-2">
                 <span class="app-brand-logo demo">
                     <img src="{{ asset('assets/logo/logo.jpeg') }}" alt="" style="width: 200px">
                 </span>
             </a>
         </div>


         <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
             <ul class="navbar-nav flex-row align-items-center ms-auto">
                 <!-- User -->
                 <li class="nav-item navbar-dropdown dropdown-user dropdown">
                     <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                         <div class="avatar avatar-online">
                             <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="rounded-circle">
                         </div>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex">
                                     <div class="flex-shrink-0 me-3">
                                         <div class="avatar avatar-online">
                                             <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                 class="rounded-circle">
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <span class="fw-semibold d-block lh-1">MGMC</span>
                                         <small>Admin</small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('changepassword.index') }}">
                                 <i class="bx bx-user me-2"></i>
                                 <span class="align-middle">Change Password</span>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                 <i class="bx bx-power-off me-2"></i>
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 class="d-none">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </li>
                 <!--/ User -->
             </ul>
         </div>

     </div>
 </nav>
 <!-- TOp -->
