<?
/**
 * ������ ��� ������� ����� ����� PHPShop.Cron
 * ��� ��������� ��������� �������� enabled �� true
 */

// ���������
$enabled=false;

// �����������
if(empty($enabled)) exit("������ �����������!");

$_classPath="../../../";
$SysValue=parse_ini_file($_classPath."inc/config.ini",1);


// MySQL hostname
$host = $SysValue['connect']['host'];
//MySQL basename
$dbname = $SysValue['connect']['dbase'];
// MySQL user
$uname = $SysValue['connect']['user_db'];
// MySQL password
$upass = $SysValue['connect']['pass_db'];
// set FALSE to get table content
$structure_only=false;
//set TRUE to to get file with dump
$output = false;


//////////////////////////////////////////////////
//
//  phpMyDump v 1.0
//
//  check for new version
//  http://szewo.com/php/mydump/eng
//
// some functions are adapted from the phpMyAdmin 
//
//  do not change anything below this line
//////////////////////////////////////////////////
function mysqlbackup($host,$dbname, $uid, $pwd, $structure_only, $crlf) {

    $con=@mysql_connect("localhost",$uid, $pwd) or die("Could not connect");
    $db=@mysql_select_db($dbname,$con) or die("Could not select db");

    // here we check MySQL Version
    $result=@mysql_query("SELECT VERSION() AS version");
    if ($result != FALSE && @mysql_num_rows($result) > 0) {
        $row   = @mysql_fetch_array($result);
        $match = explode('.', $row['version']);
    } else {
        $result=@mysql_query("SHOW VARIABLES LIKE \'version\'");
        if ($result != FALSE && @mysql_num_rows($result) > 0) {
            $row   = @mysql_fetch_row($result);
            $match = explode('.', $row[1]);
        }
    }

    if (!isset($match) || !isset($match[0])) {
        $match[0] = 3;
    }
    if (!isset($match[1])) {
        $match[1] = 21;
    }
    if (!isset($match[2])) {
        $match[2] = 0;
    }
    if(!isset($row)) {
        $row = '3.21.0';
    }

    define('MYSQL_INT_VERSION', (int)sprintf('%d%02d%02d', $match[0], $match[1], intval($match[2])));
    define('MYSQL_STR_VERSION', $row['version']);
    unset($match);

    $sql = "# MySQL dump by phpMyDump".$crlf;
    $sql.= "# Host: $host Database: $dbname".$crlf;
    $sql.= "----------------------------".$crlf;
    $sql.= "# Server version: ".MYSQL_STR_VERSION.$crlf;

    $sql.= $crlf.$crlf.$crlf;
    out(1,$sql);
    $res=@mysql_list_tables($dbname);
    $nt=@mysql_num_rows($res);

    for ($a=0;$a<$nt;$a++) {
        $row=mysql_fetch_row($res);
        $tablename=$row[0];

        $sql=$crlf."# ----------------------------------------".$crlf."# table structure for table '$tablename' ".$crlf;
        // For MySQL < 3.23.20
        if (MYSQL_INT_VERSION >= 32321) {
            $result=mysql_query("SHOW CREATE TABLE $tablename");
            if ($result != FALSE && mysql_num_rows($result) > 0) {
                $tmpres = mysql_fetch_array($result);
                $pos           = strpos($tmpres[1], ' (');
                $tmpres[1]     = substr($tmpres[1], 0, 13)
                        . $tmpres[0]
                        . substr($tmpres[1], $pos);

                $sql .= $tmpres[1].";".$crlf.$crlf;
            }
            mysql_free_result($result);
        } else {
            $sql.="CREATE TABLE $tablename(".$crlf;
            $result=mysql_query("show fields  from $tablename",$con);

            while ($row = mysql_fetch_array($result)) {
                $sql .= "  ".$row['Field'];
                $sql .= ' ' . $row['Type'];
                if (isset($row['Default']) && $row['Default'] != '') {
                    $sql .= ' DEFAULT \'' . $row['Default'] . '\'';
                }
                if ($row['Null'] != 'YES') {
                    $sql .= ' NOT NULL';
                }
                if ($row['Extra'] != '') {
                    $sql .= ' ' . $row['Extra'];
                }
                $sql .= ",".$crlf;
            }

            mysql_free_result($result);
            $sql = ereg_replace(',' . $crlf . '$', '', $sql);

            $result = mysql_query("SHOW KEYS FROM $tablename");
            while ($row = mysql_fetch_array($result)) {
                $ISkeyname    = $row['Key_name'];
                $IScomment  = (isset($row['Comment'])) ? $row['Comment'] : '';
                $ISsub_part = (isset($row['Sub_part'])) ? $row['Sub_part'] : '';
                if ($ISkeyname != 'PRIMARY' && $row['Non_unique'] == 0) {
                    $ISkeyname = "UNIQUE|$kname";
                }
                if ($IScomment == 'FULLTEXT') {
                    $ISkeyname = 'FULLTEXT|$kname';
                }
                if (!isset($index[$ISkeyname])) {
                    $index[$ISkeyname] = array();
                }
                if ($ISsub_part > 1) {
                    $index[$ISkeyname][] = $row['Column_name'] . '(' . $ISsub_part . ')';
                } else {
                    $index[$ISkeyname][] = $row['Column_name'];
                }
            }
            mysql_free_result($result);

            while (list($x, $columns) = @each($index)) {
                $sql     .= ",".$crlf;
                if ($x == 'PRIMARY') {
                    $sql .= '  PRIMARY KEY (';
                } else if (substr($x, 0, 6) == 'UNIQUE') {
                    $sql .= '  UNIQUE ' . substr($x, 7) . ' (';
                } else if (substr($x, 0, 8) == 'FULLTEXT') {
                    $sql .= '  FULLTEXT ' . substr($x, 9) . ' (';
                } else {
                    $sql .= '  KEY ' . $x . ' (';
                }
                $sql     .= implode($columns, ', ') . ')';
            }
            $sql .=  $crlf.");".$crlf.$crlf;

        }
        out(1,$sql);
        if ($structure_only == FALSE) {
            // here we get table content
            $result = mysql_query("SELECT * FROM  $tablename");
            $fields_cnt   = mysql_num_fields($result);
            while ($row = mysql_fetch_row($result)) {
                $table_list     = '(';
                for ($j = 0; $j < $fields_cnt; $j++) {
                    $table_list .= mysql_field_name($result, $j) . ', ';
                }
                $table_list = substr($table_list, 0, -2);
                $table_list     .= ')';

                $sql = 'INSERT INTO ' . $tablename
                        . ' VALUES (';
                for ($j = 0; $j < $fields_cnt; $j++) {
                    if (!isset($row[$j])) {
                        $sql .= ' NULL, ';
                    } else if ($row[$j] == '0' || $row[$j] != '') {
                        $type          = mysql_field_type($result, $j);
                        // a number
                        if ($type == 'tinyint' || $type == 'smallint' || $type == 'mediumint' || $type == 'int' ||
                                $type == 'bigint'  ||$type == 'timestamp') {
                            $sql .= $row[$j] . ', ';
                        }
                        // a string
                        else {
                            $dummy  = '';
                            $srcstr = $row[$j];
                            for ($xx = 0; $xx < strlen($srcstr); $xx++) {
                                $yy = strlen($dummy);
                                if ($srcstr[$xx] == '\\')   $dummy .= '\\\\';
                                if ($srcstr[$xx] == '\'')   $dummy .= '\\\'';
                                if ($srcstr[$xx] == "\x00") $dummy .= '\0';
                                if ($srcstr[$xx] == "\x0a") $dummy .= '\n';
                                if ($srcstr[$xx] == "\x0d") $dummy .= '\r';
                                if ($srcstr[$xx] == "\x1a") $dummy .= '\Z';
                                if (strlen($dummy) == $yy)  $dummy .= $srcstr[$xx];
                            }
                            $sql .= "'" . $dummy . "', ";
                        }
                    } else {
                        $sql .= "'', ";
                    } // end if
                } // end for
                $sql = ereg_replace(', $', '', $sql);
                $sql .= ");".$crlf;
                out(1,$sql);

            }
            mysql_free_result($result);
        }
    }
    return;
}  

function define_crlf() {
    global $HTTP_USER_AGENT;
    $ucrlf = "\n";
    if (strstr($HTTP_USER_AGENT, 'Win')) {
        $ucrlf = "\r\n";
    }
    else if (strstr($HTTP_USER_AGENT, 'Mac')) {
        $ucrlf = "\r";
    }
    else {
        $ucrlf = "\n";
    }
    return $ucrlf;
} 

// ����� GZIP �����
function gzcompressfile($source,$level=false) {
    $dest=$source.'.gz';
    $mode='wb'.$level;
    $error=false;
    if($fp_out=gzopen($dest,$mode)) {
        if($fp_in=fopen($source,'rb')) {
            while(!feof($fp_in))
                gzwrite($fp_out,fread($fp_in,1024*512));
            fclose($fp_in);
        }
        else $error=true;
        gzclose($fp_out);
        unlink($source);
        rename($dest, $source.'.gz');
    }
    else $error=true;
    if($error) return false;
    else return $dest;
}


ob_start();
mysqlbackup($host,$dbname,$uname,$upass,$structure_only,$crlf);
$content=ob_get_clean();


$file="base_".date("d_m_y_His").".sql";
@$fp = fopen($_classPath."admpanel/dumper/backup/".$file, "w+");
if ($fp) {
    fputs($fp, $content);
    fclose($fp);
    $sorce=$_classPath."admpanel/dumper/backup/".$file;
}

gzcompressfile($sorce);
echo "�������� ����� �� �������.";

//print the result
function out($fptr,$s) {
    echo $s;
} 


?>