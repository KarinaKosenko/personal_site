<?php

namespace C\Client;

use Core\System;
use Core\Exceptions;
use M\Content_manager;
use Core\dateCorrector;

class Skills extends Client{
    public function action_index(){
		$mContent = Content_manager::instance();
		$content = $mContent->one($this->params[0]);
		
	    $this->title = 'Навыки и умения';
		
		$datetime1 = new \DateTime(date('Y-m-d'));
		$datetime2 = new \DateTime('2016-11-21');
		$interval = $datetime1->diff($datetime2)->days;
		$date = (new dateCorrector())->correctDay($interval);
		   
        $this->content = System::template('v_page.php', [
					'title' => $content['title'],
					'content' => $content['content'],
					'link' => 'Изучаю PHP ' . $date,
         ]);
    }    
}	
	
