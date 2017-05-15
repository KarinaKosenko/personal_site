<?php
 
namespace M; 

use core\Model;      
        
class Content_manager extends Model{
	use \Core\Traits\Singleton;
	
	protected function __construct(){
		parent::__construct();
		$this->table = 'pages_content';
		$this->pk = 'controller_name';
	}
	
	
	public function validationMap(){
        return [
			'table' => 'pages_content',
			'pk' => 'controller_name',
            'fields' => ['id_content', 'controller_name', 'photo_link', 'native_name', 'title', 'content'],
            'not_empty' => ['controller_name', 'title', 'content'],
            'min_length' => [
                'title' => 8,
                'text' => 10
            ],
			'unique' => ['controller_name'],
			'html_allowed' => ['content']
        ];
    }
	
	
}
