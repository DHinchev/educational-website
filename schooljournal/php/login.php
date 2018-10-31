<?php
require 'config.php';

session_start();

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
if (isset($_POST['submit'])) 
{

            $username  = mysqli_real_escape_string($conn,$_POST['username']); 
            $password  = mysqli_real_escape_string($conn,$_POST['password']);
            
            $queryuser  = "SELECT username FROM register WHERE username='".$username."' AND PASSWORD='".$password."'";
            $querypass  = "SELECT password FROM register WHERE password='".$password."'";
            $queryper = "SELECT permissions FROM register WHERE username='".$username."'";
            $queryagree = "SELECT agreement FROM register WHERE username='".$username."'";
            $queryactive = "SELECT activation FROM register WHERE username='".$username."'";

            $resuser    = mysqli_query($conn,$queryuser);
            $respass    = mysqli_query($conn,$querypass);
            $resrep    = mysqli_query($conn,$queryper);
            $resagree     = mysqli_query($conn,$queryagree);
            $resactive     = mysqli_query($conn,$queryactive);
            $countuser  = mysqli_num_rows($resuser);
            $countper = mysqli_num_rows($resrep);
            $row_permission = mysqli_fetch_row($resrep);
            $row_agree = mysqli_fetch_row($resagree);
            $row_active = mysqli_fetch_row($resactive);
            $separated_permissions = implode("", $row_permission);
            $separated_agreement = implode("", $row_agree);
            $separated_active = implode("", $row_active);

            if ($countuser==1 && $countper==1 && $separated_agreement=='accepted' && $separated_active == '') {
                
                 $_SESSION['login_user'] = $username; 
                 $_SESSION["permission"] = $separated_permissions;
                 header("location: main_page.php");
                 exit();
            }
            else{
                header("location: ../index.php");
            }
           
}
?>
