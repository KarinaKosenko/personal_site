<?php

namespace C\Client;

use Core\System;
use Core\Exceptions;
use M\Content_manager;

class Education extends Client{
    public function action_index(){
		$mContent = Content_manager::instance();
		$content = $mContent->one($this->params[0]);
	    
		$this->title = 'Образование';
		   
        $this->content = System::template('v_page.php', [
					'title' => $content['title'],
					'content' => $content['content'],
					'link' => '',
         ]);
    }    
}	
	
