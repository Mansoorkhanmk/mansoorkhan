<html>
    <head>
        <title>Voting System</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="main" align="right">
        <input type="text" name="box"placeholder="Search any Thing">
            

        </div>

        <header>
        <h1>Please Register Your Vote</h1>
    </header>
        
        <form method="post" action="index.php" enctype="multipart/form-data">
       <center>


        <fieldset style="display: inline-block">
            <legend>Online Voting System</legend>
            <label for="name">Name: </label><br>
            <input type="text" name="name" placeholder="Enter Your Name"><br><br>
            <label for="name">Address:</label><br>
            <input type="text" name="address" placeholder="Enter Your address"><br><br>  
            <label for="CNIC">Enter Your CNIC:</label><br>
            <input type="text" name="CNIC" placeholder="Enter Your CNIC"><br><br>
            <label for="image">Image: </label><br>
            <input type="file" name="image"><br><br>
            <input type="submit" name="submit"  style="background-color: blue; color: white; font-weight:bold; font-size:30;">
        </fieldset>
       </center>
        </form><br>
    <hr class="hr7" Data />
    <center>
        <h1>ALL DATA</h3>
        </center>
    <hr class="hr8" />
       
        <br>
    </body>
</html>


<?php 
include_once('connection.php');
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cnic = $_POST['CNIC'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];   
    
    if($name == '' || $address == '' || $cnic == '') {
        echo "<script>alert('Any field is empty')</script>";
        exit();
    }
        move_uploaded_file($image_tmp,"images/$image_name");
        
        $query = "INSERT INTO vote(Name, Address, CNIC, Image) VALUES ('$name', '$address', '$cnic', '$image_name')";
        $result = mysqli_query($connection, $query);

        if($result) {
            echo "<center><h1>Data Inserted Successfully</h1></center>";
        } else {
            echo "<center><h1>Data Insertion failed</h1></center>". mysqli_error($connection);
        }
    }

    include_once('./table.php');
?>