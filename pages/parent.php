<html>

<head>
    <link rel="stylesheet" type="text/css" href="../styles/parent.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
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
    ?>
    <div class="header-container">
        <div class="header  bg-secondary">
            <div class="user-details-container">
                <span class="user-name">
                    Email: <?php
                            if (isset($_SESSION['userEmail'])) {
                                echo $_SESSION['userEmail'];
                            } ?>
                </span>
            </div>
            <h1 class="colorWhite">Student Agenda</h1>
            <div class="logout-button">
                <button type="button" class="btn btn-primary button-logout">
                    <a href="parent.php?user=logout">Logout</a>
                </button>
            </div>
        </div>
    </div>


    <div class="datepicker">
        <div class="form-group">

            <div class="form-group">
                <?php
                require "connection.php";

                if (isset($_SESSION['userId'])) {
                    $userID = $_SESSION['userId'];
                    $sql = "SELECT studentID,studentFirstName FROM students where studentParent= $userID";
                } else {
                    header('location: login.php');
                }

                ?>
            </div>
        </div>

        <div class="content-container">
            <?php
            require "connection.php";

            $sqlGetUser = "Select * from students where studentParent=$userID";
            $resultGetUser = mysqli_query($con, $sqlGetUser);
            $rowIndex = 0;
            $assignments = "";
            if (mysqli_num_rows($resultGetUser) > 0) {

                while ($rowUser = mysqli_fetch_array($resultGetUser)) {

                    if ($rowIndex == 0) {
                        $assignments = " assignments.assignmentClass=$rowUser[3]";
                    } else {
                        $assignments = $assignments . " || assignments.assignmentClass=$rowUser[3]";
                    }
                    $rowIndex += 1;
                }

                $sql1 = "SELECT assignments.*,users.userFirstName,courses.courseName FROM assignments INNER JOIN users ON users.userID = assignments.assignmentInstructor INNER JOIN courses ON courses.courseID = assignments.assignmentCourse where $assignments";
            } else {
                $sql1 = "SELECT assignments.*,users.userFirstName,courses.courseName FROM assignments INNER JOIN users ON users.userID = assignments.assignmentInstructor INNER JOIN courses ON courses.courseID = assignments.assignmentCourse where 1=0";
            }

            $result1 = mysqli_query($con, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo "
            <div class='homework-card'>
                <div class='left-container bg-primary'>
                    <span class='homework-title'>" . $row1['courseName'] . "</span>
                </div>
                <div class='right-container  bg-secondary'>
            
                
                <span class='description colorWhite'>" . $row1['assignmentDescription'] . "</span>
                <div class='right-info-content'>
                <span class='teacher-name colorWhite'>" . $row1['userFirstName'] . "</span>
                <span class='date-text colorWhite'>" . $row1['assignmentDate'] . "</span>
                </div>
                
                </div>
            </div> ";
                }
            }
            if (isset($_GET['user']) && $_GET['user'] == 'logout') {
                session_unset();
                session_destroy();
                echo "<script> location.replace('login.php') </script>";
            }

            ?>

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