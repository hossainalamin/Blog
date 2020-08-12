<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<style>
    .left
    {
        float: left;
        width: 70%;
    }
    .right
    {
        float: left;
        width: 20%;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $title   = mysqli_real_escape_string($db->link,$_POST['title']);
                    $slogan     = mysqli_real_escape_string($db->link,$_POST['slogan']);
                    $permited  = array( 'png');
                    $file_name = $_FILES['logo']['name'];
                    $file_size = $_FILES['logo']['size'];
                    $file_temp = $_FILES['logo']['tmp_name'];
                    $div       = explode('.', $file_name);
                    $file_ext  = strtolower(end($div));
                    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image; 
                    if($title == "" || $slogan == "")
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
                    else 
                    {
                    if (!empty($file_name))
                    {
                    if($file_size >104856700)
                    {
                     echo "<span class='error'>Image Size should be less then 1MB!
                     </span>";
                    }
                    elseif(in_array($file_ext, $permited) === false)
                    {
                     echo "<span class='error'>You can upload only:-"
                     .implode(', ', $permited)."</span>";
                    }
                    else
                    {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query ="update title_slogan
                    set 
                    title  ='$title' ,
                    slogan ='$slogan' ,
                    logo  = '$uploaded_image'
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
                else
                {
                    $query ="update title_slogan
                    set 
                    title ='$title' ,
                    slogan ='$slogan'
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
                }
        
        ?>
        <?php
        $sql = "select * from title_slogan where id=1";
        $result = $db->select($sql);
        if($result)
        {
            foreach($result as $data)
            {
        
        ?>
        <div class="block sloginblock">
           <div class="left">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Website Title</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $data['title'];?>" name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Website Slogan</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $data['slogan'];?>" name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Logo</label>
                        </td>
                        <td>
                            <input type="file" name="logo" />
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
            <?php } }?>
            </div>
            <div class="right">
            <img src="<?php echo $data['logo'];?>" alt="" height="120px"width="150px">
                
            </div>
        </div>
    </div>
</div>
<div class="clear">
</div>
<?php include "inc/footer.php";?>
