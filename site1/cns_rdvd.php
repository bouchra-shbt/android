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


$var = trim( @$_GET['cns']);
mysql_select_db($database_conn, $conn);
$query_requette = "SELECT * FROM rdvd WHERE date_rdvd like   \"%$var%\"  ";
$requette = mysql_query($query_requette, $conn) or die(mysql_error());
$row_requette = mysql_fetch_assoc($requette);
$totalRows_requette = mysql_num_rows($requette);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>consulter RDV demandé</title>
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
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>  
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
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body id="page5">
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
                  <div align="center">
                    <p><strong>Consulter les RDV demandés</strong></p>
                    <p>&nbsp;</p>
                  </div>
                </div>
			    <form name="form1" method="get" action="cns_rdvd.php">
			      <div align="center">
			        <table width="493" border="1">
			          <tr>
			            <td width="126">entrer une date </td>
                  <td width="332"><span id="sprytextfield1">
                  <label>
                  <input type="text" name="cns" id="cns">
                  </label>
                  <span class="textfieldRequiredMsg">Une valeur est requise.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                        <td width="13">&nbsp;</td>
                      </tr>
			          <tr>
			            <td>&nbsp;</td>
                  <td><label>
                    
                  <div align="left">
                    <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
                    </div>
                  </label></td>
                        <td>&nbsp;</td>
                      </tr>
			          <tr>
			            <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
		            </table>
		          </div>
			    </form>
			    <p align="center">&nbsp;</p>
			    <p align="center">&nbsp;</p>
			    
                <table border="1">
                  <tr>
                    <td width="128"><div align="center"><strong>NOM</strong></div></td>
                    <td width="149"><div align="center"><strong>PRENOM</strong></div></td>
                    <td width="116"><div align="center"><strong>TELEPHONE</strong></div></td>
                    <td width="134"><div align="center"><strong>EMAIL</strong></div></td>
                    <td width="129"><div align="center"><strong>DATE</strong></div></td>
                    <td width="4"><div align="center"><strong>HEURE</strong></div></td>
                    <td width="186">&nbsp;</td>
                    <td width="186">&nbsp;</td>
                  </tr>
                  <?php do { ?>
                    <tr>
                      <td><div align="center"><?php echo $row_requette['nom_rdvd']; ?></div></td>
                      <td><div align="center"><?php echo $row_requette['prenom_rdvd']; ?></div></td>
                      <td><div align="center"><?php echo $row_requette['tel_rdvd']; ?></div></td>
                      <td><div align="center"><?php echo $row_requette['email_rdvd']; ?></div></td>
                      <td><div align="center"><?php echo $row_requette['date_rdvd']; ?></div></td>
                      <td><div align="center"><?php echo $row_requette['heure_rdvd']; ?></div></td>
                      <td><div align="center"><a href="modif_rdvd.php?id=<?php echo $row_requette['id_rdvd']; ?>">Modifier</a></div></td>
                      <td><div align="center"><a href="sup_rdvd.php?id=<?php echo $row_requette['id_rdvd']; ?>">supprimer</a></div></td>
                    </tr>
                    <?php } while ($row_requette = mysql_fetch_assoc($requette)); ?>
                </table>
                <p align="center">&nbsp;</p>
			    <div align="center"></div>
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
    <script type="text/javascript">
Cufon.now();
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true});
</script>
</body>
</html>
<?php
mysql_free_result($requette);

?>