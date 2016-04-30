<?php
$msg = "";
if(isset($_POST["submit"]))
{
    //$name = $_POST["username"];
    $name = stripcslashes($_POST['name']);
    $name = mysqli_real_escape_string($db,$name);
    $name = htmlspecialchars($name);
    $email = stripcslashes( $_POST["email"]);
    $email = mysqli_real_escape_string($db,$email);
    $email = htmlspecialchars($email);
    $password = stripcslashes($_POST["password"]);
    $password = mysqli_real_escape_string($db,$password);
    $password = htmlspecialchars($password);
    $password = md5($password);



    $sql="SELECT email FROM users WHERE email='$email'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
        $msg = "Sorry...This email already exists...";
    }
    else
    {
        //echo $name." ".$email." ".$password;
        $query = mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')")or die(mysqli_error($db));
        if($query)
        {
            $msg = "Thank You! you are now registered. click <a href='index.php'>here</a> to login";
        }

    }
}
?>