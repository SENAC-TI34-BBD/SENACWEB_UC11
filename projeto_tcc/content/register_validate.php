<?php
session_start();
include_once "./config/connection.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $query_verifica = "SELECT id, nome, email
                FROM usuarios
                WHERE email=:email
                LIMIT 1";
    $result_verifica = $conn->prepare($query_verifica);
    $result_verifica->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_verifica->execute();

    if(($result_verifica) and ($result_verifica->rowCount() != 0)){
        $row_verifica = $result_verifica->fetch(PDO::FETCH_ASSOC);
        if($dados['email'] == $row_verifica['email']){
            $retorna = ['erro'=> true, 'msg' => "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: E-mail já cadastrado!</span>"];
        }else{
            $query_cadastra = "INSERT into usuarios(`nome`,`sobrenome`,`email`,`telefone`,`senha`,`picture`,`uuid`) 
            VALUES 
            ";

            $retorna = ['erro'=> false, 'dados' => $row_usuario];
        }        
    }else{
        $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário ou a senha inválida!</div>"];
    }    
}

echo json_encode($retorna);