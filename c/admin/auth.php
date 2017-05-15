<?php

namespace C\Admin;

use Core\System;
use Core\Sql;
use C\Base;

class Auth extends Base{
	protected $title;
    protected $content;
    protected $params;
	protected $msg;
	protected $db;
	
	
    public function __construct(){
		$this->db = Sql::instance();
        $this->title = 'Наш сайт - ';
        $this->content = '';
		$this->msg = 'Введите логин и пароль:';	
    }
	
	public function render(){
        $html = System::template('v_main.php', [
            'title' => $this->title,
            'content' => $this->content,
         ]);
         
        return $html;
    } 
	
	public function action_login(){
		if(count($_POST) > 0) {
			$login = trim($_POST['login']);
			$password = trim($_POST['password']);
			
			$admins = $this->db->select("SELECT * FROM admins WHERE login = :login", 
				[
					"login" => $login
				]);
			
			
			if($admins && password_verify($password, $admins[0]['password'])) {
					$_SESSION['auth_admin'] = true;
					$_SESSION['id_admin'] = $admins[0]['id_admin'];
					
					if(isset($_POST['remember'])) {
						setcookie('login_admin', $admins[0]['login'], time() + 3600 * 24 * 7, '/');
						setcookie('password_admin', $admins[0]['password'], time() + 3600 * 24 * 7, '/');	
					}
					
					header("Location: /admin/profile");
					exit();
					
			}
			else {
				$this->msg = 'Неверный логин или пароль!';
			}
		}
		
		$this->title .= 'авторизация';
            
        $this->content = System::template('v_login.php', [
			'msg' => $this->msg,
         ]);
	}
	
	
	public function action_logout(){
			unset($_SESSION['auth_admin']); 
			unset($_SESSION['id_admin']);
			
			if(isset($_COOKIE['login_admin']) && isset($_COOKIE['password_admin'])) {
				setcookie('login_admin', '', time() - 3600, '/');
				setcookie('password_admin', '', time() - 3600, '/');	
				unset($_COOKIE['login_admin']);
				unset($_COOKIE['password_admin']);
			}
	
			header("Location: /profile");
			exit();		
	}
	
	
}