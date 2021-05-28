<?php

//header.php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_private();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Decsriptive Answer Evaluation</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/bootstrap-datetimepicker.css" />
    <script src="../style/bootstrap-datetimepicker.js"></script>
    <style type="text/css">
        body{
            background: url(background.png);
        }
h1 {
    position: relative;
    font-family: 'Montserrat', Arial, sans-serif;
    font-size: 60px;
    font-weight: 700;
    color: #fff;
    letter-spacing: 0.02em;
    text-transform: uppercase;
    text-shadow: 0 0 0.15em #1da9cc;
    user-select: none;
    white-space: nowrap;
    filter: blur(0.007em);
    animation: shake 2.5s linear forwards;
}
h1::before,
h1::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
}

h1::before {
    animation: crack1 2.5s linear forwards;
    -webkit-clip-path: polygon(0% 0%, 10% 0%, 55% 100%, 0% 100%);
            clip-path: polygon(0% 0%, 10% 0%, 55% 100%, 0% 100%);
}

h1::after {
    animation: crack2 2.5s linear forwards;
    -webkit-clip-path: polygon(44% 0%, 100% 0%, 100% 100%, 70% 100%);
            clip-path: polygon(44% 0%, 100% 0%, 100% 100%, 70% 100%);
}

@keyframes shake {
    5%, 15%, 25%, 35%, 55%, 65%, 75%, 95% {
        filter: blur(0.018em);
        transform: translateY(0.018em) rotate(0deg);
    }

    10%, 30%, 40%, 50%, 70%, 80%, 90% {
        filter: blur(0.01em);
        transform: translateY(-0.018em) rotate(0deg);
    }

    20%, 60% {
        filter: blur(0.03em);
        transform: translate(-0.018em, 0.018em) rotate(0deg);
    }

    45%, 85% {
        filter: blur(0.03em);
        transform: translate(0.018em, -0.018em) rotate(0deg);
    }

    100% {
        filter: blur(0.007em);
        transform: translate(0) rotate(-0.5deg);
    }
}

@keyframes crack1 {
    0%, 95% {
        transform: translate(-50%, -50%);
    }

    100% {
        transform: translate(-51%, -48%);
    }
}

@keyframes crack2 {
    0%, 95% {
        transform: translate(-50%, -50%);
    }

    100% {
        transform: translate(-49%, -53%);
    }
}
    </style>
</head>
<body>

	<!--<div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
  		<img src="logo.png" class="img-fluid" width="300" alt="Online Examination System in PHP" />
	</div>-->

    <nav class="navbar navbar-expand-sm p-3 mb-2 bg-gradient-warning ">
        <img src="logo.png" class="img-fluid" width="200" alt="Decsriptive Answer Evaluation" />
        <a class="navbar-brand text-dark " style="font-weight: bold; margin-left: 620px;" href="index.php">Admin Side</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" style="font-size: 20px; margin-left: 25px;" href="exam.php">Exam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" style="font-size: 20px; margin-left: 25px;" href="user.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" style="font-size: 20px; margin-left: 25px;" href="logout.php">Logout</a>
                </li>   
            </ul>
        </div>  
    </nav>

	<div class="container-fluid">

<h1 style="margin-top: 100px; margin-left: 410px;">Welcome to</h1>
<h1 style="margin-top: 10px; margin-left: 300px;">Descriptive Answer</h1>
<h1  style="margin-top: 10px; margin-left: 320px;">Evaluation System</h1>
</div>
</body>
</html>
