<?php

Class App_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract {
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        
//parent::preDispatch($request);
        
        
        $paginasPublicas = Array(
            'usuario/login',
            'usuario/autenticar',
            'usuario/carregar-municipio',
            //'usuario/index',
            'usuario/logaut',
            'error/error',
        );
        
        $paginasAdministrador = Array(
            'usuario/index',
            'usuario/formulario',
            'usuario/gravar',
            'usuario/excluir',
            
            'perfil/index',
            'perfil/formulario',
            'perfil/gravar',
            'perfil/excluir',
            
            'entregador/index',
            'entregador/formulario',
            'entregador/gravar',
            'entregador/excluir',
            
            'garcom/index',
            'garcom/formulario',
            'garcom/gravar',
            'garcom/excluir',
            
            'garcom/index',
            'garcom/formulario',
            'garcom/gravar',
            'garcom/excluir',
            
            'cliente/index',
            'cliente/formulario',
            'cliente/gravar',
            'cliente/excluir',
            
            'mesa/index',
            'mesa/formulario',
            'mesa/gravar',
            'mesa/excluir',
            
            'produto/index',
            'produto/formulario',
            'produto/gravar',
            'produto/excluir',
        );
        
        $paginasCliente = Array(
            'usuario/index',
            'usuario/formulario',
            'usuario/gravar',
        );
        
//        $acesso = $this->getAcesso($_SESSION['id_perfil']);
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        
        // $url = $controller->getActionName();
        $url = $controller . '/' . $action;
        if(in_array($url, $paginasPublicas)){
            return true;
        }
        if($_SESSION['id_usuario']){
            if($_SESSION['id_perfil'] == 4 && in_array($url, $paginasAdministrador)){
                return true;
            }
            if($_SESSION['id_perfil'] == 5 && in_array($url, $paginasCliente)){
                return true;
            }
        }
        $request->setControllerName('usuario');
        $request->setActionName('login');
   }
    /* if(!empty($_SESSION[''])){
            $request->setControllerName('usuario');
            $request->setActionName('login');
        }
        * 
        */
}

