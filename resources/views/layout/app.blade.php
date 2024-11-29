<!DOCTYPE html>
<html>

<head>
    <title>User registration TEST</title>
    <!-- index -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <!-- register -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <style>
        .error {
            color: red;
          }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')    
    </div>
    <div class="container-fluid bg-dark text-white">
        <div class="row pt-3">
            <div class="col-6 d-flex justify-content-center">
                <p>Term and conditions</p>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <p>Privacy policy</p>
            </div>
        </div>
    </div>
</body>
    @yield('content-js')

</html>