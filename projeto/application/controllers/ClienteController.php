<?php class ClienteController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$modelCliente = new Application_Model_Cliente();
		
		$rowSet = $modelCliente->fetchAll();
		$this->view->rowSet = $rowSet;
	}
	
	public function formularioAction()
	{
		$dados = $this->_getAllParams();
		
		$modelCliente = new Application_Model_Cliente();
		
		if(!empty($dados['id_cliente'])){
			$row = $modelCliente->fetchRow('id_cliente = ' . $dados['id_cliente']);
		} else {
			$row = $modelCliente->createRow();
		}
		
		$this->view->row = $row;
		
//		$modelPerfil = new Application_Model_Perfil();
//		$this->view->rowSetPerfil = $modelPerfil->fetchAll(null, 'nome');
//                
//                $modelUF = new Application_Model_UF();
//		$this->view->rowSetUF = $modelUF->fetchAll(null, 'nome');
//		
//                $modelMunicipio = new Application_Model_MUNICIPIO();
//		$this->view->rowSetMunicipio = $modelMunicipio->fetchAll("id_uf = '{$row->id_uf}'", 'nome');
	}
	
	public function gravarAction()
	{
		$dados = $this->getAllParams();
                $modelCliente = new Application_Model_Cliente();

                $modelCliente->gravar($dados);

                $this->redirect('cliente/index');
               
                
                
                /*echo '<pre>';
                print_r($_FILES);
                die;*/
		
	}
        
        

                public function excluirAction()
	{
		$dados = $this->_getAllParams();
		$modelCliente = new Application_Model_Cliente();
		
		$modelCliente->excluir($dados);
		
		$this->redirect('cliente/index');
	}
        //toda vez que uma palavra tiver um - tem qe colocar ele com camelcase.
                
                
                
}


