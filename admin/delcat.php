<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
<?php
                if(!isset($_GET['catid']) || $_GET['catid']==NULL)
                    {
                        echo "<script>window.location = 'catlist.php';</script>";   
                    }
                    else
                    {
                        $id = $_GET['catid'];
                        $sql = "delete  from tbl_catagory where id = '$id'";
                        $result = $db->delete($sql);
                        if($result)
                        {
                            echo "<span style='color:green;font-size=18px;'>Catagory deleted succesfully..</span>";
                        }
                    }
                    
?>
        <div class="block copyblock">
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
<?php include "inc/foter.php";?>
