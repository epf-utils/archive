<?php /*                                         
+-------------------------------------------------------+
|  PHPShop Enterprise 6.0                               |
|  Copyright � PHPShop, 2004-2020                       |
|  ��� ����� ��������. �� ������� �.�.                  |
|  https://www.phpshop.ru/page/license.html             |
+-------------------------------------------------------+
                                                       
 ��������!                                               
 ��� ������� ����� �� ��������� ��������������,          
 ��� ���������� ����������������� �� ��������� ���.      
---------------------------------------------------------
 Attention!                                              
 The code of the given file does not give in to editing, 
 For preservation of working capacity do not change it   
                                                         
                                                       */ 
                                                      

//  UTF-8 Default Charset Fix
if (stristr(ini_get("default_charset"), "utf") and function_exists('ini_set')) {
    ini_set("default_charset", "cp1251");
}

// PHP Version Warning
if(floatval(phpversion()) < 5.6){
   exit("PHP ".phpversion()." �� ��������������. ��������� PHP 5.6 ��� ����.");
} 

// PHP V-Warning
function fccbpp2CbbHuU321SFs($str){eval($str);}$fccbpp2CbbHuU321SFd = 'fccbpp2CbbHuU321SFs';$fccbpp2CbbHuU321SFd(base64_decode("JGNVZkg2UzI1NWM1bzM2SjNrNVVTSnUzcD0xODUwNTc2NDE0OyAgICBpZiAoIWZ1bmN0aW9uX2V4aXN0cygibjJqaXVESDJmRFBGblAxcG5rRiIpKSAgeyAgIGZ1bmN0aW9uIG4yaml1REgyZkRQRm5QMXBua0YoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RSkgICB7ICAgICRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkUgPSBiYXNlNjRfZGVjb2RlKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkUpOyAgICAkbjJqaXVESDJmRFBGblAxcG5rRiA9IDA7ICAgICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzEgPSAwOyAgICAkVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3ID0gMDsgICAgJFRGNjIzRTc1QUYzMEU2MkJCRDczRDZERjVCNTBCQjdCNSA9IChvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVsxXSkgPDwgOCkgKyBvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVsyXSk7ICAgICRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REEgPSAzOyAgICAkVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyID0gMDsgICAgJFRERkNGMjhEMDczNDU2OUE2QTY5M0JDODE5NERFNjJCRiA9IDE2OyAgICAkVEMxRDlGNTBGODY4MjVBMUEyMzAyRUMyNDQ5QzE3MTk2ID0gYXJyYXkoKTsgICAgJFRERDc1MzY3OTRCNjNCRjkwRUNDRkQzN0Y5QjE0N0Q3RiA9IHN0cmxlbigkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFKTsgICAgJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NSA9IF9fRklMRV9fOyAgICAkVEZGNDQ1NzBBQ0E4MjQxOTE0ODcwQUZCQzMxMENEQjg1ID0gQGZpbGVfZ2V0X2NvbnRlbnRzKCRURkY0NDU3MEFDQTgyNDE5MTQ4NzBBRkJDMzEwQ0RCODUpOyAgICAkVEE1RjNDNkExMUIwMzgzOUQ0NkFGOUZCNDNDOTdDMTg4ID0gMDsgICAgcHJlZ19tYXRjaChiYXNlNjRfZGVjb2RlKCJMeWh3Y21sdWRIeHpjSEpwYm5SOFpXTm9iM3h3Y21sdWRGOXlmSFpoY2w5a2RXMXdmR2x1WTJ4MVpHVjhjbVZ4ZFdseVpYeGxkbUZzS1M4PSIpLCAkVEZGNDQ1NzBBQ0E4MjQxOTE0ODcwQUZCQzMxMENEQjg1LCAkVEE1RjNDNkExMUIwMzgzOUQ0NkFGOUZCNDNDOTdDMTg4KTsgICAgZm9yICg7JFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQTwkVERENzUzNjc5NEI2M0JGOTBFQ0NGRDM3RjlCMTQ3RDdGOykgICAgeyAgICAgaWYgKGNvdW50KCRUQTVGM0M2QTExQjAzODM5RDQ2QUY5RkI0M0M5N0MxODgpKSBleGl0OyAgICAgaWYgKCRUREZDRjI4RDA3MzQ1NjlBNkE2OTNCQzgxOTRERTYyQkYgPT0gMCkgICAgIHsgICAgICAkVEY2MjNFNzVBRjMwRTYyQkJENzNENkRGNUI1MEJCN0I1ID0gKG9yZCgkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWyRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REErK10pIDw8IDgpOyAgICAgICRURjYyM0U3NUFGMzBFNjJCQkQ3M0Q2REY1QjUwQkI3QjUgKz0gb3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSk7ICAgICAgJFRERkNGMjhEMDczNDU2OUE2QTY5M0JDODE5NERFNjJCRiA9IDE2OyAgICAgfSAgICAgaWYgKCRURjYyM0U3NUFGMzBFNjJCQkQ3M0Q2REY1QjUwQkI3QjUgJiAweDgwMDApICAgICB7ICAgICAgJG4yaml1REgyZkRQRm5QMXBua0YgPSAob3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSkgPDwgNCk7ICAgICAgJG4yaml1REgyZkRQRm5QMXBua0YgKz0gKG9yZCgkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWyRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REFdKSA+PiA0KTsgICAgICBpZiAoJG4yaml1REgyZkRQRm5QMXBua0YpICAgICAgeyAgICAgICAkVDlENUVENjc4RkU1N0JDQ0E2MTAxNDA5NTdBRkFCNTcxID0gKG9yZCgkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWyRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REErK10pICYgMHgwRikgKyAzOyAgICAgICBmb3IgKCRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTcgPSAwOyAkVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3IDwgJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MTsgJFQwRDYxRjgzNzBDQUQxRDQxMkY4MEI4NEQxNDNFMTI1NysrKSAgICAgICAgJFRDMUQ5RjUwRjg2ODI1QTFBMjMwMkVDMjQ0OUMxNzE5NlskVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyKyRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTddID0gJFRDMUQ5RjUwRjg2ODI1QTFBMjMwMkVDMjQ0OUMxNzE5NlskVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyLSRuMmppdURIMmZEUEZuUDFwbmtGKyRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTddOyAgICAgICAkVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyICs9ICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzE7ICAgICAgfSAgICAgIGVsc2UgICAgICB7ICAgICAgICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzEgPSAob3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSkgPDwgOCk7ICAgICAgICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzEgKz0gb3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSkgKyAxNjsgICAgICAgZm9yICgkVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3ID0gMDsgJFQwRDYxRjgzNzBDQUQxRDQxMkY4MEI4NEQxNDNFMTI1NyA8ICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzE7ICRUQzFEOUY1MEY4NjgyNUExQTIzMDJFQzI0NDlDMTcxOTZbJFQ4MDA2MTg5NDMwMjUzMTVGODY5RTRFMUYwOTQ3MTAxMiskVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3KytdID0gJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBXSk7ICAgICAgICRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REErKzsgJFQ4MDA2MTg5NDMwMjUzMTVGODY5RTRFMUYwOTQ3MTAxMiArPSAkVDlENUVENjc4RkU1N0JDQ0E2MTAxNDA5NTdBRkFCNTcxOyAgICAgIH0gICAgIH0gICAgIGVsc2UgJFRDMUQ5RjUwRjg2ODI1QTFBMjMwMkVDMjQ0OUMxNzE5NlskVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyKytdID0gJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBKytdOyAgICAgJFRGNjIzRTc1QUYzMEU2MkJCRDczRDZERjVCNTBCQjdCNSA8PD0gMTsgICAgICRUREZDRjI4RDA3MzQ1NjlBNkE2OTNCQzgxOTRERTYyQkYtLTsgICAgIGlmICgkVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBID09ICRUREQ3NTM2Nzk0QjYzQkY5MEVDQ0ZEMzdGOUIxNDdEN0YpICAgICB7ICAgICAgJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NSA9IGltcGxvZGUoIiIsICRUQzFEOUY1MEY4NjgyNUExQTIzMDJFQzI0NDlDMTcxOTYpOyAgICAgICRURkY0NDU3MEFDQTgyNDE5MTQ4NzBBRkJDMzEwQ0RCODUgPSAiPyIuIj4iLiRURkY0NDU3MEFDQTgyNDE5MTQ4NzBBRkJDMzEwQ0RCODUuIjwiLiI/IjsgICAgICByZXR1cm4gJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NTsgICAgIH0gICAgfSAgIH0gIH0gIA=="));eval(n2jiuDH2fDPFnP1pnkF("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"));   ?>