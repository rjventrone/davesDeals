<?php  

require('workflow.php');

/**
* Name:         Woot
* Description:  This PHP class to call Dave deals and see if a item has been posted
* Author:       Robert Ventrone
* Revised:      01/10/2016
* Version:      1.0.0
*
*
* things to do:
*/

class DaveDeals {
  public $url;
  public $keyword;

  function __construct() {
    $this->alfred = new Workflows();     
  }


}


/* gets the data from a URL */
function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$davesDelas = json_decode( get_data('http://www.saddlebackleather.com/api/items?include=facets&fieldset=search&language=en&country=US&currency=USD&pricelevel=5&n=3&category=Home%2Fdaves-deals&limit=24&offset=0') );

// print_r($davesDelas);

foreach ($davesDelas->items as $key => $item) {

  if (stripos($item->storedisplayname2,'front') !== false) {
    print_r($item->storedisplayname2 .' '. $item->pricelevel1_formatted . "\xA") ;
  }
  
}

?>