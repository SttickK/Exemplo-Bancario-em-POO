<?php


class Cliente {
    
    private $nome;
    private $saldoInicial;
    private $depositos;
    private $saques;
    protected $emprestimos;


    public function __construct($nome, $saldoInicial)
    {
       $this->nome         = $nome;
       $this->saldoInicial = $saldoInicial; 

       $this->depositos   = [];
       $this->saques      = [];
       $this->emprestimos = [];
    
    }


    public function verNome()
    {
        return $this->nome;
    }

    public function verSaldoInicial()
    {
        return $this->saldoInicial;
    }

    public function depositar($valor)
    {
        if($valor>0)
        {
            $this->depositos[] = $valor;
        }
        else
        {
            print("<p><h2> Valor não permitido para essa operação!</h2></p>");
        }

    }

    public function sacar($valor)
    {
        if($valor>0)
        {
           if($this->consultarSaldo()>=$valor)
           {
                $this->saques[] = $valor;
           }
        

            else
            {
                print("<p><h2> Saldo insuficiente para está operação </h2></p>");
            }

        }

            else
            {
            print("<p><h2> Valor não permitido para essa operação");
            }


     }

    public function fazerEmprestimo($valor)

    {
        if($valor>0)
        {
            $this->emprestimos[] = $valor*1.2;
        }
        else
        {
            print("<p><h2> Valor não permitido para essa operação </h2></p>");
        }
    }

    public function consultarSaldo()
    {
        $saldoAtual = $this->saldoInicial + $this->somaDepositos() - $this->somaSaques() - $this->somaEmprestimos();

        return $saldoAtual; // vai fazer a adição e a subtração e mostrar um valor final de saldo atual.
    }

    public function somaDepositos()
    {
        return array_sum($this->depositos); // Vai somar todos os Depositos e retornar 
    }

    public function somaSaques()
    {
        return array_sum($this->saques); // Soma de todos os saques.
    }

    public function somaEmprestimos()
    {
        return array_sum($this->emprestimos); // Soma de todos os emprestimos.
    }

    public function exibirExtrato() //Vai mostrar o extrato
    {
        $html = '<table bgcolor="#999" border="1"> 
                    <thead>
                    <tr>

                    <th colspan="3" align="center">EXTRATO BANCÁRIO</th>

                     </tr>
                        <tr>

                            <th colspan="2" align="left" width="250px">NOME</th>
                            <th align="center" width="200px">SALDO INICIAL</th>

                         </tr>
                         <tr>

                         <td colspan="2" align="left" width="250px">#nome</td>
                         <td align="right" width="200px">#saldoInicial</td>

                         </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <th align="center" width="150px">DEPÓSITOS</tH>
                        <th align="center" width="150px">SAQUES</th>
                        <th align="center" width="150px">EMPRÉSTIMOS</th>


                    </tr>
                         
                        #linhaTabHtml

                    </tbody>
                    <tfoot>
                        <tr>

                            <th align="right" width"150px" style"color:white;background:#222;">#totalDepositos</th>
                            <th align="right" width"150px" style"color:white;background:#222;">#totalSaques</th>
                            <th align="right" width"150px" style"color:white;background:#222;">#totalEmprestimos</th>
                       
                        </tr>

                        <tr>

                            <th colspan="2" align="right" width"150px">SALDO ATUAL</th>
                            <th align="right" width"150px">#saldoAtual</th>
                        
                        </tr>
                    </tfoot>
                    </table>';

        $linhaTabHtml = '<tr>

                            <td align="right" width="150px">#valorDeposito</td>
                            <td align="right" width="150px">#valorSaque</td>
                            <td align="right" width="150px">#valorEmprestimo</td>

                         </tr>';

        $linhasHtml ='';

        $totalDepositos   = count($this->depositos);
        $totalSaques      = count($this->saques);
        $totalEmprestimos = count($this->emprestimos);

        $maiorArray = max($totalDepositos,$totalSaques,$totalEmprestimos);
        
        for($i=0;$i<$maiorArray;$i++)
        {
            $linhaAtual = $linhaTabHtml;

            if(isset($this->depositos[$i]))
            {
                $linhaAtual = str_replace('#valorDeposito', $this->depositos[$i],$linhaAtual);
            }
            else
            {
                $linhaAtual = str_replace('#valorDeposito',' ',$linhaAtual);
            }



            if(isset($this->saques[$i]))
            {
                $linhaAtual = str_replace('#valorSaque', $this->saques[$i],$linhaAtual);
            }
            else
            {
                $linhaAtual = str_replace('#valorSaque',' ',$linhaAtual);
            }


            if(isset($this->emprestimos[$i]))
            {
                $linhaAtual = str_replace('#valorEmprestimo', $this->emprestimos[$i],$linhaAtual);
            }
            else
            {
                $linhaAtual = str_replace('#valorEmprestimo',' ',$linhaAtual);
            }


            $linhasHtml .= $linhaAtual;
        }

        $html = str_replace('#nome', $this->nome, $html);
        $html = str_replace('#saldoInicial', $this->saldoInicial, $html);

        $html = str_replace('#linhaTabHtml', $linhasHtml, $html);

        $html = str_replace('#totalDepositos', $this->somaDepositos(), $html);
        $html = str_replace('#totalSaques', $this->somaSaques(), $html);
        $html = str_replace('#totalEmprestimos', $this->somaEmprestimos(), $html);
       
        $html = str_replace('#saldoAtual', $this->consultarSaldo(), $html);





        return $html;
    }


}




?>