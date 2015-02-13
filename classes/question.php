<?php

  class Question {
      
      private $text;
      private $lines;
      private $points;
      private $title;
      private $author;
      private $allowed_time;
      
      function __construct($text,$lines,$points,$title,$author,$allowed_time){
          $this->text = $text;
          $this->lines = $lines;
          $this->points = $points;
          $this->title = $title;
          $this->author = $author;
          $this->allowedtime = $allowed_time;
      }
      
      function getText(){
          return $this->text;
      }
      
      function getHTML(){
        $html = "<hr/><h1>". $this->text . "</h1>";
        return $html;
      }
  }  
    
?>