<?php
	function encrypt_param($param){
		$CI =& get_instance();
		return strtr($CI->encrypt->encode($param), '+/', '-_');
	}

	function decrypt_param($param){
		$CI =& get_instance();
		$param = strtr($param, '-_', '+/');
		$param = $CI->encrypt->decode($param);
		return $param;
	}

?>