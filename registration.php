<? ob_start(); ?>
<?session_start();?>
<html>
	<head>
	<title> 
		Airlines 
	</title>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
</head>
</html>
<?
	require "functions.php";
	if(isset($_GET['cmd']))
		{
			$cmd=$_GET['cmd'];
			switch($cmd)
			{
				case "log":	echo "<div align=\"center\" style=\"padding-top: 50px;\">
		  				<form method=\"POST\" action=\"registration.php?cmd=submit\" class=\"form\">
						<table cellspacing=\"2\" cellpadding=\"7\" style=\"border-right:1px solid #000000; border-bottom:2px solid #000000; padding:7px\">
							<tr>
								<td align=\"center\"><h2 class=\"tt\">Registrazione</h2></td>
							</tr>
							<td>
							<table border=\"1\" bordercolor=\"#99FFFF\" cellspacing=\"0\" align=\"center\" class=\"table\" cellpadding=\"3\" >
								
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>nome</label></td>
									<td><input type=\"TEXT\" name=\"nome\"/></td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>cognome</label></td>
									<td><input type=\"TEXT\" name=\"cog\"/></td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>data di nascita</label></td>
									<td><input name=\"nascita\" type=\"TEXT\" value=\"(aaaa/mm/dd)\" onblur=\"if(this.value=='') this.value='(aaaa/mm/dd)';\" 
									onfocus=\"if(this.value=='(aaaa/mm/dd)') this.value='';\" /></td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>codice fiscale</label></td>
									<td><input type=\"TEXT\" name=\"cf\"/></td>
								</tr>
								<tr width=\"96\">
									<td align=\"right\" class=\"sm\"><label>sesso</label></td>
									<td class=\"sm\"><input type=\"radio\" name=\"sex\" value=\"M\" /> M &nbsp
									<input type=\"radio\" name=\"sex\" value=\"F\" /> F</td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>email</label></td>
									<td><input type=\"TEXT\" name=\"mail\"/></td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>telefono</label></td>
									<td><input type=\"TEXT\" name=\"tel\"/></td>
								</tr>
								<tr width=\"96\" align=\"right\" class=\"sm\">
									<td><label>password</label></td>
									<td><input type=\"password\" name=\"psw\"/></td>
								</tr></td></table>
								<tr>
									<td align=\"right\"><input type=\"submit\" value=\"Procedi\" class=\"button\"/></td>
								</tr>
								</table>
							</form>
							</div>";
				break;
				case "submit":
					$query="INSERT INTO Persone (nome, cognome, cf, nascita, sesso, telefono) VALUES ('$_POST[nome]', '$_POST[cog]', '$_POST[cf]', '$_POST[nascita]', '$_POST[sex]','$_POST[tel]')";
					insert_Ut($query);
					// recuperare id Persona appena inserita per inserire il Cliente
					$query="INSERT INTO Clienti (mail, password) VALUES ('$_POST[mail]', sha1('$_POST[psw]')) WHERE";
					insert_Ut($query);
					header("Location: http://localhost:8888/default.php");
					$login=$_POST['mail'];
					$rec = get_record($login, "mail");
					$_SESSION['id'] = $rec['id'];
				break;
			}
		}	
?>
<? ob_flush();?>