<?php
foreach($child_menu as $key=>$obj){
?>
<li>
    <span class="glyphicon glyphicon-plus"><em class="pl5"></em><?php echo $key?></span>
    <ul>
        <?php
        foreach($obj as $k=>$o){
        ?>
        <li><a href="<?php echo $o->url;?>"><?php echo $o->title;?></a></li>
        <?php
        }
        ?>
    </ul>
</li>

<?php
}
?>