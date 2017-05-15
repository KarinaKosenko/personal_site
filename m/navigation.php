<?php

namespace M;

use core\Model; 

class Navigation extends Model{
	public $per_page;
	public $cur_page;
	protected static $instances = [];
    
   public static function instance($path){
        if(!isset(self::$instances[$path])){
            self::$instances[$path] = new self($path);
        }
       
        return self::$instances[$path];
    }
	
	protected function __construct($cur_page){
		parent::__construct();
		$this->table = 'guestbook';
		$this->pk = 'id_message';
		$this->per_page = 5;
		$this->cur_page = $cur_page;
	}
	
	
	public function getData(){
		$start = ($this->cur_page - 1) * $this->per_page;
		
		$data = $this->db->select("SELECT SQL_CALC_FOUND_ROWS * FROM guestbook ORDER BY date DESC LIMIT $start, $this->per_page");
		$get_rows = $this->db->select("SELECT FOUND_ROWS()");
		$rows = $get_rows[0]["FOUND_ROWS()"];
		$num_pages = ceil($rows / $this->per_page);
		
		$obj = compact("data", "rows", "start", "num_pages");
		return $obj;
	}
	
}