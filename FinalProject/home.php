<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
</head>
<body>
<style>
a.one:link{color: #231F20; font-size: 19px;}
a.one:visited{color: #231F20; font-size: 19px;}
a.one:hover{text-decoration:underline; background-color: #FFC425;}

a.two:link{color: #231F20; font-size: 16px;}
a.two:visited{color: #231F20; font-size: 16px;}
a.two:hover{text-decoration:underline; background-color: #FFC425;}

a.Logo:link{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}
a.Logo:visited{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}
a.Logo:hover{font-family: 'Brush Script MT', cursive; color: #FFC425; font-size: 80px; background-color: #231F20;}

</style>
		<table cellpadding='16' cellspacing='6' class='tab_main'>
			<!--Logo-->
			<tr align='Center'>
				<!-- <td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
				<td style= 'background-color:#231F20;' colspan='30'><b><a class='Logo' href='home.php'>Socioexplore</a></b></td>
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor= #FFC425 class='td_bor'>
				<td width='5%'> <b><a class='one'href='home.php'> Home</a></b></td>
				<td width='5%'> <b><a class='one'href='login.php'>Login</a></b></td>
				<td width='5%'> <b><a class='one'href='secure_signup.php'>Sign-up</a></b></td> 
				<td width='5%'> <b><a class='one'href='contact-us.html'>Contact-Us</a></b></td>
				<td width='5%'> <b><a class='one'href='about-us.html'>About-us</a></b></td>
			</tr>

			
			<tr>
				
				<td colspan='4'> 
				<p> 
					  <h1><b>Welcome to Socioexplore!</b></h1>
					<h3>Socioexplore is a social media web application that allows you to connect and stay in touch with your friends online!</h3>
				</p>	
				</td>
				
			</tr>

		</table>
			<br>
			<br>
			<br>
			<footer align='center'>
			<?php if(isset($_SESSION["user_id"])) {echo $_SESSION["name"]; } ?>
<br><a class= 'two' href="https://www.github.com/abhn/simple-php-mysql-project">Check out the original project!</a><br>
			<br>MIT License
			<br>Copyright (c) 2019 Abhishek Nagekar
			</footer>
</body>
</html>
