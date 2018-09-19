<?php

/*$setLocal = '?locale=fr_FR&';
$apiKey = 'ku2wn4dac3gcfeb7vjubk927g2bmsfn3';
$urlBase = 'https://eu.api.battle.net';
$class = '/wow/item/';
$itemId = '18803';

$data = file_get_contents('https://eu.api.battle.net/wow/item/18803?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3');
$item = json_decode($data);*/
require_once('class/Item.php');
require_once('class/JsonConnect.php');

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

for($itemId = 1175; $itemId <= 1190; $itemId++){

    $url = 'https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3';
    $headers = get_headers($url);

    $aHeader = parseHeaders($headers);
    if ($aHeader['reponse_code']==404)
      $test='erreur';

    else {

    $item = new Item($itemId);
    $itemName = $item->getItemName();
    $itemClass = $item->getItemClass();
    echo $itemId.' '.$itemName.'</br>';
    }



}





