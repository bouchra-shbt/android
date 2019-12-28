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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO medecin (id_medecin, nom_medecin, prenom_medecin, adresse_medecin, cp_medecin, spec_medecin, tel_medecin, dip_medecin, email_medecin, motpasse_medecin) VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                      
                       GetSQLValueString($_POST['nom_medecin'], "text"),
                       GetSQLValueString($_POST['prenom_medecin'], "text"),
                       GetSQLValueString($_POST['adresse_medecin'], "text"),
                       GetSQLValueString($_POST['cp_medecin'], "text"),
                       GetSQLValueString($_POST['spec_medecin'], "text"),
                       GetSQLValueString($_POST['tel_medecin'], "text"),
                       GetSQLValueString($_POST['dip_medecin'], "text"),
                       GetSQLValueString($_POST['email_medecin'], "text"),
                       GetSQLValueString($_POST['motpasse_medecin'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>ajout medecin</title>
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
	<div align="center">
	  <!--==============================header=================================-->
</div>
<div align="center"></div>
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
				  <div class="aligncenter"><strong>Ajouter Medecin
                      </strong>
				    <form method="post" name="form1">
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                    </form>
				    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
                    <table align="center">
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Nom:</strong></td>
                        <td><strong>
                        <input type="text" name="nom_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Prenom:</strong></td>
                        <td><strong>
                        <input type="text" name="prenom_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Adresse:</strong></td>
                        <td><strong>
                        <input type="text" name="adresse_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Code postal:</strong></td>
                        <td><strong>
                        <input type="text" name="cp_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Specialité:</strong></td>
                        <td><strong>
                        <input type="text" name="spec_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Numero de telephone:</strong></td>
                        <td><strong>
                        <input type="text" name="tel_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Diplome:</strong></td>
                        <td><strong>
                        <input type="text" name="dip_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Email:</strong></td>
                        <td><strong>
                        <input type="text" name="email_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right"><strong>Mot de passe:</strong></td>
                        <td><strong>
                        <input type="password" name="motpasse_medecin" value="" size="32">
                        </strong></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">&nbsp;</td>
                        <td><strong>
                        <input type="submit" value="Insérer l'enregistrement">
                        </strong></td>
                      </tr>
                    </table>
                    <strong>
                    <input type="hidden" name="MM_insert" value="form2">
                    </strong>
				    </form>
				    <p>&nbsp;</p>
				  </div>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
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