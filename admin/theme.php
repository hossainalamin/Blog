<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Themes</h2>
        <div class="block copyblock">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $theme = $_POST['theme'];
                    $theme = mysqli_real_escape_string($db->link,$theme);
                        $sql = "update tbl_theme
                        set theme = '$theme'";
                        $result = $db->update($sql);
                        if($result)
                        {
                        echo "<span style='color:green;font-size=18px;'>Theme updated succesfully..</span>";   
                        }
                        else
                        {
                        echo "<span style='color:green;font-size=18px;'>Theme not  updated..</span>";     
                        }
                }
                ?>
            <?php
                $sql = "select * from tbl_theme where id = '1'";
                $themes = $db->select($sql);
                while($result = $themes->fetch_assoc())
                {
                ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input <?php if($result['theme']=='default') { echo "checked";}?> type="radio" name="theme" value="default"/>Default
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input <?php if($result['theme']=='green') { echo "checked";}?> type="radio" name="theme" value="green" />Green
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Change" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php }  ?>
        </div>
    </div>
</div>
<div class="clear">
</div>
<?php include "inc/footer.php";?>
