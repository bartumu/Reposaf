<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Autor</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css') }}" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('backend/assets/images/logos/dark-logo.png') }}" width="180" alt="">
                                </a>
                                <h1>
                                    <p class="text-center">Register</p>
                                </h1>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


                                @if(session('message'))
                                <script type="text/javascript">
                                    iziToast.warning({
                                        title: '',
                                        message: "{{ session('warning') }}",
                                        position: "topRight",
                                    });
                                </script>
                                <!-- <p class="alert alert-success">{{ session('message') }}</p> -->
                                @endif

                                @if(count($errors))
                                @foreach($errors->all() as $error)
                                <script type="text/javascript">
                                    iziToast.warning({
                                        title: '',
                                        message: "{{ $error }}",
                                        position: "topRight",
                                    });
                                </script>
                                <!-- <p class="alert alert-danger">{{ $error }}</p> -->
                                @endforeach
                                @endif
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">Name</label>
                                        <input type="text" id="nome" class="form-control" name="nome" aria-describedby="textHelp" required autofocus autocomplete="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="username" name="username" aria-describedby="textHelp" required autofocus autocomplete="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required autocomplete="email">
                                    </div>
                                    <div class="mb-3 col-6 col-12-xsmall">
                                        <label for="exampleInputEmail1" class="form-label">BirthDay</label>
                                        <input type="date" class="form-control" id="dataNasc" name="dataNasc" aria-describedby="emailHelp" required autocomplete="email">

                                        <label for="exampleInputEmail1" class="form-label">Ocupation</label>
                                        <input type="text" class="form-control" id="ocupacao" name="ocupacao" aria-describedby="emailHelp" required autocomplete="email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Confirmation Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <!-- <a href="{{ route('register') }}" >Sign Up</a> -->
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" type="submit" href="{{ route('login') }}">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>