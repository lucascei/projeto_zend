<?php

class Application_Model_Entregador extends Zend_Db_Table
{
    protected $_name = 'entregador';
    
    public function gravar($dados)
    {
    	// Se tiver o id vai alterar, se n�o tiver, insere
    	if(!empty($dados['id_entregador'])){
	    	// Resgatando registro no banco pelo ID
    		$row = $this->fetchRow('id_entregador = ' . $dados['id_entregador']);
    	} else {
	    	// Criando linha vazia
	    	$row = $this->createRow();
    	}
    	
    	// Setando valores na linha
    	$row->setFromArray($dados);
    	
    	// Salvando no banco de dados
    	return $row->save();
    }
    
    public function excluir($dados)
    {
        $this->delete('id_entregador = ' . $dados['id_entregador']);
    }
}
