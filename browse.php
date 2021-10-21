<?php error_reporting(E_ALL);



    


    //cookie验证
    if(isset($_COOKIE['islogin'])&&$_COOKIE['islogin']==1){
        $username=$_COOKIE['username'];


    }else{
        //cookie过期
        echo "<script>alert('登陆已过期');location.href='login.php?action=login'</script>";



    }


?>

<div class=main>
    <div class=top>
        <?php echo $username;?>
        您好,<br>
        注册
        <a href="login.php">登陆</a>



    </div>
    <div class=bottom>
        <a href="orderlist.php">显示预约</a>
        <a href="order.php">预约登记</a>

    </div>

</div>

