<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/responsive/navbarR.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
	<link rel="stylesheet" href="view/css/normalsize/admin.css">
	<link rel="stylesheet" href="view/css/responsive/adminR.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log page</title>
</head>
<body>
	

	<header class="topnav" id="myTopnav">
		<a class="active" href="index.php">Home</a>
		<a href="index.php?action=feedbacks">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
			<img class="avatar" alt="Profile" src="view/imagini/<?php echo $avatar;?>"></button>
				<label href="#"><?php echo $username."|".$rank; ?></label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<a href="index.php?action=logpage">Admin</a>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>
    <h1 >Activitate Site</h1>
	<form action="" method="POST" enctype="multipart/form-data">

	<div class="ActivityLog">

	<?php 
	if(!empty($result)) 
		{
			foreach($result as $k =>$v)
				{
			?>
				<div class="ActivityLog-elements">
					<?php echo "Type: ".$result[$k]["type"]." Info: :".$result[$k]["info"]?>
				</div>
		<?php	
				}
		}
	?>

        <!-- <Button name="pdf">save as pdf</Button> -->
        <!-- <Button name="csv">save as csv</Button> -->
		<a class="savebtn" href="view/downloadcsv.php">save CSV</a>
        <Button>save as png</Button>
        <button onclick="window.print()">Print</button>

    </div>
	
	</form>
	
	<script>
		function myFunction() 
		{
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") 
				{
					x.className += " responsive";
				} 
			else 
				{
					x.className = "topnav";
				}
		}
	</script>
</body>
</html>
