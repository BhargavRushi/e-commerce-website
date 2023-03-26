<?php
    $con = mysqli_connect('localhost','root','','e-commerce');
    session_start();

    if(isset($_POST['Register']))
    {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $p = $_POST['mobile'];
        $a = $_POST['address'];
        $k = $_POST['pass1'];
        $ck = $_POST['pass2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $sql1 = "select * from users where email = '$e'";
        $res1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($res1);
        if($row1 == 0)
        {
            if($k == $ck)
            {
                $sql2 = "insert into users values('','$n','$p','$e','$a','$k','2','','','$city','$state','$pincode','')";
                $res2 = mysqli_query($con,$sql2);
                if($res2 == true)
                {
                    $msg = "Account Created!!!";
                    require "login.php";
                }
            }
            else
            {
                $msg = "Create password and confirm password must be same";
                require "signup.php";
            }
        }
        else
        {
            $msg = "Email Already exists";
            require "signup.php";
        }
    }

    elseif(isset($_POST['login']))
    {
        $e = $_POST['email'];
        $p = $_POST['password'];

        $sql1 = "select * from users where email = '$e'";
        $res1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($res1);
        if($row1 > 0)
        {
            $sql2 = "select * from users where email = '$e' and passkey = '$p'";
            $res2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_array($res2);
            if($row2 > 0)
            {
                $sql3 = "select uid,rid from users where email = '$e'";
                $res3 = mysqli_query($con,$sql3);
                $row3 = mysqli_fetch_array($res3);
                $_SESSION['id'] =  $row3['uid'];
                $_SESSION['rid'] = $row3['rid'];
                require "index.php";
            }
            else
            {
                $msg = "Incorrect Password";
                require "login.php";
            }
        }
        else
        {
            $msg = "Email does not exists";
            require "login.php";
        }
    }

    elseif(isset($_GET['logout']))
    {
        session_unset();
        session_destroy();
        require "index.php";
    }

    elseif(isset($_GET['home']))
    {
        require "index.php";
    }

    elseif(isset($_GET['vegetables']))
    {
        if(isset($_SESSION['id']))
        {
            require "vegetables.php";
        }
        else
        {
            require "login.php";
        }
        
    }

    elseif(isset($_GET['fruits']))
    {
        if(isset($_SESSION['id']))
        {
            require "fruits.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['meat']))
    {
        if(isset($_SESSION['id']))
        {
            require "meat.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['dashboard']))
    {
        if(isset($_SESSION['id']))
        {
            require "profile.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['edit']))
    {
        if(isset($_SESSION['id']))
        {
            require "edit.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['changepassword']))
    {
        if(isset($_SESSION['id']))
        {
            require "changepassword.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['savechanges']))
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $n = $_POST['name'];
            $e = $_POST['email'];
            $m = $_POST['mobile'];
            $a = $_POST['address'];
            $c = $_POST['city'];
            $s = $_POST['state'];
            $pin = $_POST['pincode'];

            $sql = "update users set uname = '$n',email = '$e',mobile = '$m',address = '$a',city = '$c',state = '$s',pincode = '$pin' where uid = '$id'";
            $res = mysqli_query($con,$sql);
            if($res == true)
            {
                $msg = "Profile Updated";
                require "profile.php";
            }
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['updatepassword']))
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $p = $_POST['oldpassword'];
            $np = $_POST['new_password1'];
            $cnp = $_POST['new_password2'];

            $sql1 = "select passkey from users where uid = '$id'";
            $res = mysqli_query($con,$sql1);
            $row = mysqli_fetch_array($res);

            if($row['passkey'] == $p)
            {
                if($np == $cnp)
                {
                    $sql2 = "update users set passkey = '$np' where uid = '$id'";
                    $res1 = mysqli_query($con,$sql2);
                    $msg = "Password Updated";
                    require "login.php";
                }
                else
                {
                    $msg = "New password and confirm new password must be same";
                    require "changepassword.php";
                }
            }
            else
            {
                $msg = "incorrect Password";
                require "changepassword.php";
            }
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['mpimg']))
    {
        if(isset($_SESSION['id']))
        {
            if($_FILES['image']['name'] == '')
            {
                require 'profile.php';
            }
            else
            {
                $id = $_SESSION['id'];
                $path = "img/".basename($_FILES['image']['name']);
                $sql = "update users set image = '$path' where uid = '$id'";
                $res = mysqli_query($con,$sql);
                move_uploaded_file($_FILES['image']["tmp_name"],$path);
                if($res == true)
                {
                    $msg = "Profile photo uploaded";
                    require 'profile.php';
                }
            }
        }
        else
        {
            require 'login.php';
        }
    }

    elseif(isset($_GET['addproduct']))
    {
        if(isset($_SESSION['id']))
        {
            require "addproduct.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['addprod']))
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $n = $_POST['pname'];
            $sql1 = "select * from product where pname = '$n'";
            $res1 = mysqli_query($con,$sql1);
            $row = mysqli_fetch_array($res1);
            if($row ==0)
            {
                $t = $_POST['ptype'];
                $path1 = "img/".basename($_FILES['image1']['name']);
                $path2 = "img/".basename($_FILES['image2']['name']);
                $path3 = "img/".basename($_FILES['image3']['name']);
                $pt = $_POST['pricetype'];
                $pr = $_POST['price'];
                $d = date("d-m-y");
                
                $sql = "insert into product values('','$n','$path1','$path2','$path3','$pt','$pr','$id','$d','$t','','')";
                $res = mysqli_query($con,$sql);
                $msg = "Product added";
                move_uploaded_file($_FILES['image1']["tmp_name"],$path1);
                move_uploaded_file($_FILES['image2']["tmp_name"],$path2);
                move_uploaded_file($_FILES['image3']["tmp_name"],$path3);
                require "addproduct.php";  
            }
            else
            {
                require "addproduct.php";
            }
        }
        else
        {
            require "login.php";
        }     
    }

    elseif(isset($_GET['compose']))
    {
        if(isset($_SESSION['id']))
        {
            require "compose.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['back']))
    {
        if(isset($_SESSION['id']))
        {
            require "profile.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['compose']))
    {
        if(isset($_SESSION['id']))
        {
            require "compose.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['inbox']))
    {
        if(isset($_SESSION['id']))
        {
            require "inbox.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['sent']))
    {
        if(isset($_SESSION['id']))
        {
            require "sent.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['mail_send']))
    {
        if(isset($_SESSION['id']))
        {
            $from_id = $_SESSION['id'];
            $to_mail = $_POST['to_email'];
            $sql1 = "select uid from users where email = '$to_mail'";
            $res = mysqli_query($con,$sql1);
            $row = mysqli_fetch_array($res);
            $to_id = $row['uid'];
            $s = $_POST['subject'];
            $m = $_POST['desc'];
            $date = date("d-m-y");
            $f = "img/".basename($_FILES['file']['name']);
            $sql = "insert into message values('','$from_id','$to_id','$s','$m','$f','$date','')";
            $res = mysqli_query($con,$sql);
            move_uploaded_file($_FILES['file']["tmp_name"],$f);
            $msg = "Message Sent";
            require "compose.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['detail']))
    {
        if(isset($_SESSION['id']))
        {
            $p =  $_GET['detail'];
            require "detail.php";
        }
        else
        {
            require "login.php";
        }
    }
    elseif(isset($_GET['cart']))
    {
        if(isset($_SESSION['id']))
        {
            $p =  $_GET['cart'];
            require "cart.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['review']))
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $rate = $_POST['rate'];
            $c = $_POST['comment'];
            $d = date('Y-m-d');
            $p = $_POST['pid'];
            $sql1 = "select * from review where reviewed_by = '$id' and review = '$c' and product = '$p'";
            $res1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_array($res1);
            if($row1 == 0)
            {
                $sql = "insert into review values('','$id','$c','$rate','$d','','$p')";
                $res = mysqli_query($con,$sql);
                $msg = "review added";
            }
            require "detail.php";
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_POST['AddToCart']))
    {
        if(isset($_SESSION['id']))
        {
            $p = $_POST['product'];
            $id = $_SESSION['id'];
            $sql1 = "select count(*) as count from cart where uid = '$id' and pid = '$p'";
            $res1 = mysqli_query($con,$sql1);
            $row = mysqli_fetch_array($res1);
            if($row['count'] == 0)
            {
                $sql = "insert into cart values('','$id','$p','1')";
                $res = mysqli_query($con,$sql);
                require 'cart.php';
            }
            else
            {
                require 'cart.php';
            }
        }
        else
        {
            require "login.php";
        }
    }

    elseif(isset($_GET['delete_cart_item']))
    {
        if(isset($_SESSION['id']))
        {
            $id = $_GET['id'];
            $sql = "delete from cart where cid = '$id'";
            $res = mysqli_query($con,$sql);
            $msg = "One item deleted from cart";
            require 'cart.php';
        }
        else
        {
            require 'login.php';
        }
    }

    elseif(isset($_POST['update_quantity']))
    {
        if(isset($_SESSION['id']))
        {
            $id =  $_POST['cid'];
            $q = $_POST['quantity'];
            echo $q;
            $sql = "update cart set quantity = '$q' where cid = '$id'";
            $res = mysqli_query($con,$sql);
            require 'cart.php';
        }
        else
        {
            require 'login.php';
        }
    }
?>