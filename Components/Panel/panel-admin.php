<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: panel.php');
		exit();
	}

  
?>
  <!DOCTYPE HTML>
  <html lang="pl">

  <head>
    <title>Panel administracyjny - Parafia kotulin</title>
    <?php include('../Fixed-Components/header.php'); ?>
  </head>

  <body>
    <div class="container panel-admina">
      <div class="row">
        <div class="col-xs-12">
          <h3>Jestes zalogowany jako
            <?php echo $_SESSION['user'] ?>! <a href="logout.php">Wyloguj się!</a></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <form action="dodajplik2.php" method="post" enctype="multipart/form-data">
            <input type="file" name="plik">
            <input type="submit" value="Dodaj ogłoszenia" name="wyślij_plik">
          </form>
          <span class="span_e">
            <?php
              if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
            ?>
          </span>
          <span class="span_s">
            <?php
              if(isset($_SESSION['success']))	echo $_SESSION['success'];
            ?>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <h3>Dostępne ogłoszenia na serwerze</h3>
            <?php 
              require_once('connect.php');
  
              $conn = mysqli_connect($host, $db_user,$db_password,$db_name);
  
              if(!$conn){
                 echo "Error: ".mysqli_connect_errno($conn);
              }
              $sql = mysqli_query($conn, 'select czas from data where id=1;');
              $sql1 = mysqli_fetch_assoc($sql);
              $date1 = $sql1['czas'];
              $ogl1_1 = date("d.m",strtotime($date1)).".jpg";
              $ogl1_2 = date("d.m",strtotime($date1.' - 7 days')).".jpg";
              $ogl1_3 = date("d.m",strtotime($date1.' - 14 days')).".jpg";           
              /*echo $ogl1_1;
              echo $ogl1_2;
              echo $ogl1_3;*/
              $path = '../../img/ogloszenia';
              $ilosc_ogloszen=0;
              if(is_dir($path)){
                if($dir = opendir($path)){
                  while( false !== ($file = readdir($dir))){
                      $ilosc_ogloszen ++;
                      if(!is_dir($path . $file)){
                        if(($file != $ogl1_1) && ($file != $ogl1_2) && ($file != $ogl1_3)){
                          
                          unlink('../../img/ogloszenia/'.$file);
                        }
                        
                      }
                    }
                  }   
                }
                
                if(file_exists('../../img/ogloszenia/'.$ogl1_1)){
                  echo $ogl1_1."<br>";
                }
                if(file_exists('../../img/ogloszenia/'.$ogl1_2)){
                  echo $ogl1_2."<br>";
                }
                if(file_exists('../../img/ogloszenia/'.$ogl1_3)){
                  echo $ogl1_3."<br>";
                }
            ?>
        </div>
      </div>
    </div>
  </body>
    <?php 
      $_SESSION['blad']="";
      $_SESSION['success']="";
    mysqli_close($conn);
    ?>
  </html>
