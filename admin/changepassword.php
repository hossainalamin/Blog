<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
$userid = Session::get('id');
$userrole = Session::get('userrole');
?>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' and (isset($_POST['submit'])))
    {
        
    $cp   = $fm->validation(md5($_POST['cp']));
    $up  = $fm->validation(md5($_POST['up']));
        
    $cp   = mysqli_real_escape_string($db->link,$cp);
    $up   = mysqli_real_escape_string($db->link,$up);

    
    if($cp == " " || $up == " ")
    {
        $empty = "Any of the field should not be empty.";
    }
    else
    {
         $sql = "select * from tbl_user where id = '$userid'";
         $pass = $db->select($sql);
         if($pass)
         {
            foreach($pass as $result)
         {
                $password = $result['password'];
         }
             
         }
        if($password == $cp)
        {
        $sql =
        "update tbl_user
        set 
        password  = '$up'
        where id = '$userid'";
        $user = $db->update($sql);
        if($user)
        {
            $msg = "Infortmation updated successfully.Thank you";

        }
        }
        else
        {
            $error = "Something wrong.Password does not match.";               
        }
    }
    }
    
?>
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block"> 
                        <?php
           if(isset($msg))
           {
                echo"<span class='success'>$msg</span>";
           }
           if(isset($empty))
           {
                echo"<span class='warning'>$empty</span>";
           }   
            if(isset($error))
           {
                echo"<span class='warning'>$error</span>";
           }
        ?>              
                 <form action="" method="post">

                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="cp" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="up" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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

