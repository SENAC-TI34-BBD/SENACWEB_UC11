<?php
session_start();
include_once "./config/connection.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(empty($dados['user'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>"];
}elseif(empty($dados['password'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
}else{
    $query_usuario = "SELECT id, nome, email, senha
                FROM usuarios
                WHERE nome=:user
                LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':user', $dados['user'], PDO::PARAM_STR);
    $result_usuario->execute();

    if(($result_usuario) and ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        if(password_verify($dados['password'], $row_usuario['senha'])){
            $_SESSION['id'] =  $row_usuario['id'];
            $_SESSION['nome'] =  $row_usuario['nome'];

            $retorna = ['erro'=> false, 'dados' => $row_usuario];
        }else{
            $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário ou a senha inválida!</div>"];
        }        
    }else{
        $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário ou a senha inválida!</div>"];
    }    
}

echo json_encode($retorna);