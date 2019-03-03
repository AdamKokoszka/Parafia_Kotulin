<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel-admin.php');
		exit();
	}
?>

  <!DOCTYPE HTML>
  <html lang="pl">

  <head>
    <title>Logowanie do panelu - Parafia kotulin</title>
    <?php include('../Fixed-Components/header.php'); ?>
    
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-offset-2 col-md-offset-3 col-xs-12 col-sm-8 col-md-6 panel-logowania">
          <div class="row">
            <div class="col-xs-12">
              <h1>Witaj w panelu administracyjnym!</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-offset-2 col-xs-12 col-sm-8">
              <form action="zaloguj.php" method="post">
                <label>
                  Login: <input type="text" name="login">
                </label>
                <br>
                <label>
                Hasło: <input type="password" name="haslo">
                </label>
                <?php
	     if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
                else echo "<br>";
    ?>
                <br>
                <input type="submit" value="Zaloguj się">
              </form>
              
            </div>
          </div>
        </div>
      </div>

    </div>
  </body>

  </html>
