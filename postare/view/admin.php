<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
	<link rel="stylesheet" href="view/css/normalsize/admin.css">
	<link rel="stylesheet" href="view/css/responsive/adminR.css">
    <title>Log page</title>
</head>
<body>
	<header class="topnav" id="myTopnav">
		<a href="index.php">Home</a>
		<a href="index.php?action=feedbacks">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
				<img class="avatar"alt="Profile" src="../imagini/default-avatar.png">
			</button>
				<label href="#">Username</label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<a href="index.php?action=logpage">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>
    <h1 >Activitate Site</h1>
    <div class="ActivityLog">
	<?php if(!empty($result)) 
	{foreach($result as $k =>$v)
	{
	?>
	<div class="ActivityLog-elements"><?php echo "Type: ".$result[$k]["type"]." Info: :".$result[$k]["info"]?></div>
	<?php	
	}
	}
	?>
        
        
        <!-- <div class="ActivityLog-elements">Type:Postare A fost dat un rasuns de Sfatuitor-ul Spoitorul</div>
        <div class="ActivityLog-elements">Type:Login User-ul s-a logat la 10.12.2021 23:59</div>
        <div class="ActivityLog-elements">Type:Login User-ul s-a logat la 10.12.2021 23:59</div> -->
        <Button>save as pdf</Button>
        <Button>save as csv</Button>
        <Button>save as png</Button>
        <button>Print</button>
    </div>

</body>
</html>