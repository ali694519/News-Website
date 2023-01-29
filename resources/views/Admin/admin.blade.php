<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<style>

</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-sm-10 col-12 offset-lg-1 offset-sm-1">
                <nav class="navbar navbar-expand-lg bg-info rounded">
                    <a class="navbar-brand text-light" href="#">Logo</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"
                        style="display: unset !important;">
                        <ul class="nav nav-pills mr-auto justify-content-end">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="#">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Settings</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="head text-light bg-dark">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <span>Notifications
                                                </span>
                                                <a href="" class="float-right text-light">Mark all as
                                                    read</a>
                                            </div>
                                    </li>

                                    <li class="notification-box">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <strong class="text-info"></strong>
                                                <div>
                                                    <a href="">

                                                    </a>
                                                </div>
                                                <small class="text-warning">
                                                </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="footer bg-dark text-center">
                                        <a href="" class="text-light">View All</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">


                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i>Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
                <br>
                <br>
                <div class="row">

                    {{-- Git All News --}}
                    @foreach ($news as $ne)
                        <div class="card text-black bg-secondary mb-4 m-2" style="max-width: 18rem;">
                            <div class="card-header">{{ $ne->title }}</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $ne->category['cate_name'] }}</h5>
                                <p class="card-text">{{ $ne->content }}</p>
                            </div>
                            ------------------------------------------
                            <span>{{ date('d-m-Y ', strtotime($ne->created_at)) }}</span>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</body>


</html>
