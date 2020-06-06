<?php

    include 'connection.php';


    $json = file_get_contents('php://input');
 
     // decoding the received JSON and store into $obj variable.
     $obj = json_decode($json,true);
     
    $username = $obj['username'];
    $email = $obj['email'];
    $firstname = $obj['firstname'];
    $lastname = $obj['lastname'];
    $password = $obj['password'];
    $repeatpass = $obj['repeatpass'];
    $ddlSelectedValue = $obj['ddlSelectedValue'];
    $ddlSelectedValue1 = $obj['ddlSelectedValue1'];

     $email_exp='/^([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|root|aero|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|([0-9]{1,3}\.{3}[0-9]{1,3}))$/';
    $pass_exp='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/';
    
    if($email!="" && $username!="" && $password!="" && $firstname!="" && $lastname!="" && $ddlSelectedValue!="" && $ddlSelectedValue1!="")
    {
    
        $result= $conn->query("SELECT * FROM login where email='$email'");
        $user = $conn->query("SELECT * FROM login where username='$username'");
    
    
        if($result->num_rows>0){
            echo json_encode('Email already exists!');  // alert msg in react native
        }
        else if($user->num_rows>0){
            echo json_encode('UserName already exists!');
        }
        else
        {
            if(!isset($username)){
                echo json_encode('User name is required for signup and it should be between 8 to 16 characters');
            }
            else if(!isset($email) || !preg_match($email_exp,$email)){
                echo json_encode('You entered an invalid email!');
            }
            else if(!isset($firstname)){
                echo json_encode('Valid first name is required for signup');
            }
            else if(!isset($lastname)){
                echo json_encode('Valid last name is required for signup');
            }
            else if(!isset($password) || !preg_match($pass_exp, $password)){
                echo json_encode('Password is required and must contain at least 6 characters, including UPPER/lowercase and numbers');
            }
            else if(!isset($repeatpass) || ($password != $repeatpass)){
                echo json_encode('Password must be confirmed and both passwords should match');
            }
            else if(!isset($ddlSelectedValue)){
                echo json_encode('Reason for joining Asgardia needs to be selected');
            }
             else if(!isset($ddlSelectedValue1)){
                echo json_encode('Your contribution to Asgardia needs to be selected');
            }
            else{
                $add = $conn->query("INSERT INTO login (username,email,firstname,lastname,password,reason,contribution) VALUES('$username','$email','$firstname','$lastname','$password','$ddlSelectedValue','$ddlSelectedValue1')");
            
                if($add){
                    echo json_encode('User Registered Successfully!You may now Login'); // alert msg in react native
                }
                else{
                   echo json_encode('check internet connection'); // our query fail
                }
            }
            
        }
    }
    
    else{
      echo json_encode('All Fields are Mandatory!');
    }
    $conn->close();
    
?>
