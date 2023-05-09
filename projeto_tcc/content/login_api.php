<?php
header("Content-Type:application/json");
if (
  isset($_POST["username"]) &&
  $_POST["username"] != ""
  //* $_POST["password"] && $_POST["password"] != "" //
) {
  include "./config/db.php";
  $username = $_POST["username"];
  //$password = $_POST["password"];
  $result = mysqli_query(
    $con,
    "SELECT * FROM `users_login` WHERE username ='$username'"
  );
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $user_id = $row["user_id"];
    $name = $row["name"];
    $picture = $row["picture"];
    $username = $row["username"];
    response($user_id, $name, $picture, $username);
    mysqli_close($con);
  } else {
    response(null, null, null, null);
  }
} else {
  response(null, null, null, null);
}

function response($user_id, $name, $picture, $username)
{
  $response["user_id"] = $user_id;
  $response["name"] = $name;
  $response["picture"] = $picture;
  $response["username"] = $username;

  $json_response = json_encode($response);
  echo $json_response;
}
?>
