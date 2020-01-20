<!DOCTYPE HTML>
<head>
<?php
include 'config.php';
?>
<title><?php echo "".$websitename.""?></title>
<meta name="keywords" content="Hipoject,hehaoyuan1997">
<meta name="descrption" content="HipojectÊÇÒ»¸öÍ¼´²£¬ÓÉhehaoyuan1997±àÐ´">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="author"
content="hehaoyuan1997">
<!---copyright (c) 2013-2013 hehaoyuan1997 All Rights Reserved--->
<!---Powered By hehaoyuan1997--->
<!---author website:http://www.ddpool.com/--->
<!---hehaoyuan1997¿ªÊ¼ÓÚ2013Äê8ÔÂ18ÈÕ23:19:57±àÐ´--->
<style type="text/css">  
.align-center{  
    margin:0 auto;      /* ¾ÓÖÐ Õâ¸öÊÇ±ØÐëµÄ£¬£¬ÆäËüµÄÊôÐÔ·Ç±ØÐë */  
    width:1024;        /* ¸ø¸ö¿í¶È ¶¥µ½ä¯ÀÀÆ÷µÄÁ½±ß¾Í¿´²»³ö¾ÓÖÐÐ§¹ûÁË */  
    text-align:left;  /* ÎÄ×ÖµÈÄÚÈÝ¾ÓÖÐ */  
}  
body {
text-align: center;  /* Ò³ÃæÔªËØ¾ÓÖÐ */
} 
.txtcss1 {
text-align: center;  /* ÓÃÓÚÎÄ×ÖÓÒ¶ÔÆë */
}  
.txtcss2 {
text-align:right;  /* ÓÃÓÚÎÄ×ÖÓÒ¶ÔÆë */
}  
.txtcss3 {
text-align:left;  /* ÓÃÓÚÎÄ×ÖÓÒ¶ÔÆë */
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

<?php   
 /*****************************************   
   Title :ÎÄ¼þÉÏ´«Ïê½â   
   Author:leehui1983(»ÔÀÏ´ó)   
   Finish Date  :2006-12-28   
   Edit Date  :2014-06-24
   Edit By  :hehaoyuan1997
  *****************************************/   
   $uploaddir = "./".$imagefile."";//ÉèÖÃÎÄ¼þ±£´æÄ¿Â¼ ×¢Òâ°üº¬/       
   $type=array("jpg","gif","bmp","jpeg","png");//ÉèÖÃÔÊÐíÉÏ´«ÎÄ¼þµÄÀàÐÍ    
   $patch="".$websiteurl."";//³ÌÐòËùÔÚÂ·¾¶   

   //»ñÈ¡ÎÄ¼þºó×ºÃûº¯Êý   
      function fileext($filename)   
    {   
        return substr(strrchr($filename, '.'), 1);   
    }   
   //Éú³ÉËæ»úÎÄ¼þÃûº¯Êý       
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
   //¶àÎ¬Êý×éÉÏ´«Í¼Æ¬Ñ­»·²¿·Ö¿ªÊ¼
    $counts=count(@$_FILES['file']['name']);        //Í³¼ÆÉÏ´«ÎÄ¼þ¸öÊý
	$num=0;                                        //¼ÆÊý¹éÁã
    while ($num < $counts) {
	  

   
     $a=strtolower(fileext($_FILES['file']['name'][$num]));   
     //ÅÐ¶ÏÎÄ¼þÀàÐÍ   
     if(!in_array(strtolower(fileext($_FILES['file']['name'][$num])),$type))   
       {   
          $text=implode(",",$type);   
          echo "ÄúÖ»ÄÜÉÏ´«ÒÔÏÂÀàÐÍÎÄ¼þ: ",$text,"<br>";   
       }   
     //Éú³ÉÄ¿±êÎÄ¼þµÄÎÄ¼þÃû       
     else{   
      $filename=explode(".",$_FILES['file']['name'][$num]);   
          do   
          {   
              $filename[0]=random(10); //ÉèÖÃËæ»úÊý³¤¶È   
              $name=implode(".",$filename);   
              //$name1=$name.".Mcncc";   
              $uploadfile=$uploaddir.$name;   
          }   
     while(file_exists($uploadfile));   
          if (move_uploaded_file($_FILES['file']['tmp_name'][$num],$uploadfile)){   

              if(is_uploaded_file($_FILES['file']['tmp_name'][$num])){   
                  //Êä³öÍ¼Æ¬Ô¤ÀÀ   
                  echo "<center>ÄúµÄÎÄ¼þÒÑ¾­ÉÏ´«Íê±Ï ÉÏ´«Í¼Æ¬Ô¤ÀÀ: </center><br><center><img src='$uploadfile'></center>";   
                  echo"<br><center><a href='javascript:history.go(-1)'>¼ÌÐøÉÏ´«</a></center>";   
				  echo "       <table border=\"0\" align=\"center\">";
				  echo "        <form name=\"form1\" action=\"".$websiteurl."login.php\" method=\"post\">";
				  echo "           <caption>Í¼Æ¬Á´½Ó</caption>";
				  echo "           <tr><th>BBCode</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>HTML</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;´ËÍ¼Æ¬Ê¹ÓÃµÄÍ¼´²Îª".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>Direct</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"".$websiteurl."".$imagefile."".$name."\"></br></td>";
				  echo "           </tr>";
				  echo "        </table>";
                }   
                else{   
                  //Êä³öÍ¼Æ¬Ô¤ÀÀ   
                  echo "<br><center><img src='$uploadfile'></center>";   
                  echo"<br><center></center>";   
				  echo "       <table border=\"0\" align=\"center\">";
				  echo "        <form name=\"form1\" action=\"".$websiteurl."login.php\" method=\"post\">";
				 
				  echo "           <tr><th>BBCode</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>HTML</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;\"></br></td>";
				  echo "           </tr>";
				  echo "           <tr><th>Direct</th>";
				  echo "           <td><input type=\"text\" name=\"username\" readonly size=\"100\"value=\"".$websiteurl."".$imagefile."".$name."\"></br></td>";
				  echo "           </tr>";
				  echo "        </table>";
                }   
          }   
     }    
	$num++;
	}
?> 



<!---´úÂëÉú³É²¿·Ö--->
<!---old version 0.5
       <table border="0" align="center">
        <form name="form1" action="<?php //echo "".$websiteurl."login.php" ?>" method="post">
           <caption>Í¼Æ¬Á´½Ó</caption>
           <tr><th>ÂÛÌ³´úÂë(BBCode)£º</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "[IMG]".$websiteurl."".$imagefile."".$name."[/IMG]" ?>"></br></td>
           </tr>
           <tr><th>HTML´úÂë£º</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "&lt;a href=&quot;".$websiteurl."&quot;&gt;&lt;img src=&quot;".$websiteurl."".$imagefile."".$name."&quot;&nbsp;title=&quot;´ËÍ¼Æ¬Ê¹ÓÃµÄÍ¼´²Îª".$websitename."&quot;&nbsp;/&gt;&lt;/a&gt;" ?>"></br></td>
           </tr>
           <tr><th>Ô­Í¼Á´½Ó£º</th>
           <td><input type="text" name="username" readonly size="100"value="<?php //echo "".$websiteurl."".$imagefile."".$name."" ?>"></br></td>
           </tr>
        </table>
--->







  <!---Ê±¼äÏÔÊ¾²¿·Ö--->
  </br></br></br></br>

  
  </div>
</body>
