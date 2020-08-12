<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View text</h2>
        
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                echo "<script>window.location='inbox.php'</script>"; 
            }

            if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL)
            {
                header("location:inbox.php");
            }
            else
            {                               
                $msgid = $_GET['msgid'];
            }
        ?>

        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                    $sql = "select * from tbl_contact where id ='$msgid'";
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
                            <input type="text" readonly value="<?php echo $data['fname']." ".$data['lname'];?>"class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $data['email'];?>" class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" readonly>
                             <?php echo $data['body'];?>   
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $fm->dateFormate($data['date']);?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Ok" />
                        </td>
                    </tr>
                </table>
                    <?php } } ?>
            </form>
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
