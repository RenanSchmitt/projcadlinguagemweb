<?php

// INSERTS
function insertForn($form, $link) {
    $query = 'INSERT INTO fornecedor (
        nome,
        ende)

        VALUES("'.$form['nome'].'",
        "'.$form['ende'].'")';

    mysql_query($query, $link) or die(mysql_error());
    mysql_close();
}

function insertFilial($form, $link) {
    $query = 'INSERT INTO filial (
        nome,
        ende)

        VALUES("'.$form['nome'].'",
        "'.$form['ende'].'")';
                   
    mysql_query($query, $link) or die(mysql_error());
    mysql_close();   
}

function insertVenda($form, $link){
    $query = 'INSERT INTO venda_itens (
        id_produto,
        qtd,
        valor)

        VALUES("'.$form['id_produto'].'",
        "'.$form['qtd'].'",
        "'.$form['valor'].'")';
    mysql_query($query, $link) or die(mysql_error());
    mysql_close();
}

function insertCliente($form, $link){
    $query = 'INSERT INTO cliente (
        nome,
        email,
        senha,
        img)
    VALUES("'.$form['nome'].'",
        "'.$form['email'].'","'.$form['senha'].'","'.$form['nome_image'].'")';
        mysql_query($query, $link) or die(mysql_error());
        mysql_close();
}

// SELECT

function mostraInformacoes($table, $order, $link){
    $query = 'SELECT *
    FROM '.$table.'
    ORDER BY '.$order;
    $form['res'] = mysql_query($query, $link);
    $form['qtd'] = mysql_num_rows($form['res']);
    return $form;
}

// DELETE

function deleteItem($table, $id, $link) {
    $query = 'DELETE FROM '.$table.' 
    WHERE id_'.$table.' = '.$id;  
    
    mysql_query($query, $link) or die(mysql_error());
    mysql_close();    
}

function deleteCliente($table, $id, $link) {
    $query = 'DELETE FROM '.$table.' 
    WHERE id = '.$id;  
    
    mysql_query($query, $link) or die(mysql_error());
    mysql_close();    
}

function updateItem($table, $form, $link, $id) {
    $query = 'UPDATE '.$table.' SET nome = "'.$form['nome'].'", ende = "'.$form['ende'].'" WHERE id_'.$table.' = '.$id;
    mysql_query($query, $link) or die(mysql_error());
    mysql_close();
}

?>