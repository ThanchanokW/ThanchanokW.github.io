<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Form</title>
    <script src="./script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <style>
    .box {
        border: solid 1px black;
    }
    </style>
</head>

<body style="background-color: #96d7c6;">
<div style="background-color:#e2d36B;">
<br>
<br>
</div>
<?php
require_once("config.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST['cmd']) && $_POST['cmd'] == 'add') {
    // Add new employee
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $arr_time = $_POST['arr_time'];
    $departure_time = $_POST['departure_time'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO request (name,phone_no,arr_time,departure_time,reason)
            VALUES ('$name','$phone_no','$arr_time','$departure_time','$reason')";
            
    if ($conn->query($sql) === TRUE) {
        echo "Success<br/>$sql<br/>";
    } else {
      echo "Error: " . $sql . "<br/>" . $conn->error;
    }
  }
?>
<a href="reportform.php">
  <button>Go to report</button>
</a>
<h2>Add New Request</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="padding-left: 2%; padding-bottom:2%; background-color:white;">
<br>    
    <input type="hidden" name="cmd" value="add" />
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><input type="text" name="phone_no"></td>
        </tr>
        <tr>
            <th>Arrival Time</th>
            <td><input type="datetime-local" name="arr_time"></td>
        </tr>
        <tr>
            <th>Departure Time</th>
            <td><input type="datetime-local" name="departure_time"></td>
        </tr>
        <tr>
            <th>Reason</th>
            <td><input type="text" name="reason"></td>
        </tr>
    </table>
    <input type="submit" value="Create" />
</form>
</body>
</html>