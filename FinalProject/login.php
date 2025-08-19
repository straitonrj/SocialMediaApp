<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
		<script type='text/javascript'>
		function sec() {
			var email=document.f1.e1.value;
			var password=document.f1.p1.value;
			
			
			if(email.length==0||password.length==0) {

				if(email.length==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
				
				}

				
				if(password.length==0) {
				s2.innerHTML="<font color='red'>Field is Required</font>";
				
				}
			}
			
			else if (email.length>50||password.length>50) {

				if(email.length>50) {
				s3.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
				
				if(password.length>50) {
				s4.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				
				}
			}
			
			else {
				document.f1.submit();
			}
			
			
			
						
			
		}
	</script>
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
			
			<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='user_page.php'>
						<table>
							<tr>
								<td> Email:- </td> <td> <input type='email' name='e1' maxlength='50'> </td> <td> <span id='s1'> </span> </td>  <td> <span id='s3'> </span> </td>
							</tr>
							
							<tr>
								<td> Password:- </td> <td> <input type='password' name='p1' maxlength='50'> </td> <td> <span id='s2'> </span> </td> <td> <span id='s4'> </span> </td>
							</tr>
							
							<tr>
								<td> </td> <td> <input type='hidden' name='h1' value='holla'>  </td>
							</tr>
							
							<tr>
								<td> <br> <input type='button' value='Login' name='s1' onclick='sec()'> </td> <td> <br> OR <a href='secure_signup.php'>Sign-up</a></td> 
							</tr>
						</table>
					</form>
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




