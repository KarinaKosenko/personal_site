<?php

namespace C\Client;

use M\Messages as Model;
use M\Navigation;
use M\Smiles_manager;
use core\Validation;
use Core\System;

class Guestbook extends Client{
    
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
		   
        $this->content = System::template('v_guestbook_client.php', [
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
                header("Location: /guestbook");
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
}	
	
