<?php 
include 'inc/header.php';
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
            <?php
            if(!isset($_GET['id']) || $_GET['id'] == NULL)
            {
                header("liaction:404.php");
            }
            else
            $id = $_GET['id'];
            $sql = "select * from tbl_post where id= '$id'";
            $post = $db->select($sql);
            if($post)
            {
            foreach($post as $data)
            {
        ?>
        <div class="about">
            <h2><?php echo $data['title'];?></h2>
            <h4><?php echo $fm->dateFormate($data['date'])?>, By <a href="#"><?php  echo $data['author'];?></a></h4>

            <img src="admin/<?php echo $data['image'];?>" alt="post image" />
            <?php echo $data['body'];?>
            <div class="relatedpost clear">
                <h2>Related articles</h2>
                <?php
                $cat_id = $data['cat'];
                $sql = "select * from tbl_post where cat= '$cat_id' order by rand() limit 6";
                $rel_post = $db->select($sql);
                if($rel_post)
                {
                foreach($rel_post as $data)
                {
                
                ?>
                <a href="post.php?id=<?php echo $data['id'];?>"><img src="admin/<?php echo $data['image']?>" alt="post image" /></a>
                <?php } }else echo "NO RELETED POST";?>
          
            </div>
        </div>
            <?php }} else {header("location:404.php");}?>
        </div>

<?php 
include 'inc/sidebar.php';
include 'inc/footer.php';
?>
