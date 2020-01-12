<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
        <meta charset="UTF-8">
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
                    
                    var first_password = document.getElementById("firstpass").value;
                    var m = document.getElementById("shortpassmessage");
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
                        
                        var first_password = document.getElementById("firstpass").value;
                        var second_password = document.getElementById("secondpass").value;
                        m = document.getElementById("second_pass_message");
                        
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
                               does_password_match && 
                               ) 
                    {return true;
                    }
                    else {
                        alert("Fix your form!");
                        return false;
                    }
                }
                
            </script>
    </head>
    <body> 
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
  </div>
    </body>
</html>
