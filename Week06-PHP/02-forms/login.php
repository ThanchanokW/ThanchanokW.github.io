<!DOCTYPE html>
<html>
    <body>

<?php
$userList = array(
    array( "u" => "jack", "p" => "jack123"),
    array( "u" => "jane", "p" => "jane123")
);

$user = $_POST['user'];
$password = $_POST['password'];
$isLoggedIn = FALSE;
foreach($userList as $rec) {
    // echo $rec['u'] . " ---- " .$rec['p'] . "<br/>";
    if ($user == $rec['u'] && $password == $rec['p']) {
        $isLoggedIn = TRUE;
        break;
    }
}

// echo "$user / $password<br/>";

if ($isLoggedIn) {
    echo "Login SUCCESS";
} else {
    echo "Login FAILED";
}

?>
</body>
</html>

