<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
  <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div id="preloader">
  <div class="sk-three-bounce">
    <div class="sk-child sk-bounce1"></div>
    <div class="sk-child sk-bounce2"></div>
    <div class="sk-child sk-bounce3"></div>
  </div>
</div>


<div id="main-wrapper">
  <div class="nav-header">
    <a href="index.html" class="brand-logo">
      <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
      <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
      <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
    </a>

    <div class="nav-control">
      <div class="hamburger">
        <span class="line"></span><span class="line"></span><span class="line"></span>
      </div>
    </div>
  </div>

  <div class="header">
    <div class="header-content">
      <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="header-left">
            <div class="dashboard_bar">
              Declaración Patrimonial
            </div>
          </div>
          <ul class="navbar-nav header-right">
            <li class="nav-item dropdown notification_dropdown">
              <a class="nav-link dz-fullscreen" href="#">
                <svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                <svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
              </a>
            </li>
            <li class="nav-item dropdown notification_dropdown">
              <a class="nav-link bell bell-link" href="#">
                <i class="flaticon-381-pad"></i>
              </a>
            </li>
            <li class="nav-item dropdown notification_dropdown">
              <a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
                <i class="flaticon-381-ring"></i>
                <div class="pulse-css"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
                  <ul class="timeline">
										<li>
											<div class="timeline-panel">
												<div class="media mr-2 media-danger">
													KG
												</div>
												<div class="media-body">
													<h6 class="mb-1">Resport created successfully</h6>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</div>
										</li>
										<li>
                      <div class="timeline-panel">
                        <div class="media mr-2 media-primary">
                          <i class="fa fa-home"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="mb-1">Reminder : Treatment Time!</h6>
                          <small class="d-block">29 July 2020 - 02:26 PM</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
              </div>
            </li>
            <li class="nav-item dropdown header-profile">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                <div class="header-info">
                  <span>{{ Auth::user()->name }}</span>
                  <small>Bienvenido</small>
                </div>
                <img src="{{ asset('images/profile/pic1.jpg') }}" width="20" alt=""/>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="./app-profile.html" class="dropdown-item ai-icon">
                  <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                  <span class="ml-2">Profile </span>
                </a>
                <a href="./email-inbox.html" class="dropdown-item ai-icon">
                  <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                  <span class="ml-2">Inbox </span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                  <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                  <span class="ml-2">{{ __('Logout') }}</span>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--**********************************
  Header end ti-comment-alt
  ***********************************-->

<!--**********************************
  Sidebar start
***********************************-->



<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      @if(!empty(Route::current()->parameters()['formato_slug']))
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-381-networking"></i>
          <span class="nav-text">Patrimonial</span>
        </a>
        <ul aria-expanded="false">
          @foreach($declaracion->formatos as $formato)
            <li>
              @if($formato->agrupacion == "patrimonial")
              <a href="{{ url('declaracion/'.$declaracion->id."/".$formato->slug) }}">{{ $formato->nombre }}</a>
            </li>
            @endif
          @endforeach
        </ul>
      </li>
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-381-networking"></i>
          <span class="nav-text">Intereses</span>
        </a>
        <ul aria-expanded="false">
          @foreach($declaracion->formatos as $formato)
            @if($formato->agrupacion == "intereses")
            <li>
              <a href="{{ url('declaracion/'.$declaracion->id."/".$formato->slug) }}">{{ $formato->nombre }}</a>
            </li>
            @endif
          @endforeach
        </ul>
      </li>
      @endif
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-381-layer-1"></i>
          <span class="nav-text">Mis Declaraciones</span>
        </a>
      </li>
    </ul>
    <div class="plus-box">
      <p>Create new appointment</p>
    </div>
    <div class="copyright">
      <p>
        <strong>Mediqu Hospital Admin Dashboard</strong> 2020 All Rights Reserved
      </p>
    </div>
  </div>
</div>
<!--**********************************
  Sidebar end
***********************************-->



  <!--**********************************
      Content body start
  ***********************************-->
  @yield('content')
  <!--**********************************
      Content body end
  ***********************************-->



  <!--**********************************
  Footer start
  ***********************************-->
  <div class="footer">
    <div class="copyright">
      <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
    </div>
  </div>
  <!--**********************************
    Footer end
  ***********************************-->
</div>
<!--**********************************
  Main wrapper end
***********************************-->


<!--**********************************
  Scripts
***********************************-->
  <!-- Required vendors -->
  <script src="{{ asset('/vendor/global/global.min.js') }}"></script>
  <script src="{{ asset('/js/custom.min.js') }}"></script>
  <script src="{{ asset('js/deznav-init.js') }}"></script>
  <script src="{{ asset('js/easy-number-separator.js') }}"></script>

  <script>
  @yield('script')
  </script>
</body>
</html>
