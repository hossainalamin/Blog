<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
    if(!Session::get('userrole')=='0')
    {
        echo"<script>window.location='index.php'</script>";
    }

?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block copyblock">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $username  = $fm->validation($_POST['username']);
                    $password  = $fm->validation(md5($_POST['password']));
                    $email  = $fm->validation($_POST['email']);
                    $role  = $fm->validation($_POST['role']);
                    $username = mysqli_real_escape_string($db->link,$username);
                    $password = mysqli_real_escape_string($db->link,$password);
                    $email = mysqli_real_escape_string($db->link,$email);
                    $role = mysqli_real_escape_string($db->link,$role);
                    if(empty($username)||empty($password)|| empty($email))
                    {
                        echo "<span style='color:red;font-size=18px;'>Any of the feild should  not be empty..</span>";        
                    }
                    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                    {
                        echo "<span style='color:red;font-size=18px;'>Invalid Email..</span>";    
                    }
                
                    else
                    {
                    $sql = "select * from tbl_user where email = '$email' limit 1";
                    $mailcheck = $db->select($sql);
                    if($mailcheck != false)
                    {
                        echo "<span style='color:red;font-size=18px;'>Email Already exists..</span>";    

                    }
                    else
                    {
                        $sql = "insert into tbl_user(username,password,email,role) values('$username','$password','$email','$role')";
                        $result = $db->insert($sql);
                        if($result)
                        {
                        echo "<span style='color:green;font-size=18px;'>User added succesfully..</span>";   
                        }
                        else
                        {
                        echo "<span style='color:green;font-size=18px;'>User not  added..</span>";     
                        }
                    }
                    }
                }
            
            
                ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter username Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="text" name="password" placeholder="Enter password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>User Role</label>
                        </td>
                        <td>
                            <select id="select" name="role">
                                <option>Select User</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="clear">
</div>
<?php include "inc/footer.php";?>
