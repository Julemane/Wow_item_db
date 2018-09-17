<?php
class Item{

      private $itemData;
      private $name;
      private $description;
      private $icon;
      private $dropId;
      private $itemClass;


      function __construct($itemId){
        $apiReq = file_get_contents('https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3');
        $this->itemData = json_decode($apiReq, true);
        $this->name = $this->itemData['name'];
        $this->description = $this->itemData['description'];
        $this->itemClass = $this->itemData['itemClass'];

      }
      //return all Item's data
      public function getData(){
        return $this->itemData;
      }
      //return Item Name
      public function getItemName(){
        return $this->name;
      }

      public function getDescription(){
        return $this->description;
      }

      public function getItemClass(){
        return $this->itemClass;
      }





}
