<?php
 
namespace M; 

use core\Model;      
        
class Messages extends Model{
	use \Core\Traits\Singleton;
	
	protected function __construct(){
		parent::__construct();
		$this->table = 'guestbook';
		$this->pk = 'id_message';
	}
	
	
	public function validationMap(){
        return [
			'table' => 'guestbook',
			'pk' => 'id_message',
            'fields' => ['id_message', 'name', 'text', 'date'],
            'not_empty' => ['name', 'text'],
            'min_length' => [
                'name' => 2,
                'text' => 10
            ],
			'max_length' => [
                'name' => 20,
                'text' => 500
            ],
			'unique' => [],
			'html_allowed' => ['text']
        ];
    }
	
	
	public function all(){
        return $this->db->select("SELECT * FROM {$this->table} ORDER BY date DESC");
    }
}
