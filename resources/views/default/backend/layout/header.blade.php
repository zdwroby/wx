<?php

foreach($top_menu as $k=>$v){
?>
<li><a class="<?php echo ($curr_top_id==$v->id) ? 'current' : '';?>" href="<?php echo $v->url;?>"><?php echo $v->title;?></a></li>
<?php
}
?>