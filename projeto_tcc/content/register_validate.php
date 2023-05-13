<?php
session_start();
include_once "./config/connection.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
/*
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$senha = $_POST["senha"];*/

$query_verifica = "SELECT id, nome, email
                FROM usuarios
                WHERE email=:email
                LIMIT 1";
$result_verifica = $conn->prepare($query_verifica);
$result_verifica->bindParam(":email", $dados["email"], PDO::PARAM_STR);
$result_verifica->execute();

if ($result_verifica and $result_verifica->rowCount() != 0) {
  $row_verifica = $result_verifica->fetch(PDO::FETCH_ASSOC);
  if ($dados["email"] == $row_verifica["email"]) {
    $retorna = [
      "erro" => true,
      "msg" =>
        "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: E-mail já cadastrado!</span>",
    ];
  } else {
    $senha = password_hash($dados["senha"], PASSWORD_DEFAULT);
    $query_cadastra = "INSERT into usuarios(`nome`,`sobrenome`,`email`,`telefone`,`senha`) 
            VALUES 
            (
              nome=:nome,
          sobrenome=:sobrenome,
          email=:email,
          telefone=:telefone,
          senha=:senha)";
    $result_cadastra = $conn->prepare($query_cadastra);
    $result_cadastra->bindParam(":nome", $dados["nome"], PDO::PARAM_STR);
    $result_cadastra->bindParam(
      ":sobrenome",
      $dados["sobrenome"],
      PDO::PARAM_STR
    );
    $result_cadastra->bindParam(":email", $dados["email"], PDO::PARAM_STR);
    $result_cadastra->bindParam(
      ":telefone",
      $dados["telefone"],
      PDO::PARAM_STR
    );
    $result_cadastra->bindParam(":senha", $senha);
    $result_cadastra->execute();

    $retorna = ["erro" => false, "dados" => "ok"];
  }
} else {
  $senha = password_hash($dados["senha"], PASSWORD_DEFAULT);
  $query_cadastra = "INSERT into usuarios(`nome`,`sobrenome`,`email`,`telefone`,`senha`) 
          VALUES 
          (
          nome=:nome,
          sobrenome=:sobrenome,
          email=:email,
          telefone=:telefone,
          senha=:senha)";
  $result_cadastra = $conn->prepare($query_cadastra);
  $result_cadastra->bindParam(":nome", $dados["nome"], PDO::PARAM_STR);
  $result_cadastra->bindParam(
    ":sobrenome",
    $dados["sobrenome"],
    PDO::PARAM_STR
  );
  $result_cadastra->bindParam(":email", $dados["email"], PDO::PARAM_STR);
  $result_cadastra->bindParam(":telefone", $dados["telefone"], PDO::PARAM_STR);
  $result_cadastra->bindParam(":senha", $senha);
  $result_cadastra->execute();

  $retorna = ["erro" => false, "dados" => "ok"];
}

echo json_encode($retorna);
