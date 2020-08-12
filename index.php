<?php 
include "inc/header.php";
include "inc/slider.php";
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $per_page = 3;
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];  
        }
        else
        {
            $page = 1;
        }
        $start_form = ($page-1)*$per_page;
        ?>
        <?php
        $sql = "select * from tbl_post limit $start_form,$per_page";
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
        <?php }?><!--foreach loop -->
        <?php
            $sql = "select * from tbl_post";
            $result = $db->select($sql);
            $total_row = mysqli_num_rows($result);
            $total_pages = ceil($total_row/$per_page);
            echo "<span class='pagination'><a href='index.php?page=0'>".'First Page'."</a>";
            for($i = 1 ; $i<=$total_pages ; $i++)
            {
            echo"<a href='index.php?page=".$i."'>
            ".$i."</a>";       
            }
            echo"<a href='index.php?page=".$total_pages."'>".'last page'."</a></span>";
        ?>
        <?php } else { header("location:404.php");}?>
    </div>
    <?php include'inc/sidebar.php';?>
    <?php include'inc/footer.php';?>
    