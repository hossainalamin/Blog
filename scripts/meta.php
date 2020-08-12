<?php
if(isset($_GET['pageid']))
{
            $pageid = $_GET['pageid'];
            $sql = "select * from tbl_page where id = '$pageid'"; 
            $result = $db->select($sql);
            if($result)
            {
            foreach($result as $data)
            {
            ?>
?>

<title><?php echo $data['name'];?>-<?php echo TITLE;?></title>
<?php } } }
elseif(isset($_GET['id']))
{
    $postid = $_GET['id'];
    $sql = "select * from tbl_post where id = '$postid'"; 
    $result = $db->select($sql);
    if($result)
    {
        foreach($result as $data)
        {
?>
<title><?php echo $data['title'];?>-<?php echo TITLE;?></title>
<?php }}} 
else { ?>
<title><?php echo $fm->title();?>-<?php echo TITLE;?></title>
<?php } ?>
<!DOCTYPE html>
<html>
    <meta name="language" content="English">
    <meta name="description" content="It is a website about education">
    <meta name="keywords" content="blog,cms blog">
    <meta name="author" content="Alamin">