<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='15%'>Post Title</th>
                        <th width='15%'>Description</th>
                        <th width='10%'>Category</th>
                        <th width='10%'>Image</th>
                        <th width='10%'>Author</th>
                        <th width='10%'>Tags</th>
                        <th width='10%'>Date</th>
                        <th width='15%'>Action</th>
                    </tr>
                </thead>
                <?php
                    $sql = "select tbl_post.*,tbl_catagory.name from tbl_post inner join tbl_catagory on tbl_post.cat = tbl_catagory.id order by tbl_post.title desc ";
                    $result = $db->select($sql);
                    if($result)
                    {
                        $i = 0;
                        foreach($result as $data)
                        {
                            $i++;
                    ?>
                <tbody>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['title'];?></td>
                        <td><?php echo $fm->textSorten($data['body'],50);?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><img src="<?php echo $data['image'];?>" alt="" height="40px" width="60px"></td>
                        <td><?php echo $data['author'];?></td>
                        <td><?php echo $data['tags'];?></td>
                        <td><?php echo $fm->dateFormate($data['date']);?></td>

                        <td><a href="viewpost.php?viewpostid=<?php echo $data['id']?>">View</a>
                        <?php
                        if(Session::get("id")== $data['userid'] || Session::get("userrole") =="0")
                        {
                        ?>
                            ||  <a href="editpost.php?editid=<?php echo $data['id']?>">Edit</a> ||

                            <a onclick="return confirm('Are you sure to delete')" href="delpost.php?delid=<?php echo $data['id']?>">Delete</a>
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
