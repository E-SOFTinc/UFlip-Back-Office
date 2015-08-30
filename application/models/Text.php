<?php
class Text extends Inf_Model
{
  public function __construct()
    {
   
                    parent::__construct();
    }
  
/**
 * Removes all punctuation characters.
 *
 * @param	string	$str
 * @retunr	string
 */

public function stripPunct($str)
{
	return preg_replace ("@([[:punct:]])*?@i", "", $str);
}

/**
 * Removes all punctuation characters, and modifies the
 * passed string to camelcase.
 *
 * @param	string	$str
 * @retunr	string
 */
public function camelCase($str)
{
	$phrase = stripPunct($str);
	$phrase = trim($phrase);
	$phrase	= ucwords(strtolower($phrase));
	$phrase[0]= strtolower($phrase[0]);
	$phrase = preg_replace("@(\s*?)@i", "", $phrase);

	return $phrase;
}


/**
 * Removes all punctuation characters and replaces the
 * spaces with dashes.
 *
 * @param	string	$str
 * @retunr	string
 */
public function dashed($str)
{
    $phrase = strip_punct($str);
	$phrase = trim($phrase);
	$phrase = strtolower($phrase);

	return preg_replace("@[ ]+@", "-", $phrase);
}
//Emcrypt A String Text to base64_encode
public function getEncrypt($string)
{
  $key ="EASY1055MLM!@#$";
  $result = '';
  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)+ord($keychar));
    $result.=$char;
  }

  return base64_encode($result);
}
//Decrypt A String Text to base64_decode
public function getDecrypt($string)
{
  $key ="EASY1055MLM!@#$";
  $result = '';
  $string = base64_decode($string);

  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }

  return $result;
}

// Genarate Random User Name 
public  function str_rand ($minlength,$maxlength,$append='',$field='',$table='pin_numbers', $useupper=true, $usespecial=false, $usenumbers=true)
	{
      $key ="";
      $charset="";
     if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      if ($usenumbers) $charset .= "0123456789";
     //if ($usespecial) $charset .= "~@#$%^*()_+-={}|]["; // Note: using all special characters this reads: "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./";
      if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
      else $length = mt_rand ($minlength, $maxlength);
      for ($i=0; $i<$length; $i++) 
	  $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
      $key =$append.$key;
	  $randum_number =  $key;
	// echo "heeeeeee".$table;
	   if($table=='pin_numbers')
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
                                     $table=$this->table_prefix.$table;
                                   
				 }
	
                                 
            $this->db->select('*');
            $this->db->where('pin_numbers', $randum_number);
            $this->db->from('pin_numbers');
            $query = $this->db->get();
            $count = $query->num_rows();                   
                                 
     /*$query = "SELECT * FROM $table WHERE $field = '$randum_number'";
     // echo $query;
      $result = mysql_query($query)or die("Error getting random string in text".mysql_error());*/
      if(!$count)
      return $key;
      else
      $this->str_rand($minlength,$maxlength,$append,$field,$table);
      }

   function breakString($string, $len, $break_char = '-') {
    $l = 0;
    $output = '';
    for ($i=0, $n=strlen($string); $i<$n; $i++) {
      $char = substr($string, $i, 1);
      if ($char != ' ') {
        $l++;
      } else {
        $l = 0;
      }
      if ($l > $len) {
        $l = 1;
        $output .= $break_char;
      }
      $output .= $char;
    }

    return $output;
  }	  
  
  
    // Function to get IP address
  function getIPAddress() 
  
  {
    if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
    } else {
      if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
      } elseif (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
      } else {
        $ip = getenv('REMOTE_ADDR');
      }
    }

    return $ip;
  }
}