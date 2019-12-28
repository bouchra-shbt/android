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
$query_requette = "select  * from patient ,fiche_visite where patient.id_patient=fiche_visite.id_patient 
and concat(fiche_visite.n_vi,patient.nom_patient) like   \"%$var%\"  ";
$requette = mysql_query($query_requette, $conn) or die(mysql_error());
$row_requette = mysql_fetch_assoc($requette);
$totalRows_requette = mysql_num_rows($requette);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>recherche visite</title>
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
                  <p><strong>rechrecher fiche visite</strong></p>
                  <form name="form1" method="get" action="rech_visite.php">
                    <p>&nbsp;                    </p>
                    <table width="562" border="1">
                      <tr>
                        <td width="286">entrez N° du RDV ou nom patient</td>
<td width="166"><label>
                          <input type="text" name="rech" id="rech">
                        </label></td>
                        <td width="88">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><label>
                          <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
                        </label></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <p>
                      <label></label>
                    </p>
                  </form>
                </div>
			    <p>&nbsp;</p>
			    <table width="587" height="865" border="1">
                  
                  <?php do { ?>
                  <tr>
                    <td width="552"><p>&nbsp;</p>
                      <p align="center" class="Style1">Fiche visite:</p>
                      <p align="center" class="Style1">&nbsp;</p>
                      <p><strong>Nom patient:</strong><?php echo $row_requette['nom_patient']; ?></p>
                    <p><strong>Prenom patient:</strong><?php echo $row_requette['prenom_patient']; ?></p>
                    <p><strong>Date de naissance patient:</strong><?php echo $row_requette['date_naiss_patient']; ?></p>
                    <p><strong>Sexe patient:</strong><?php echo $row_requette['sexe_patient']; ?></p>
                    <p><strong>Situation familiale:</strong><?php echo $row_requette['sf_patient']; ?></p>
                    <p><strong>N assure:</strong><?php echo $row_requette['nass']; ?></p>
                    <p><strong>N fiche visite:</strong><?php echo $row_requette['n_vi']; ?></p>
                    <p><strong>Motif:</strong><?php echo $row_requette['motif']; ?></p>
                    <p><strong>Diagnostic:</strong><?php echo $row_requette['diag']; ?></p>
                    <p><strong>Date de fiche visite:</strong><?php echo $row_requette['date_vis']; ?></p>
                    <p>&nbsp;</p></td>
                  </tr>
                  <?php } while ($row_requette = mysql_fetch_assoc($requette)); ?>
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
mysql_free_result($requette);
?>