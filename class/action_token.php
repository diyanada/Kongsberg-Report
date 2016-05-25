<?php 
class action_token{
	public function get_token_admin(){
	
		if(isset($_SESSION['userid'])){
		$milliseconds = strtotime("now");
		return $milliseconds + ($this->encryptid( $_SESSION['userid'] ));
		}
		else {
		return "00000000000000000";
		}
	}
	
	public function encryptid( $q ) {
    $qEncoded  = round($q * 1675 / 415 + 36453 * 16734);
    return( $qEncoded );
	}

	
	
	public function admin_access($token){
	
		
		$milliseconds = strtotime("now");
		
		
		if(isset($_SESSION['userid'])) $kon_token = $token -  $this->encryptid( $_SESSION['userid'] );
		else return false;
		
		
		if (($milliseconds - 120) < $kon_token  &&  $kon_token < $milliseconds + 120) return true;
		else return false;
		
	}
	

}
?>