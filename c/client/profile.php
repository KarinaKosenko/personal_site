<?php

namespace C\Client;

use Core\System;
use Core\Exceptions;
use M\Content_manager;

class Profile extends Client{
    
    public function action_index(){
		$mContent = Content_manager::instance();
		$content = $mContent->one('profile');
		$photo = $content['photo_link'];
		
	    $this->title = 'Профиль';
            
        $this->content = System::template('v_profile.php', [
					'title' => $content['title'],
					'content' => $content['content'],
					'photo' => $photo,
					'link' => ''
         ]);
    }    
    
}	
	
