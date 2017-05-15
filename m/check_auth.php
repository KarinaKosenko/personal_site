<?php

namespace M;

use Core\Sql;

class Check_auth{
	use \Core\Traits\Singleton;
	
	protected $db;
	
	protected function __construct(){
		$this->db = Sql::instance();
    }
	
	public function check_auth_admin(){
		if(!isset($_SESSION['auth_admin'])) {
			if(isset($_COOKIE['login_admin']) && isset($_COOKIE['password_admin'])) {
				$login = trim($_COOKIE['login_admin']);
				$password = trim($_COOKIE['password_admin']);
		
				$admins = $this->db->select("SELECT * FROM admins WHERE login =:login", 
				[
					"login" => $login
				]);
				
				if($admins && $password === $admins[0]['password']) {
					$_SESSION['auth_admin'] = true;
					return true;
				} else {
					return false;
				}
			}
		} else {
            return true;
        }
	}
	
}