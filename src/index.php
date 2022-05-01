<?php


//reading the posts
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "http://localhost/php-api-practice/api/post/read.php/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);
 
    $data = json_decode($response,true);
//reading the posts
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
  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">body</th>
      <th scope="col">author</th>
    </tr>
  </thead>
  <tbody>
    
  <?php //reading the posts ?>
      <?php foreach($data as $postData) : ?>
            <tr>
                <th scope="row"><?= $postData["id"] ?></th>
                <td>
                    <a href="show_post_view.php?id=<?= $postData["id"]?>">
                        <?= $postData["title"] ?>
                    </a>
                </td>
                <td><?= $postData["body"] ?></td>
                <td><?= $postData["author"] ?></td>
            </tr>
       <?php endforeach; ?>
  <?php //reading the posts ?>
  </tbody>
</table>



<a href="new_post_view.php">New</a>
   
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>