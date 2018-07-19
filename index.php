<?php
    include("php/db.php");
    include("php/functions.php");
?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">DSWD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Add Client</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="index.php" method="POST">
                <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" autocomplete='off'>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="buttonSearch">Search</button>
            </form>
        </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" class="form-group" action="index.php" method="POST">
                    <div class="modal-body">
                        <label>Full name</label>
                        <input type="text" class="form-control mr-sm-2" name="userName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addUser">Save User</button>
                    </div>
                </form> 
            </div>
        </div>
        </div>
    </body>
</html> 

<?php
    if(isset($_POST['buttonSearch'])){ //button name
        $value = $_POST["search"];
        $query = "Select * from temp where name like '%{$value}%' or id like '%{$value}'";
        $result = mysqli_query(db(), $query);
       if(mysqli_num_rows($result) > 0){
           if($value == ""){
               showAll();
           }else{
                show($result);
            }    
        }else{
           echo '<h1 class="tunga">NO DATA</h1>';
        }
    }elseif(isset($_POST['addUser'])){
        echo $_POST["userName"];    
    }
?>

<?php
    mysqli_close(db());
?>
