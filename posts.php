<?php 
include "inc/header.php";
?>
<?php
            if(!isset($_GET['catagory']) || $_GET['catagory'] == NULL)
            {
                header("liaction:404.php");
            }
            else
            {
            $cat_id = $_GET['catagory'];
            }
?>
<div class="contentsection contemplete clear">
       <div class="maincontent clear">

    <?php
        $sql = "select * from tbl_post where cat = '$cat_id'"; 
        $result = $db->select($sql);
        if($result)
        {
            foreach($result as $data)
            {
    ?>
        <div class="samepost clear">
            <h2><a href="post.php?id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a></h2>
            <h4><?php echo $fm->dateFormate($data['date'])?>, By <a href="#"><?php  echo $data['author'];?></a></h4>
            <a href="#"><img src="admin/<?php echo $data['image'];?>" alt="post image" /></a>
            <?php echo $fm->textSorten($data['body']);?>
            <div class="readmore clear">
                <a href="post.php?id=<?php echo $data['id'];?>">Read More </a>
            </div>
        </div>
    <?php }} else {
            echo "<p>No Post Avialable in this catagory..</p>";
        }?>
    </div>

<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>
