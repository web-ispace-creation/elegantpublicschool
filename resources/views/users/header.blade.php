<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="/images/logo.png" alt="" srcset=""></a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link fw-600 " aria-current="page" href="https://theelegantpublicschool.com/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/about-us/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/facilities/">Facilities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/download-tc/">Admissions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/curriculum/">Curriculum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/mandatory-public-disclosure/">Mandatory Public Disclosure</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/faculty/">Faculty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-600" href="https://theelegantpublicschool.com/contact-us/">Contact Us</a>
          </li>
          @if(auth()->user())
          <li class="nav-item">
            <a class="nav-link fw-600" href="{{ route('user.logout') }}">Logout</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>