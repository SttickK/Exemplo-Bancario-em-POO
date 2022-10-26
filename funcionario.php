<?php
require_once('cliente.php');


class Funcionario extends cliente{


    public function fazerEmprestimo($valor)

    {
        if($valor>0)
        {
            $this->emprestimos[] = $valor*1.1;
        }
        else
        {
            print("<p><h2> Valor não permitido para essa operação </h2></p>");
        }
    }

}






?>