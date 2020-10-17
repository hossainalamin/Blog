<?php
include'../lib/session.php';
include'../config/config.php';
include'../lib/Database.php';
include'../helpers/formate.php';
$db = new Database();
$fm = new formate();
session::CheckLogin();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Password reset</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email  = $fm->validation($_POST['email']);
            $email = mysqli_real_escape_string($db->link,$email);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                echo "<span style='color:red;font-size=18px;'>Invalid Email..</span>";    
            }
            else
            {
            $sql = "select * from tbl_user where email = '$email' limit 1";
            $mailcheck = $db->select($sql);
            if($mailcheck != false)
            {
                foreach($mailcheck as $data)
                {
                    $rec_pass  = $data['password'];
					$username  = $data['username'];
					$headers = "From: csejnu33@gmail.com"; 
					$subject = "Password recovery.";
					$body = "Your user name :$username And password is :$rec_pass";
					$sentmail = mail($email, $subject, $body, $headers);
					if($sentmail)
					{
						echo "<span style='color:green;font-size=18px;'>Password sent to your.$email</span>";
					} 
                    else
                    {
                        echo "<span style='color:red;font-size=18px;'>Mail Not sent.</span>";
                    }
                }
            }
            else
            {
                echo "<span style='color:red;font-size=18px;'>Mail Not found..</span>";
            }
            }
    }
            
    ?>
            <form action="" method="post">
                <h1>Set Password</h1>
                <div>
                    <input type="text" placeholder="Email" name="email" />
                </div>
                <div>
                    <input type="submit" value="Send mail" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login.php">Login</a>
            </div><!-- button -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>
