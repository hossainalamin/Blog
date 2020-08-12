<?php
include'../config/config.php';
include'../lib/Database.php';
include'../helpers/formate.php';
$db = new Database();
$fm = new formate();
include '../lib/session.php';
session::init();
session::checkSession();
?>
                    <?php
                    if(!isset($_GET['delpage']) || $_GET['delpage']==NULL)
                    {
                        echo "<script>window.location = 'index.php';</script>";   
                    }
                    else
                    {
                        $id = $_GET['delpage'];
                        $delsql = "delete  from tbl_page where id = '$id'";
                        $delresult = $db->delete($delsql);
                        if($delresult)
                        {
                            echo "<script>alert('Page deleted successfully');</script>";
                            echo "<script>window.location = 'index.php';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Page not deleted successfully');</script>";
                            echo "<script>window.location = 'index.php';</script>";

                        }
                    }
                    ?>