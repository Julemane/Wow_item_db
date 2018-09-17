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


for($itemId = 1175; $itemId <= 1178; $itemId++){

  $item = new Item($itemId);

  $itemName = $item->getItemName();
  $itemClass =$item->getItemClass();


  echo $itemId.' '.$itemName.' '.$itemClass.'</br>';


}





