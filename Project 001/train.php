<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>Train</title></head>
	<body>
		<table cellpadding="0" cellspacing="0" align="center" width="75%">
			<tr>
				<td align="center"><h2>Training</h2></td></tr>
			<tr>
				<td height="10"><hr></td></tr>
			<tr>
				<td height="20"></td></tr>
			<form action="login.php" method="post">
				<tr>
					<td align="center"><u><b>Login</b></u></td></tr>
				<tr>
					<td height="20"></td></tr>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
					<tr>
						<td align="left">Name:</td>
						<td align="right"><input type="text" name="name" width="20" size="20"></td></tr>
					<tr>
						<td align="left">Password:</td>
						<td align="right"><input type="password" name="password" width="20" size="20"></td></tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" value="Login" name="Login"></td></tr>
				</table>
			</form>

			<tr>
				<td height="40"></td></tr>
			
			<form action="register.php" method="post">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
					<tr>
						<td align="center" colspan="2"><u><b>Create Login</b></u></td></tr>
					<tr>
						<td height="20"></td></tr>
					<tr>
						<td align="left">New Name:</td>
						<td align="right"><input type="text" name="name" width="20" size="20"></td></tr>
					<tr>
						<td align="left">Password:</td>
						<td align="right"><input type="password" name="password" width="20" size="20"></td></tr>		
					<tr>
						<td align="left">Re-Type Password:</td>
						<td align="right"><input type="password" name="retype_password" width="20" size="20"></td></tr>
					<tr>
						<td align="center" colspan="2">
						<select name="race">
							<option value="human">Human</option>
							<option value="elf">Elf</option>
							<option value="dwarf">Dwarf</option>
							<option value="orc">Orc</option>
							<option value="goblin">Goblin</option>
						</select>
						
						<select name="class">
							<option value="fighter">Fighter</option>
							<option value="mage">Mage</option>
							<option value="rogue">Rogue</option>
							<option value="cleric">Cleric</option>
						</select>
						</td></tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" value="Register" name="Register"></td></tr>
				</table>
			</form>
		</table>
	</body>
</html>