<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            p.bluecolor{color:blue}
        </style>
    </head>
    <body>
        <script type="text/javascript">
            <!--
    alert("Failed to login, please try again");
    
    -->
        </script>
         <form action="login_validate.php" method="POST">
                <p class="bluecolor">Try again</p>
                <p class="bluecolor">Login</p>
                <p>Username or Email</p>
                <input type="text" size="15" name="username"/><br/>
                <p>Password</p>
                <input type="password" size="15" name="password"/><br/>
                <input type="submit" value="Login" style="color: white ; background: blue"/>
                </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
