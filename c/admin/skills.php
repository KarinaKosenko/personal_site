<?php

namespace C\Admin;

use M\Content_manager as Model;
use Core\System;
use Core\Validation;
use Core\Exceptions;
use Core\dateCorrector;


class Skills extends Admin{
    
     public function action_index(){
		$mContent = Model::instance();
        $content = $mContent->one($this->params[0]);
		 
	    $this->title = 'Навыки';
		
		$datetime1 = new \DateTime(date('Y-m-d'));
		$datetime2 = new \DateTime('2016-11-21');
		$interval = $datetime1->diff($datetime2)->days;
		$date = (new dateCorrector())->correctDay($interval);
            
        $this->content = System::template('v_page.php', [
									'title' => $content['title'],
									'content' => $content['content'],
									'link' => 'Изучаю PHP ' . $date . '<br><a href=/admin/skills/edit>Редактировать страницу<a>',
         ]);
    }   
        
	
	public function action_edit(){
		$mContent = Model::instance();
        $content = $mContent->one($this->params[0]);
		
		if($content === null) {
			throw new Exceptions\E404("content of the page {$this->params[0]} is not found");
		}
		else {
			$this->title = 'Редактировать страницу "Навыки"';
			$msg = "Пожалуйста, отредактируйте страницу.";
			
			$this->content = System::template('v_edit.php', [
							'title' => $content['title'],
							'content' => $content['content'],
							'msg' => $msg
						]);
						
			$old_title = $content['title'];			
			
			
			if(count($_POST) > 0) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				
				$obj = compact("title", "content");
			
				$valid = new Validation($obj, $mContent->validationMap());
				$valid->execute();
			
				if($valid->good()){   
					$mContent->edit($this->params[0], $valid->cleanObj());
					header("Location: /admin/skills");
					exit();
				}
				else{
					$errors = $valid->errors();
					$msg = implode('<br>', $errors);
				}
				
				$this->content = System::template('v_edit.php', [
						'title' => $title,
						'content' => $content,
						'msg' => $msg
					]);		
			}	
		}
	}	
}	
	
