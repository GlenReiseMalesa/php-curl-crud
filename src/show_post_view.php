<?php


//reading a single post
    $id = $_GET["id"];//getting data from the url

    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "http://localhost/php-api-practice/api/post/read_single.php?id=$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);
 
    $data = json_decode($response,true);

//reading a single post
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
  </head>
  <body>


    <ul class="list-group">
        <li class="list-group-item"><?= $data['id'] ?></li>
        <li class="list-group-item"><?= $data['title'] ?></li>
        <li class="list-group-item"><?= $data['body'] ?></li>
        <li class="list-group-item"><?= $data['author'] ?></li>
    </ul>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>