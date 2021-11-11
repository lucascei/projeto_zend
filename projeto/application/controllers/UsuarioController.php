<?php class UsuarioController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$modelUsuario = new Application_Model_Usuario();
		
		$rowSet = $modelUsuario->fetchAll();
		$this->view->rowSet = $rowSet;
	}
	
	public function formularioAction()
	{
		$dados = $this->_getAllParams();
		
		$modelUsuario = new Application_Model_Usuario();
		
		if(!empty($dados['id_usuario'])){
			$row = $modelUsuario->fetchRow('id_usuario = ' . $dados['id_usuario']);
		} else {
			$row = $modelUsuario->createRow();
		}
		
		$this->view->row = $row;
		
		$modelPerfil = new Application_Model_Perfil();
		$this->view->rowSetPerfil = $modelPerfil->fetchAll(null, 'nome');
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
		$modelUsuario = new Application_Model_Usuario();
                
                
		
		$id_usuario = $modelUsuario->gravar($dados);
                $foto = $this->uploadFoto($id_usuario);
                
                $dadosUpdate['foto'] = $foto;
                $modelUsuario->update($dadosUpdate, "id_usuario = $id_usuario");
                
                /*echo '<pre>';
                print_r($_FILES);
                die;*/
		
		$this->redirect('usuario/index');
	}
        
        public function uploadFoto($id_usuario)
        {
            if(isset($_FILES['foto'])&& $_FILES['foto']['error']==0){
                $origem = $_FILES['foto']['tmp_name'];
                $extensao = substr($_FILES['foto']['name'], strrpos($_FILES['foto']['name'], '.'));
            
                $destino = 'img/fotos/'. $id_usuario . $extensao;
                
                move_uploaded_file($origem, $destino);
                
                return $id_usuario . $extensao;
            }
        }

                public function excluirAction()
	{
		$dados = $this->_getAllParams();
		$modelUsuario = new Application_Model_Usuario();
		
		$modelUsuario->excluir($dados);
		
		$this->redirect('usuario/index');
	}
        //toda vez que uma palavra tiver um - tem qe colocar ele com camelcase.
                public function carregarMunicipioAction(){
                    
                    $this->_helper->layout->disableLayout();
                    $dados = $this->_getAllParams();
                    
                    
                    $modelMunicipio = new Application_Model_MUNICIPIO();
                    $this->view->rowSetMunicipio = $modelMunicipio->fetchAll("id_uf = '{$dados['id_uf']}'", 'nome');
                }
                public function loginAction(){
                    
                }
                public function autenticarAction(){
                    //confere se existe esse usuario ou cliente no banco.
                    $dados = $this->_getAllParams();
                    //pega os dados enviado do action formulario.
                    $email = $dados['email'];
                    $senha = $dados['senha'];
                    
                    $modelUsuario = new Application_Model_Usuario();
                    $rowUsuario = $modelUsuario->fetchRow("email = '$email' and senha = '$senha'");
                    
                    if($rowUsuario){
                        $_SESSION['id_usuario'] = $rowUsuario['id_usuario'];
                        
                        $_SESSION['nome'] = $rowUsuario['nome'];
                        $_SESSION['id_perfil'] = $rowUsuario['id_perfil'];
                        $_SESSION['foto'] = $rowUsuario['foto'];
                        
                     
                       
                        $_SESSION['mensagem'] = 'usuario logado com Sucesso!';
                        $this->redirect('cliente/index');
                    }else{
                        
                        $_SESSION['mensagem'] = 'E-mail ou Senha Inválidos';
                        $this->redirect('usuario/login');
                    }
                }
                public function logautAction() {
                    /*destroi toda a sessão
                    session_destroy();*/
                 session_unset();
                    $_SESSION['mensagem'] = 'Logaut efetuado com sucesso!';
                    $this->redirect('usuario/login');
                }
}

