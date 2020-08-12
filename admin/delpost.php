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
                    if(!isset($_GET['delid']) || $_GET['delid']==NULL)
                    {
                        echo "<script>window.location = 'postlist.php';</script>";   
                    }
                    else
                    {
                        $id = $_GET['delid'];
                        $sql = "select * from tbl_post where id = '$id'";
                        $result = $db->select($sql);
                        if($result)
                        {
                            while($delimg = $result->fetch_assoc())
                            {
                                $delin = $delimg['image'];
                                unlink($delin);
                            }
                        }
                        $delsql = "delete  from tbl_post where id = '$id'";
                        $delresult = $db->delete($delsql);
                        if($delresult)
                        {
                            echo "<script>alert('Data deleted successfully');</script>";
                            echo "<script>window.location = 'postlist.php';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Data not deleted successfully');</script>";
                            echo "<script>window.location = 'postlist.php';</script>";

                        }
                    }
                    ?>