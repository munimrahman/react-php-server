<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");

require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

$userID = 1;
$userInfo = mysqli_query($db_conn, "SELECT * FROM `users` WHERE `id`='$userID'");
if (mysqli_num_rows($userInfo) > 0) {
    $userInfo = mysqli_fetch_all($userInfo, MYSQLI_ASSOC);
    echo json_encode(["success" => 1, "users" => $userInfo]);
} else {
    echo json_encode(["success" => 0]);
}

// } else {
//     echo json_encode(["success" => 0, "msg" => "User Not Found!"]);
// }
