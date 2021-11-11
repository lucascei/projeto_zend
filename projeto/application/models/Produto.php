<?php

class Application_Model_Produto extends Zend_Db_Table
{
    protected $_name = 'produto';
    
    public function gravar($dados)
    {
    	// Se tiver o id vai alterar, se n�o tiver, insere
    	if(!empty($dados['id_produto'])){
	    	// Resgatando registro no banco pelo ID
    		$row = $this->fetchRow('id_produto = ' . $dados['id_produto']);
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
        $this->delete('id_produto = ' . $dados['id_produto']);
    }
}
