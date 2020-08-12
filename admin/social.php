<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $fb   = mysqli_real_escape_string($db->link,$_POST['facebook']);
                    $tw   = mysqli_real_escape_string($db->link,$_POST['twitter']);
                    $ln   = mysqli_real_escape_string($db->link,$_POST['linkedin']);
                    $gp   = mysqli_real_escape_string($db->link,$_POST['google']);
                    if($fb == "" || $tw == "" || $ln == "" || $gp == "")
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
                
                    else
                    {
                        $query ="update tbl_social
                        set 
                        fb ='$fb' ,
                        tw ='$tw',
                        ln ='$ln',
                        gp ='$gp'
                        where id = '1'"; 
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
            $sql = "select * from tbl_social where id=1";
            $result = $db->select($sql);
            if($result)
            {
                foreach($result as $data)
                {
        ?>
    <form action="" method="post">
        <table class="form">
            <tr>
                <td>
                    <label>Facebook</label>
                </td>
                <td>
                    <input type="text" name="facebook" value="<?php echo $data['fb'];?>" class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Twitter</label>
                </td>
                <td>
                    <input type="text" name="twitter" value="<?php echo $data['tw'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>LinkedIn</label>
                </td>
                <td>
                    <input type="text" name="linkedin" value="<?php echo $data['ln'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Google Plus</label>
                </td>
                <td>
                    <input type="text" name="google" value="<?php echo $data['gp'];?>" class="medium" />
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
<div class="clear">
</div>
<?php include "inc/footer.php";?>
