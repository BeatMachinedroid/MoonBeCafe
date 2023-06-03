<!doctype html>
<html lang="en">

<head>
    <title>Kasir | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section" style="background: #f6bd3d">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bga.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex mb-4">
                                <div class="w-100 text-center">
                                    <h3 class="">Dashboard admin
                                    </h3>
                                    <h4 style="font-size: 20;">MoonBe Cafe & Resto</h4>
                                </div>
                            </div>
                            @if (session()->has('message'))
                                <div class="alert" style="color : red">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form action="{{ route('proses.register') }}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <!-- <label class="label" for="name">Username</label> -->
                                    <input type="text" class="form-control" placeholder="Username" name="username"
                                        value="">
                                </div>
                                <div class="form-group mb-3">
                                    <!-- <label class="label" for="name">Username</label> -->
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="">
                                </div>
                                <div class="form-group mb-3">
                                    <!-- <label class="label" for="password">Password</label> -->
                                    <input id="password-field" type="password" class="form-control" placeholder="Password"
                            name="password" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        Up</button>
                                </div>
                            </form>
                            <p class="text-center">dont have acount? <a href="{{ route('view.login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
