<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
<?php
if(!isset($_GET['userid']) || $_GET['userid']==NULL)
                    {
                      echo "<script>window.location = 'userlist.php';</script>";   
                    }
                    else
                    $userid = $_GET['userid'];
if($_SERVER["REQUEST_METHOD"]=='POST')
{
    echo "<script>window.location = 'userlist.php';</script>";   
    
}
?>

    <div class="box round first grid">
        <h2>User details</h2>
        <?php
        ?>

        <div class="block">
            <?php
            $sql = "select * from tbl_user where id = '$userid'";
            $getuser = $db->select($sql);
            if($getuser)    
            {
                foreach($getuser as $data)
                {       
            ?>

            <form action="" method="post">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $data['name'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $data['username'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $data['email'];?>" class="medium" />

                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Detail</label>
                        </td>
                        <td>
                            <textarea class="tinymce">
                                <?php echo $data['details'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Ok" />
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
