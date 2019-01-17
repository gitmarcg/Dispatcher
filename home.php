<?php
ob_start();
session_start(); // On démarre la session AVANT toute chose
include 'config.php';

if (!isset($_SESSION['ouvert'])) 
{
  { header("Location: erreur.php?erreur="."004" );}
  exit;
}
include 'connect.php';
//On ce connect à la database                                           
$conn = OpenCon($servername, $username, $password, $dbname);

$NumMembre = $_GET['id'];
$action = $_GET['action'];
$NomMembre =  $_SESSION['NomMembre'];
$NomClient =  $_SESSION['NomClient'];

$NbrBillet = 10;

CloseCon($conn) ;
?>

<!-- Topmenu -->
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>Section Répartition</title>
<link href="css/style.css" rel="stylesheet" />
</head>

<body>
<div id="header">
      <p>
		  <img src="images/logolongmck.png"  style="margin:25px 50px">
      
   <div style="position:absolute;top:65px; width:1200px; height:500px; z-index:2;font-size:200%; color:white">
      <center><b>Bienvenue cher </b> <br> <?php echo $NomMembre . ' - ' . $NomClient ?> </center>
   
<div class="topnav">
  <a class="active" href="#home">Employé</a>
  <a href="#horaire">Horraire</a>
  <a class="rigth" href="home.php?id=$NumMembre&action=logout";">Déconnexion</a>
</div>
  <table>
   <!--La balise <caption> sert à insérer une légende dans un tableau -->
   <caption style="font-weight:bold;text-align: left;">
         Liste des employés
   </caption>
   <tr>
       <td>Carmen</td>
       <td>33 ans</td>
       <td>Espagne</td>
   </tr>
   <tr>
       <td>Michelle</td>
       <td>26 ans</td>
       <td>États-Unis</td>
   </tr>
  </table>
    
<?php

if ($action == "Billets"): {
      
      }
     
elseif ($action == "logout" || $action == "contact"):  {
        session_destroy();
        if  ($action == "logout") {
             header('location: index.php');
             exit;
        }
        if  ($action == "contact") {
             header('location: http://www.servicesmckinnon.com');
             exit;
        }
      } 

else:
    echo "a ne vaut ni 5 ni 6";
endif;

?>
 </div>
</body>
   
</html>