<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL)
                    {
                      echo "<script>window.location = 'postlist.php';</script>";   
                    }
                    else
                    $id = $_GET['viewpostid'];
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Post</h2>
        <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    echo "<script>window.location = 'postlist.php';</script>";             
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
                            <input type="text" readonly name="title" value="<?php echo $postdata['title'];?>" class="medium" />
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
                            <label>Image</label>
                        </td>
                        <td>
                            <img src="<?php echo $postdata['image'];?>" alt="" height="120px" width="150px">
                            
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
                            <input type="text" readonly name="tags" value="<?php echo $postdata['tags'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" readonly name="author" value="<?php echo $postdata['author'];?>" class="medium" />
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
