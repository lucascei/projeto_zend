<?php class MesaController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$modelMesa = new Application_Model_Mesa();
		
		$rowSet = $modelMesa->fetchAll();
		$this->view->rowSet = $rowSet;
	}
	
	public function formularioAction()
	{
		$dados = $this->_getAllParams();
		
		$modelMesa = new Application_Model_Mesa();
		
		if(!empty($dados['id_mesa'])){
			$row = $modelMesa->fetchRow('id_mesa = ' . $dados['id_mesa']);
		} else {
			$row = $modelMesa->createRow();
		}
		
		$this->view->row = $row;
		
		$modelCliente = new Application_Model_Cliente();
		$this->view->rowSetCliente = $modelCliente->fetchAll(null, 'nomeCliente');
                
                $modelGarcom = new Application_Model_Garcom();
		$this->view->rowSetGarcom = $modelGarcom->fetchAll(null, 'nomeGarcom');
                
                
                

	}
	
	public function gravarAction()
	{
		$dados = $this->getAllParams();
                $modelMesa = new Application_Model_Mesa();  



                $modelMesa->gravar($dados);

                $this->redirect('mesa/index');
	}
        
        

                public function excluirAction()
	{
		$dados = $this->_getAllParams();
		$modelMesa = new Application_Model_Mesa();
		
		$modelMesa->excluir($dados);
		
		$this->redirect('mesa/index');
	}
        //toda vez que uma palavra tiver um - tem qe colocar ele com camelcase.
                
}

