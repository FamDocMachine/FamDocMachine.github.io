if(!empty($name) || !empty($email || !empty($message)))
{
    $host = "localhost:3306";
    $dbusername = "root";
    $dbPassword = "";
    $dbname = "youtube";
     
    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);
    if(mysqli_connect_error())
    {
        die('Connect Error(' . mysqli_connect_errno(). ')' . mysqli_connect_error());
    }
    else
    {
        $SELECT = "SELECT email From register where email = ? limit 1";
        $INSERT = "INSERT Into register (name, email, message) values(?, ?,?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if($rnum==0)
        {
            $stmt->close();
            $stmt =  $conn->prepare($INSERT);
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();
            echo "new record enterd successfully";
        }  
        else{
            echo "someone already registerd using this emial";
        }
        $stmt->close();
        $conn->conn();
    }
}
else
{
    echo "All fields are required";
    die();
}
?>