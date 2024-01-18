<?php

echo '<h2>validar-senha.php<h2>';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// // Mostra as informações e tipo da variavel
// var_dump($usuario,$senha);

// Detalhe localhost posso chama-lo também pelo id 127.0.0.1
function validarLogin($usuario,$senha){
    $con = new PDO("mysql:host=localhost;dbname=tela_usuario", "root", "");

    $script = "SELECT * FROM usuarios WHERE usuario ='".$usuario."' AND senha ='" .$senha."'";

    $resultado = $con->query($script);
    $lista = $resultado->fetchAll();

    // Aqui o 'pre' organiza a lista na tela
    echo '<br><pre>';

    // mostra meu scripts
    var_dump($lista);

    // É para ver se na variavel tem alguma coisa se tiver sera Falso e se não tiver sera Verdadeiro
    var_dump(empty($lista));

    if(empty($lista)){
        // Aqui para não ficar mostrando a tela de arry com os erros, Eu uso o header('Location:index.php') para ficar na tela inicial
        // echo '<h2>Você não tem acesso</h2>';
        header('Location:index.php?mensagem=""');
    }
        else {
            // Aqui para me direcionar a tela de acesso Eu uso o header('Location:sistema.php') com isso terei acesso.
        // echo '<h2>Veocê tem acesso...</h2>';
        header('Location:sistema.php');
    }
}

validarLogin($usuario,$senha);


?>