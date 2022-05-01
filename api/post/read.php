<?php
   
   // Headers
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');

   include_once '../../config/Database.php';
   include_once '../../models/Post.php';

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();


   // Instantiate blog post object
   $post = new Post($db);

   // blog post query
   $result = $post->read();

   // get row count
   $num = $result->rowCount();

   // check if there are posts
   if($num > 0){
       
      // post array
      $posts_arr = array();
      
      
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
          extract($row);

          $post_item = array(
              'id' => $id,
              'title' => $title,
              'body' => html_entity_decode($body),
              'author' => $author,
              'category_id' => $category_id
          );

          // push to "data"
          array_push($posts_arr, $post_item);          
      }

      // turn to JSON & output
      echo json_encode($posts_arr);

   }else{
      // no post
      echo json_encode(
          array('message' => 'No Posts Found')
      ); 
   }

?>