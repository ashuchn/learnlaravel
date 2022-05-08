<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Test Series</title>
    <!-- <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        .navbar{
            padding: 20px;
        }
        *{
            font-family: 'Poppins', sans-serif;
        }
        
    </style>
</head>
<body>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg bg-gradient navbar-dark bg-success">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                </ul>
            </div>
    </nav>

    <!-- navbar ends -->
        <br>
    <!-- container starts -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            @if(!empty(session('status')))
                                <div class="alert alert-warning alert dismissible fade show">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <b>Admin Login</b>
                        </div>
                        <div class="card-body">
                        <!-- <div class="card-title"><b>Add Employee</b></div> -->
                            <form action="admin-login" method="post">
                                    @csrf
                                    <p>
                                        <label for="name">Email:</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </p>
                                    <p>
                                        <label for="name">Password:</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </p>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" value="Login" class="btn btn-primary bg-gradient">

                                        </div>
                                        <div class="col text-end">
                                            <!-- <input type="submit" value="Login" class="btn btn-primary bg-gradient"> -->
                                            <button class="btn btn-warning" onclick="location.href='admin_forgot_pass'">Forgot Password</button>
                                        </div>
                                    </div>
                                
                                
                                    <!-- <h6 class="card-subtitle mb-2 mt-2 text-muted ">
                                        Password will be sent to your registered Email
                                    </h6> -->
                                
                           </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    <!-- container ends -->

</body>
</html>
