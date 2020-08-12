<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                                            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $cp   = mysqli_real_escape_string($db->link,$_POST['copyright']);
                    if($cp == "" )
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
                
                    else
                    {
                        $query ="update tbl_footer
                        set 
                        note ='$cp' 
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
                <div class="block copyblock">
        <?php
        $sql = "select * from tbl_footer where id=1";
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
                                <input type="text" value="<?php echo $data['note'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
