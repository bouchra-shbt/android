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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$var = $_GET["id"];
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE medecin SET nom_medecin=%s, prenom_medecin=%s, adresse_medecin=%s, cp_medecin=%s, spec_medecin=%s, tel_medecin=%s, dip_medecin=%s, email_medecin=%s, motpasse_medecin=%s WHERE id_medecin like ".$var,
                       GetSQLValueString($_POST['nom_medecin'], "text"),
                       GetSQLValueString($_POST['prenom_medecin'], "text"),
                       GetSQLValueString($_POST['adresse_medecin'], "text"),
                       GetSQLValueString($_POST['cp_medecin'], "text"),
                       GetSQLValueString($_POST['spec_medecin'], "text"),
                       GetSQLValueString($_POST['tel_medecin'], "text"),
                       GetSQLValueString($_POST['dip_medecin'], "text"),
                       GetSQLValueString($_POST['email_medecin'], "text"),
                       GetSQLValueString($_POST['motpasse_medecin'], "text"),
                       GetSQLValueString($_POST['id_medecin'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_medecin = "SELECT * FROM medecin where id_medecin like ".$var;
$medecin = mysql_query($query_medecin, $conn) or die(mysql_error());
$row_medecin = mysql_fetch_assoc($medecin);
$totalRows_medecin = mysql_num_rows($medecin);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>maj medecin</title>
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
	<![endif]--></head>
<body id="page5">
	<div align="center"></div>
<div align="center">
	  <!--==============================header=================================-->
</div>
	<header>
		<div class="border-bot">
			<div class="main">
				<h1 align="center"><a href="index.html">InternetCafe</a></h1>
				<nav>
					<div align="center">
					  <ul class="menu">
					    <li><a href="index.html">Acceuil</a></li>
					    <li><a href="index1.html">Cabinet</a></li>
					    <li><a href="index2.html">Services</a></li>
					    <li><a href="index3.html">Personnel</a></li>
					    <li><a class="" href="index4.html">Contacts</a></li>
				      </ul>
				  </div>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
	<div align="center">
	  <!--==============================content================================-->
</div>
	<section id="content"><div class="ic">
	  <div align="center">More Website Templates @ TemplateMonster.com - Mrach 03, 2012!</div>
	</div>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
				  <div class="aligncenter">
				    <div align="center"><strong>mise à jour medecin</strong></div>
				  </div>
				  <p align="center">&nbsp;</p>
				  
                  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    <div align="center">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Nom:</td>
                          <td><input type="text" name="nom_medecin" value="<?php echo htmlentities($row_medecin['nom_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Prenom:</td>
                          <td><input type="text" name="prenom_medecin" value="<?php echo htmlentities($row_medecin['prenom_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Adresse:</td>
                          <td><input type="text" name="adresse_medecin" value="<?php echo htmlentities($row_medecin['adresse_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Code postal:</td>
                          <td><input type="text" name="cp_medecin" value="<?php echo htmlentities($row_medecin['cp_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Specialite:</td>
                          <td><input type="text" name="spec_medecin" value="<?php echo htmlentities($row_medecin['spec_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Num telephone:</td>
                          <td><input type="text" name="tel_medecin" value="<?php echo htmlentities($row_medecin['tel_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Diplome:</td>
                          <td><input type="text" name="dip_medecin" value="<?php echo htmlentities($row_medecin['dip_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Email:</td>
                          <td><input type="text" name="email_medecin" value="<?php echo htmlentities($row_medecin['email_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Mot de passe:</td>
                          <td><input type="text" name="motpasse_medecin" value="<?php echo htmlentities($row_medecin['motpasse_medecin'], ENT_COMPAT, ''); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
                        </tr>
                      </table>
                      <input type="hidden" name="MM_update" value="form1">
                      <input type="hidden" name="id_medecin" value="<?php echo $row_medecin['id_medecin']; ?>">
                      </div>
                  </form>
                  <p align="center">&nbsp;</p>
                  <p align="center">&nbsp;</p>
				  
                  <p align="center">&nbsp;</p>
                  
                  <p align="center">&nbsp;</p>
                  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				  <p align="center">&nbsp;</p>
				</div>
		  </div>
		</div>
	</section>
	<div align="center">
	  <!--==============================footer=================================-->
</div>
	<footer></footer>
	<div align="center">    </div>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
mysql_free_result($medecin);
?>