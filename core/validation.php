<?php
 
namespace Core; 

use Core\Sql;   

class Validation{ 
	protected $pk;
    protected $obj;
    protected $rules;
    protected $errors;
    protected $clean_obj;
    
    public function __construct($obj, $rules){
		$this->db = Sql::instance();
        $this->obj = $obj;
        $this->rules = $rules;
        $this->errors = [];
    }
    
    public function execute(){
        foreach($this->obj as $k => $v){
            $value = trim($v);
        
            if(in_array($k, $this->rules['not_empty']) && $value == ''){
                $this->errors[] = "Поле $k не может быть пустым.";
            }
            elseif(isset($this->rules['min_length'][$k]) && 
                    strlen($value) < $this->rules['min_length'][$k]){
                $this->errors[] = "Поле $k не может быть меньше {$this->rules['min_length'][$k]}.";
            }
			elseif(isset($this->rules['max_length'][$k]) && 
                    strlen($value) > $this->rules['max_length'][$k]){
                $this->errors[] = "Поле $k не может быть больше {$this->rules['max_length'][$k]}.";
            }
			elseif(in_array($k, $this->rules['unique']) && $this->one($this->rules['table'], $k, $value) != false){
				$this->errors[] = "Такое значение поля $k уже существует.";
			}
            else{
				if(!in_array($k, $this->rules['html_allowed'])){
					$value = htmlspecialchars($value);
				}
                
				$this->clean_obj[$k] = $value;
            }
        }
    }
    
    public function good(){
        return count($this->errors) == 0;
    }
    
    public function cleanObj(){
        return $this->clean_obj;
    }
    
    public function errors(){
        return $this->errors;
    }
}