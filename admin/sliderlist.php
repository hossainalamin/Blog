<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <?php
        if(isset($_GET['delid']))
        {
            $id = $_GET['delid'];
            $delsql = "delete  from tbl_slider where id = '$id'";
                        $delresult = $db->delete($delsql);
                        if($delresult)
                        {
                            echo "<script>alert('Slider deleted successfully');</script>";
                            echo "<script>window.location = 'sliderlist.php';</script>";
                        }
        }
        if(isset($_GET['sliderid']))
        {
            $title = $_POST['title'];
            $id = $_GET['sliderid'];
            $sql = "update tbl_slider
                        set tilte = '$title' where id = '$id'";
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

        ?>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='15%'>Post Title</th>
                        <th width='10%'>Image</th>
                        <th width='10%'>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from tbl_slider ";
                    $result = $db->select($sql);
                    if($result)
                    {
                        $i = 0;
                        foreach($result as $data)
                        {
                            $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['title'];?></td>
                        <td><img src="<?php echo $data['image'];?>" alt="" height="40px" width="100px"></td>
                        <td>
                        <?php
                        if(Session::get("userrole") =="0")
                        {
                        ?>
                            <a href="editslider.php?sliderid=<?php echo $data['id']?>">Edit</a> ||

                            <a onclick="return confirm('Are you sure to delete')" href="?delid=<?php echo $data['id']?>">Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="clear">
</div>
<div class="clear">
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });

</script>
<?php include "inc/footer.php";?>
