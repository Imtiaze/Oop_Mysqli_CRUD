<?php
include 'config.php';

class Database {
  public $host   = DB_HOST;
  public $user   = DB_USER;
  public $pass   = DB_PASS;
  public $dbname = DB_NAME;

  public $link;
  public $error;

  public function __construct() {
    $this->connectDB();
  }

  public function connectDB() {
    $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    if(!$this->link) {
      $this->error = 'Connection fail'.$this->link->connect_error;
      return false;
    }
    // another way
    // if ($this->link->connect_error) {
    //   $this->error = "Connection fail ".($this->link)->connect_error;
    // }
  }

  public function select($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result) {
      return $result;
    }
    else {
      return false;
    }
  }

  public function insert($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result) {
      header("Location: index.php?msg=".urlencode('Data Inserted successfully.'));
      exit();
    }
    else {
      die("Error :(".$this->link->errno.")".$this->link->error);
    }
  }

  public function edit($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result) {
      return $result;
    }
    else {
      return false;
    }
  }

  public function update($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result) {
      header("Location:index.php?msg=".urlencode('Data Updated successfully!'));
      exit();
    }
    else {
      return false;
    }
  }
  public function delete($query) {
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result) {
      header("Location:index.php?msg=".urlencode('Data Deleted successfully!'));
      exit();
    }
    else {
      return false;
    }
  }

}
