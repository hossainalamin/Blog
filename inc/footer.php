</div>
<div class="footersection templete clear">
    <div class="footermenu clear">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div>
       <?php
        $sql = "select * from tbl_footer where id=1";
        $result = $db->select($sql);
        if($result)
        {
            foreach($result as $data)
            {
        
        ?>
    <p>&copy; <?php echo $data['note'];?> <?php echo date('Y');?></p>
    <?php } }?>
</div>
        <?php
            $sql = "select * from tbl_social where id=1";
            $result = $db->select($sql);
            if($result)
            {
                foreach($result as $data)
                {
        ?>
<div class="fixedicon clear">
    <a href="<?php echo $data['fb'];?>" target="_blank"><img src="images/fb.png" alt="Facebook" /></a>
    <a href="<?php echo $data['tw'];?>" target="_blank"><img src="images/tw.png" alt="Twitter" /></a>
    <a href="<?php echo $data['ln'];?>" target="_blank"><img src="images/in.png" alt="LinkedIn" /></a>
    <a href="<?php echo $data['gp'];?>" target="_blank"><img src="images/gl.png" alt="GooglePlus" /></a>
    <?php } }?>
</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>

</html>
