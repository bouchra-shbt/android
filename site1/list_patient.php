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

mysql_select_db($database_conn, $conn);
$query_patient = "SELECT * FROM patient";
$patient = mysql_query($query_patient, $conn) or die(mysql_error());
$row_patient = mysql_fetch_assoc($patient);
$totalRows_patient = mysql_num_rows($patient);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>liste patient</title>
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
                  <div align="center"><strong>liste des patients</strong></div>
                </div>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <table width="1109" height="115"  border="1">
                  <tr>
                    <td width="-1">&nbsp;</td>
                    <td width="133">&nbsp;</td>
                    <td width="154">&nbsp;</td>
                    <td width="175">&nbsp;</td>
                    <td width="169">&nbsp;</td>
                    <td width="135">&nbsp;</td>
                    <td width="157">&nbsp;</td>
                    <td width="-1">&nbsp;</td>
                    <td width="98">&nbsp;</td>
                    <td width="136">&nbsp;</td>
                    <td width="-1">&nbsp;</td>
                    <td width="48">&nbsp;</td>
                    <td width="63">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><strong>NOM</strong></div></td>
                    <td><div align="center"><strong>PRENOM</strong></div></td>
                    <td><div align="center"><strong>DATE DE NAISSANCE</strong></div></td>
                    <td><div align="center"><strong>LIEU DE NAISSANCE</strong></div></td>
                    <td><div align="center"><strong>SEXE</strong></div></td>
                    <td><div align="center"><strong>ADRESSE</strong></div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php do { ?>
                  <tr>
                    <td height="45">&nbsp;</td>
                    <td><div align="center"><?php echo $row_patient['nom_patient']; ?></div></td>
                    <td><div align="center"><?php echo $row_patient['prenom_patient']; ?></div></td>
                    <td><div align="center"><?php echo $row_patient['date_naiss_patient']; ?></div></td>
                    <td><div align="center"><?php echo $row_patient['lieu_naiss_patient']; ?></div></td>
                    <td><div align="center"><?php echo $row_patient['sexe_patient']; ?></div></td>
                    <td><div align="center"><?php echo $row_patient['adresse_patient']; ?></div></td>
                    <td><div align="center"><a href="modif_patient.php?id=<?php echo $row_patient['id_patient']; ?>">Modifier</a></div></td>
                    <td><div align="center"><a href="sup_patient.php?id=<?php echo $row_patient['id_patient']; ?>">Supprimer</a></div></td>
                  </tr>
                  <?php } while ($row_patient = mysql_fetch_assoc($patient)); ?>
                </table>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
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
mysql_free_result($patient);
?>