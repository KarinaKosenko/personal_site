<?php

namespace C\Client;

use Core\System;
use C\Base;
use Core\Exceptions;


abstract class Client extends Base{
    protected $title;
    protected $content;
    protected $params;
	protected $status;
	
    
    public function __construct(){
		$this->title = '';
        $this->content = '';
		$this->status = '';
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
