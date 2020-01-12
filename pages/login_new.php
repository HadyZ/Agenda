<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="style.css">
        <title>Login or Register</title>
        <style type="text/css">
            p.bluecolor{color:blue}
        </style>
        <script type="text/javascript">
                
               //variables:
                var is_username_ok=0;
                var is_password_strong=0;
                var does_password_match=0;
                
 //---------------------------------------------------------------------------------------------------------
                
                function check_pass_strength(){
                    
                    var first_password = document.getElementById("userPassword").value;
                    var m = document.getElementById("confirmPassword");
                    var l =first_password.length;
                    
                    
                    if (l>0 && l<=5)
                        {  
                            
                            m.style.visibility="visible";
                            m.style.color="red";
                            is_password_strong=0;
                        }
                        else 
                        {   is_password_strong=1;
                            m.style.visibility="hidden";
                        }
                  }
              
              
 //---------------------------------------------------------------------------------------------------------          
                    
                    function check_pass_match(){
                        
                        var first_password = document.getElementById("userPassword").value;
                        var second_password = document.getElementById("confirmPassword").value;
                        m = document.getElementById("confirmPassword");
                        
                        if(first_password != second_password)
                            {
                                
                        
                        does_password_match=0;
                        m.style.color="red";
                        m.innerHTML="Passwords don't match !";       
                            
                            }
                            else if (first_password !="" && second_password != "") {
                                
                                m.innerHTML="Password match success!"
                                m.style.color="green";
                                does_password_match=1;
                            }
                            else  // meaning both empty, also we should not allow form to be submitted
                            {
                                does_password_match=0;
                              m.style.visibilty = "hidden";  
                            }
                        
                    }
                    
                    
 //---------------------------------------------------------------------------------------------------------               
                
                   
    
    function check_username()
    {if(document.getElementById("username").value=="")
        is_username_ok=0;         
        
     else {
         is_username_ok=1; 
     }
 }
    function validate_all_input(){
                    
                    // the call to all these functions 
                    // is not necessary as we are chekcing one case by one case
                    // except in the username case.
                   check_username();
                   check_pass_match();
                   check_pass_strength();
                    
                    
                    //alert(is_anything_wrong);
                       if(is_username_ok && 
                               is_password_strong && 
                               does_password_match) 
                    {return true;
                    }
                    else {
                        alert("Fix your form!");
                        return false;
                    }
                }
                
            </script>
    </head>

	
	
	 <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
	
    <div class="login-form">
      <form class="sign-in-htm" action="login_validate.php" method="GET">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input  name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input  name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
       <!-- <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div> -->
      </form>
	  
	  <!--onsubmit="return validate_all_input();" -->
	  
	  <form class="sign-up-htm" action="register_validate.php" id="myform"  method="POST">
	   <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="name" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Email</label>
          <input id="username" name="email" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="userPassword" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="confirmPassword" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
	  
      
    </div>
  </div>
</div>
  
  
</body>
</html>
