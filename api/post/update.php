<?php
   



   // Headers
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

   include_once '../../config/Database.php';
   include_once '../../models/Post.php';
   

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();


   // Instantiate blog post object
   $post = new Post($db);
 
    //getting raw data
    $post->id = $_GET['id'];
    $post->title = $_POST['title'];
    $post->body = $_POST['body'];
    $post->author = $_POST['author'];
    $post->category_id = $_POST['category_id'];

   // create post
   if($post->update()){
    echo json_encode(
        array('message' => 'Post updated')
    );    
   }else{
        echo json_encode(
            array('message' => 'Post Not updated')
        );   
   }
?>