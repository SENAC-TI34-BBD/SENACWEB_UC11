<?php

/*
    Author:- Vivek Kumar
    Date:- 2019-04-09
    Purpose:- User Class to manage actions: Login and SignUp with user details.
*/

class User
{
  // database connection and table name
  private $conn;
  private $table_name = "users_login";

  // object properties
  public $user_id;
  public $username;
  public $password;

  // constructor with $db as database connection
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // login user method
  function login()
  {
    // select all query with user inputed username and password
    $query =
      "SELECT
                    `user_id`, `name`, `username`, `password`, `picture`
                FROM
                    " .
      $this->table_name .
      " 
                WHERE
                    username='" .
      $this->username .
      "' AND password='" .
      $this->password .
      "'";
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // execute query
    $stmt->execute();
    return $stmt;
  }
}
