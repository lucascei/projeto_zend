<?php

class EntregadorController extends Zend_Controller_Action
{
	public function indexAction()
    {
        $modelEntregador = new Application_Model_Entregador();
        $rowSet = $modelEntregador ->fetchAll();
        $this -> view -> rowSet = $rowSet;
        
    }
    public function formularioAction()
    {
        $dados = $this->getAllParams();
        
        
        $modelEntregador = new Application_Model_Entregador();
        
        
        
        if(!empty($dados['id_entregador'])){
            
            $row = $modelEntregador->fetchRow('id_entregador = ' . $dados['id_entregador']);
            
        }  else {
            $row = $modelEntregador -> createRow();
            
        }
        
        
        $this->view->row = $row;
        
    }
    public function gravarAction()
    {
        $dados = $this->getAllParams();
        $modelEntregador = new Application_Model_Entregador();  
        
        
        
        $modelEntregador->gravar($dados);
        
        $this->redirect('entregador/index');
    }
    
    public function excluirAction()
    {
        $dados = $this->getAllParams();
        $modelEntregador = new Application_Model_Entregador();
        
        $modelEntregador->excluir($dados);
        
        $this->redirect('entregador/index');
    }
//                public function produtoAction(){
//                    
//                }
}

