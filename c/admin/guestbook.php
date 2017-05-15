<?php

namespace C\Admin;

use M\Messages as Model;
use M\Navigation;
use M\Smiles_manager;
use core\Validation;
use Core\System;

class Guestbook extends Admin{
    
	public function action_page(){
		$mMessages = Model::instance();
        $messages = $mMessages->all();
		$smiles = Smiles_manager::instance();
		
		$mNav = Navigation::instance($this->params[2]);
		
		$all_data = $mNav->getData();
		
		$start = $all_data['start'];
		$data = $all_data['data'];
		$rows = $all_data['rows'];
		$num_pages = $all_data['num_pages'];
		
		
	    $this->title = 'Гостевая книга';
		   
        $this->content = System::template('v_guestbook_admin.php', [
		   'messages' => $messages,
		   'start' => $start,
		   'data' => $data,
		   'rows' => $rows,
		   'num_pages' => $num_pages,
		   'cur_page' => $this->params[2],
		   'page' => 0,
		   'smile' => $smiles
		   
         ]);
		
    }  

	public function action_add(){
        $mMessages = Model::instance();
		
		if(count($_POST) > 0) {
			$name = $_POST['name'];
			$text = $_POST['text'];
			
			$obj = compact("name", "text");
			
			$valid = new Validation($obj, $mMessages->validationMap());
            $valid->execute('add');
			
			if($valid->good()){   
                $mMessages->add($valid->cleanObj());
                header("Location: /admin/guestbook");
                exit();
            }
            else{
                $errors = $valid->errors();
				$msg = implode('<br>', $errors);
            }
        }
        else{
            $name = '';
            $text = '';
			$msg = "Пожалуйста, добавьте Ваше сообщение:";
            $errors = [];
        }
    
        $this->title = 'добавление сообщения';
		
        $this->content = System::template('v_guestbook_add.php', [
            'name' => $name,
            'text' => $text,
			'msg' => $msg
        ]);
    }
	
	public function action_edit(){
		$mMessages = Model::instance();
        $message = $mMessages->one($this->params[2]);
		
		if($message == null) {
			throw new Exceptions\E404("Message with id {$this->params[2]} is not found");
		}
		else {
			$this->title = 'Редактировать страницу' . $message['id_message'];
			$msg = "Пожалуйста, отредактируйте сообщение.";
			
			$this->content = System::template('v_guestbook_edit.php', [
							'name' => $message['name'],
							'text' => $message['text'],
							'msg' => $msg
						]);			
			
			
			if(count($_POST) > 0) {
				$name = $_POST['name'];
				$text = $_POST['text'];
				
				$obj = compact("name", "text");
			
				$valid = new Validation($obj, $mMessages->validationMap());
				$valid->execute();
			
				if($valid->good()){   
					$mMessages->edit($this->params[2], $valid->cleanObj());
					header("Location: /admin/guestbook");
					exit();
				}
				else{
					$errors = $valid->errors();
					$msg = implode('<br>', $errors);
				}
				
				$this->content = System::template('v_guestbook_edit.php', [
						'name' => $name,
						'text' => $text,
						'msg' => $msg
					]);		
			}	
		}
	}

	public function action_delete(){
		$mMessages = Model::instance();
        $message = $mMessages->one($this->params[2]);
		
		if($message === null) {
			throw new Exceptions\E404("message with id {$this->params[2]} is not found");
		}
		else {
			$mMessages->delete($this->params[2]);
			header("Location: /admin/guestbook");
			exit();	
		}
	}
}	
	
