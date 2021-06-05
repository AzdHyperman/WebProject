<?php
include_once "database.php";
global $db;
$db=new database();

if(isset($_COOKIE["token"])){

if($db->verifyToken($_COOKIE["token"]))
echo "";
else header("Location:./login.php");

}
else header("Location:./login.php");
global $iduser;
$iduser=$db->getIdFromToken($_COOKIE["token"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="home.css">
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
					<a href="#">DarkMode</a>
					<a href="./logoutFunction.php">Logout</a>
				</div>
		</div>
	</header>

	<h1 class="titlu_proiect">Purchase Advising Council</h1>

	<main class="center-page">
		<div class="postare">
			<textarea id="text-postare" maxlength=1000 placeholder="Scrie ceva ..."></textarea>
			<div class="postare-element_footer">
				<aside>
					<label>Categorie</label>
					<select id="categorie">
            			<option value="masini">Masini</option>
            			<option value="telefoane">Telefoane</option>
						<option value="Imobiliare">Imobiliare</option>
					</select>
				</aside>
				<aside>
					<label>Pret</label>
					<select id="pret">
						<option value="Euro">Euro</option>
					</select>
				</aside>
				<aside>
					<label>Altele</label>
						<select id="altele">
						<option value="Imobiliare">Altele</option>
					</select>
				</aside>
			</div>
			<button>Posteaza</button>
		</div>

		<div class="postari-list">
			<div class="postari-list-element">
				<div class="postari-list-element_header">Username : Client</div>
				<p>
					Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
					urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
					raspunsuri, comentarii, note, linkuri etc.. 
				</p>
				<div class="postari-list-element_footer">
					<button>rating</button> 
					<button>Comment</button> 
					<div class="status">Status:Complet</div>
				</div>
				<div class="add-comment">
					<textarea id="casuta-comment" placeholder="add-comment"></textarea>
					<button>posteaza</button>
				</div>
				<div class="replies">
					<button id="buton-raspuns">sageata</button>
					<div class="reply_form">
						<div class="reply_header">Username : Sfatuitori</div>
						<p>
							Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
							urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
							raspunsuri, comentarii, note, linkuri etc.. 
						</p>
						<div class="reply_footer">
							<button>rating</button>
							<button>Comment</button>
						</div>
						<div class="add-comment">
							<textarea id="casuta-comment" placeholder="add-comment"></textarea>
							<button>posteaza</button>
						</div>
					</div>
						<!-- 2 -->
					<div class="reply_form">
						<div class="reply_header">Username : Sfatuitori</div>
						<p>	
							Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
							urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
							raspunsuri, comentarii, note, linkuri etc.. 
						</p>
						<div class="reply_footer">
							<button>rating</button>
							<button>Comment</button>
						</div>
					</div>
					<div class="reply_form">
						<div class="reply_header">Username : Sfatuitori</div>
						<p>
							Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
								urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
							raspunsuri, comentarii, note, linkuri etc.. 
						</p>
						<div class="reply_footer">
							<button>rating</button>
							<button>Comment</button>
						</div>
					</div>
					<!-- Raspunsuri -->
				</div>
				<!-- prima postare --> 
			</div>
				<!-- #2 -->
			<div class="postari-list-element">
				<div class="postari-list-element_header">Username : Client</div>
						Acesta este un text pentru a umple acest box pentru prezentarea front-end-ului , 
						urmand si fie text ce va fi stocat in baza de date, text reprezentant cerinta clientului,
						raspunsuri, comentarii, note, linkuri etc.. 
					<div class="postari-list-element_footer">
					<button>rating</button>
					<button>Comment</button> 
					<div class="status">Status:Complet</div>
				</div>
			</div>
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
