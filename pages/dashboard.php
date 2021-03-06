<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <title>Dashboard</title>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['is_logged_in'])) {
        if ($_SESSION['is_logged_in'] == 1) {
            if ($_SESSION['isRememberPass']) {
                setcookie('userName', $_SESSION['userName'], time() + 2 * 24 * 60 * 60);
                setcookie('userEmail', $_SESSION['userEmail'], time() + 2 * 24 * 60 * 60);
                setcookie('userPassword', $_SESSION['userPassword'], time() + 2 * 24 * 60 * 60);
            } else {
                setcookie('userName', '');
                setcookie('userEmail', '');
                setcookie('userPassword', '');
            }
        }
    }

    ?>

    <div class="dashboard-container container">
        <div class="row">
            <div class="sidemenu-container col-md-2">
                <div style="height:5em; display:flex">
                    <span class="user-email">
                        Email: <?php if (isset($_SESSION['userEmail'])) {
                                    echo $_SESSION['userEmail'];
                                } ?>
                    </span>
                </div>
                <?php

                if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'teacher') {

                    echo "       
                <a href='dashboard.php?member=assignment'>Homeworks</a>
                <a href='dashboard.php?member=logout'>Logout</a> ";
                } else {
                    echo "       
                <a href='dashboard.php?member=teacher'>Teachers</a>
                <a href='dashboard.php?member=parent'>Parents</a>
                <a href='dashboard.php?member=student'>Students</a>
                <a href='dashboard.php?member=assignment'>Homeworks</a>
                <a href='dashboard.php?member=logout'>Logout</a>";
                }
                ?>

            </div>

            <div class="content-container col-md-10">
                <div class="row" id="mainContainer">
                    <div style="display: flex;flex:0.4">
                        <h2>Content</h2>
                    </div>
                    <div
                        style="display: flex;flex:0.6;align-items: center; justify-content: flex-end;padding-right: 14px;">
                        <?php
                        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'teacher') {

                            echo "       
                         <button type='button' class='btn btn-primary button-add'><a
                         href='dashboard.php?member=add&subMember=assignment' >Add Homework</a>
                          </button> ";
                        } else if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
                            echo "       
                         <button type='button' class='btn btn-primary button-add'><a
                         href='dashboard.php?member=add&subMember=teacher' >Add Teacher</a>
                 </button>
                 <button type='button' class='btn btn-primary button-add'><a
                         href='dashboard.php?member=add&subMember=parent' >Add Parent</a>
                 </button>
                 <button type='button' class='btn btn-primary button-add'><a
                         href='dashboard.php?member=add&subMember=student' >Add Student</a>
                 </button>
                 <button type='button' class='btn btn-primary button-add'><a
                         href='dashboard.php?member=add&subMember=assignment' >Add Homework</a>
                 </button>";
                        }

                        ?>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="tableContent">

                        </div>
                    </div>
                </div>

                <?php


                if (isset($_GET['member'])) {
                    $member = $_GET['member'];
                    if ($_GET['member'] == 'add' || $_GET['member'] == 'edit') {
                        echo "<script>
                        var main=document.getElementById('mainContainer');
                        main.style.display = 'none';
                        </script>";
                    }
                    if (isset($_GET['subMember'])) {
                        $subMember = $_GET['subMember'];
                    } else {
                        $subMember = "";
                    }
                    if (isset($_GET['memberID'])) {
                        $memberID = $_GET['memberID'];
                    } else {
                        $memberID = "";
                    }
                    runMyFunction($member, $subMember, $memberID);
                } else {

                    if ($_SESSION["userRole"] == "admin") {
                        runMyFunction("teacher");
                    } else runMyFunction("assignment");
                }

                function runMyFunction($member, $subMember = "", $memberID = "")
                {
                    require("connection.php");

                    if (isset($_SESSION['is_logged_in'])) {
                        if ($_SESSION['is_logged_in'] == 1) {

                            $userID = $_SESSION['userId'];
                            switch ($member) {
                                case 'teacher':
                                    $query = "SELECT * FROM users where userRole='teacher'";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Delete</th><th scope='col'>Edit</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger'>";
                                        echo '<a  href=deleteContent.php?member=Delete&deleteMember=teacher&memberID=' . $row[0] . '>Delete</a>';
                                        echo "</button></rd><td> <button class='btn btn-primary' >";
                                        echo '<a  href=dashboard.php?member=edit&subMember=teacher&memberID=' . $row[0] . '>Edit</a>';
                                        echo "</button></td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'parent':
                                    $query = "SELECT * FROM users where userRole='$member'";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Delete</th><th scope='col'>Edit</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger'>";
                                        echo '<a  href=deleteContent.php?member=Delete&deleteMember=parent&memberID=' . $row[0] . '>Delete</a>';
                                        echo "</button> </td><td><button class='btn btn-primary'>";
                                        echo '<a  href=dashboard.php?member=edit&subMember=parent&memberID=' . $row[0] . '>Edit</a>';
                                        echo "</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'assignment':
                                    if ($_SESSION['userRole'] == "teacher") {
                                        $query = "SELECT * FROM assignments where assignmentInstructor=$userID";
                                    } else {
                                        $query = "SELECT * FROM assignments";
                                    }

                                    $result = mysqli_query($con, $query);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>Date</th><th scope='col'>Description</th><th scope='col'>Delete</th><th scope='col'>Edit</th></tr></thead><tbody>";
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_row($result)) {


                                            echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[3] </td><td><button class='btn btn-danger'>";
                                            echo '<a  href=deleteContent.php?member=Delete&deleteMember=assignment&memberID=' . $row[0] . '>Delete</a>';
                                            echo "</button> </td><td><button class='btn btn-primary'>";
                                            echo '<a  href=dashboard.php?member=edit&subMember=editAssignment&memberID=' . $row[0] . '>Edit</a>';
                                            echo "</button> </td></tr>";
                                        }
                                    }

                                    echo "</tbody></table>";

                                    break;
                                case 'student':
                                    $query = "SELECT * FROM students";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Delete</th><th scope='col'>Edit</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger' >";
                                        echo '<a  href=deleteContent.php?member=Delete&deleteMember=student&memberID=' . $row[0] . '>Delete</a>';
                                        echo "</button> </td><td><button class='btn btn-primary'>";
                                        echo '<a  href=dashboard.php?member=edit&subMember=student&memberID=' . $row[0] . '>Edit</a>';
                                        echo "</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'logout':
                                    session_unset();
                                    session_destroy();
                                    echo "<script> location.replace('login.php') </script>";
                                    break;
                                case 'add':
                                    if ($subMember == 'student') {
                                        echo "<div class='container'>";
                                        echo "<div class='row'>";
                                        echo "<div class='col-md'>";
                                        echo "<h2>";
                                        echo  "Add Student";
                                        echo "</h2>";

                                        echo "<div class='row'>";
                                        echo "<form action='saveContent.php?saveMember=student' id='myform' method='POST' class='col-md'> ";
                                        echo "<div class='form-group'>";
                                        echo "<label for='fname'>First Name:</label>";
                                        echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name' /> </div> ";
                                        echo "<div class='form-group'>";
                                        echo "<label for='lname'>Last Name:</label>";
                                        echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' />";
                                        echo "</div>";
                                        echo "</div>";


                                        require "connection.php";


                                        $sqlS = "SELECT userID,userFirstName FROM users where userRole='parent'";
                                        $resultS = mysqli_query($con, $sqlS);


                                        echo "<div class='form-group'>";
                                        echo "<label for='studentParentID'>Parent:</label>";
                                        echo "<select class='form-control' placeholder='Select Parent' name='studentParentID'>";
                                        while ($rowS = mysqli_fetch_array($resultS)) {
                                            echo "<option value=" . $rowS['userID'] . "> " . $rowS['userFirstName'] . "</option>";
                                        }
                                        echo "</select></div>";


                                        echo "<div class='form-group'>";
                                        echo "<label for='class'>Class:</label>";
                                        echo "<select class='form-control' name='class'>";
                                        echo "<option value='1'>1</option>";
                                        echo "<option value='2'>2</option>";
                                        echo "<option value='3'>3</option>";
                                        echo "<option value='4'>4</option>";
                                        echo "<option value='5'>5</option>";
                                        echo "<option value='6'>6</option>";
                                        echo "<option value='7'>7</option>";
                                        echo "<option value='8'>8</option>";
                                        echo "<option value='9'>9</option>";
                                        echo "</select>";
                                        echo "</div>";
                                        echo "<button type='submit' class='btn btn-primary'>";
                                        echo "Submit";
                                        echo "</button>";
                                        echo "<button type='button' class='btn btn-cancel'>";
                                        echo '<a  href=dashboard.php?member=student>Cancel</a>';
                                        echo "</button>";
                                        echo "</form>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        if ($subMember == "teacher") {
                                            echo "<div class='container'>";
                                            echo "<div class='row'>";
                                            echo "<div class='col-md'>";
                                            echo "<h2>";
                                            echo  "Add Teacher";
                                            echo "</h2>";

                                            echo "<div class='row'>";
                                            echo "<form action='saveContent.php?saveMember=teacher' id='myform' method='POST' class='col-md'> ";
                                            echo "<div class='form-group'>";
                                            echo "<label for='fname'>First Name:</label>";
                                            echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name' />";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='lname'>Last Name:</label>";
                                            echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' />";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='lname'>Email:</label>";
                                            echo "<input type='text' class='form-control' name='ename' placeholder='Enter Email' />";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='lname'>Password:</label>";
                                            echo "<input type='text' class='form-control' name='pass' placeholder='Enter Password' />";
                                            echo "</div>";

                                            echo "</div>";

                                            echo "<button type='submit' class='btn btn-primary'>";
                                            echo "Submit";
                                            echo "</button>";
                                            echo "<button type='button' class='btn btn-cancel'>";
                                            echo '<a  href=dashboard.php?member=teacher>Cancel</a>';
                                            echo "</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        } else {
                                            if ($subMember == "parent") {
                                                echo "<div class='container'>";
                                                echo "<div class='row'>";
                                                echo "<div class='col-md'>";
                                                echo "<h2>";
                                                echo  "Add Parent";
                                                echo "</h2>";

                                                echo "<div class='row'>";
                                                echo "<form action='saveContent.php?saveMember=parent' id='myform' method='POST' class='col-md'> ";
                                                echo "<div class='form-group'>";
                                                echo "<label for='fname'>First Name:</label>";
                                                echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name' />";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='lname'>Last Name:</label>";
                                                echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' />";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='lname'>Email:</label>";
                                                echo "<input type='text' class='form-control' name='ename' placeholder='Enter Email' />";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='lname'>Password:</label>";
                                                echo "<input type='text' class='form-control' name='pass' placeholder='Enter Password' />";
                                                echo "</div>";

                                                echo "</div>";

                                                echo "<button type='submit' class='btn btn-primary'>";
                                                echo "Submit";
                                                echo "</button>";
                                                echo "<button type='button' class='btn btn-cancel'>";
                                                echo '<a  href=dashboard.php?member=parent>Cancel</a>';
                                                echo "</button>";
                                                echo "</form>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if ($subMember == "assignment") {
                                                echo "<div class='container'>";
                                                echo "<div class='row'>";
                                                echo "<div class='col-md'>";
                                                echo "<h2>";
                                                echo  "Add Homework";
                                                echo "</h2>";

                                                echo "<div class='row'>";
                                                echo "<form action='saveContent.php?saveMember=assignment' id='myform' method='POST' class='col-md'> ";
                                                echo "<div class='form-group'>";
                                                echo "<label for='assignmentDate'>Date:</label>";
                                                echo "<input type='date' name='assignmentDate' class='form-control' />";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='assignmentDesc'>Description:</label>";
                                                echo "<input type='text' name='assignmentDesc' class='form-control' />";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='teacherID'>Teacher:</label>";

                                                $sqlH = "SELECT userID,userFirstName FROM users where userRole='teacher'";
                                                $resultH = mysqli_query($con, $sqlH);

                                                echo "<select class='form-control' placeholder='Select Teacher' name='teacherID'>";
                                                while ($rowH = mysqli_fetch_array($resultH)) {
                                                    echo "<option value=" . $rowH['userID'] . "> " . $rowH['userFirstName'] . "</option>";
                                                }
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='class'>Class:</label>";
                                                echo "<select class='form-control' name='class'>";
                                                echo "<option value='1'>1</option>";
                                                echo "<option value='2'>2</option>";
                                                echo "<option value='3'>3</option>";
                                                echo "<option value='4'>4</option>";
                                                echo "<option value='5'>5</option>";
                                                echo "<option value='6'>6</option>";
                                                echo "<option value='7'>7</option>";
                                                echo "<option value='8'>8</option>";
                                                echo "<option value='9'>9</option>";
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='courseID'>Course:</label>";

                                                $sqlH = "SELECT courseID,courseName FROM courses";
                                                $resultH = mysqli_query($con, $sqlH);

                                                echo "<select class='form-control' placeholder='Select Teacher' name='courseID'>";
                                                while ($rowH = mysqli_fetch_array($resultH)) {
                                                    echo "<option value=" . $rowH['courseID'] . "> " . $rowH['courseName'] . "</option>";
                                                }
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<button type='submit' class='btn btn-primary'>";
                                                echo "Submit";
                                                echo "</button>";
                                                echo "<button type='button' class='btn btn-cancel'>";
                                                echo '<a  href=dashboard.php?member=assignment>Cancel</a>';
                                                echo "</button>";
                                                echo "</form>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        }
                                    }
                                    break;
                                case 'edit':
                                    if ($subMember == 'student') {
                                        require "connection.php";

                                        $sql = "SELECT * FROM students where studentID=$memberID";

                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_row($result);


                                        echo "<div class='container'>";
                                        echo "<div class='row'>";
                                        echo "<div class='col-md'>";
                                        echo "<h2>";
                                        echo  "Edit Student";
                                        echo "</h2>";

                                        echo "<div class='row'>";
                                        echo "<form action='updateContent.php?editMember=student&memberID=$memberID' id='myform' method='POST' class='col-md'> ";
                                        echo "<input type='text' class='display-none' name='id' value='$row[0]'/>";
                                        echo "<div class='form-group'>";
                                        echo "<label for='fname'>First Name:</label>";
                                        echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name' value='$row[1]' /> </div> ";
                                        echo "<div class='form-group'>";
                                        echo "<label for='lname'>Last Name:</label>";
                                        echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' value='$row[2]'/>";
                                        echo "</div>";
                                        echo "</div>";


                                        require "connection.php";

                                        $sqlS = "SELECT userID,userFirstName FROM users where userRole='parent'";
                                        $resultS = mysqli_query($con, $sqlS);

                                        echo "<div class='form-group'>";
                                        echo "<label for='studentParentID'>Parent:</label>";
                                        echo "<select class='form-control' placeholder='Select Parent' name='studentParentID' value='$row[4]'>";
                                        while ($rowS = mysqli_fetch_array($resultS)) {
                                            echo "<option value=" . $rowS['userID'] . "> " . $rowS['userFirstName'] . "</option>";
                                        }
                                        echo "</select></div>";


                                        echo "<div class='form-group'>";
                                        echo "<label for='class'>Class:</label>";
                                        echo "<select class='form-control' name='class' value='$row[3]'>";
                                        echo "<option value='1'>1</option>";
                                        echo "<option value='2'>2</option>";
                                        echo "<option value='3'>3</option>";
                                        echo "<option value='4'>4</option>";
                                        echo "<option value='5'>5</option>";
                                        echo "<option value='6'>6</option>";
                                        echo "<option value='7'>7</option>";
                                        echo "<option value='8'>8</option>";
                                        echo "<option value='9'>9</option>";
                                        echo "</select>";
                                        echo "</div>";
                                        echo "<button type='submit' class='btn btn-primary'>";
                                        echo "Update";
                                        echo "</button>";
                                        echo "<button type='button' class='btn btn-cancel'>";
                                        echo '<a href=dashboard.php?member=student>Cancel</a>';
                                        echo "</button>";
                                        echo "</form>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        if ($subMember == "teacher") {
                                            require "connection.php";

                                            $sql = "SELECT * FROM users where userID=$memberID";
                                            $result = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_row($result);

                                            echo "<div class='container'>";
                                            echo "<div class='row'>";
                                            echo "<div class='col-md'>";
                                            echo "<h2>";
                                            echo  "Edit Teacher";
                                            echo "</h2>";

                                            echo "<div class='row'>";
                                            echo "<form action='updateContent.php?updateMember=teacher&memberID=$memberID' id='myform' method='POST' class='col-md'> ";
                                            echo "<input type='text' class='display-none' name='id' value='$row[0]'/>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='fname'>First Name:</label>";
                                            echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name'  value='$row[1]'/>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='lname'>Last Name:</label>";
                                            echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' value='$row[2]' />";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='ename';>Email:</label>";
                                            echo "<input type='text' class='form-control' name='ename' placeholder='Enter Email' value='$row[3]'/>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='pass';>Password:</label>";
                                            echo "<input type='text' class='form-control' name='pass' placeholder='Enter Password' value='$row[4]' />";
                                            echo "</div>";

                                            echo "</div>";

                                            echo "<button type='submit' class='btn btn-primary'>";
                                            echo "Update";
                                            echo "</button>";
                                            echo "<button type='button' class='btn btn-cancel '>";
                                            echo '<a  href=dashboard.php?member=teacher>Cancel</a>';
                                            echo "</button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        } else {
                                            if ($subMember == "parent") {
                                                require "connection.php";

                                                $sql = "SELECT * FROM users where userID=$memberID";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($result);

                                                echo "<div class='container'>";
                                                echo "<div class='row'>";
                                                echo "<div class='col-md'>";
                                                echo "<h2>";
                                                echo  "Edit Parent";
                                                echo "</h2>";

                                                echo "<div class='row'>";
                                                echo "<form action='updateContent.php?updateMember=parent&memberID=$memberID' id='myform' method='POST' class='col-md'> ";
                                                echo "<input type='text' class='display-none' name='id' value='$row[0]'/>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='fname'>First Name:</label>";
                                                echo "<input type='text' class='form-control' name='fname' placeholder='Enter First Name' value='$row[1]'/>";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='lname'>Last Name:</label>";
                                                echo "<input type='text' class='form-control' name='lname' placeholder='Enter Last Name' value='$row[2]'/>";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='ename';>Email:</label>";
                                                echo "<input type='text' class='form-control' name='ename' placeholder='Enter Email' value='$row[3]'/>";
                                                echo "</div>";
                                                echo "<div class='form-group'>";
                                                echo "<label for='pass';>Password:</label>";
                                                echo "<input type='text' class='form-control' name='pass' placeholder='Enter Password' value='$row[5]' />";
                                                echo "</div>";

                                                echo "</div>";

                                                echo "<button type='submit' class='btn btn-primary'>";
                                                echo "Update";
                                                echo "</button>";
                                                echo "<button type='button' class='btn btn-cancel'>";
                                                echo '<a  href=dashboard.php?member=parent>Cancel</a>';
                                                echo "</button>";
                                                echo "</form>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            if ($subMember == "editAssignment") {
                                                require "connection.php";

                                                $sql = "SELECT * FROM assignments where assignmentID=$memberID";
                                                $result = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_row($result);

                                                echo "<div class='container'>";
                                                echo "<div class='row'>";
                                                echo "<div class='col-md'>";
                                                echo "<h2>";
                                                echo  "Edit Homework";
                                                echo "</h2>";

                                                echo "<div class='row'>";
                                                echo "<form action='updateContent.php?updateMember=assignment&memberID=$memberID' id='myform' method='POST' class='col-md'> ";
                                                echo "<div class='form-group'>";
                                                echo "<label for='assignmentDate'>Date:</label>";
                                                echo "<input type='date' name='assignmentDate' class='form-control' value='$row[1]'/>";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='assignmentDesc'>Description:</label>";
                                                echo "<input type='text' name='assignmentDesc' class='form-control' value='$row[3]' />";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='teacherID'>Teacher:</label>";

                                                $sqlH = "SELECT userID,userFirstName FROM users where userRole='teacher'";
                                                $resultH = mysqli_query($con, $sqlH);

                                                echo "<select class='form-control' placeholder='Select Teacher' name='teacherID' value='$row[2]'>";
                                                while ($rowH = mysqli_fetch_array($resultH)) {
                                                    echo "<option value=" . $rowH['userID'] . "> " . $rowH['userFirstName'] . "</option>";
                                                }
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='class'>Class:</label>";
                                                echo "<select class='form-control' name='class' value='$row[5]'>";
                                                echo "<option value='1'>1</option>";
                                                echo "<option value='2'>2</option>";
                                                echo "<option value='3'>3</option>";
                                                echo "<option value='4'>4</option>";
                                                echo "<option value='5'>5</option>";
                                                echo "<option value='6'>6</option>";
                                                echo "<option value='7'>7</option>";
                                                echo "<option value='8'>8</option>";
                                                echo "<option value='9'>9</option>";
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<div class='form-group'>";
                                                echo "<label for='courseID'>Course:</label>";

                                                $sqlH = "SELECT courseID,courseName FROM courses";
                                                $resultH = mysqli_query($con, $sqlH);

                                                echo "<select class='form-control' placeholder='Select Teacher' name='courseID' value='$row[4]'>";
                                                while ($rowH = mysqli_fetch_array($resultH)) {
                                                    echo "<option value=" . $rowH['courseID'] . "> " . $rowH['courseName'] . "</option>";
                                                }
                                                echo "</select>";
                                                echo "</div>";

                                                echo "<button type='submit' class='btn btn-primary'>";
                                                echo "Update";
                                                echo "</button>";
                                                echo "<button type='button' class='btn btn-cancel'>";
                                                echo '<a  href=dashboard.php?member=assignment>Cancel</a>';
                                                echo "</button>";
                                                echo "</form>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        }
                                    }
                                    break;
                                default:
                                    break;
                            }
                        }
                    } else {
                        // session_unset();
                        // session_destroy();
                        echo "<script> location.replace('login.php') </script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>