<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if(!isset($_GET['editid']) || $_GET['editid']==NULL)
                    {
                      echo "<script>window.location = 'postlist.php';</script>";   
                    }
                    else
                    $id = $_GET['editid'];
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Post</h2>
        <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $title   = mysqli_real_escape_string($db->link,$_POST['title']);
                    $cat     = mysqli_real_escape_string($db->link,$_POST['cat']);
                    $content = mysqli_real_escape_string($db->link,$_POST['body']);
                    $tags    = mysqli_real_escape_string($db->link,$_POST['tags']);
                    $author  = mysqli_real_escape_string($db->link,$_POST['author']);
                    $userid  = mysqli_real_escape_string($db->link,$_POST['userid']);
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['img']['name'];
                    $file_size = $_FILES['img']['size'];
                    $file_temp = $_FILES['img']['tmp_name'];
                    $div       = explode('.', $file_name);
                    $file_ext  = strtolower(end($div));
                    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image;
                    
                    if($title == "" || $cat == "" || $content == "" || $tags == "" || $author == "")
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
                    else 
                    {
                if (!empty($file_name))
                {
                    if($file_size >1048567)
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
                    $query ="update tbl_post
                    set 
                    cat ='$cat' ,
                    title ='$title' ,
                    body ='$content' ,
                    image ='$uploaded_image' ,
                    author ='$author' ,
                    tags ='$tags',; 
                    userid ='$userid'
                    where id =$id"; 
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
                    $query ="update tbl_post
                    set 
                    cat ='$cat' ,
                    title ='$title' ,
                    body ='$content' ,
                    author ='$author' ,
                    tags ='$tags' 
                    where id =$id"; 
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

        <div class="block">
            <?php
            $sql = "select * from tbl_post where id = '$id'";
            $postresult = $db->select($sql);
            if($postresult)    
            {
                foreach($postresult as $postdata)
                {       
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $postdata['title'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cat">
                                <option>Select Category</option>
                                <?php
                                $sql = "select * from tbl_catagory";
                                $result = $db->select($sql);
                                if($result)
                                {
                                    foreach($result as $data)
                                    {
                                        
                                ?>
                                <option <?php
                                        if($postdata['cat'] == $data['id'])
                                        {
                                ?> selected="selected" <?php } ?> value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                                <?php } }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $postdata['image'];?>" alt="" height="120px" width="150px">
                            <input type="file" name="img" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $postdata['body'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="<?php echo $postdata['tags'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo $postdata['author'];?>" class="medium" />
                            <input type="hidden" name="userid" value="<?php echo Session::get('id');?>" class="medium" />

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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
