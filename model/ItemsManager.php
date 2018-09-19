<?php
require_once("class/Manager.php");

class ItemsManager extends Manager
{
  public function fillDb($itemId, $itemName){

    $db = $this->dbConnect();
    $item =  $db->prepare('REPLACE INTO items (id, item_name) VALUES (?, ?)');
    $affectedLines = $item->execute(array($itemId, $itemName));
    return $affectedLines;
  }


}
