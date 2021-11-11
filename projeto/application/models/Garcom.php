<?php

class Application_Model_Garcom extends Zend_Db_Table
{
    protected $_name = 'Garcom';
    
    public function gravar($dados)
    {
        //Se tiver o id vai alterar, se nao tiver, insere
        if(!empty($dados['id_garcom'])){
            //Resgatando registro no banco pelo ID
            $row = $this->fetchRow('id_garcom = ' . $dados['id_garcom']);
            
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
        $this->delete('id_garcom = ' . $dados['id_garcom']);
    }
}
