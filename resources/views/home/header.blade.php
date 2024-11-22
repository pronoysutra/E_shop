<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
                <img width="250" src="images/logo.png" alt="#">
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            data-toggle="dropdown"
                            role="button"
                            aria-haspopup="true"
                            aria-expanded="true">
                            <span class="nav-label">
                                Pages
                                <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="testimonial.html">Testimonial</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <ul class="navbar-nav">
                        <!-- Show Login and Register for Guests -->
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endguest

                        <!-- Show Username and Logout for Authenticated Users -->
                        @auth
                        <li class="nav-item dropdown">
                            <!-- Username as Dropdown Trigger -->
                            <a
                                class="nav-link dropdown-toggle btn btn-info text-primary"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                        @csrf
                                        <button class="btn btn-link text-danger w-100 text-start" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth
                    </ul>



                </ul>
                </ul>
            </div>
        </nav>
    </div>
</header>
