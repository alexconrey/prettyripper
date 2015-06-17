<?php include('function.php'); 


if(isset($_POST['url'])) {
  $URL = $_POST['url'];
  $retv = getVideo($URL);
  $correctFileExtension = str_replace('mp4', 'mp3', getFile($URL));
  //$filePath = str_replace(' ', '_', $correctFileExtension);
  $filePath = str_replace(' ', '', $correctFileExtension);
  $fullPath = ($_SERVER['SERVER_NAME'] . '/d/' . $filePath);
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Download YouTube Video</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dl.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="index.php">
        <h2 class="form-signin-heading">Want some music? Have some music.</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" class="form-control" name="url" placeholder="https://www.youtube.com/watch?v=8o3nZQU4evo" required autofocus>
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg btn-primary" type="submit">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!--<input type="text" name="url" class="form-control" placeholder="https://www.youtube.com/watch?v=8o3nZQU4evo" autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Go get it!</button>-->
      </form>
      <?php if(isset($_POST['url'])) { ?>
              <?php $retv; ?>
              <div><h3>Here's your video: </h3><h5><a href='/d/<?php echo $filePath; ?>'><?php echo $filePath; ?></a> </h5></div>
      <?php } ?>
      <div>



    </div> <!-- /container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><span class="label label-default">&copy;2015</span><a href="mailto:alex@conrey.us"><span class="label label-danger">Alex Conrey</span></a></p>
      </div>
    </footer>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
