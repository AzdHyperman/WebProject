<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="view/css/normalsize/profile.css">
	<link rel="stylesheet" href="view/css/responsive/profileR.css">
    <link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
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
                <img class="avatar"alt="Profile" src="view/imagini/default-avatar.png">
            </button>
				<label href="#">Username</label> 
				<div class="dropdown-content">
					<a href="./profile.html">Profile</a>
					<a href="./admin.html">Admin</a>
					<a href="#">DarkMode</a>
					<a href="./login.html">Logout</a>
				</div>
		</div>
	</header>
        <h1 id="titlu_proiect">Profilul tau</h1>
        <div class="center-page">
            <div class="profile">
            <form action="" method="post" enctype="multipart/form-data">
            <img src="view/imagini/<?php echo $result[0]['avatar']; ?>" onClick="triggerClick()" id="profileDisplay">
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage">
            <!-- <input type="file" name="myImage" accept="image/*" /> -->
            <button type="submit" name="save-img">Apply</button>
            </form>
        </div>
            <form  action="index.php?action=profile" method="post">
                
                <label for="emailUser">Email</label>
                <input type="text" name="email" id="emailUser" value="<?php echo $result[0]["email"]; ?>">
            
            
                <label for="usernameUser">Username</label>
                <input type="text" name="username" id="usernameUser" value="<?php echo $result[0]["username"]; ?>">
            

                <label for="passUser">Password</label>
                <input type="text" name="password" id="passUser" value="<?php echo $result[0]["password"]; ?>" >

                <?php echo $result[0]["avatar"]; ?>
                <a href="#">Change Password</a>

                <button type="submit" name="save-profile">Apply</button>
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
        <script>
        function triggerClick(e) {
        document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
        }
        </script>
    
</body>
</html>