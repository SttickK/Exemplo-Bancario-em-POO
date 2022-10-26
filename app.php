<?php  

    require_once('funcionario.php'); // Chamando a pagina Cliente.php.


    //operações com cliente externo.

    $cliExterno = new cliente('Rafael Externo', 100); //Exemplo de cliente.

    $cliExterno->depositar(200);    // Exemplo de valor permitido.
    $cliExterno->depositar(180); // Exemplo de valor permitido.
    $cliExterno->depositar(80);

    $cliExterno->sacar(180); // Exemplo de saque
    $cliExterno->sacar(110); // Exemplo de saque

    //$cliExterno->depositar(-200); //Exemplo para valor não permitido.
    //print($cliExterno->somaDepositos()); // Exemplo soma depositos.
    
    $cliExterno->fazerEmprestimo(1100); // Exemplo de Emprestimo.

    //print($cliExterno->consultarSaldo()); // Consultar saldo disponivel.

    print($cliExterno->exibirExtrato());



    print("<br>");


    //operações com funcionarios.

        $cliFuncionario = new Funcionario ('Rafael funcionario', 100);
        $cliFuncionario->depositar(200);    
        $cliFuncionario->depositar(180); 
        $cliFuncionario->depositar(80);
        $cliFuncionario->sacar(180);
        $cliFuncionario->sacar(110); 
        $cliFuncionario->fazerEmprestimo(1100); 
    

        print($cliFuncionario->exibirExtrato());





?>