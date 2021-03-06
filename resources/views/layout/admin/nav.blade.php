<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('admin') }}">
            <span data-feather="home"></span>
            Home 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Category') ? 'active' : '' }}" href="{{ url('admin/category') }}">
            <span data-feather="layers"></span>
            Category 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Post') ? 'active' : '' }}" href="{{ url('admin/post') }}">
            <span data-feather="file-text"></span>
            Post
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Main Menu') ? 'active' : '' }} " href="{{ url('admin/mainmenu') }}">
            <span data-feather="menu"></span>
            Main Menu
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Slider') ? 'active' : '' }} " href="{{ url('admin/slider') }}">
            <span data-feather="sliders"></span>
            Slider
          </a>
        </li>        
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Admin</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          {{-- <span data-feather="plus-circle"></span> --}}
        </a>
      </h6>
      <ul class="nav flex-column mb-2">        
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Message') ? 'active' : '' }} " href="{{ url('admin/message') }}">
            <span data-feather="message-circle"></span>
            Message
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Profile') ? 'active' : '' }}" href="{{ url('admin/profile') }}">
            <span data-feather="user"></span>
            Profile
          </a>
        </li>
      </ul>
    </div>
  </nav>