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
    <p><a href="browse.php"> 返回</a></p>

    </div>
    <div class=bottom>
        <table>
            <tr>
                <th>编号</th><th>日期</th><th>预约人</th><th>预约房间</th><th>操作</th>
            </tr>
                <?php
                    //查询语句
                    $sql="select * from `order`";
                    //执行查询
                    $res=mysqli_query($link,$sql);
                    //判断是否有记录
                    $num_row=mysqli_num_rows($res);//总行数
                    if($num_row>=1){
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

                        $page_size=3;//每页显示的记录数
                        $max_page=ceil($num_row/$page_size);//最大页码

                        $page=isset($_GET['page'])?$_GET['page']:1;//当前页
                        $page=($page<1)?1:$page;//设置最小阀
                        $page=($page>$max_page)?$max_page:$page;//最大阀值
                        $lim=($page-1)*$page_size;
                        //sql查询
                        $sql="select * from `order` limit $lim,$page_size";
                        $res=mysqli_query($link,$sql);
                        //3.一行行读取，并返还关联数组
                        while($row=mysqli_fetch_assoc($res)){
                            //在此以get的方式传送id参数
                            echo "
                            <tr>
                                <td>".$row['id']."</td>
                                <td>".$row['date']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['room']."</td>
                                
                                <td><a href='update.php?id={$row['id']}'>修改</a><a href='delete.php?id={$row['id']}'>删除</a></td>
                            </tr>
                            ";
                        }
                        //调用makepagehtml函数
                        include "makepagehtml.php";
                        echo makepagehtml($page,$max_page);
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