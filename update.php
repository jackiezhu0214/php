<?php error_reporting(E_ALL);

    //cookie验证
    //登陆验证
    //username username
    if(isset($_COOKIE['islogin'])&&$_COOKIE['islogin']==1){
        if(!isset($_COOKIE['username'])){
            exit("<script>alert('登陆异常');location.href='login.php?action=login'</script>");
        }
        $username=$_COOKIE['username'];


    }else{
        echo "<script>alert('登陆过期');location.href='login.php?action=login'</script>";

    }
?>

<?php
    error_reporting(E_ALL);

    //接收orderlist传来的数据
    //get方式
    if(!empty($_GET)){
        $id=isset($_GET['id'])?$_GET['id']:null;

        
        //定位数据
        include "conn.php";
        //查询语句
        $sql="select * from `order` where `id`=$id";
        //执行sql
        $res=mysqli_query($link,$sql);
        //
        $row=mysqli_fetch_assoc($res);
        //$row为关联数组

    }

?>








<form action="" method="post">
    <p><?php echo $username?>您好<a href="login.php?action=login"> 注销</a> 注册</p>
    <p>选择实训房间：<select name='room'>

        <option value="新北204" <?php if($row['room']=='新北204') echo "selected";?>>新北204</option>
        <option value="新北205" <?php if($row['room']=='新北205') echo "selected";?>>新北205</option>
        <option value="新北404" <?php if($row['room']=='新北404') echo "selected";?>>新北404</option>
        <option value="新北405" <?php if($row['room']=='新北405') echo "selected";?>>新北405</option>
        <option value="新北508" <?php if($row['room']=='新北508') echo "selected";?>>新北508</option>
    
    </select>
    
    </p>
    <p>选择时间：<input type="date" name='date' value=<?php echo $row['date']?>/></p>
    <p><input type="submit" value="修改"/></p>
    <a href="login.php">返回首页</a>
    <a href="orderlist.php">返回</a>

</form>













<?php

    //接收表单
    //  post
    //  $room $date

    //执行sql语句 update
    //判断登陆username与表单中的username是否相同
    if(!empty($_POST)){
        $room=isset($_POST['room'])?$_POST['room']:'';
        $date=isset($_POST['date'])?$_POST['date']:'';

        $sql=$_COOKIE['username']==$row['username']?"update `order` set `date`='$date',`username`='$username',`room`='$room'":'1=2';
        #echo $sql;
        //执行sql语句
        $res=mysqli_query($link,$sql);
        //判断是否成功
        if($res){
            echo "<script>alert('预约成功')</script>";
        }else{
            echo "<script>alert('预约失败')</script>";
        }


    
    }



?>

