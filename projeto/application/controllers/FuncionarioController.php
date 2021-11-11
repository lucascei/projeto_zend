<?php

class FuncionarioController extends Zend_Controller_Action
{

    

    
    public function formularioAction()
    {
         
    }
    public function salarioAction()
    {
         
    }
    public function salarioFinalAction(){
        $dados = $this->_getAllParams();
        $salarioBruto = $dados['horas'] * $dados['valor'];
        $salarioTotal = $salarioBruto + ($salarioBruto * 0.03)* $dados['filho'];
        $this->view->salario = $salarioTotal;
        $this->view->nome = $dados['nome'];
        
    }


}