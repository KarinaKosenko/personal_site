<?php

namespace Core;

class dateCorrector{
	
	public function correctDay($day){
		if(($day % 10 >= 11 && $day % 10 <= 14) || ($day % 100 >= 11 && $day % 100 <= 14)){
			$append = 'дней';
		}
		elseif($day % 10 == 1 || $day % 100 == 1){
			$append = 'день';
		}
		elseif(($day % 10 >= 2 && $day % 10 <= 4) || ($day % 100 >= 2 && $day % 100 <= 4)){
			$append = 'дня';
		}
		else{
			$append = 'дней';
		}
		
		return $day . ' ' . $append;
	}	
}