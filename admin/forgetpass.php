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
                    $userid = $data['id'];
                    $username = $data['username'];
                }
                $text  = substr($email,0,3);
                $rand  = rand(10000,99999);
                $newpass ='$text$rand';
                $pass =md5($newpass);
                $sql = "update tbl_user
                        set 
                        password = '$newpass'
                        where id = '$userid'";
                $result = $db->update($sql);
                $to = '$email';
                $from = "alamin@gmail.com";
                $headers = 'From: $from'. "\r\n" .
                'Reply-To: alamin@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                $subject = 'Your lost password';
                $message = "Your user name ".$username."And password is ".$pass;
                $sentmail = mail($to, $subject, $message, $headers);
                if($sentmail)
                {
                    echo "<span style='color:green;font-size=18px;'>Password sent to your mail..</span>";
                    
                }
                else
                {
                    echo "<span style='color:red;font-size=18px;'>Mail Not sent.</span>";

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
