<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('/images/logoarkamaya.jpg') }}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{ asset('/images/rona.jpg') }}"alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ asset('/images/user.png') }}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            @if (Auth::check())
            <span class="font-weight-medium mb-2">{{ Auth::user()->name }}</span>
            @endif
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/project">
          <i class="mdi mdi-contacts menu-icon"></i>
          <span class="menu-title">Project</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/client">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Client</span>
        </a>
      </li>

    </ul>
  </nav>
  <div class="container-fluid page-body-wrapper">
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close mdi mdi-close"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-default-theme">
        <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
      </div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme">
        <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
      </div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles light"></div>
        <div class="tiles dark"></div>
      </div>
    </div>
