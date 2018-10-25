<?php
/*********************************************************************************
 *  Fill ThingSpeak Data
 * ...\custom\Extension\modules\Schedulers\Ext\ScheduledTasks\ThingSpeak.php
 ********************************************************************************/
/**
 * Set up an array of Jobs with the appropriate metadata
 * 'jobName' => array (
 *         'X' => 'name',
 * )
 * 'X' should be an increment of 1
 * 'name' should be the EXACT name of your function
 *
 * Your function should not be passed any parameters
 * Always  return a Boolean. If it does not the Job will not terminate itself
 * after completion, and the webserver will be forced to time-out that Job instance.
 * DO NOT USE sugar_cleanup(); in your function flow or includes.  this will
 * break Schedulers.  That function is called at the foot of cron.php
 *
 */

/**
 * This array provides the Schedulers admin interface with values for its "Job"
 * dropdown menu.
 */
$func = 'ThingSpeak';
$job_strings[] = $func;
$mod_strings['LBL_'.strtoupper($func)] = $func;

/**
 * This is the code for the "Job"
 */
function ThingSpeak() {
//  Version: 
    $GLOBALS['log']->info("----->Scheduler fired job of type ThingSpeak()");

    $typ = "GET";
    $typ = "POST";

	$drehzahl = rand(2000,4600);
    $temperatur = rand(20,56);
		
	$url = "https://api.thingspeak.com/update.json";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  // wichtig
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // wichtig
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv: 1.9.0.8) Gecko/2009032609 Firefox/3.0.8 (.NET CLR 3.5.30729)');

    if ($typ=="GET")
    {	
    	$url.= "?api_key=WKX5LK0XZ9URVNJ6";
    	$url.= "&field1=".$temperatur;
    	$url.= "&field2=".$drehzahl;
    }else{
        $params = array(
    	   "api_key" => "WKX5LK0XZ9URVNJ6",
    	   "field1" => $temperatur,
           "field2" => $drehzahl,
    	);
        curl_setopt($ch, CURLOPT_POST, 1);
        $jsonEncodedData = json_encode($params);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonEncodedData);
    }	

	curl_setopt($ch, CURLOPT_URL, $url);
	
	$CURLContent = "";
	if($data = @curl_exec($ch)) {
		$CURLContent = $data;
	}
	curl_close($ch);
//	$XMLContent = explode("\n",$CURLContent);
	$GLOBALS['log']->info("CURLContent=".print_r($CURLContent,true));
	
    $GLOBALS['log']->info("----->Scheduler ended job of type ThingSpeak()");

    return true;
}

?>