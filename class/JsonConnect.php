<?php

class jsonConnect {

  public function getItem($itemId){
    $item = file_get_contents('https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3');
    var_dump($item);
    return $item;

  }
}
