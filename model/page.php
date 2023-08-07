<?php
function paging($page_current,$page_left,$page_right,$pages){
    if($page_current!=1)
    {
        echo' <a href="index.php?act=product&page=1" class="btn btn-outline-secondary"><<</a> ';
        if($page_current-3>1)
        echo' <a href="index.php?act=product&page=" class=" disabled btn btn-outline-secondary">...</a> ';
    }
    
    for($i=$page_left ;$i<=$page_right;$i++ )
    {   if ($page_current==$i)
        echo' <a href="index.php?act=product&page='.$i.'" class="active btn btn-outline-secondary">'.$i.'</a>';
        else
        echo' <a href="index.php?act=product&page='.$i.'" class="btn btn-outline-secondary">'.$i.'</a>';
    }
    if($page_current<$pages)
    {
    if($page_current+3<$pages)
    echo' <a href="" class=" disabled btn btn-outline-secondary">...</a> ';
    echo'<a href="index.php?act=product&page='.$pages.'" class="btn btn-outline-secondary">>></a> ';
    }
}          
?>