<?php

	/**
	*	Class App
	*	---------
	* 	Here are all the extra features.
	*	-----------------------------------------------------
	*	Copyright 2018 Maxim Poddubny (poddubny1425@gmail.com)
	**/

	class App
	{
		public static function redirect($url)
		{
			header('Location: '.$url);
		}

		public static function redirect_referer($url)
		{
			if (isset($_SERVER['HTTP_REFERER']))
				$url = $_SERVER['HTTP_REFERER'];
			App::redirect($url);
		}

		public static function getURL()
		{
			if (!(empty($_SERVER['REQUEST_URI'])))
			{
				$url = trim($_SERVER['REQUEST_URI'], '/');
			}
			return ($url);
		}

		public static function getClean($value)
		{
			$value = trim($value);
			$value = stripslashes($value);
			$value = htmlspecialchars($value);
			return ($value);
		}

		public static function getCleanArray($value = [])
		{
			$result = [];
			foreach ($value as $key => $data)
			{
				$result[$key] = trim($data);
				$result[$key] = stripslashes($data);
				$result[$key] = htmlspecialchars($data);
			}
			return ($result);
		}

		public static function generateHash($length=6)
		{
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
			$code = "";
			$clen = strlen($chars) - 1;  
			while (strlen($code) < $length)
			{
					$code .= $chars[mt_rand(0,$clen)];  
			}
			return $code;
		}

		public static function SaveSession($id, $hash)
		{
			if (count($_SESSION) == 2 && isset($_SESSION['id'], $_SESSION['hash']))
			{
				unset($_SESSION['id']);
				unset($_SESSION['hash']);
			}
			$_SESSION['id'] = $id;
			$_SESSION['hash'] = $hash;
			return (1);
		}

		public static function clearSession($url = '/')
		{
			if (isset($_SESSION['id'], $_SESSION['hash']))
			{
				if (isset($_SESSION['FBRLH_state']))
					unset($_SESSION['FBRLH_state']);
				unset($_SESSION['id']);
				unset($_SESSION['hash']);
			}
			App::redirect($url);
		}

		public static function sendEmail($email, $subject, $message)
		{
			$encoding = "utf-8";
			$from_name = "Matcha";
			$from_mail = "support@matcha.com";
			$subject_preferences = array(
				"input-charset" => $encoding,
				"output-charset" => $encoding,
				"line-length" => 76,
				"line-break-chars" => "\r\n"
			);

			$header = "Content-type: text/html; charset=".$encoding." \r\n";
			$header .= "From: ".$from_name." <".$from_mail."> \r\n";
			$header .= "MIME-Version: 1.0 \r\n";
			$header .= "Content-Transfer-Encoding: 8bit \r\n";
			$header .= "Date: ".date("r (T)")." \r\n";
			$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);
			if (mail($email, $subject, $message, $header))
				return (1);
			return (0);
		}

		public static function performCurl($url, $params = false, $headers = false)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			if ($params)
			{
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
			}
			if ($headers)
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			curl_close ($ch);
			return ($result);
		}

		public static function debug($param)
		{
			echo '<pre>';
			var_dump($param);
			echo '</pre>';
		}

		// public static function require_all($dir, $depth = 0, $cur_depth = 0)
		// {
		// 	$scan = glob("$dir/*");
		// 	foreach ($scan as $path) {
		// 		if (is_dir($path) && $cur_depth < $depth) {
		// 			App::require_all($path, $depth, ++$cur_depth);
		// 		} elseif (preg_match('/\.php$/', $path)) {
		// 			require_once $path;
		// 		}
		// 	}
		// }

		// public static function include_all($type = 'css', $filename, $files = [])
		// {
		// 	if (file_exists(DIR . "/assets/$type/" . "$filename.$type"))
		// 		$files[] = "$filename.$type";
		// 	foreach ($files as $val)
		// 		if ($type == 'css')
		// 			echo "<link rel='stylesheet' type='text/css' href='../assets/css/$val'>";
		// 		elseif ($type == 'js')
		// 			echo "<script type='text/javascript' src='../assets/js/$val'></script>";
		// }
	}

?>
