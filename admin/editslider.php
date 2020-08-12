<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if(!isset($_GET['sliderid']) || $_GET['sliderid']==NULL)
                    {
                      echo "<script>window.location = 'sliderlist.php';</script>";   
                    }
                    else
                    $id = $_GET['sliderid'];
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Slider</h2>
        <div class="block copyblock">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $title = $_POST['title'];
                    $title = mysqli_real_escape_string($db->link,$title);
                    if(empty($title))
                    {
                        echo "<span style='color:red;font-size=18px;'>Title should  not be empty..</span>";        
                    }
                    else
                    {
                        $sql = "update tbl_slider
                        set title = '$title' where id = '$id'";
                        $result = $db->update($sql);
                        if($result)
                        {
                        echo "<span style='color:green;font-size=18px;'>Slider updated succesfully..</span>";   
                        }
                        else
                        {
                        echo "<span style='color:green;font-size=18px;'>Slider not  updated..</span>";     
                        }
                    }
                }
                ?>
            <?php
            
                $sql = "select * from tbl_slider where id = $id";
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
                            <input type="text" name="title" value="<?php echo $data['title'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
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
<div class="clear">
</div>
<?php include "inc/footer.php";?>
