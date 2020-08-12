 <div class="sidebar clear">
        <div class="samesidebar clear">
            <h2>Categories</h2>
            <ul>
            <?php
            $sql = "select * from tbl_catagory";
            $catagory = $db->select($sql);
            if($catagory)
            {
            foreach($catagory as $data)
            {
            ?>
                <li><a href="posts.php?catagory=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></li>
                <?php }}else{ ?>
                        <li>NO Category created.</li>
                
           <?php }?>
            </ul>
        </div>

        <div class="samesidebar clear">
            <h2>Latest articles</h2>
            <?php
            $sql = "select * from tbl_post limit 5"; 
            $result = $db->select($sql);
            if($result)
            {
            foreach($result as $data)
            {
            ?>
            <div class="popular clear">
                <h3><a href="post.php?id=<?php echo $data['id'];?>"><?php echo $data['title'];?></a></h3>
                <a href="post.php?id=<?php echo $data['id'];?>"><img src="admin/<?php echo $data['image']?>" alt="post image" /></a>
                <?php echo $fm->textSorten($data['body'],120);?>


            </div>
            <?php }} else { header("location:404.php");}?>



        </div>

    </div>