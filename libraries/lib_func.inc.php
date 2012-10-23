<?php
	//������� ���������� �����
	function clearData($data,$type="s"){
		switch ($type){
			case "s": 
				return mysql_real_escape_string(trim(strip_tags($data)));
			break;
			case "i": 
				return (int)$data;
			break;
		}
	}
	//�������� ����������� � ����
	function save_session($login, $pass){
		$_SESSION["login"] = $login;
		$_SESSION["pass"] = $pass;
		$_SESSION["on"] = "on";
		$_SESSION["date"] = date('Y-m-d,H-i-s');		
	}
	//�������� ����������� � ����
	function save_session_role($uid, $rid){
		$_SESSION["uid"] = $uid;
		$_SESSION["rid"] = $rid;
	}
	//������� ����
	function destroy_sesion(){
		session_destroy();
		return true;
	}
	//�������� �������� email
	function valid_email($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	//���� �������
	function show_error($array_error){
		//echo "<ul>";
			foreach ($array_error as $error){
				//echo "<li>";
					echo $error;
				//echo "</li>";
			}
		//echo "</ul>";
	}
	//������� ��������� �������� � �������
	function remove_dir($dir, $del_dir){
		if ($d = @opendir($dir)){
			while (false !== ($name = readdir($d))){
				if($name == "." or $name == ".."){
					continue;
				}
				if(is_dir($name)){
					continue;
				}else{
					unlink ($dir."/".$name);
				}
			}
			if($del_dir == "del_dir"){
				rmdir($dir);
			}
			return true;
		}else{
			return false;
		}
	}
	//��������� ���� ����� � ����� 
	function name_file($dir){
		if ($d = @opendir($dir)){
			while (false !== ($name = readdir($d))){
				if($name == "." or $name == ".."){
					continue;
				}
				if(is_dir($name)){
					continue;
				}else{
					return $name;
				}
			}
		}
	}
	//������� ��������
	function create_image(){
		header ('Content-Type: image/png');
		$im = imagecreatetruecolor(150, 150);
		$grey = imagecolorallocate($im, 210, 210, 210);
		$black = imagecolorallocate($im, 170, 170, 170);
		imagefilledrectangle($im, 0, 0, 150, 150, $grey);
		$text = 'no foto...';
		$font = '../images/fonts/arial.ttf';
		imagettftext($im, 18, 0, 37, 80, $black, $font, $text);
		imagepng($im);
		imagedestroy($im);
	}
?>