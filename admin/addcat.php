<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
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
                        $sql = "insert into tbl_catagory(name) values('$name')";
                        $result = $db->insert($sql);
                        if($result)
                        {
                        echo "<span style='color:green;font-size=18px;'>Catagory added succesfully..</span>";   
                        }
                        else
                        {
                        echo "<span style='color:green;font-size=18px;'>Catagory not  added..</span>";     
                        }
                    }
                }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
<?php include "inc/footer.php";?>

