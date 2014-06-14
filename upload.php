<!DOCTYPE HTML>
<head>
<?php
include 'config.php';
?>
<title><?php echo "".$websitename.""?>&nbsp;-Powered By hehaoyuan1997</title>
<meta name="keywords" content="Hipoject,hehaoyuan1997">
<meta name="descrption" content="Hipoject是一个图床，由hehaoyuan1997编写">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="author"
content="hehaoyuan1997">
<!---copyright (c) 2013-2013 hehaoyuan1997 All Rights Reserved--->
<!---Powered By hehaoyuan1997--->
<!---author website:http://www.ddpool.com/--->
<!---hehaoyuan1997开始于2013年8月18日23:19:57编写--->
<style type="text/css">  
.align-center{  
    margin:0 auto;      /* 居中 这个是必须的，，其它的属性非必须 */  
    width:1024;        /* 给个宽度 顶到浏览器的两边就看不出居中效果了 */  
    text-align:left;  /* 文字等内容居中 */  
}  
body {
text-align: center;  /* 页面元素居中 */
} 
.txtcss1 {
text-align: center;  /* 用于文字右对齐 */
}  
.txtcss2 {
text-align:right;  /* 用于文字右对齐 */
}  
.txtcss3 {
text-align:left;  /* 用于文字右对齐 */
}  
.form0{
background-color:rgb(210,210,210);
padding:10px
}
wrap {text-align:left;}
</style>
</head>

<body bgcolor=#E2E2E2><div class="align-center">
  <h1><?php echo "".$websitename."&nbsp".$version."" ?></h1>
     </br>
     <div class="txtcss1"><a href="<?php echo "$websiteurl" ?>">首页</a>
     <a href="<?php echo "".$websiteurl."about.php" ?>">关于</a>
     <a href="<?php echo "".$websiteurl."help.php" ?>">帮助</a>
     </br></br></div>



<?php   
 /*****************************************   
   Title :文件上传详解   
   Author:leehui1983(辉老大)   
   Finish Date  :2006-12-28   
   Edit Date  :2014-06-24
   Edit By  :hehaoyuan1997
  *****************************************/   
   $uploaddir = "./".$imagefile."";//设置文件保存目录 注意包含/       
   $type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型    
   $patch="".$websiteurl."";//程序所在路径   

   //获取文件后缀名函数   
      function fileext($filename)   
    {   
        return substr(strrchr($filename, '.'), 1);   
    }   
   //生成随机文件名函数       
    function random($length)   
    {   
        $hash = 'CR-';   
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';   
        $max = strlen($chars) - 1;   
        mt_srand((double)microtime() * 1000000);   
            for($i = 0; $i < $length; $i++)   
            {   
                $hash .= $chars[mt_rand(0, $max)];   
            }   
        return $hash;   
    }   
   //多维数组上传图片循环部分开始
    $counts=count(@$_FILES['file']['name']);        //统计上传文件个数
	$num=0;                                        //计数归零
    while ($num < $counts) {
	  

   
     $a=strtolower(fileext($_FILES['file']['name'][$num]));   
     //判断文件类型   
     if(!in_array(strtolower(fileext($_FILES['file']['name'][$num])),$type))   
       {   
          $text=implode(",",$type);   
          echo "您只能上传以下类型文件: ",$text,"<br>";   
       }   
     //生成目标文件的文件名       
     else{   
      $filename=explode(".",$_FILES['file']['name'][$num]);   
          do   
          {   
              $filename[0]=random(10); //设置随机数长度   
              $name=implode(".",$filename);   
              //$name1=$name.".Mcncc";   
              $uploadfile=$uploaddir.$name;   
          }   
     while(file_exists($uploadfile));   
          if (move_uploaded_file($_FILES['file']['tmp_name'][$num],$uploadfile)){   

              if(is_uploaded_file($_FILES['file']['tmp_name'][$num])){   
                  //输出图片预览   
                  echo "<center>您的文件已经上传完毕 上传图片预览: </center><br><center><img src='$uploadfile'></center>";   
                  echo"<br><center><a href='javascript:history.go(-1)'>继续上传</a></center>";   
				  echo "       <table border=\"0\" align=\"center\">";
				  echo "        <form name=\"form1\" action=\"".$websiteurl."login.php\" method=\"post\">";
				  echo "           <caption>图片链接</caption>";
				  echo "           <tr><th>论坛代码(BBCode)：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>HTML代码：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;此图片使用的图床为".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>原图链接：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"".$websiteurl."".$imagefile."".$name."\"></br></td>";
				  echo "           </tr>";
				  echo "        </table>";
                }   
                else{   
                  //输出图片预览   
                  echo "<center>您的文件已经上传完毕 上传图片预览: </center><br><center><img src='$uploadfile'></center>";   
                  echo"<br><center><a href='javascript:history.go(-1)'>继续上传</a></center>";   
				  echo "       <table border=\"0\" align=\"center\">";
				  echo "        <form name=\"form1\" action=\"".$websiteurl."login.php\" method=\"post\">";
				  echo "           <caption>图片链接</caption>";
				  echo "           <tr><th>论坛代码(BBCode)：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>HTML代码：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;此图片使用的图床为".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>原图链接：</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"".$websiteurl."".$imagefile."".$name."\"></br></td>";
				  echo "           </tr>";
				  echo "        </table>";
                }   
          }   
     }    
	$num++;
	}
?> 



<!---代码生成部分--->
<!---old version 0.5
       <table border="0" align="center">
        <form name="form1" action="<?php //echo "".$websiteurl."login.php" ?>" method="post">
           <caption>图片链接</caption>
           <tr><th>论坛代码(BBCode)：</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]" ?>"></br></td>
           </tr>
           <tr><th>HTML代码：</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;此图片使用的图床为".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;" ?>"></br></td>
           </tr>
           <tr><th>原图链接：</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "".$websiteurl."".$imagefile."".$name."" ?>"></br></td>
           </tr>
        </table>
--->







  <!---时间显示部分--->
  </br></br></br></br>
  <?php
    echo date("现在是Y年m月d日H时i分s秒(此时间时区为eP)");
    echo "</br>";
  ?>
  <span style="float:left">Powered By <a href="http://www.ddpool.com" >hehaoyuan1997</a></span>
  <span style="float:right"><?php echo "$copyright" ?></span></div>
</body>