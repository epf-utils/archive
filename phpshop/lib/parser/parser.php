<? function ParseT($string){ global $SysValue,$_SESSION; $string=eregi_replace("images/",$SysValue['dir']['dir'].$SysValue['dir']['templates'].chr(47).$_SESSION['skin']."/images/",$string); $string=eregi_replace("java/","/java/",$string); $string=eregi_replace("css/","/css/",$string);$string=eregi_replace("css/","/css/",$string); $string=eregi_replace("phpshop/","/phpshop/",$string); return $string; } function ParseTemplateReturn($TemplateName) { global $SysValue,$LoadItems,$_SESSION; $SysValue=$GLOBALS['SysValue']; $TemplateFile=phpshop_read_file($SysValue['dir']['parser'].chr(47).$_SESSION['skin'].chr(47).$TemplateName); while(list($line,$string)=@each($TemplateFile)) { $string=ConstantS($string); @$dis.= $string; } return @$dis; } function ConstantS($string) { return preg_replace_callback("/@([[:alnum:]]+)@/","ConstantR",$string); } function ConstantR($array) { global $SysValue; if(!empty($SysValue['other'][$array[1]])) $string=$SysValue['other'][$array[1]]; else $string=null; return $string; } function phpshop_stripslashes($string) { if(empty($string)) return false; else { $result=ereg_replace(" +"," ",trim(stripslashes(stripslashes(addslashes($string))))); if(!$result) return false; elseif($result!=" ") return $result; } } function phpshop_read_file($path) { if(!is_file($path)) return false; elseif(!filesize($path)) return array(); elseif($array=file($path)) return $array; else while(!$array=file($path)) sleep(1); return $array; } ?>