<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
<?php
                if(isset($_GET['delid']))
                    {
                        $id = $_GET['delid'];
                        $sql = "delete  from tbl_contact where id = '$id'";
                        $result = $db->delete($sql);
                        if($result)
                        {
                            echo "<span style='color:green;font-size=18px;'>Text deleted succesfully..</span>";
                        }
                    }
                    
?>
        <?php
            if(isset($_GET['seenid']))
            {                               
                $id = $_GET['seenid'];
                $query ="update tbl_contact
                    set 
                    status ='1'
                    where id =$id"; 
                    $updated_row = $db->update($query);
                    if ($updated_row)
                    {
                     echo "<span style='color:green;font-size=18px;'>Text Seen..
                     </span>";
                    }
                    else
                    {
                     echo "<span style='color:red;font-size=18px;'>Something Went wrong !</span>";
                    }
            }
        ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            $sql     = "select * from tbl_contact where status = '0'";
            $result  = $db->select($sql);
            $i = 0;
            if($result)
            {
                foreach($result as $data)
                {
                    $i++;
        ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['fname']." ".$data['lname'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $fm->textSorten($data['body'],30);?></td>
                        <td><?php echo $fm->dateFormate($data['date']);?></td>
                        <td><a href="viewmsg.php?msgid=<?php echo $data['id'];?>">View</a> ||
                            <a href="replymsg.php?replayid=<?php echo $data['id'];?>">Reply</a> ||
                            <a href="?seenid=<?php echo $data['id'];?>">Seen</a>
                        </td>
                    </tr>
                    <?php } }?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="box round first grid">
        <h2>Seen Message</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            $sql     = "select * from tbl_contact where status = '1'";
            $result  = $db->select($sql);
            $i = 0;
            if($result)
            {
                foreach($result as $data)
                {
                    $i++;
        ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['fname']." ".$data['lname'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $fm->textSorten($data['body'],30);?></td>
                        <td><?php echo $fm->dateFormate($data['date']);?></td>
                        <td> <a href="viewmsg.php?msgid=<?php echo $data['id'];?>">View</a> ||

                            <a onclick="return confirm('Are you sure to delete');" href="?delid=<?php echo $data['id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php } }?>

                </tbody>
            </table>
        </div>
    </div>
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
