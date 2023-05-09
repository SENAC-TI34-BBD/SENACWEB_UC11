<?php
header("Content-Type:application/json");
if (
  isset($_POST["username"]) &&
  $_POST["username"] != "" &&
  $_POST["password"] &&
  $_POST["password"] != ""
) {
  include "db.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query(
    $con,
    "SELECT * FROM `users_login` WHERE username=$username and pass=$password LIMIT 1"
  );
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $user_id = $row["user_id"];
    $name = $row["name"];
    $picture = $row["profile_pic"];
    $response_code = $row["response_code"];
    $response_desc = $row["response_desc"];
    response($user_id, $name, $picture, $response_code, $response_desc);
    mysqli_close($con);
  } else {
    response(null, null, null, 200, "No Record Found");
  }
} else {
  response(null, null, null, 400, "Invalid Request");
}

function response($user_id, $name, $picture, $response_code, $response_desc)
{
  $response["user_id"] = $user_id;
  $response["name"] = $name;
  $response["picture"] = $picture;
  $response["response_code"] = $response_code;
  $response["response_desc"] = $response_desc;

  $json_response = json_encode($response);
  echo $json_response;
}
?>
