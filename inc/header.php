<?php
include'config/config.php';
include'lib/Database.php';
include'helpers/formate.php';
$db = new Database();
$fm = new formate();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)

?>
<head>
   
    <?php include "scripts/meta.php";?>
    <?php include "scripts/css.php";?>
    <?php include "scripts/js.php"; ?>
</head>

<body>
    <div class="headersection templete clear">
        <a href="index.php">
            <div class="logo">
                <?php
        $sql = "select * from title_slogan where id=1";
        $result = $db->select($sql);
        if($result)
        {
            foreach($result as $data)
            {
        
        ?>
                <img src="admin/<?php echo $data['logo'];?>" alt="Logo" />
                <h2><?php echo $data['title'];?></h2>
                <p><?php echo $data['slogan'];?></p>
                <?php } }?>

            </div>
        </a>
        <div class="social clear">
            <?php
            $sql = "select * from tbl_social where id=1";
            $result = $db->select($sql);
            if($result)
            {
                foreach($result as $data)
                {
        ?>
            <div class="icon clear">
                <a href="<?php echo $data['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="<?php echo $data['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="<?php echo $data['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="<?php echo $data['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                <?php } }?>
            </div>
            <div class="searchbtn clear">
                <form action="search.php" method="get">
                    <input type="text" name="search" placeholder="Search keyword..." />
                    <input type="submit" name="keyword" value="Search" />
                </form>
            </div>
        </div>
    </div>
    <div class="navsection templete">
        <?php
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path,'.php');
    ?>
        <ul>
            <li><a <?php
                   if($title == 'index')
                   {
                       echo 'id="active"';
                   }
            ?> href="index.php">Home</a></li>
            <?php
            $sql = "select * from tbl_page";
            $result = $db->select($sql);
            if($result)
            {
            foreach($result as $data)
            {

        ?>

            <li><a <?php
                if(isset($_GET['pageid']) && $_GET['pageid'] == $data['id'])
                {
                    echo 'id="active"';
                }

            ?> href="page.php?pageid=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></li>
            <?php } }?>
            <li><a <?php
                   if($title == 'contact')
                   {
                       echo 'id="active"';
                   }
            ?> href="contact.php">Contact</a></li>
        </ul>
    </div>
