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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contact (id_c, nom_c, prenom_c, email_c, tel_c, mssg_c) VALUES (NULL, %s, %s, %s, %s, %s)",
                       
                       GetSQLValueString($_POST['nom_c'], "text"),
                       GetSQLValueString($_POST['prenom_c'], "text"),
                       GetSQLValueString($_POST['email_c'], "text"),
                       GetSQLValueString($_POST['tel_c'], "text"),
                       GetSQLValueString($_POST['mssg_c'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_contact = "SELECT * FROM contact";
$contact = mysql_query($query_contact, $conn) or die(mysql_error());
$row_contact = mysql_fetch_assoc($contact);
$totalRows_contact = mysql_num_rows($contact);
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Contacts</title>
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
					    <li>
					      <a href="ajout_rdvd.php">RDV</a></li>
					    <li><a class="active" href="index4.html">Contacts</a></li>
					    <li><a href="ajout_patient.php">Inscription</a></li>
					    <li><a href="login.html">Login</a></li>
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
				  <article class="grid_8">
						<h3 align="center">Contact</h3>
						<p align="center">&nbsp;</p>
						
                        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                          <div align="center">
                            <table align="center">

                              <tr valign="baseline">
                                <td nowrap align="right">Nom:</td>
                                <td><input type="text" name="nom_c" value="" size="40" height="30"></td>
                              </tr>
                              <tr valign="baseline">
                                <td nowrap align="right">Prenom:</td>
                                <td><input type="text" name="prenom_c" value="" size="40" height="30"></td>
                              </tr>
                              <tr valign="baseline">
                                <td nowrap align="right">Email:</td>
                                <td><input type="text" name="email_c" value="" size="40" height="30"></td>
                              </tr>
                              <tr valign="baseline">
                                <td nowrap align="right">Telephone:</td>
                                <td><input type="text" name="tel_c" value="" size="40" height="30"></td>
                              </tr>
                              
                              <tr valign="baseline">
                                <td height="87" align="right" nowrap>Message:</td>
                                <td><textarea name="mssg_c" cols="60" rows="7"  value="" height="170"></textarea></td>
                              </tr>
                              <tr valign="baseline">
                                <td nowrap align="right">&nbsp;</td>
                                <td><input type="submit" value="envoyer"></td>
                              </tr>
                                                      </table>
                            <p>
                              <input type="hidden" name="MM_insert" value="form1">
                            </p>
                            <p>&nbsp;</p>
                            <div class="wrapper">
							      <h3 align="center" class="prev-indent-bot"> plan d'acces </h3>
                                        
                                       	  <div align="center"><img src="images/Capture2.png" alt="" />                   	              </div>
					      </div>	
                            </div>
                      </form>
                        <p align="center">&nbsp;</p>
                      
	        </article>
					<article class="grid_4">
						<div class="indent-top indent-left">
							<div class="wrapper p3">
								<figure class="img-indent-r">
								  <div align="center"><a href="#"><img src="images/page1-img1.png" alt=""></a></div>
								</figure>
								<div class="extra-wrap">
									<div align="center"><strong class="title-1">Prendre<strong>Soin</strong><em>De</em><em>Vous</em></strong>
								      </div>
								</div>
							</div>
							<h3 align="center" class="p1">Coordonnées</h3>
							<p align="center" class="prev-indent-bot">4 BOULEVARD DR BENZERDJEB, Oran, Oran (31), Algérie - Oran-</p>
                            <figure class="p2">
                              <div align="center"><img src="images/page3-img3.jpg" alt=""></div>
                            </figure>
							<p align="center" class="p0">Ouverts le:       <br>Dimanche - Mercredi:de 8h à 17h30</p>
							<p align="center" class="prev-indent-bot">samedi et les jours fériés: de 8h à 12h30n</p>
							<p align="center" class="img-indent-bot"></p>
							<div align="center">
							  <dl>
							    <dt class="prev-indent-bot"></dt>
							    <dd><span>Telephone:</span>041 39 79 07</dd>
							    <dd><span>FAX:</span>041-46-12-54</dd>
							    <dd><span>E-mail:</span><a href="#">info@cabinetmedical.com</a></dd>
						      </dl>
						  </div>
						</div>
					</article>
				</div>
			</div>
	  </div>
	</section>
	<div align="center">
	  <!--==============================footer=================================-->
</div>
	<footer>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_3">
						<div class="spacer-1">
							<div align="center"><a href="index.html"><img src="images/footer-logo.png" alt=""></a>
						      </div>
						</div>
					</div>
					<div class="grid_5">
						<div class="indent-top2">
							<p align="left" class="prev-indent-bot">&copy;SahbatouBouchra</p>
						    <div align="left">Tel: 041 39 79 07 Email: <a href="#">info@cabinetmedical.com</a>
						    </div>
					  </div>
					</div>
					<div class="grid_4">
						<div align="center">
						  <ul class="list-services">
						    <li><a class="item-1" href="#"></a></li>
						    <li><a class="item-2" href="#"></a></li>
						    <li><a class="item-3" href="#"></a></li>
						    <li><a class="item-4" href="#"></a></li>
					      </ul>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div align="center">    </div>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
<?php
mysql_free_result($contact);
?>