<?php
include "inc/header.php";
?>

<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
<?php
                    if(isset($_GET['deluser']))
                    {  
                        $id = $_GET['deluser'];
                        $sql = "delete  from tbl_user where id = '$id'";
                        $result = $db->delete($sql);
                        if($result)
                        {
                            echo "<span style='color:green;font-size=18px;'>User deleted succesfully..</span>";
                        }
                    }
                    
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Name</th>
							<th>username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        $sql = "select * from tbl_user order by id";
                        $user = $db->select($sql);
                        if($user)
                        { 
                            foreach($user as $data)
                            {
                        
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $fm->textsorten($data['details']); ?></td>
							<td>
							    <?php
                                    if($data['role'] == '0')
                                    echo "Admin";
                                    if($data['role'] == '1')
                                    echo "Author";
                                    if($data['role'] == '2')
                                    echo "Editor";
                                ?>
							</td>
							<td>
							<?php
                                if(Session::get('userrole')=='0')
                                {
                            ?>
							<a href="viewuser.php?userid=<?php echo  $data['id'];?>">View</a> ||<a onclick="return confirm('Are you sure to delete')" href="?deluser=<?php echo  $data['id'];?>">Delete</a>
							<?php
                                } else
                                {
                            ?>
                            <a href="viewuser.php?userid=<?php echo  $data['id'];?>">View</a>
                            <?php }?>
							</td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
            <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
<?php include "inc/footer.php";?>

