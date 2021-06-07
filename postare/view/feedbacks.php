<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
	<link rel="stylesheet" href="../css/normalsize/feedbacks.css">
	<link rel="stylesheet" href="../css/responsive/feedbacksR.css">
	<link rel="stylesheet" href="../css/normalsize/navbar.css">
	<link rel="stylesheet" href="../css/normalsize/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header class="topnav" id="myTopnav">
		<a class="active" href="./home.html">Home</a>
		<a href="./feedbacks.html">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
				<img src="#" alt="avatar"></button>
				<label href="#">Username</label> 
				<div class="dropdown-content">
					<a href="./profile.html">Profile</a>
					<a href="./admin.html">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="./login.html">Logout</a>
				</div>
		</div>
	</header>

    <main class="container">
        <div class="post">
            <div class="post-user">Username : Client</div>
            Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
            urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
            raspunsuri, comentarii, note, linkuri etc.. 
            <div class="post-footer">
                <button>Raspunde</button>
            </div>
        </div>


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
