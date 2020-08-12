<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php
$userid = Session::get('id');
$userrole = Session::get('userrole');
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>User Profile</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name   = mysqli_real_escape_string($db->link,$_POST['name']);
                    $username     = mysqli_real_escape_string($db->link,$_POST['username']);
                    $email = mysqli_real_escape_string($db->link,$_POST['email']);
                    $detail    = mysqli_real_escape_string($db->link,$_POST['details']);
                    if($name == "" || $username == "" || $email == "" || $detail == "")
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
            else
                {
                    $query ="update tbl_user
                    set 
                    name ='$name' ,
                    username ='$username' ,
                    email ='$email' ,
                    details ='$detail' 
                    where id =$userid"; 
                    $updated_row = $db->update($query);
                    if ($updated_row)
                        {
                            echo "<span style='color:green;font-size=18px;'>Data updated Successfully.
                        </span>";
                        
                        }
                    else
                        {
                            echo "<span style='color:red;font-size=18px;'>Data Not updated !</span>";
                        }
                }
                }
                
        
        ?>

        <div class="block">
            <?php
            $sql = "select * from tbl_user where id = '$userid' and role = '$userrole'";
            $getuser = $db->select($sql);
            if($getuser)    
            {
                foreach($getuser as $data)
                {       
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $data['name'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $data['username'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $data['email'];?>" class="medium" />

                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Detail</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="details">
                                <?php echo $data['details'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });

</script>
<?php include "inc/footer.php";?>
