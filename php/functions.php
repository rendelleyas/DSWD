<?php
    include('db.php');
?>
<?php 
    //Connect sa fucking database
    function db(){
        $server = "localhost";
        $username = "root";
        $password="";
        $dbname ="test";

        $conn = mysqli_connect($server, $username, $password, $dbname);
        if(!$conn){
            die("Connection Failed!" . mysqli_connect_error());
        }else{
            return $conn;
        }
    }


    //show/retrieve data sa gi search
    function show($result){
        $data = "";
        while($row = mysqli_fetch_assoc($result)){
            $data .= "<tr><td>{$row['name']}</td><td>{$row['date_entered']}</td><td>{$row['date_accomplish']}</td><td>".status($row['date_accomplish'])."</td></tr>";
        }
        showTable($data);
     }

     function showTable($data){
        echo "<div class='container'>
                <table class='table table-condensed'>
                    <thead><tr><th>Name</th><th>Date Entered</th><th>Date Accomplished</th><th>Status</th></tr></thead>
                    <tbody>
                    {$data}
                    </tbody>
                </table>
            </div>";  
     }


    //Specify og si user pwede nba ka kuhag usab
     function status($date){
        //$month = "";
        $now = date("Y-m-d");
        $sql = "Select timestampdiff(month, '{$date}', '{$now}')";
        $result = mysqli_query(db(), $sql);
        $str = mysqli_fetch_row($result);            //result convert to array
        $month = $str[0];                           //hold sa only one result
        if($month >= 3){
            return "<p style='color:blue;'>Allowed</p>";
        }else{
            return "<p style='color:red;'>Not Allowed</p>";
        }
     }

     function showAll(){
        $data = "";
        $sql = "Select * from temp";
        $result = mysqli_query(db(),$sql);
        while($row = mysqli_fetch_assoc($result)){
            $data .= "<tr><td>{$row['name']}</td><td>{$row['date_entered']}</td><td>{$row['date_accomplish']}</td><td>".status($row['date_accomplish'])."</td></tr>";
        }
        showTable($data);
     }

     function addUser($name){

     }
?>