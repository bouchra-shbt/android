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
$query_fiche_visite = "SELECT * FROM fiche_visite";
$fiche_visite = mysql_query($query_fiche_visite, $conn) or die(mysql_error());
$row_fiche_visite = mysql_fetch_assoc($fiche_visite);
$totalRows_fiche_visite = mysql_num_rows($fiche_visite);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>liste fiche visite</title>
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
				  <div class="aligncenter"><strong>liste des fiches visite</strong></div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <table width="942" border="1">
                    <tr>
                      <td width="-1">&nbsp;</td>
                      <td width="129"><div align="center"><strong>Motif</strong></div></td>
                      <td width="152"><div align="center"><strong>Diagnostic</strong></div></td>
                      <td width="144"><div align="center"><strong>Date visite</strong></div></td>
                      <td width="152"><div align="center"><strong>N° patient</strong></div></td>
                      <td width="180"><div align="center"><strong>N°medecin</strong></div></td>
                      <td width="51"><a href="modif_fichevisite.php"></a></td>
                      <td width="83"><a href="sup_fichevisite.php"></a></td>
                    </tr>
                    <?php do { ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td><div align="center"><?php echo $row_fiche_visite['motif']; ?></div></td>
                        <td><div align="center"><?php echo $row_fiche_visite['diag']; ?></div></td>
                        <td><div align="center"><?php echo $row_fiche_visite['date_vis']; ?></div></td>
                        <td><div align="center"><?php echo $row_fiche_visite['id_patient']; ?></div></td>
                        <td><div align="center"><?php echo $row_fiche_visite['id_medecin']; ?></div></td>
                        <td><div align="center"><a href="modif_fichevisite.php?n=<?php echo $row_fiche_visite['n_vi']; ?>">Modifier</a></div></td>
                        <td><div align="center"><a href="sup_fichevisite.php?n=<?php echo $row_fiche_visite['n_vi']; ?>">Supprimer</a></div></td>
                      </tr>
                      <?php } while ($row_fiche_visite = mysql_fetch_assoc($fiche_visite)); ?>
                  </table>
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
mysql_free_result($fiche_visite);
?>