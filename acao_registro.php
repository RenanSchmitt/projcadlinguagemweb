<?php
    require_once('inc.connect.php');
    print_r($_POST);

    (isset($_POST['nome']) and !empty($_POST['nome'])) ? $nome = $_POST['nome'] : $erro = true;

    (isset($_POST['email']) and !empty($_POST['email'])) ? $email = $_POST['email'] : $erro = true;

    (isset($_POST['senha']) and !empty($_POST['senha'])) ? $senha = $_POST['senha'] : $erro = true;

    (isset($_REQUEST['acao']) and !empty($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $erro = true;

    switch ($acao) {
        case 'insert':
            echo 'inserir registro';
            
            $query = 'INSERT INTO cliente (
                nome,
                email,
                senha)

            VALUES("'.$nome.'",
                "'.$email.'","'.$senha.'")';

                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
                header("Location: index.php?pg=registro&msg=true");
                exit; 
            case 'update':
                echo 'update';
                break;
            case 'delete':
                echo 'delete';
                echo 'delete';
                (isset($_GET['id']) and !empty($_GET['id'])) ? $id = $_GET['id'] : $erro = true;
    
                $query = 'DELETE FROM cliente 
                WHERE id = '.$id;  
                
                mysql_query($query, $link) or die(mysql_error());
                mysql_close();
                header("Location: index.php?pg=clientes&msg=true");
                exit;
                break;

    }


?>