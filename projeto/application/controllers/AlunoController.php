<?php

class AlunoController extends Zend_Controller_Action
{


    public function mediaAction()
    {
        
    }
    
    public function calcularMediaAction()
    {
        $dados = $this->_getAllParams(); //recuperar medoto post
        
        $media = ($dados['n1'] + $dados['n2'] + $dados['n3'] + $dados['n4']) / 4;
        
        $this -> view -> resultado = $media;
        $this -> view -> nome = $dados['nome'];
    }
}
