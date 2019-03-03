<?php
session_start();
if (!isset($_SESSION['zalogowany']))
	{
		header('Location: panel.php');
		exit();
	}
    require_once('connect.php');
    $conn = mysqli_connect($host, $db_user,$db_password,$db_name);

    if(!$conn){
        echo "Error: ".mysqli_connect_errno($conn);
    }

    $sql = mysqli_fetch_assoc(mysqli_query($conn, 'select czas from data where id=1;'));
    $date = $sql['czas'];
    
    $temp[0] = date("d.m",strtotime($date));
    $filename = $temp[0].".".$temp[1];

    $temp1[0] = date("d.m",strtotime($date.' + 7 days'));
    $ogl_next_week = $temp1[0].".".$temp1[1];

			if(is_uploaded_file($_FILES['plik']['tmp_name'])){
				if($_FILES['plik']['size'] > 1548576){
					echo '<div class="alert alert-warning"> Błąd! Za duży plik! </div>';
				}
				else if($_FILES['plik']['type'] == 'image/jpeg' || $_FILES['plik']['type'] == 'image/png'){
            $nazwa_pliku = '../../img/ogloszenia/'.$filename.'jpg';
          
            if(file_exists($nazwa_pliku)){
              $_SESSION['blad'] = "Ogłoszenie z dnia ".$filename." juz istnieje!<br>";
              $_SESSION['blad'] .= '<span class="span_w">Czy chcesz dodac ogłoszenia od dnia: '.$ogl_next_week.' ?</span>';
              
            } else {
              
              $_SESSION['success'] = 'Plik przesłano pod nazwa: '. $filename."jpg";
              if(isset($_FILES['plik']['type'])){
                echo '<div class="alert alert-success">Typ: '.$_FILES['plik']['type'].'</div><br>';
              }
              move_uploaded_file($_FILES['plik']['tmp_name'], '../../img/ogloszenia/'. $filename."jpg");
            }
					}else{
						$_SESSION['blad'] = 'Zły format pliku! Dopuszczalne formaty: jpg, jpeg, png';
					}
				}
			else{
				$_SESSION['blad'] = 'Błąd przy przesyłaniu danych! </div>';
			}
    header('Location: panel-admin.php');
    mysqli_close($conn);
?>
