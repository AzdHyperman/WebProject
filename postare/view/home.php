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
	<!-- <link rel="stylesheet" href="view/css/responsive/navbar.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<label href="#"><?php echo $username; ?></label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<a href="index.php?action=logpage">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>

	<h1 class="titlu_proiect">Purchase Advising Council</h1>

	<main class="center-page">
		<div class="postare">
			<form id="postareForm"  method="post" >
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
			<button type="submit"  name="add"  >Posteaza</button>
			</form>
		</div>

		<div class="postari-list" id="postari-list" onload="getPostare()">
		<?php
			if(! empty($result)) 
			{
				// echo json_encode($result);
			foreach($result as  $k=> $v)
			{
			?>
			<!-- #2 -->
			<div class="postari-list-element" >
				<div class="postari-list-element_header"> <?php echo "Username: ".$result[$k]["username"]." Rank: ".$result[$k]["rank"]." Categorie: ".$result[$k]["categorie"];?></div>
						<p><?php echo $result[$k]["text"];?></p> 
						
					<div class="postari-list-element_footer">
					<button>rating</button>
					<?php $post_id= $result[$k]["post_id"];?>
					<button onclick="replybutton">Comment</button> 
					<a class="btnEditAction"
                        href="index.php?action=edit-postare&post_id=<?php echo $result[$k]["post_id"]; ?>">
                        EDIT
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=delete-postare&post_id=<?php echo $result[$k]["post_id"]; ?>" >
                        DELETE
                        </a>
					<div class="status"><?php echo "Status: ".$result[$k]["stats"];?></div>
					
				</div>
				<div class="add-comment">
					<textarea id="casuta-comment" placeholder="add-comment"></textarea>
					<button onclick="loadDoc()">posteaza</button>
				</div>
				<div class="replies" id="replies"></div>
			</div>
			<?php }} ?>
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
		
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
		function replybutton()
		{
		
			var x = document.getElementById("add-comment");
 			 if (x.style.display === "none") {
    		x.style.display = "flex";
  			} else {
   			 x.style.display = "none";
  					}
			}
		
		function userMenu() {
  			document.getElementById("myDropdown").classList.toggle("show");
		

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
		}		
		document.getElementById('postareForm').addEventListener('submit', addPostare);
		function addPostare(e){
      e.preventDefault();

      var text = document.getElementById('text-postare').value;
	  var categorie=document.getElementById('categorie').value;
      var params = "text="+text+"&categorie="+categorie;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '?action=add-postare', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){
        console.log(this.responseText);
      }

      xhr.send(params);
    }
	document.getElementById('postareForm').addEventListener('submit', getPostare);
	function getPostare(e){
      e.preventDefault();


      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'index.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function(){
        document.getElementById("postari-list").innerHTML = this.responseText;
		console.log(this.responseText);
      }

      xhr.send();
    }	
	</script>
</body>
</html>
