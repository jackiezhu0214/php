<?php error_reporting(E_ALL);




    //注销部分
    //感觉注销优先级是最高的！

    if(isset($_GET['action'])&&$_GET['action']=='login'){
        setcookie('islogin',null,time()-1);
        setcookie('username',null,time()-1);

    }


?>

<form method="post" action="">
    账户：<input type="text" name="username"/><br>
    密码：<input type="password" name="password"/><br>
    记住我<input type="checkbox" name="rem" value="rem"/><br>
    <input type="submit" value="提交"/><br>
    <a href="login.php?action=login">注销</a>

</form>

<?php
//登陆判断
if(!empty($_POST)){
    //接收表单
    //$username username str
    //$password password int
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';


    //sql查询登陆
    //1.连接服务器 打开数据库
    $link=mysqli_connect('localhost','root','root','20171001') or die("数据库连接失败");
    //2.设置字符集
    mysqli_set_charset($link,"utf8");
    //3.定义sql语句
    $sql="select * from `userinfo` where `username`='$username' and `password`='$password'";
    #echo $sql;
    //4.执行查询
    $res=mysqli_query($link,$sql);

    //检测查询结果
    //如果查询结果大于等于一行 则登陆成功
    if(mysqli_num_rows($res)>=1){





        //登陆成功设置cookie
        //islogin 1
        //username $username
        if(isset($_POST['rem'])&&$_POST['rem']='rem'){
            //七天到期
            setcookie('islogin',1,time()+7*24*3600);
            setcookie("username",$username,time()+7*24*3600);

        }else{
            
            setcookie('islogin',1);
            setcookie("username",$username);
        }




        echo "<script>alert('登陆成功');window.location.href='browse.php'</script>";
    }else{

        echo "<script>alert('登陆失败')</script>";
    }





}






?>