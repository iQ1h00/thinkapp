<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>Find Data</title>  
</head>  

<body>     
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["title"]); ?>--<?php echo ($vo["content"]); ?>--<?php echo ($vo["num"]); ?>--<?php echo ($vo["create_time"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
</body> 
</html>