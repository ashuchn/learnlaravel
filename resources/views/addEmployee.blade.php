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
        /* Style the tab */
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        }
        .tabcontent {
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
        }

        /* Go from zero to full opacity */
        @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
        }
    </style>
</head>
<body>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg bg-gradient navbar-dark bg-success">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin">Admin</a>
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
        <div class="container-fluid col-6">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'signup')" id="defaultOpen">Signup</button>
                <button class="tablinks" onclick="openTab(event, 'login')">Login</button>
                <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
            </div>
            
            <!-- signup card -->
            <div class="card tabcontent" id="signup">
                        <div class="card-header">
                            @if(!empty(session('status')))
                                <div class="alert alert-warning alert dismissible fade show">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <b>Add Employee</b>
                        </div>
                        <div class="card-body">
                        <!-- <div class="card-title"><b>Add Employee</b></div> -->
                            <form action="insert" method="post">
                                    @csrf
                                    <p>
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </p>
                                    <p>
                                        <label for="name">Email:</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </p>
                                    <p>
                                        <label for="name">Phone:</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </p>
                                    
                                <input type="submit" value="Signup" class="btn btn-primary bg-gradient">
                                
                                
                                    <h6 class="card-subtitle mb-2 mt-2 text-muted ">
                                        Password will be sent to your registered Email
                                    </h6>
                                
                           </form>
                        </div>
            </div>

            <div class="card tabcontent" id="login">
                            <div class="card-header">
                            @if(!empty(session('status_login')))
                                <div class="alert alert-warning alert dismissible fade show">
                                    {{ session('status_login') }}
                                </div>
                            @endif
                                <b>Already Employee? Login Here</b>
                            </div>
                            <div class="card-body">
                            <!-- <div class="card-title"><b>Add Employee</b></div> -->
                                <form action="emp_login" method="post">
                                @csrf
                                        <p>
                                            <label for="name">Email:</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </p>
                                        <p>
                                            <label for="name">Password:</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </p>
                                        
                                        
                                    <input type="submit" value="Submit" class="btn btn-danger bg-gradient">

                                </form>
                            </div>
                </div>
                    <!-- </div> -->

        </div>  <!-- Container fluid ends-->

<!-- <div class="row">
    <div class="col-6"> -->
        
    
    <!-- container ends -->

</body>
</html>

<script>

        

    function openTab(evt, cityName) {
        // document.getElementById('defaultOpen').click;
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>