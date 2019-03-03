<!DOCTYPE HTML>
<html lang="pl">

<head>
  <?php include('../Fixed-Components/header.php'); ?>
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-102688440-2', 'auto');
    ga('send', 'pageview');

  </script>
  <?php 
    require_once('../Panel/connect.php');
  
    $conn = mysqli_connect($host, $db_user,$db_password,$db_name);
  
    if(!$conn){
      echo "Error: ".mysqli_connect_errno($conn);
    } else {

      if(date("l")=="Sunday"){
        mysqli_query($conn, 'UPDATE data set czas="'.date('y-m-d').'"where id=1' );
      }
      
      $sql = mysqli_query($conn, 'select czas from data where id=1;');
      $sql1 = mysqli_fetch_assoc($sql);
      $date1 = $sql1['czas'];

      $ogl1_1 = date("d.m",strtotime($date1));
      $ogl1_2 = date("d.m",strtotime($date1.' + 6 days'));

      $ogl2_1 = date("d.m",strtotime($date1.' - 7 days'));
      $ogl2_2 = date("d.m",strtotime($date1.' - 1 days'));

      $ogl3_1 = date("d.m",strtotime($date1.' - 14 days'));
      $ogl3_2 = date("d.m",strtotime($date1.' - 8 days'));
    }    
  ?>
</head>

<body>
  <?php include('../Fixed-Components/body-header.php'); ?>
  <div class="container">
    <div class="ogolny-content">
      <div class="row">
        <div class="col-xs-12">
          <article>
            <h1>Ogłoszenia</h1>
          </article>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="col-sm-4 col-xs-12 p0">
            <a href='../../img/ogloszenia/<?php echo $ogl1_1 ?>.jpg' target="_blank" class="ogl-a">
              <div class="ogl-bg" id="ogl1">
<!--              15.10<br>-<br>21.10-->
                <?php
                  echo $ogl1_1."<br>-<br>".$ogl1_2;
                ?>
              </div>
            </a>
          </div>
          <div class="col-sm-4 col-xs-12 p0">
            <a href="../../img/ogloszenia/<?php echo $ogl2_1 ?>.jpg" target="_blank" class="ogl-a">
              <div class="ogl-bg" id="ogl1">
<!--              08.10<br>-<br>14.10-->
                <?php
                  echo $ogl2_1."<br>-<br>".$ogl2_2;
                ?>
              </div>
            </a>
          </div>
          <div class="col-sm-4 col-xs-12 p0">
            <a href="../../img/ogloszenia/<?php echo $ogl3_1 ?>.jpg" target="_blank" class="ogl-a">
              <div class="ogl-bg" id="ogl1">
<!--              01.10<br>-<br>07.10-->
             <?php
                  echo $ogl3_1."<br>-<br>".$ogl3_2;
                ?>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p0">
    <footer>
      <?php include('../Fixed-Components/footer.php'); ?>
    </footer>
  </div>
<script src="../../js/hamburger-mobile.js" type="text/javascript"></script>
  <?php
    //$sql1->free_result();
    mysqli_close($conn);
  ?>
</body>

</html>
