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
    $page_html.="<a href='?".$params."page={$max_page}'>尾页</a>";

    return $page_html;


}




?>