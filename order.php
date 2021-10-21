<?php error_reporting(E_ALL);

    //cookie验证
    if(isset($_COOKIE['islogin'])&&$_COOKIE['islogin']==1){
        if(!isset($_COOKIE['username'])){
            exit("<script>alert('登陆成功')</script>");
        }
        $username=$_COOKIE['username'];


    }else{
        echo "<script>alert('登陆过期');location.href='login.php?action=login'</script>";

    }
?>


<form action="" method="post">
    <p><?php echo $username?>您好<a href="login.php?action=login"> 注销</a> 注册</p>
    <p>选择实训房间：<select name='room'>
        <option value="新北204">新北204</option>
        <option value="">新北205</option>
        <option value="">新北404</option>
        <option value="">新北405</option>
        <option value="">新北508</option>
    
    </select>
    
    </p>
    <p>选择时间：<input type="date" name='date'/></p>
    <p><input type="submit" value="提交"/></p>
    <a href="login.php">返回首页</a>

</form>




<?php
//接收数据
// room room str
//date date str
if(!empty($_POST)){
    $room=isset($_POST['room'])?$_POST['room']:'';
    $date=isset($_POST['date'])?$_POST['date']:'';
    //1.连接服务器
    $link=mysqli_connect('localhost','root','root','20171001');
    //2.设置字符
    mysqli_set_charset($link,'utf8');
    //设置sql语句
    $sql="insert into `order` set `date`='$date',`username`='$username',`room`='$room'";
    #echo $sql;
    //执行sql语句
    $res=mysqli_query($link,$sql);
    //判断是否成功
    if(mysqli_affected_rows($link)>=1){
        echo "<script>alert('预约成功')</script>";
    }else{
        echo "<script>alert('预约失败')</script>";
    }


}





?>


