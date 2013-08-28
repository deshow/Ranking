<?php
class AD extends CApplicationComponent{
	
	function checkLDAP($username, $password){

		$objConnection = ldap_connect('10.2.1.103', 389) or die('could not connect Active-Directory.');
		ldap_set_option($objConnection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('could not set protocol-version...');
		$rs = false;
		if ($objConnection) {
			$tmp = @ldap_bind($objConnection, $username.'@jp.co.square-enix.com',$this->escapeRegexp($password));
			if ($tmp) {
				$rs = $tmp;
			}
		}
		ldap_unbind($objConnection);
		return $rs;
	}

	function escapeRegexp($str)
	{
		$str = str_replace('\\\\', '\\', $str);
		$str = str_replace('\\*', '*', $str);
		$str = str_replace('\\+', '+', $str);
		$str = str_replace('\\.', '.', $str);
		$str = str_replace('\\?', '?', $str);
		$str = str_replace('\\(', '(', $str);
		$str = str_replace('\\)', ')', $str);
		$str = str_replace('\\{', '{', $str);
		$str = str_replace('\\}', '}', $str);
		$str = str_replace('\\[', '[', $str);
		$str = str_replace('\\]', ']', $str);
		$str = str_replace('\\^', '^', $str);
		$str = str_replace('\\$', '$', $str);
		$str = str_replace('\\|', '|', $str);
		$str = str_replace('\\"', '"', $str);
		$str = str_replace("\\'", "'", $str);
		return $str;
	}
}
?>