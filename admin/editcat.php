<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
if(!isset($_GET['catid']) || $_GET['catid']==NULL)
                    {
                      echo "<script>window.location = 'catlist.php';</script>";   
                    }
                    else
                    $id = $_GET['catid'];
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name = $_POST['name'];
                    $name = mysqli_real_escape_string($db->link,$name);
                    if(empty($name))
                    {
                        echo "<span style='color:red;font-size=18px;'>Catagory should  not be empty..</span>";        
                    }
                    else
                    {
                        $sql = "update tbl_catagory
                        set name = '$name' where id = '$id'";
                        $result = $db->update($sql);
                        if($result)
                        {
                        echo "<span style='color:green;font-size=18px;'>Catagory updated succesfully..</span>";   
                        }
                        else
                        {
                        echo "<span style='color:green;font-size=18px;'>Catagory not  updated..</span>";     
                        }
                    }
                }
                ?>
            <?php
            
                $sql = "select * from tbl_catagory where id = $id";
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
                            <input type="text" name="name" value="<?php echo $data['name'];?>" class="medium" />
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
