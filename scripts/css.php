
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<?php
  $sql = "select * from tbl_theme where id = '1'";
    $themes = $db->select($sql);
    while($result = $themes->fetch_assoc())
    {
        if($result['theme']=='green')
        {
        ?>
        <link rel="stylesheet" href="theme/green.css">

        <?php } 
        else
        { 
        ?>
        <link rel="stylesheet" href="theme/default.css">
        <?php } }?>
                
?>
