<?php

class ProdutoController extends Zend_Controller_Action
{
	public function indexAction()
    {
        $modelProduto = new Application_Model_Produto();
        $rowSet = $modelProduto ->fetchAll();
        $this -> view -> rowSet = $rowSet;
        
    }
    public function formularioAction()
    {
        $dados = $this->getAllParams();
        
        
        $modelProduto = new Application_Model_Produto();
        
        
        
        if(!empty($dados['id_produto'])){
            
            $row = $modelProduto->fetchRow('id_produto = ' . $dados['id_produto']);
            
        }  else {
            $row = $modelProduto -> createRow();
            
        }
        
        
        $this->view->row = $row;
        
    }
    public function gravarAction()
	{
		$dados = $this->_getAllParams();
		$modelProduto = new Application_Model_Produto();
                
                
		
		$id_produto = $modelProduto->gravar($dados);
                $foto = $this->uploadFoto($id_produto);
                
                $dadosUpdate['foto'] = $foto;
                $modelProduto->update($dadosUpdate, "id_produto = $id_produto");
                
                /*echo '<pre>';
                print_r($_FILES);
                die;*/
		
		$this->redirect('produto/index');
	}
        
        public function uploadFoto($id_produto)
        {
            if(isset($_FILES['foto'])&& $_FILES['foto']['error']==0){
                $origem = $_FILES['foto']['tmp_name'];
                $extensao = substr($_FILES['foto']['name'], strrpos($_FILES['foto']['name'], '.'));
            
                $destino = 'img/fotos/'. $id_produto . $extensao;
                
                move_uploaded_file($origem, $destino);
                
                return $id_produto . $extensao;
            }
        }
    public function excluirAction()
    {
        $dados = $this->getAllParams();
        $modelProduto = new Application_Model_Produto();
        
        $modelProduto->excluir($dados);
        
        $this->redirect('produto/index');
    }
//                public function produtoAction(){
//                    
//                }
}

