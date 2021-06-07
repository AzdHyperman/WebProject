<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="view/css/normalsize/home.css">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
	<link rel="stylesheet" href="view/css/responsive/homeR.css">
	<link rel="stylesheet" href="view/css/responsive/navbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header class="topnav" id="myTopnav">
		<a class="active" href="index.php">Home</a>
		<a href="./feedbacks.html">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
				<img class="avatar" alt="Profile" src="../imagini/default-avatar.png"></button>
				<label href="#">Username</label> 
				<div class="dropdown-content">
					<a href="./profile.php">Profile</a>
					<a href="./admin.php">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="./login.php">Logout</a>
				</div>
		</div>
	</header>

	<h1 class="titlu_proiect">Purchase Advising Council</h1>

	<main class="center-page">
		<div class="postare">
			<form action="index.php?action=add-postare" method="post">
			<textarea id="text-postare" name="text" maxlength=1000 placeholder="Scrie ceva ..."></textarea>
			<div class="postare-element_footer">
				<aside>
					<label>Categorie</label>
					<select id="categorie" name="categorie">
						<option value="">...</option>
            			<option value="masini">Masini</option>
            			<option value="telefoane">Telefoane</option>
						<option value="imobiliare">Imobiliare</option>
					</select>
				</aside>

			</div>
			<!-- <button>Posteaza</button> -->
			<input type="submit" value="Posteaza" name="add" class="button">
			</form>
		</div>

		<div class="postari-list">
		<?php
			if(! empty($result)) 
			{
			foreach($result as  $k => $v)
			{
			?>	
			<!-- #2 -->
			<div class="postari-list-element">
				<div class="postari-list-element_header"> <?php echo "Username: ".$result[$k]["username"]." Rank: ".$result[$k]["rank"]." Categorie: ".$result[$k]["categorie"];?></div>
						<p><?php echo $result[$k]["text"];?></p> 
					<div class="postari-list-element_footer">
					<button>rating</button>
					<button>Comment</button> 
					<a class="btnEditAction"
                        href="index.php?action=edit-postare&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        EDIT
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=delete-postare&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        DELETE
                        </a>
					<div class="status"><?php echo "Status: ".$result[$k]["stats"];?></div>
				</div>
			</div>
			<?php } 
			}?>
			<!-- toate postarile  -->
		</div>
		<!-- pagina centrala -->
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

		var button = document.getElementById("buton-raspuns");
		button.onclick = function() {
			var x = document.getElementsByClassName("reply_form");
			if (x.style.display !== 'none') 
			{
        		x.style.display = 'none';
    		}
   			 else 
			{
        		x.style.display = 'flex';
   			}
		}
		function userMenu() {
  			document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
  		if (!event.target.matches('.dropbtn')) {
    		var dropdowns = document.getElementsByClassName("dropdown-content");
    		var i;
    		for (i = 0; i < dropdowns.length; i++) {
      			var openDropdown = dropdowns[i];
      			if (openDropdown.classList.contains('show')) {
        			openDropdown.classList.remove('show');
      				}
   				}
 			}
		}
	</script>
</body>
</html>
