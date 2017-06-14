<?php
//if(!defined('RESTRICTED'))exit('No direct script access allowed!');

class Database
{
  protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=db_ongisschool', 'root', '');
  }
}
