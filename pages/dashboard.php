<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <title>Welcome</title>
</head>

<body>
    <?php
    session_start();
    ?>

    <div class="dashboard-container container">
        <div class="row">
            <div class="sidemenu-container col-md-2">
                <div style="height:5em"></div>
                <a href="dashboard.php?member=teacher">Teachers</a>
                <a href="dashboard.php?member=parent">Parents</a>
                <a href="dashboard.php?member=student">Students</a>
                <a href="dashboard.php?member=assignment">Homeworks</a>
                <a href="dashboard.php?member=logout">Logout</a>
            </div>

            <div class="content-container col-md-10">
                <div class="row">
                    <div style="display: flex;flex:0.4">
                        <h2>Content</h2>
                    </div>
                    <div style="display: flex;flex:0.6;align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teacherForm">
                            Add Assignment
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTeacherForm">
                            Add teacher
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentForm">
                            Add Student
                        </button>

                        <div class="modal fade" id="addStudentForm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Add Student
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Id:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter First Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter First Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Parent First Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Parent Last Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Parent Phone:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Class:</label>
                                                <select multiple class="form-control" id="courseSelect">
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="addTeacherForm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Add Teacher
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">First Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter First Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password:</label>
                                                <input type="text" class="form-control" id="description"
                                                    placeholder="Enter Password" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Class:</label>
                                                <select multiple class="form-control" id="courseSelect">
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Course:</label>
                                                <select multiple class="form-control" id="courseSelect">
                                                    <option>English</option>
                                                    <option>Math</option>
                                                    <option>Arabic</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="teacherForm" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Assignment
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name:</label>
                                                <input type="text" disabled class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Title" value="Teacher Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Title" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description:</label>
                                                <textarea type="text" class="form-control" id="description"
                                                    placeholder="Description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Course:</label>
                                                <select class="form-control" id="courseSelect">
                                                    <option>English</option>
                                                    <option>Math</option>
                                                    <option>Arabic</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Class:</label>
                                                <select class="form-control" id="sectionSelect">
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputPassword1">Date:</label>

                                                <input type="date" class="form-control" id="datepicker" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    runMyFunction($member);
                } else {
                    if ($_SESSION["userRole"] == "admin")
                        runMyFunction("teacher");
                    else runMyFunction("assignment");
                }

                function runMyFunction($member)
                {
                    require("connection.php");


                    if (isset($_SESSION['is_logged_in'])) {
                        if ($_SESSION['is_logged_in'] == 1) {


                            switch ($member) {
                                case 'teacher':
                                    $query = "SELECT * FROM users where userRole='$member'";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Action</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger' >Delete</button> <button class='btn btn-primary'>Edit</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'parent':
                                    $query = "SELECT * FROM users where userRole='$member'";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Action</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger' >Delete</button> <button class='btn btn-primary'>Edit</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'student':
                                    $query = "SELECT * FROM students";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Action</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger' >Delete</button> <button class='btn btn-primary'>Edit</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";

                                    break;
                                case 'assignment':
                                    $query = "SELECT * FROM assignments";
                                    $result = mysqli_query($con, $query);
                                    $r = mysqli_num_rows($result);

                                    echo "<table class='table table-striped'><thead> <tr>";
                                    echo "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Action</th></tr></thead><tbody>";
                                    for ($j = 0; $j < $r; $j++) {
                                        $row = mysqli_fetch_row($result);

                                        echo "<tr><td> $row[0] </td> <td>$row[1] </td><td>$row[2] </td><td><button class='btn btn-danger' >Delete</button> <button class='btn btn-primary'>Edit</button> </td></tr>";
                                    }
                                    echo "</tbody></table>";
                                    break;
                                case 'logout':
                                    session_unset();
                                    session_destroy();
                                    echo "<script> location.replace('login.php') </script>";
                                    // exit(header("location:login.php"));
                                    break;
                                default:
                                    break;
                            }
                        }
                    } else {
                        session_unset();
                        session_destroy();
                        echo "<script> location.replace('login.php') </script>";
                    }
                }

                function onDeleteRow()
                {
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