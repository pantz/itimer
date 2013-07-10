<?php

namespace Uploader
{
	use \Exception;

	class Uploader 
	{
		protected static $uploadPath;

		public function __construct()
		{
			
		}

		public static function setup($keys)
		{
			if(isset($keys['basepath']))
				self::$uploadPath = $keys['basepath'].'uploads/';
			
		}

		public static function upload($key)
		{
			if(!isset($_FILES) || empty($_FILES))
			{
				throw new Exception('NoFilesException');
			}
			else
			{
				$files = $_FILES;
				$destinationPath = self::$uploadPath;

				if(!file_exists($destinationPath))
					mkdir($destinationPath);

				$result = self::realUpload($key, $files, $destinationPath);
				return $result;
			}
			return false;
		}

		private static function get_file_extension($filename)
		{
			if(isset($filename))
			{
				$fnparts = explode('.', $filename);
				return $fnparts[count($fnparts)-1];
			}
			return false;
		}

		private static function realUpload($key, $files, $destination)
		{			
			if (!empty($files) && $files[$key]['tmp_name'] !== '') {
				$file = $files[$key]['tmp_name'];
				$name = $files[$key]['name'];

				$token = md5_file($file);
				$ext = self::get_file_extension($name);
				$tempfn = $token.'.'.$ext;
				
				//If the hash is 'abcdef1234567890' you would store it as 'a/b/abcdef1234567890'
				//@link http://stackoverflow.com/a/900528/2051650
				$first = $tempfn[0];
				if(!file_exists($destination.$first))
					mkdir($destination.$first);

				$second = $tempfn[1];
				if(!file_exists($destination.$first.'/'.$second))
					mkdir($destination.$first.'/'.$second);

				$filepath = $first.'/'.$second.'/'.$tempfn;
				move_uploaded_file($file, $destination.$filepath);

				return $filepath;
			}
		}

	}
}
