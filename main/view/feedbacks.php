<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
	<link rel="stylesheet" href="view/css/normalsize/feedbacks.css">
	<link rel="stylesheet" href="view/css/responsive/feedbacksR.css">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/responsive/navbarR.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body
	{
 		display: flex;
		flex-direction: column;
		min-height: 100vh;
	}
</style>
</head>
<body>
	<header class="topnav" id="myTopnav">
		<a href="index.php">Home</a>
		<a class="active" href="index.php?action=feedbacks">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
			<img class="avatar" alt="Profile" src="view/imagini/<?php echo $avatar;?>"></button>
				<label href="#"><?php echo $username; ?></label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<a href="index.php?action=logpage">Admin</a>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>

    <main class="container">
	<?php   
		if(! empty($result)) {
			foreach($result as  $k => $v)
		{ 
	?> 
        <div class="post">
            <div class="post-user"><?php echo "Username :".$result[$k]["username"]." Rank : ".$result[$k]["rank"]." Categorie : ".$result[$k]["categorie"];?></div>
            <p><?php echo $result[$k]["text"];?></p> 
            <div class="post-footer">
                <button>Raspunde</button>
            </div>
        </div>
		
    <?php
		} 
	}
	?>

    </main>
    
	<footer id="page_footer">
		<section>
			<h2>Team</h2>
			<p>Vasilescu Andrei</p>
			<p>Ivan Alexandru</p>
			<p>Martinas Alex</p>
		</section>
		<section>
			<h2>About</h2>
			<p>Web Tehnologies Project</p>
		</section>
		<section>
			<h2>GitHub</h2>
			<a href="https://github.com/AzdHyperman/WebProject">Repository</a>
		</section>
	</footer>

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
