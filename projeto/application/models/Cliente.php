<?php

class Application_Model_Cliente extends Zend_Db_Table
{
    protected $_name = 'cliente';
    
    public function gravar($dados)
    {
        //Se tiver o id vai alterar, se nao tiver, insere
        if(!empty($dados['id_cliente'])){
            //Resgatando registro no banco pelo ID
            $row = $this->fetchRow('id_cliente = ' . $dados['id_cliente']);
            
        }else{
            //criando linha vazia
            $row = $this->createRow();
        }
        
        
        //setando valores na linha
        $row->setFromArray($dados);
        
        //Salvando no banco de dados
        return $row->save();
    }
    
    public function excluir($dados)
    {
        $this->delete('id_cliente = ' . $dados['id_cliente']);
    }
}
