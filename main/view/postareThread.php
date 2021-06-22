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
    <link rel="stylesheet" href="view/css/normalsize/home.css">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
	<link rel="stylesheet" href="view/css/responsive/homeR.css">
	<link rel="stylesheet" href="view/css/responsive/navbarR.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.postari-list{
    width: 70%;
    margin:auto;
}
</style>

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
				<img class="avatar" alt="Profile" src="view/imagini/<?php echo $avatar;?>"></button>
				<label href="#"><?php echo $username; ?></label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<?php 
						if($result2[0]["admin"]==1) 
						{
							echo '<a href="index.php?action=logpage">Admin</a>';
						}
					?>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>
<div class="postari-list" id="postari-list">
<?php
if(! empty($result)) 
{
    foreach($result as  $k=> $v)
    {
        
?>
		
	<div class="postari-list-element" >
				<div class="postari-list-element_header"> 
				<?php echo "Username: ".$result[$k]["username"]." Rank: ".$result[$k]["rank"]." Categorie: ".$result[$k]["categorie"];?>
				</div> 
	<!-- element_header -->
					<p><?php echo $result[$k]["text"];?></p> 
						
				<form id="add-comment" class="add-comment" action="" method="post">
				 <input type="hidden" name="post_id" value="<?php echo $result[$k]["post_id"]; ?>" required>
				 <!-- <?php echo $result[$k]["post_id"]; ?> -->
				 <textarea id="casuta-comment" name="comm" placeholder="add-comment"></textarea>
				 <button type="submit" name="comment">posteaza</button>
		 		</form>
	<!-- ELEMENT FOOTER  -->
		<!-- casuta comment  -->	
		<div class="replies" id="replies">
              <!-- comentariile la o postare  -->
        <input type="hidden" name="post_id" value="<?php echo $result[$k]["post_id"]; ?>" required>
        <?php 		
        $post_id=$result[$k]["post_id"]; echo $post_id;
          $comments=$comment->getCommentsById($post_id);          
        if(!empty($comments) )
        {
                    //  echo json_encode($comments);
            foreach($comments as $k=>$v)
        {
            $reply_of=$comments[$k]["reply_of"];
            $replies=array();
            if($reply_of==0)
            {
        ?>

				<div class="reply_form">
                <div class="reply_header"><?php echo $comments[$k]["username"];?>
                </div>
		<!-- header  -->
                <p>
                <?php 
                    // echo json_encode($comments);
                $comm_id= $comments[$k]["comm_id"];
                echo $comm_id."<br>";
                echo $comments[$k]["text"]."<br>";					
                ?>	
                </p>
                <div class="reply_footer">
                    <button>rating</button>
                    <button>Comment</button>
                    <a href="index.php?action=delete-comment&comm_id=<?php echo $comments[$k]['comm_id']?>">DELETE</a>
                </div>
		<!-- footer  -->
						<!-- casuta comment  -->
				 <form id="add-comment" class="add-comment" action="" method="post">
				 <input type="hidden" name="post_id" value="<?php echo $comments[$k]["post_id"]; ?>" required>
				 <input type="hidden" name="comm_id" value="<?php echo $comm_id;?>" required>
                 <textarea id="casuta-comment" name="comm" placeholder="add-reply"></textarea>
				 <button type="submit" name="reply">Reply</button>
				 </form>
                 <?php
                 
                 foreach($comments as $replykey=>$reply){
                 if($comments[$replykey]["reply_of"]==$comm_id){?>
                 <div class="replies">
                     <div class="reply_form">
                        <div class="reply_header"><?php echo $comments[$replykey]["username"]; ?> </div>
                         <p><?php echo $comm_id."<br>";
                                 echo $comments[$replykey]["text"];
                            ?> </p>
							<div class="reply_footer">
							<a href="index.php?action=delete-comment&comm_id=<?php echo $comments[$replykey]['comm_id']?>">DELETE</a>
							</div>
                     </div>
                 </div>
                 <?php
                 }
                }?>
					
				 </div> 
				 <!-- reply form  -->
                 <?php 
                }//check reply_of 
                } //foreach
				}
                ?>
	    </div>
		<!-- end replies -->
	</div>
<?php 
    }
}//end if empty
?>
</div>

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
</script>
</body>
</html>