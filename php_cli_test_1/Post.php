<?php

class Post {
  public $title;

  public function __construct($title){
    $this->setTitle($title);
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function getTitle(){
    return ucfirst($this->title);
  }
}

?>