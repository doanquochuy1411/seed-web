<h2>News</h2>
<?php
    while($row = mysqli_fetch_array($data["user"])){
        echo "User name: " . $row['full_name'] ."<br>";
    }
?>