<?php class GarcomController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$modelGarcom = new Application_Model_Garcom();
		
		$rowSet = $modelGarcom->fetchAll();
		$this->view->rowSet = $rowSet;
	}
	
	public function formularioAction()
	{
		$dados = $this->_getAllParams();
		
		$modelGarcom = new Application_Model_Garcom();
		
		if(!empty($dados['id_garcom'])){
			$row = $modelGarcom->fetchRow('id_garcom = ' . $dados['id_garcom']);
		} else {
			$row = $modelGarcom->createRow();
		}
		
		$this->view->row = $row;
		
//                
//                $modelUF = new Application_Model_UF();
//		$this->view->rowSetUF = $modelUF->fetchAll(null, 'nome');
//		
//                $modelMunicipio = new Application_Model_MUNICIPIO();
//		$this->view->rowSetMunicipio = $modelMunicipio->fetchAll("id_uf = '{$row->id_uf}'", 'nome');
	}
	
	public function gravarAction()
	{
		$dados = $this->_getAllParams();
		$modelGarcom = new Application_Model_Garcom();
                
                
		
		$modelGarcom->gravar($dados);
               
                
                /*echo '<pre>';
                print_r($_FILES);
                die;*/
		
		$this->redirect('garcom/index');
	}
        
        

                public function excluirAction()
	{
		$dados = $this->_getAllParams();
		$modelUsuario = new Application_Model_Garcom();
		
		$modelUsuario->excluir($dados);
		
		$this->redirect('garcom/index');
	}
        
}


