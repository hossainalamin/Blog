<?php
include "inc/header.php";
?>

<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
<?php
                    if(isset($_GET['delcat']))
                    {  
                        $id = $_GET['delcat'];
                        $sql = "delete  from tbl_catagory where id = '$id'";
                        $result = $db->delete($sql);
                        if($result)
                        {
                            echo "<span style='color:green;font-size=18px;'>Catagory deleted succesfully..</span>";
                        }
                    }
                    
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        $sql = "select * from tbl_catagory order by id";
                        $catagory = $db->select($sql);
                        if($catagory)
                        { 
                            $i = 0;
                            foreach($catagory as $data)
                            {
                                $i++;
                        
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo  $data['id'];?>">Edit</a> ||<a onclick="return confirm('Are you sure to delete')" href="?delcat=<?php echo  $data['id'];?>">Delete</a></td>
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

