<?php

namespace C\Admin;

use C\Base;
use Core\System;
use M\Check_auth;
use Core\Exceptions;

abstract class Admin extends Base{
	protected $auth;
    protected $title;
    protected $content;
    protected $params;
	protected $status;
    
    public function __construct(){
        $this->auth = (Check_auth::instance())->check_auth_admin();
		
		if(!$this->auth) {
			header("Location: /admin/auth/login");
			exit();
		}
       
        $this->title = 'Наш сайт - ';
        $this->content = '';
		$this->status = "/admin";
    }
	
	
	public function show404(){
		header("HTTP/1.1 404 Not Found");
        $this->title .= 'ошибка 404'; 
        $this->content = System::template('v_404.php');
    }
	
	
    public function render(){
        $html = System::template('v_main.php', [
            'title' => $this->title,
            'content' => $this->content,
			'status' => $this->status
         ]);
         
        return $html;
    } 
}