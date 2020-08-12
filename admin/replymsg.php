<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View text</h2>

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
            $to      = $_POST['toEmail'];
            $from    = $_POST['fromEmail'];
            $message = $_POST['body'];
            $subject = $_POST['subject'];
            
            $send = mail($to,$subject,$message,$from);
            if($send)
            {
                echo "<span styel='color:green;font:18px;'>Message Sent successfull..</span>";
            }
            else
                echo "<span styel='color:red;font:18px;'>Message not Sent..</span>";                
            }

            if(!isset($_GET['replayid']) || $_GET['replayid'] == NULL)
            {
                header("location:inbox.php");
            }
            else
            {                               
                $msgid = $_GET['replayid'];
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
                            <label>To</label>
                        </td>
                        <td>
                            <input type="text" readonly name="toEmail" value="<?php echo $data['email'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>From</label>
                        </td>
                        <td>
                            <input type="text" name="fromEmail" placeholder="Enter your email address" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">

                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Subject</label>
                        </td>
                        <td>
                            <input type="text" name="subject" placeholder="Enter your subject" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Send" />
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
