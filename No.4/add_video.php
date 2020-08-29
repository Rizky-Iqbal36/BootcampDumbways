<?php
if(isset($_POST['upload'])){
  $name = $_FILES['video']['name'];
  $temp = $_FILES['video']['tmp_name'];

  move_uploaded_file($temp,"temp/".$name);
  $url = "http://localhost/Coding/No.4/temp/$name";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>DWTube by-Rizki Iqbal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style_index.css" rel="stylesheet" type="text/css" />
  </head> 
  <body class="bg-secondary">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
          <a class="navbar-brand" href="#">DWTube by-Rizki Iqbal</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link" href="index.php">Home</a>
              <a class="nav-item nav-link active" href="#">Add Video<span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="add_category.php">Add Category</a>
            </div>
          </div>
        </div>
      </nav>
      <hr id="garis">
      <?php require_once 'process_video.php'; ?>
      <?php
        if(isset($_SESSION['message'])):?>
         <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
         </div>
      <?php endif; ?>
      <div class="container">
      <?php
            $mysqli = new mysqli("localhost","root","","dwtube") or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM catgory_tb") or die($mysqli->error);
            ?>
      <p id="dpw1">Upload Video</p>
      <div class="row justify-content-center">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="Upload_Video" style="color: #f5f5f5;">Upload your video :</label>
            <input type="file" name="video" id="video" accept="video/*">
          </div>
          <div class="form-group">
            <label for="category" style="color: #f5f5f5;">Choose category :</label>
              <select class="form-control">
                <?php
                  while($row = $result->fetch_assoc()):?>                  
                  <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                <?php endwhile ;?>
              </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
          </div>
        </form>
      </div>
      </div>
  </body>
</html>