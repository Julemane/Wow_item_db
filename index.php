<?php
require_once('class/Item.php');
require_once('class/JsonConnect.php');
require_once('model/ItemsManager.php');

$itemIdStart = 200;
$itemIdEnd = 1000;
$itemError = 0;

//Manage inexisting item'sIDs
 function parseHeaders($headers){
  $head = array();
    foreach( $headers as $k=>$v ){
      $t = explode( ':', $v, 2 );
      if( isset( $t[1] ) )
      $head[ trim($t[0]) ] = trim( $t[1] );
      else{
        $head[] = $v;
        if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) )
        $head['reponse_code'] = intval($out[1]);
      }
    }
  return $head;
  }

if(time_nanosleep(0, 200000000) === true) {
    for($itemId = $itemIdStart; $itemId <= $itemIdEnd; $itemId++){

      $url = 'https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3';
      $headers = get_headers($url);

      $aHeader = parseHeaders($headers);
      if ($aHeader['reponse_code']==404){
        $itemError++;
      }else{
        $item = new Item($itemId);
        $itemClass = $item->getItemClass();

        if($itemClass == 2 OR $itemClass == 4){
          $itemName = $item->getItemName();
          $itemManager = new ItemsManager();
          $affectedLines = $itemManager->fillDb($itemId, $itemName);
        }else{
          $itemError++;
        }
      }
    }
echo"Upload terminer de"." ".($itemId - $itemError)." "."Item(s)";
}








