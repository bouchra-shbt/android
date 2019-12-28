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
$query_requette = "select * from patient,rdv where patient.id_patient=rdv.id_patient and concat(n_rdv,nom_patient) like   \"%$var%\"  ";
$requette = mysql_query($query_requette, $conn) or die(mysql_error());
$row_requette = mysql_fetch_assoc($requette);
$totalRows_requette = mysql_num_rows($requette);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>recherche RDV</title>
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
				    <p><strong>rechercher RDV</strong></p>
				    <form name="form1" method="get" action="rech_rdv.php">
                      <table width="427" border="1">
                        <tr>
                          <td width="223">entrez N° du RDV ou nom patient</td>
                    <td width="175"><label>
                            <input type="text" name="rech" id="rech">
                          </label></td>
                          <td width="7">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><label>
                            <div align="center">
                              <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
                            </div>
                            <div align="center"></div>
                          </label></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      <p>&nbsp;</p>
                    </form>
			      </div>
				  <table border="1">
                    <tr>
                      <td width="185">&nbsp;</td>
                      <td width="118">&nbsp;</td>
                      <td width="70">&nbsp;</td>
                    </tr>
                    <?php do { ?>
                      <tr>
                        <td height="188"><p>N patient : <?php echo $row_requette['id_patient']; ?></p>
                          <p>Nom patient:<?php echo $row_requette['nom_patient']; ?></p>
                          <p>Prenom patient:<?php echo $row_requette['prenom_patient']; ?></p>
                          <p>N telephone patient<?php echo $row_requette['tel_pat']; ?></p>
                          <p>N RDV:<?php echo $row_requette['n_rdv']; ?></p>
                          <p>Date RDV:<?php echo $row_requette['date_rdv']; ?></p>
                          <p>Heure RDV:<?php echo $row_requette['heure_rdv']; ?></p>
                          <p>Observation:<?php echo $row_requette['obs']; ?></p>
                          <p>N medecin<?php echo $row_requette['id_medecin']; ?></p></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <?php } while ($row_requette = mysql_fetch_assoc($requette)); ?>
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
mysql_free_result($requette);
?>