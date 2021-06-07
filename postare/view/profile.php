<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/normalsize/profile.css">
	<link rel="stylesheet" href="../css/responsive/profileR.css">
    <link rel="stylesheet" href="../css/normalsize/navbar.css">
	<link rel="stylesheet" href="../css/normalsize/footer.css">
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
                <img class="avatar"alt="Profile" src="../imagini/default-avatar.png">
            </button>
				<label href="#">Username</label> 
				<div class="dropdown-content">
					<a href="./profile.html">Profile</a>
					<a href="./admin.html">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="./login.html">Logout</a>
				</div>
		</div>
	</header>
        <h1 id="titlu_proiect">Profilul tau</h1>
        <div class="center-page">
            <div class="profile">
            <img alt="Profile" src="../imagini/default-avatar.png">
            <input type="file" name="myImage" accept="image/*" />
        </div>
            <form  action="index.php?action=profile-page">
                <label for="numeUser"> Surname</label>
                <input type="text" name="nume" id="numeUser" >
                
             
                <label for="prenumeUser">First name</label>
                <input type="text" name="prenume" id="prenumeUser">
            
            
                <label for="emailUser">Email</label>
                <input type="text" name="email" id="emailUser">
            
            
                <label for="usernameUser">Username</label>
                <input type="text" name="usermane" id="usernameUser">
            

                <label for="passUser">Password</label>
                <input type="text" name="password" id="passUser">


                <a href="#">Change Password</a>

           
                <button>Apply</button>
            </form>
        </div>
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
    
</body>
</html>