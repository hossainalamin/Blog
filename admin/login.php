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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username  = $fm->validation($_POST['username']);
            $password  = $fm->validation(md5($_POST['password']));
            $username = mysqli_real_escape_string($db->link,$username);
            $password = mysqli_real_escape_string($db->link,$password);
            $sql = "select * from tbl_user where username = '$username' and password = '$password'";
            $result = $db->select($sql);
            if($result != false)
            {
                $value = mysqli_fetch_array($result);
                session::init();
                session::set('login',true);
                session::set('username',$value['username']);
                session::set('id',$value['id']);
                session::set('userrole',$value['role']);
                header("location:index.php");

            }
            else
            {
                echo "<span style='color:red;font-size=18px;'>User Not found..</span>";
            }
        }
    ?>
            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <div>
                    <input type="text" placeholder="Username" name="username" />
                </div>
                <div>
                    <input type="password" placeholder="Password" name="password" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="forgetpass.php">Forget Password</a>
            </div><!-- button -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>
