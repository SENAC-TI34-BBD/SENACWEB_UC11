<?php
session_start();
// include database and object files
include_once "../config/database.php";
include_once "../objects/user.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// set ID property of user to be edited
$user->username = isset($_POST["username"]) ? $_POST["username"] : die();
$user->password = base64_encode(
  isset($_POST["password"]) ? $_POST["password"] : die()
);

// read the details of user to be edited
$stmt = $user->login();
if ($stmt->rowCount() > 0) {
  // get retrieved row
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // create array
  $_SESSION["user_id"] = $row["user_id"];
  header("Location: ../../index.php");
  exit();
} else {
  // As credenciais estão incorretas, exiba uma mensagem de erro
  echo "Credenciais incorretas.";
}

?>
