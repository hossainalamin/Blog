<?php 
include 'inc/header.php';
?>
<?php
            if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL)
            {
                header("liaction:404.php");
            }
            else
            {                               
                $pageid = $_GET['pageid'];
            }
?>
<?php
    $sql = "select * from tbl_page where id ='$pageid'";
    $result = $db->select($sql);
    if($result)
        {
        foreach($result as $data)
        {
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <h2><?php echo $data['name'];?></h2>
            <?php echo $data['body'];?>  
        </div>
</div>
<?php } } else header("location:404.php");?>
<?php 
include 'inc/sidebar.php';
include 'inc/footer.php';
?>
