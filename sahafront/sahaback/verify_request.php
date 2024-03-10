<?php
session_start();
$ok = $_SESSION['Admin_id'];
if ($ok === 0) {
    echo "";
} else {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sahayatri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vehicle.php">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="verify_request.php">Requests</a>
                    </li>

                </ul>
                <form class="search-box d-flex">
                    <input class="form-control me-2" type="search" autocomplete="off" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <?php


    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User ID</th>
                <th scope="col">Front Face</th>
                <th scope="col">Back Face</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "mydb";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $query = "SELECT * FROM verification";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row['v_id'];
                    $user_id = $row['user_id'];
                    echo "<tr><th scope='row'>" . $id . "</th>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td><img height='65px' width='65px' src='" . $row['front_img'] . "'></td>";
                    echo "<td><img height='65px' width='65px' src='" . $row['back_img'] . "'></td>";
                    // echo "<td><img height='80px' width='68px' src='" . $row['destination'] . "'</td>";
                    echo "<td><a href='view_request.php?user_id=$user_id'><button>View</button></a>";
                    echo "<a href='remove_request.php'><button>Remove</button></a> </td></tr>";

                }

            }

            ?>
        </tbody>
    </table>
    </a>

</body>

</html>
<!--"</td> <td>".$row['lastname']."</td> <td>".$row['email']."</td>"