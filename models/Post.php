<?php

  class Post {
      // DB stuff
      private $conn;
      private $table = 'post';

      // post properties
      public $id;
      public $category_id;
      public $title;
      public $body;
      public $author;
      public $created_at;
     

      // Constructor with DB
      public function __construct($db){
          $this->conn = $db;
      }

      // Get Posts
      public function read(){

        // create query 
        $query = 'SELECT * FROM ' . $this->table;

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
      }

      //read a single post
      public function read_single(){

        // create query
        $query = 'SELECT * FROM ' . $this->table . ' p WHERE p.id = ? ';

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1,$this->id);

        //execute the query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];

      }

      // Create Post
      public function create(){
        // Create Query
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title,body = :body,author = :author,category_id = :category_id';


        // prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        //bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        
        // execute query
        if($stmt->execute()){
          return true;
        }

        // print error if something goes wrong
        printf("Error: %s.\n",$stmt->error);

        return false;
      }



            // update Post
            public function update(){
              // Create Query
              $query = 'UPDATE ' . $this->table . ' SET title = :title,body = :body,author = :author,category_id = :category_id WHERE id = :id';
      
              // prepare statement
              $stmt = $this->conn->prepare($query);
      
              //clean data
              $this->title = htmlspecialchars(strip_tags($this->title));
              $this->body = htmlspecialchars(strip_tags($this->body));
              $this->author = htmlspecialchars(strip_tags($this->author));
              $this->category_id = htmlspecialchars(strip_tags($this->category_id));
              $this->id = htmlspecialchars(strip_tags($this->id));

              //bind data
              $stmt->bindParam(':title', $this->title);
              $stmt->bindParam(':body', $this->body);
              $stmt->bindParam(':author', $this->author);
              $stmt->bindParam(':category_id', $this->category_id);
              $stmt->bindParam(':id', $this->id);

              // execute query
              if($stmt->execute()){
                return true;
              }
      
              // print error if something goes wrong
              printf("Error: %s.\n",$stmt->error);
      
              return false;
            }


            // delete post
            public function delete(){
              //create query
              $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

              // prepare statemnet
              $stmt = $this->conn->prepare($query);

              // clean data
              $stmt->bindParam(':id', $this->id);
             
              // execute query
              if($stmt->execute()){
                return true;
              }
      
              // print error if something goes wrong
              printf("Error: %s.\n",$stmt->error);
      
              return false; 
            }
  }

?>