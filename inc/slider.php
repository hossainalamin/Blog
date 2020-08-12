<div class="slidersection templete clear">
        <div id="slider">
                    <?php
        $sql = "select * from tbl_slider";
        $result = $db->select($sql);
        if($result)
        {
            foreach($result as $data)
            {
        ?>
            <a href="#"><img src="admin/<?php echo $data['image'];?>" alt="nature 1" title="<?php echo $data['title'];?>"/></a>
                    <?php } } ?>

        </div>
</div>