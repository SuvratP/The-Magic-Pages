<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
    $con= new mysqli("localhost","root","","themagicpages");
    if($con->connect_error)
    {
        die("Failed to connect :" .$con->connect_error);
    }
    else{
        $stmt=$con->prepare("select * from login where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0)
        {
             $data=$stmt_result->fetch_assoc();
             if($data['password']==$password)
             {
                header('location:index.html');
             }
             else{
                echo "Invalid login due to wrong password";
             }
        }
        else{
            echo "invalid Email. Please Enter Valid Email.";
        }
    }
?>