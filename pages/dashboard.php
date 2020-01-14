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
    <script>
    function tableCreate() {
        var html = "";
        html += "<table class='table table-striped'><thead> <tr>";
        html +=
            "<th scope='col'>#</th>  <th scope='col'>First</th><th scope='col'>Last</th><th scope='col'>Handle</th></tr></thead><tbody>"

        for (var i = 0; i < 5; i++) {

            html += "<tr>";
            for (var j = 0; j < 3; j++) {
                html += "<td>" + j + "</td>";
            }
            html += "</tr>";
        };
        html += "</tbody></table>";


        // var body = document.getElementsByID('tableContent');
        // var tbl = document.createElement('table');
        // tbl.class = 'table table-striped';
        // tbl.setAttribute('border', '1');
        // var tbdy = document.createElement('tbody');
        // for (var i = 0; i < 3; i++) {
        //     var tr = document.createElement('tr');
        //     for (var j = 0; j < 2; j++) {
        //         if (i == 2 && j == 1) {
        //             break
        //         } else {
        //             var td = document.createElement('td');
        //             td.appendChild(document.createTextNode('\u0020'))
        //             i == 1 && j == 1 ? td.setAttribute('rowSpan', '2') : null;
        //             tr.appendChild(td)
        //         }
        //     }
        //     tbdy.appendChild(tr);
        // }
        // tbl.appendChild(tbdy);
        // body.appendChild(tbl)

        console.log(html);
        document.getElementById("tableContent").innerHTML = html;
    }
    tableCreate();
    </script>

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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Modal title
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tableContent">

                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
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
</body>

</html>