<?php
include_once "database.php";
$db=new database();
if(isset($_COOKIE["token"])){
if($db->verifyToken($_COOKIE["token"]))
    header("Location:./home.php");
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PuAC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
       <header class="titlu_proiect">
           <h1> Purchase </h1>
           <h1> Advising </h1>
           <h1> Council </h1>
       </header>
      <main class="login_register">
            <form action="loginFunction.php" method="POST" class="form_login" id="form_login">  
                
                <div>
                    <label for="loginEmail">Email</label>
                    <input type="text"  name="loginEmail" id="loginEmail" placeholder="Email...">
                </div> 

                <div>     
                    <label for="loginPassword">Password</label>
                    <input type="password" required name="loginPassword" id="loginPassword" placeholder="Password...">
                </div>

                <button type="submit">Login</button>
                
                <p id="text_switch_login"> Daca nu ai cont,</p>
                <a id="switch_link_to_register" onclick="hideLogin()" href="#">Switch to Register</a>
                
            </form>

            <form class="form_register" action="registerFunction.php" method="POST" id="form_register">
               
                <div>
                    <label for="registerEmail">Email</label>
                    <input type="text"  name="registerEmail" id="registerEmail" placeholder="Email...">
                </div>

                <div>
                    <label for="registerNume">Nume</label>
                    <input type="text"  name="registerNume" id="registerNume" placeholder="Nume...">
                </div>

                
                <div>
                    <label for="registerPassword">Password</label>
                    <input type="password" required name="registerPassword" id="registerPassword" placeholder="Password...">
                </div>

                <button type="submit">Register</button>

                <p id="text_switch_register"> Daca ai deja cont,</p>
                <a id="switch_link_to_login" onclick="hideRegister()" href="#">Switch to Login</a>

            </form>
          
        </main> 
       <script>
            function hideLogin() {
       
                var x=document.getElementById("form_login"); 
                   var y=document.getElementById("form_register"); 
                   if(y.style.display == "" || y.style.display == "none" ){
                    x.style.display = "none";
                    y.style.display= "flex";
                    
                   }
               }
               function hideRegister(){
                var x=document.getElementById("form_login");
                   var y=document.getElementById("form_register");
                   if(x.style.display == "none" || x.style.display == "" ){
                       x.style.display = "flex";
                       y.style.display= "none";
                   }
            
            
               }
             </script>
    </body>
</html>