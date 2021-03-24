<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
    <script src="./script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php
require_once("config.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

    <?php
if (isset($_POST['cmd']) && $_POST['cmd'] == 'del') {
  // Delete request
  $requestid = $_POST['requestid'];
  $sql = "DELETE FROM request WHERE requestid = $requestid";

  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_connect_error();
  }
}
?>
<a href="request.php">
  <button>Go to request</button>
</a>
    <h1 class="ml1" style="padding-left:2%; background-color:#e2d36b;">
        <span class="text-wrapper">
            <span class="line line1"></span>
            <span class="letters">Report Form</span>
            <span class="line line2"></span>
        </span>
    </h1>

    <?php
$sql = "SELECT * FROM request";
$result = mysqli_query($conn, $sql);
?>
    <?php
if (mysqli_num_rows($result) > 0) {
    ?>
    <?php   
    
    ?>
    <table style="margin-left: 2%; ">
        <thead>
            <td class="box">
                Request Id
            </td>
            <td class="box">
                Name
            </td>
            <td class="box">
                Phone Number
            </td>
            <td class="box">
                Arrival Time
            </td>
            <td class="box">
                Departure Time
            </td>
            <td class="box">
                Reason
            </td>
            <td class="box">
                createdAt
            </td>
        </thead>
        <tbody>
            <?php
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
                <td class="box">
                    <?php
            echo $row['requestid']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['name']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['phone_no']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['arr_time']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['departure_time']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['reason']; ?>
                </td>
                <td class="box">
                    <?php
            echo $row['createdAt']; ?>
                </td>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                        id="form<?php echo $row['requestid']; ?>">
                        <input type="hidden" name="requestid" value="<?php echo $row['requestid']; ?>" />
                        <input type="hidden" name="cmd" value="del" />
                    </form>
                    <button
                        onclick="confirmDelete('form<?php echo $row['requestid'];?>', '<?php echo $row['name'];?>')">
                        <img src="../images/1175343.png" style="width: 20px; height:20px">
                    </button>
                </td>
                    <?php
      } ?>
        </tbody>
    </table>
    <?php
}

mysqli_close($conn);

?>
    <script>
    function confirmDelete(formId, name) {
        if (confirm(`Are you sure to delete ${name}?`)) {
            // alert(`Delete ${formId}`);
            document.getElementById(formId).submit();
        }
    }
    </script>
</body>

</html>