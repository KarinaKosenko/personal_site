<?php

namespace C\Client;

use Core\System;

class Pages extends Client{
   public function show404(){
        header("HTTP/1.1 404 Not Found");
        $this->title = 'Ошибка 404'; 
        $this->content = System::template('v_404.php');
    }
    
    public function show503(){
        // header 404
        $this->title = 'Ошибка 503'; 
        $this->content = System::template('v_503.php');
    }
}
