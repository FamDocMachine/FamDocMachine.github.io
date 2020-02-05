<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
$name =  $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
 $conn = new mysqil('localhost:8080', 'root', '', 'youtube');
    if($conn->connect_error)
    {
        die('connection failed:'.$conn->connect_error);
    }
    else
    {
        $stmt = $stmt->prepare('Insert into register(name,email,message)values(?,?,?)');
        $stmt->bind_param("sss",$name,$email,$message);
        $stmt->execute();
        echo "registration successfullyy....";
        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>