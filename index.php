<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Magic NO LIMITS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body style="text-align: center;">
    
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?pg=home">
        <img src="./images/logo.png" width="112" height="50">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
        <?php
            echo '<a class="navbar-item" href="index.php?pg=home" >Home</a>';

            echo '<a class="navbar-item" href="index.php?pg=produtos">Produtos</a>';

            if(isset($_SESSION) and !empty($_SESSION)){
                echo '<a class="navbar-item" href="index.php?pg=fornecedores">Fornecedores</a>';
            }
            
            echo '<a class="navbar-item" href="index.php?pg=filial">Filiais</a>';
            
            if(isset($_SESSION) and !empty($_SESSION)){
                echo '<a class="navbar-item" href="index.php?pg=clientes">Clientes</a>';
            }
            if(isset($_SESSION) and !empty($_SESSION)){
                echo '<a class="navbar-item" href="index.php?pg=vendas">Vendas</a>';
            }

            if(isset($_SESSION) and empty($_SESSION)){
                echo '<a class="navbar-item" href="index.php?pg=cadastrovenda">Carrinho</a>';
            }
        ?>
        <div class="navbar-item has-dropdown is-hoverable">
            <?php 
                if(isset($_SESSION) and !empty($_SESSION)){            
                    echo '<a class="navbar-link">More</a>';
                }
            ?>
            <div class="navbar-dropdown">

                <a class="navbar-item" href="index.php?pg=cadastroprod">
                    Cadastrar Produtos
                </a>
                <a class="navbar-item" href="index.php?pg=cadastroforn">
                    Cadastrar Fornecedores
                </a>
                <a class="navbar-item" href="index.php?pg=cadastrofilial">
                    Cadastrar Filial
                </a>
                <a class="navbar-item" href="index.php?pg=cadastrovenda">
                    Cadastrar Venda
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                    Reportar um Bug
                </a>
            </div>
        </div>
        </div>

        <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
            <a class="button is-primary" href="index.php?pg=registro">
                <strong>Sign up</strong>
            </a>
            <?php
                if(isset($_SESSION) and empty($_SESSION)){                            
                    echo '<a class="button is-light" href="index.php?pg=login">Login</a>';
                } else {
                     echo'<a class="button is-light" href="index.php?pg=logoff">Logoff</a>';
                }
            ?>
            </div>
        </div>
        </div>
    </div>
    </nav>
</body>

<?php

    require_once('inc.connect.php');
    // echo $link;
    if( isset($_GET['pg']) and !empty($_GET['pg'])){
        $pag= $_GET['pg'];
     
    } else {
        $pag = 'home';
    }
    include_once ('inc.'.$pag.'.php');

?>
</html>

<?php

mysql_close();
?>