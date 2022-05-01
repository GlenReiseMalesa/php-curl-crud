<?php


//reading a single post
    $id = $_GET["id"];//getting data from the url
    session_start();
    $_SESSION['id'] = $id;
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

    <title>edit post</title>
  </head>
  <body>



    
<?php //edit post ?>

<form method="post" action="func_update_post.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'] ?>" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">body</label>
    <input type="text" class="form-control" id="body" name="body" value="<?= $data['body'] ?>" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">author</label>
    <input type="text" class="form-control" id="author" name="author" value="<?= $data['author'] ?>" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category id</label>
    <input type="text" class="form-control" id="category_id" name="category_id" value="<?= $data['category_id'] ?>" aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">update</button>
</form>

<?php //edit post ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>