<!DOCTYPE html>
<html class="no-js" lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PuAC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="view/css/normalsize/login.css">
        <link rel="stylesheet" href="view/css/responsive/loginR.css">
    </head>
    <body>
       <header class="titlu_proiect">
           <h1> Purchase </h1>
           <h1> Advising </h1>
           <h1> Council </h1>
       </header>
      <main class="login_register">
            <form action="index.php?action=login" method="POST" class="form_login" id="form_login">  
                
                <div>
                    <label for="loginEmail">Email</label>
                    <input type="text"  name="username" id="loginEmail" placeholder="user...">
                </div> 

                <div>     
                    <label for="loginPassword">Password</label>
                    <input type="password" required name="password" id="loginPassword" placeholder="Password...">
                </div>

                <button type="submit" name="loginbtn">Login</button>
                
                <p id="text_switch_login"> Daca nu ai cont,</p>
                <a id="switch_link_to_register" onclick="hideLogin()" href="#">Switch to Register</a>
                
            </form>

            <form class="form_register" action="index.php?action=register" method="POST" id="form_register">
               
                <div>
                    <label for="registeredEmail">Email</label>
                    <input type="text"  name="email" id="registeredEmail" placeholder="Email...">
                </div>

                <div>
                    <label for="registeredUsername">Username</label>
                    <input type="text"  name="username" id="registeredUsername" placeholder="Username...">
                </div>
                
                <div>
                    <label for="registeredPassword">Password</label>
                    <input type="password" required name="password" id="registeredPassword" placeholder="Password...">
                </div>

                <button type="submit" name="registerbtn">Register</button>

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