<header id="header" class="fixed-top justify-content-center align-items-center">
    <nav id="navbar" class="navbar d-flex justify-content-center" >

            <ul class="justify-content-around" style="width: fit-content">
                <li> <a class="nav-link {{ ($title == "home")? 'active' : '' }}" href="/index">Home</a> </li>
                <li> <a class="nav-link {{ ($title == "about")? 'active' : '' }}" href="/about">About</a> </li>
                <li> <a class="nav-link {{ ($title == "resume")? 'active' : '' }}" href="/resume">Resume</a></li>
                <li> <a class="nav-link {{ ($title == "project")? 'active' : '' }}" href="/project">Project</a> </li>
                {{-- <li> <a class="nav-link {{ ($title == "blog")? 'active' : '' }}" href="/blog">Blog</a> </li> --}}
                <li> <a class="nav-link {{ ($title == "achievement")? 'active' : '' }}" href="/achievement">Achievement</a> </li>
            </ul>

  </nav><!-- .navbar -->
</header><!-- End Header -->

