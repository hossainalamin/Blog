<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<style>
    .actiondel {
        margin-left: 10px;
    }

    .actiondel a {
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        margin-top: 4px;
        font-size: 20px;
        padding: 2px 10px;
        font-weight: normal;
        background: #f0f0f0;

    }

</style>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Edit Page</h2>
        <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $pageid = $_GET['pageid'];
                    $name   = mysqli_real_escape_string($db->link,$_POST['name']);
                    $body = mysqli_real_escape_string($db->link,$_POST['body']);                
                    if($name == "" ||$body == "")
                    {
                        echo "<span style='color:red;font-size=18px;'>Feild must not be empty..</span>";
                    }
                    else
                    {
                    $query ="update tbl_page
                    set 
                    name ='$name' ,
                    body ='$body'
                    where id = '$pageid'"; 
                    $updated_row = $db->update($query);
                    if ($updated_row)
                    {
                        echo "<span style='color:green;font-size=18px;'>Page updated Successfully.
                        </span>";
                        
                    }
                    else
                    {
                        echo "<span style='color:red;font-size=18px;'>Page Not updated !</span>";
                    }

                }
                }
        ?>

        <div class="block">
            <form action="" method="post">
                <?php
                            if(isset($_GET['pageid']))
                            {

                                $pageid = $_GET['pageid'];
                            }
                            $sql = "select * from tbl_page where id ='$pageid'";
                            $result = $db->select($sql);
                            if($result)
                            {
                                foreach($result as $data)
                                {

                ?>
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
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $data['body'];?>
                            </textarea>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                            <span class="actiondel"><a onclick="return confirm('Are you sure to delete the page');" href="delpage.php?delpage=<?php echo $data['id'];?>">Delete</a></span>
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
