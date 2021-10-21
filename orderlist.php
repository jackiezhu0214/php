<?php error_reporting(E_ALL);



    


    //cookie验证
    if(isset($_COOKIE['islogin'])&&$_COOKIE['islogin']==1){
        $username=$_COOKIE['username'];


    }else{
        echo "<script>alert('登陆过期');location.href='login.php?action=login'</script>";

    }


?>

<?php
    //连接服务器 打开数据库
    $link=mysqli_connect('localhost','root','root','20171001');
    mysqli_set_charset($link,'utf8');
?>
<div class=main>
    <div class=top>
    <p><?php echo $username?>您好<a href="login.php?action=login"> 注销</a> 注册</p>


    </div>
    <div class=bottom>
        <table>
            <tr>
                <th>编号</th><th>日期</th><th>预约人</th><th>预约日期</th>
            </tr>
                <?php
                    //查询语句
                    $sql="select * from `order`";
                    //执行查询
                    $res=mysqli_query($link,$sql);
                    //判断是否有记录
                    if(mysqli_num_rows($res)>=1){
                        //order表中有记录
                        //1.全部读取，并转二维数组
                        #$rows=mysqli_fetch_all($res);
                        //2.一行行读取，并转一维数组
                        /* while($row=mysqli_fetch_row($res)){
                            echo "
                            <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                            </tr>
                            ";

                        } */
                        //3.一行行读取，并返还关联数组
                        while($row=mysqli_fetch_assoc($res)){
                            echo "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['date']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['room']."</td>
                            </tr>
                            ";
                        }
                        //遍历数组
                        /* foreach($rows as $v){
                            echo "
                            <tr>
                                <td>$v[0]</td>
                                <td>$v[1]</td>
                                <td>$v[2]</td>
                                <td>$v[3]</td>
                            </tr>
                            ";


                        } */


                    }else{
                        echo "查无记录";
                    }
                
                ?>
        </table>

    </div>

</div>