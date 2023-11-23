<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="bootstrap.css" rel="stylesheet">
    <script src="bootstrap.bundle.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <form action="/phpstart/index.php" method="post">
    <label for="name">Name</label>
    <input type="text" name=name>
    <button type="submit" value="submit">submit</button>
        
    </form>
    
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>your name '.$name.'</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
  </body>
</html>