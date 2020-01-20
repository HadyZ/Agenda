<html>

<head>
    <link rel="stylesheet" type="text/css" href="../styles/parentHome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="header">
       
        <h1>Student Agenda</h1>
    </div>

    <div class="datepicker">
    <div class="form-group">
            <input type="date" name="dateofbirth">
</div>
            <div class="form-group">
                <?php
                require "connection.php";
                $sql = "SELECT studentID,studentFirstName FROM students where studentParent=4";
                $result = mysqli_query($con, $sql);
                 echo "
                     <select class='form-control students-select' name='studentParentID'>";
                 while ($row = mysqli_fetch_array($result)) {
                    echo "<option><a href='http:localhost/Agenda/pages/parent.php?id=".$row['studentID']."'>".$row['studentFirstName']."</a></option>";
                 }
                 echo "</select>";
                ?>
  </div>
        </div>
    <div class="content-container">

        <div class="homework-card">
            <div class="left-container">
                <span class="homewoek-title">English</span>
            </div>
            <div class="right-container">

            
            <span class="description"> Solve exs 1,2,3 page 50</span>
            <span class="teacher-name"> Mr.Hady</span>
            </div>
        </div>
        
        <div class="homework-card">
            <div class="left-container">
                <span class="homewoek-title">Math</span>
            </div>
            <div class="right-container">
            <span class="description"> Solve exs 1,2,3 page 51</span>
            <span class="teacher-name"> Mr.Saleh</span>   
        </div>
        </div>
        <div class="homework-card">
            <div class="left-container">
                <span class="homewoek-title">Math</span>
            </div>
            <div class="right-container">
            <span class="description"> Solve exs 1,2,3 page 51</span>
            <span class="teacher-name"> Mr.Saleh</span> 
        </div>
       
        </div>
    </div>

    <?php 
    

    if($_GET['tag']){
        echo $_GET['tag'];
    }
    
    
    
    
    function getHomeworks($studentId)
    {
        // require("connection.php");
      die($studentId);
        // $query = "SELECT * FROM students where userRole='$member'";
        // $result = mysqli_query($con, $query);
        // $r = mysqli_num_rows($result);

    }

    
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>