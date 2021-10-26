<?php
error_reporting(E_ALL);
//获取总记录数
//1.count
include "conn.php";
// $sql="select count(*) from `order`";
// $res=mysqli_query($link,$sql);
// $row=mysqli_fetch_row($res);
// echo $row[0]

//2.mysqli_num_rows
//查询总行数
$sql="select * from `order`";
$res=mysqli_query($link,$sql);
$num_row=mysqli_num_rows($res);//总行数
//echo $num_row;





$page_size=3;//每页显示的记录数
$max_page=ceil($num_row/$page_size);//最大行数
$page=isset($_GET['page'])?$_GET['page']:1;//当前页

$page=($page<1)?1:$page;//设置最小阀
$page=($page>$max_page)?$max_page:$page;//最大阀值
$lim=($page-1)*$page_size;//起始行数
//sql查询
$sql="select * from `order` limit $lim,$page_size";
$res=mysqli_query($link,$sql);

//输出html表格
echo "<table border=1> <tr><th>id</th><th>日期</th></tr>";
while($row=mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td><td>".$row['date']."</td>";
    echo "</tr>";
}
echo "</table>";

?>
<?php
//定义函数
function makepagehtml($page,$max_page){
    unset($_GET['page']);
    $params=http_build_query($_GET);
    if($params){
        $params.="&";
    }

    $prev_page=($page<1)?1:$page-1;
    $next_page=($page>$max_page)?$max_page:$page+1;

    $page_html="<a href='?".$params."page=1'>首页</a>";
    $page_html.="<a href='?".$params.'page='.$prev_page."'>上一页</a>";
    $page_html.="<a href='?".$params.'page='.$next_page."'>下一页</a>";
    $page_html.="<a href='?".$params."page={$max_page}'>首页</a>";

    return $page_html;


}




?>
<?php

//$prev_page=($page<1)?1:$page-1;
//$next_page=($page>$max_page)?$max_page:$page+1;

echo makepagehtml($page,$max_page);
?>