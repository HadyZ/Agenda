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

    <div class="dashboard-container container">
        <div class="row">
            <div class="sidemenu-container col-md-2">
                <div style="height:5em"></div>
                <a href="#about">Teachers</a>
                <a href="#services">Parents</a>
                <a href="#clients">Students</a>
                <a href="#contact">Homewors</a>
                <a href="#login.php">Logout</a>
            </div>

            <div class="content-container col-md-10">
                <div class="row">
                    <div style="display: flex;flex:0.4">
                        <h2>Sidebar</h2>
                    </div>
                    <div style="display: flex;flex:0.6;align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teacherForm">
                Add Assignment
              </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTeacherForm">
                Add teacher
              </button>

                        <div class="modal fade" id="addTeacherForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password:</label>
                                                <input type="text" class="form-control" id="description" placeholder="Enter Password" />
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
                        <div class="modal fade" id="teacherForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <label for="exampleInputEmail1">Title:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description:</label
                          >
                          <textarea
                            type="text"
                            class="form-control"
                            id="description"
                            placeholder="Description"
                          ></textarea>
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

    <script>
    function tableCreate() {
        var html = "";
        html += "<table class='table table-striped'><thead> <tr>";
        html +=
            "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Handle</th></tr></thead><tbody>"

        for (var i = 0; i < 5; i++) {

            html += "<tr>";
            for (var j = 0; j < 4; j++) {
                html += "<td>" + j + "</td>";
            }
            html += "</tr>";
        };
        html += "</tbody></table>";

        var dd = document.getElementById("tableContent").insertAdjacentHTML("beforeend", html);

    }
    tableCreate();
    </script>
</body>

</html>