<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'myinput';

    // Properties
    public $id;
    public $todos;
    public $date;
    public $username;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
     // echo $this->username;
      $query = 'SELECT
        id,
        todos,
        date
              FROM
        ' . $this->table .' WHERE username="'.$this->username.'"';

      // Prepare statement
      $stmt = $this->conn->prepare($query);     
      // Execute query
      $stmt->execute();

      return $stmt;
    }


  // Create Category
  function create(){

    
    $query = "INSERT INTO
                " . $this->table . "
            SET
                todos=:todos, date=:date, username=:username";
   
 
    
    $stmt = $this->conn->prepare($query);
 
    
    $this->todos=htmlspecialchars(strip_tags($this->todos));
    
    $this->date=htmlspecialchars(strip_tags($this->date));

    $this->username=htmlspecialchars(strip_tags($this->username));
 
  
    $stmt->bindParam(":todos", $this->todos);
   
    $stmt->bindParam(":date", $this->date);
 
    $stmt->bindParam(":username", $this->username);
  
    if($stmt->execute()){

        return true;
    }
 
    return false;
     
}
  // Update Category
  public function update() {
    // Create Query
    $query = "UPDATE ' .
      $this->table . '
    SET
      todos = :todos,
      date =date,
      WHERE
      id = :id";

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->todos = htmlspecialchars(strip_tags($this->todos));
  $this->date = htmlspecialchars(strip_tags($this->date));
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt-> bindParam(':todos', $this->todos);
  $stmt-> bindParam(':date', $this->date);
  $stmt-> bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(1, $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  

public function deleteAll() {
    // Create query
    $query = "DELETE FROM " . $this->table . ' WHERE username="'.$this->username.'"';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(1, $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }