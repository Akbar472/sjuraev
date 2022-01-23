<?php
date_default_timezone_set('Europe/London')
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affordable Houses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Roboto Mono', monospace;
        }
        li, a {
            font-size: 1rem;
            color: black;
            text-decoration: none;
        }
        header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 10%;
        }
        .nav_links {
            list-style: none;
        }
        .nav_links li {
            display: inline-block;
            padding: 0 20px;
        }
        .nav_links li a {
            transition: all 0.3s ease 0s;
        }
        .nav_links li a:hover {
            color: white;
            background-color: grey;
        }

    </style>
</head>
<body>
<!-- Navbar -->
<header>
    <nav>
        <ul class="nav_links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="data.php">DATA</a></li>
            <li><a href="../houses/index.php">MACHINE READABLE</a></li>
        </ul>
    </nav>
</header>
</body>
</html>
