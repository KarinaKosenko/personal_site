<?php

namespace C\Admin;

use M\Content_manager as Model;
use M\Images_manager;
use Core\System;
use Core\Validation;
use Core\Exceptions;


class Profile extends Admin{
    
     public function action_index(){
		$mContent = Model::instance();
        $content = $mContent->one('profile');
		$photo = $mContent->one('profile')['photo_link'];
		
	    $this->title = 'Профиль';
            
        $this->content = System::template('v_profile.php', [
									'title' => $content['title'],
									'content' => $content['content'],
									'link' => '<a href=/admin/profile/edit>Редактировать страницу<a><br><a href=/admin/profile/image>Редактировать изображение<a><br><br><a href=/admin/auth/logout>Выйти из админки<a>',
									'photo' => $photo
         ]);
    }   
        
	
	public function action_edit(){
		$mContent = Model::instance();
        $content = $mContent->one($this->params[0]);
		
		if($content === null) {
			throw new Exceptions\E404("content of the page {$this->params[0]} is not found");
		}
		else{
			$this->title = 'Редактировать страницу "Профиль"';
			$msg = "Пожалуйста, отредактируйте содержание страницы.";
			
			$this->content = System::template('v_edit.php', [
							'title' => $content['title'],
							'content' => $content['content'],
							'msg' => $msg
						]);
						
			
			if(count($_POST) > 0) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				
				$obj = compact("title", "content");
			
				$valid = new Validation($obj, $mContent->validationMap());
				$valid->execute();
			
				if($valid->good()){   
					$mContent->edit($this->params[0], $valid->cleanObj());
					header("Location: /admin/profile");
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
	
	
	public function action_image(){
		$mManager = Images_manager::instance();
		$mContent = Model::instance();
		
		$this->title = 'Профиль';
		$msg = "Пожалуйста, выберите изображение.";
		
		if(isset($_FILES['imgfile']) && !empty($_FILES['imgfile']['name'])){
			$result = $mManager->upload_file($_FILES['imgfile'], $_FILES['imgfile']['name']);

			if(isset($result['error'])){
			  $msg = $result['error'];
			}
			else{
			  $link = '/photos/' . $result['filename'];
			  $name = $result['basename'];
			  $mContent->edit($this->params[0], ['photo_link' => $link, 'native_name' => $name]);
			  header("Location: /admin/profile");
			  exit();
			}
		}
		
		$this->content = System::template('v_edit_image.php', [
						'msg' => $msg,			
         ]); 
	}
}	
	
