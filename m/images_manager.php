<?php

namespace M;

class Images_manager{
	use \Core\Traits\Singleton;
	
	public function upload_file($file, $filename, $upload_dir = '../photos', $allowed_types = ['image/png','image/x-png','image/jpeg','image/webp','image/gif']){

		  $blacklist = array(".php", ".phtml", ".php3", ".php4");
		  
		  $ext = substr($filename, strrpos($filename,'.'), strlen($filename)-1); // В переменную $ext заносим расширение загруженного файла.
		  
		  if(in_array($ext, $blacklist)){
			return ['error' => 'Запрещено загружать исполняемые файлы'];
		  }

		  $upload_dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR; // Место, куда будут загружаться файлы.
		  $max_filesize = 8388608; // Максимальный размер загружаемого файла в байтах (в данном случае он равен 8 Мб).
		  $prefix = date('Ymd-is_');
		  $new_filename = uniqid() . $ext; // В переменную $filename заносим точное имя файла.

		  if(!is_writable($upload_dir)){ // Проверяем, доступна ли на запись папка, определенная нами под загрузку файлов.
			return ['error' => 'Невозможно загрузить файл в папку "'.$upload_dir.'". Установите права доступа - 777.'];
		  }
		  elseif(!in_array($file['type'], $allowed_types)){
			return ['error' => 'Данный тип файла не поддерживается.'];
		  }
		  elseif(filesize($file['tmp_name']) > $max_filesize){
			return ['error' => 'файл слишком большой. максимальный размер ' . intval($max_filesize/(1024*1024)).'мб'];
		  }
		  elseif(!move_uploaded_file($file['tmp_name'], $upload_dir . $new_filename)){// Загружаем файл в указанную папку.
			return ['error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.'];
		  }
			
		  return ['filename' => $new_filename, 'basename' => $filename];
	}
}