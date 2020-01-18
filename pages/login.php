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
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <title>Login or Register</title>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

            <div class="login-form">
                <form class="sign-in-htm" action="login_validate.php" method="POST">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input name="username" value="<?php if (isset($_COOKIE['userEmail'])) {
                                                            echo $_COOKIE['userEmail'];
                                                        } else {
                                                            echo '';
                                                        } ?>" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input name="password" type="password" value="<?php if (isset($_COOKIE['userPassword'])) {
                                                                            echo $_COOKIE['userPassword'];
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" name="isRememberPass" type="checkbox" class="check" checked>
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

                <form class="sign-up-htm" action="register_validate.php" id="myform" method="POST">
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
                        <input id="userPassword" name="userPassword" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Confirm Password</label>
                        <input id="confirmPassword" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr-sign-up"></div>
                    <div class="foot-lnk">
                        <label for="tab-1" class="already-member">Already Member?</a>
                    </div>
                </form>


            </div>
        </div>
    </div>


</body>

</html>