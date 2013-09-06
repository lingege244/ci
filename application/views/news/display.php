<h1>使用CI模板替换语法</h1>
<?php foreach($lists  as $k => $v):?>  <!-- 注意后面foreach后面跟的是 冒号 -->
<?php echo $k."=>".$v; ?><br>   
<?php endforeach;?>

<!-- 类似的还有 if elseif while （前面这些都要记得冒号：）和endif，endfor，endforeach，和 endwhile -->