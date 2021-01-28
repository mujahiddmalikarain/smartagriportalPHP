<?php 
  session_start();
  $path = '';
  $DBServer='localhost';
  $DBUser='root';
  $DBPass='';
  $DBName='ieeercs';
  $db=mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
  $conn1 = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName) or die("Connection failed: " . mysqli_connect_error());
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
	function sanitizeData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }
    function sanitizeDataDesc($data) {
		$data = trim($data);
		$data = stripslashes($data);
		return $data;
	}
	function getMemberId($email,$db)
	{
        $sql="select id from users where email='".$email."';";
        $result = mysqli_query($db,$sql);
        $product_array = mysqli_fetch_assoc($result);
        return $product_array['id'];
  }
  function getDetails($id,$db)
  {
    $sql="select * from users where id='".$id."';";
        $result = mysqli_query($db,$sql);
        $product_array = mysqli_fetch_assoc($result);
        return $product_array['name'];
  }   
  
     function getUserRegById($user,$event,$db)
    {
        $sql="Select count(ID) as reg from event_reg where user_id='".$user."' and event_id='".$event."'";
        $result = mysqli_query($db,$sql);
        $p = mysqli_fetch_assoc($result);
        if(!empty($p['reg']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function ago($time) { 
        $timediff=time()-strtotime($time); 
        $days=intval($timediff/86400);
        $remain=$timediff%86400;
        $hours=intval($remain/3600);
        $remain=$remain%3600;
        $mins=intval($remain/60);
        $secs=$remain%60;
        
        $timestring='just now';
        if ($secs>=0) { $timestring = $secs." sec".($secs == 1 ? '' : 's')." ago"; }
        if ($mins>0) { $timestring = $mins." min".($mins == 1 ? '' : 's')." ago"; }
        if ($hours>0) { $timestring = $hours." hour".($hours == 1 ? '' : 's')." ago"; } 
        if ($days>0) { $timestring = $days." day".($days == 1 ? '' : 's')." ago"; }
        if ($days>28) { $timestring = date('F h, Y',strtotime($time));}
        return $timestring; 
    }

?>