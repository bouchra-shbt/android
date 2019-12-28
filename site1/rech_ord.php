<?php require_once('../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$var = trim( @$_GET['rech']);
mysql_select_db($database_conn, $conn);
$query_requette = "select * from ordonnance,doses,medicament,fiche_visite,patient where patient.id_patient=fiche_visite.id_patient and fiche_visite.n_vi=ordonnance.n_vi and ordonnance.id_ord=doses.id_ord and doses.n_med=medicament.n_med    
and concat(ordonnance.id_ord,nom_patient) like   \"%$var%\"  ";
$requette = mysql_query($query_requette, $conn) or die(mysql_error());
$row_requette = mysql_fetch_assoc($requette);
$totalRows_requette = mysql_num_rows($requette);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>recherche ordinnance</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">  
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/Vegur_500.font.js" type="text/javascript"></script>
	<script src="js/Ropa_Sans_400.font.js" type="text/javascript"></script> 
	<script src="js/FF-cash.js" type="text/javascript"></script>	
	<script src="js/script.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
 		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
    <style type="text/css">
<!--
.Style1 {
	color: #0099FF;
	font-style: italic;
	font-size: 40px;
}
-->
    </style>
</head>
<body id="page5">
	<!--==============================header=================================-->
	<header>
		<div class="border-bot">
			<div class="main">
				<h1><a href="index.html">InternetCafe</a></h1>
				<nav>
					<ul class="menu">
						<li><a href="index.html">Acceuil</a></li>
						<li><a href="index1.html">Cabinet</a></li>
						<li><a href="index2.html">Services</a></li>
						<li><a href="index3.html">Personnel</a></li>
						<li><a class="" href="index4.html">Contacts</a></li>
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	<!--==============================content================================-->
	<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter"> 
				    <div align="center"><strong>rechercher ordonnance</strong></div>
				  </div>
				  <form name="form1" method="get" action="rech_ord.php">
<table width="427" border="1" align="center">
                                                        <tr>
                                                          <td>entrez N° ordonance ou nom patient</td>
                                                          <td><label>
                                                            <input type="text" name="rech" id="rech">
                                                          </label></td>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td>&nbsp;</td>
                                                          <td><label>
                                                          <input type="submit" name="button" id="button" value="Envoyer">
                                                          </label></td>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td>&nbsp;</td>
                                                          <td>&nbsp;</td>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                      </table>
                    </form>
				  <p>&nbsp;</p>
                  <table height="123" border="1">
                    
              <?php do { ?>
                      <tr>
                        <td width="864">
				  <p align="center" class="Style1">&nbsp;</p>
				  <p align="center" class="Style1">Ordonnance:</p>
				  <p><strong>N ordonnance:</strong><?php echo $row_requette['id_ord']; ?></p>
				  <p><strong>Nom :</strong> <?php echo $row_requette['nom_patient']; ?> <strong>Prénom :</strong> <?php echo $row_requette['prenom_patient']; ?> </p>
				  <p><strong>Date de naissance:</strong><?php echo $row_requette['date_naiss_patient']; ?> <strong>Lieu de naissance patient:</strong><?php echo $row_requette['lieu_naiss_patient']; ?></p>
				  <p><strong>N assuré:</strong><?php echo $row_requette['nass']; ?></p>
				  <p><strong>N fiche visite:</strong><?php echo $row_requette['n_vi']; ?><strong>Date fiche visite:</strong> <?php echo $row_requette['date_vis']; ?> <strong>Motif:</strong><?php echo $row_requette['motif']; ?>  <strong>Diagnostic:</strong><?php echo $row_requette['diag']; ?></p>
				  <p><strong>Type de consultation:</strong><?php echo $row_requette['tc']; ?></p>
				  <p><strong>N medicament:</strong><?php echo $row_requette['n_med']; ?> <strong>Nom medicament:</strong><?php echo $row_requette['nom_med']; ?><strong>Nom commercial:</strong><?php echo $row_requette['nom_c_med']; ?> </p>
				  <p><strong>Posologie:</strong><?php echo $row_requette['posologie']; ?> <strong>Quantité:</strong><?php echo $row_requette['quantite']; ?> <strong>Dosage:</strong><?php echo $row_requette['dosage']; ?></p>
				  <p>&nbsp;</p>
                  </tr>
                      <?php } while ($row_requette = mysql_fetch_assoc($requette)); ?>
                  </table>
			  </div>
		  </div>
		</div>
	</section>
	<!--==============================footer=================================-->
	<footer></footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
mysql_free_result($requette);
?>