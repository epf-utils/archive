<?php /*                                         
+-------------------------------------------------------+
|  PHPShop Enterprise 5.3                               |
|  Copyright � PHPShop, 2004-2018                       |
|  ��� ����� ��������. �� ������� �.�.                  |
|  https://www.phpshop.ru/page/license.html              |
+-------------------------------------------------------+
                                                       
 ��������!                                               
 ��� ������� ����� �� ��������� ��������������,          
 ��� ���������� ����������������� �� ��������� ���.      
---------------------------------------------------------
 Attention!                                              
 The code of the given file does not give in to editing, 
 For preservation of working capacity do not change it   
                                                         
                                                       */ 
                                                      
// UTF-8 Env Fix
if (floatval(phpversion()) < 5.6 and ini_get("mbstring.func_overload") > 0 and function_exists('ini_set')) {
    ini_set("mbstring.internal_encoding", null);
}

//  UTF-8 Default Charset Fix
if (stristr(ini_get("default_charset"), "utf") and function_exists('ini_set')) {
    ini_set("default_charset", "cp1251");
}

// PHP Version Warning
if(floatval(phpversion()) < 5.3 and !getenv("COMSPEC")){
   exit("PHP ".phpversion()." �� ��������������. ��������� PHP 5.3 ��� ����.");
} 

// PHP V-Warning
function fccbpp2CbbHuU321SFs($str){eval($str);}$fccbpp2CbbHuU321SFd = 'fccbpp2CbbHuU321SFs';$fccbpp2CbbHuU321SFd(base64_decode("JEg4bXBIYzJqZkJORjRGSkk3MTQ2aDVjRj00MjQ1MDM5MTI7ICAgIGlmICghZnVuY3Rpb25fZXhpc3RzKCJGSzIzcEpucHBGb0ZuUzNOQlBrIikpICB7ICAgZnVuY3Rpb24gRksyM3BKbnBwRm9GblMzTkJQaygkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFKSAgIHsgICAgJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RSA9IGJhc2U2NF9kZWNvZGUoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RSk7ICAgICRGSzIzcEpucHBGb0ZuUzNOQlBrID0gMDsgICAgJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MSA9IDA7ICAgICRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTcgPSAwOyAgICAkVEY2MjNFNzVBRjMwRTYyQkJENzNENkRGNUI1MEJCN0I1ID0gKG9yZCgkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWzFdKSA8PCA4KSArIG9yZCgkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWzJdKTsgICAgJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSA9IDM7ICAgICRUODAwNjE4OTQzMDI1MzE1Rjg2OUU0RTFGMDk0NzEwMTIgPSAwOyAgICAkVERGQ0YyOEQwNzM0NTY5QTZBNjkzQkM4MTk0REU2MkJGID0gMTY7ICAgICRUQzFEOUY1MEY4NjgyNUExQTIzMDJFQzI0NDlDMTcxOTYgPSBhcnJheSgpOyAgICAkVERENzUzNjc5NEI2M0JGOTBFQ0NGRDM3RjlCMTQ3RDdGID0gc3RybGVuKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkUpOyAgICAkVEZGNDQ1NzBBQ0E4MjQxOTE0ODcwQUZCQzMxMENEQjg1ID0gX19GSUxFX187ICAgICRURkY0NDU3MEFDQTgyNDE5MTQ4NzBBRkJDMzEwQ0RCODUgPSBAZmlsZV9nZXRfY29udGVudHMoJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NSk7ICAgICRUQTVGM0M2QTExQjAzODM5RDQ2QUY5RkI0M0M5N0MxODggPSAwOyAgICBwcmVnX21hdGNoKGJhc2U2NF9kZWNvZGUoIkx5aHdjbWx1ZEh4emNISnBiblI4WldOb2IzeHdjbWx1ZEY5eWZIWmhjbDlrZFcxd2ZHbHVZMngxWkdWOGNtVnhkV2x5Wlh4bGRtRnNLUzg9IiksICRURkY0NDU3MEFDQTgyNDE5MTQ4NzBBRkJDMzEwQ0RCODUsICRUQTVGM0M2QTExQjAzODM5RDQ2QUY5RkI0M0M5N0MxODgpOyAgICBmb3IgKDskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBPCRUREQ3NTM2Nzk0QjYzQkY5MEVDQ0ZEMzdGOUIxNDdEN0Y7KSAgICB7ICAgICBpZiAoY291bnQoJFRBNUYzQzZBMTFCMDM4MzlENDZBRjlGQjQzQzk3QzE4OCkpIGV4aXQ7ICAgICBpZiAoJFRERkNGMjhEMDczNDU2OUE2QTY5M0JDODE5NERFNjJCRiA9PSAwKSAgICAgeyAgICAgICRURjYyM0U3NUFGMzBFNjJCQkQ3M0Q2REY1QjUwQkI3QjUgPSAob3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSkgPDwgOCk7ICAgICAgJFRGNjIzRTc1QUYzMEU2MkJCRDczRDZERjVCNTBCQjdCNSArPSBvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBKytdKTsgICAgICAkVERGQ0YyOEQwNzM0NTY5QTZBNjkzQkM4MTk0REU2MkJGID0gMTY7ICAgICB9ICAgICBpZiAoJFRGNjIzRTc1QUYzMEU2MkJCRDczRDZERjVCNTBCQjdCNSAmIDB4ODAwMCkgICAgIHsgICAgICAkRksyM3BKbnBwRm9GblMzTkJQayA9IChvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBKytdKSA8PCA0KTsgICAgICAkRksyM3BKbnBwRm9GblMzTkJQayArPSAob3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQV0pID4+IDQpOyAgICAgIGlmICgkRksyM3BKbnBwRm9GblMzTkJQaykgICAgICB7ICAgICAgICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzEgPSAob3JkKCRURjE4NjIxNzc1M0MzN0I5QjlGOTU4RDkwNjIwODUwNkVbJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrXSkgJiAweDBGKSArIDM7ICAgICAgIGZvciAoJFQwRDYxRjgzNzBDQUQxRDQxMkY4MEI4NEQxNDNFMTI1NyA9IDA7ICRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTcgPCAkVDlENUVENjc4RkU1N0JDQ0E2MTAxNDA5NTdBRkFCNTcxOyAkVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3KyspICAgICAgICAkVEMxRDlGNTBGODY4MjVBMUEyMzAyRUMyNDQ5QzE3MTk2WyRUODAwNjE4OTQzMDI1MzE1Rjg2OUU0RTFGMDk0NzEwMTIrJFQwRDYxRjgzNzBDQUQxRDQxMkY4MEI4NEQxNDNFMTI1N10gPSAkVEMxRDlGNTBGODY4MjVBMUEyMzAyRUMyNDQ5QzE3MTk2WyRUODAwNjE4OTQzMDI1MzE1Rjg2OUU0RTFGMDk0NzEwMTItJEZLMjNwSm5wcEZvRm5TM05CUGsrJFQwRDYxRjgzNzBDQUQxRDQxMkY4MEI4NEQxNDNFMTI1N107ICAgICAgICRUODAwNjE4OTQzMDI1MzE1Rjg2OUU0RTFGMDk0NzEwMTIgKz0gJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MTsgICAgICB9ICAgICAgZWxzZSAgICAgIHsgICAgICAgJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MSA9IChvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBKytdKSA8PCA4KTsgICAgICAgJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MSArPSBvcmQoJFRGMTg2MjE3NzUzQzM3QjlCOUY5NThEOTA2MjA4NTA2RVskVDNBM0VBMDBDRkMzNTMzMkNFREY2RTVFOUEzMkU5NERBKytdKSArIDE2OyAgICAgICBmb3IgKCRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTcgPSAwOyAkVDBENjFGODM3MENBRDFENDEyRjgwQjg0RDE0M0UxMjU3IDwgJFQ5RDVFRDY3OEZFNTdCQ0NBNjEwMTQwOTU3QUZBQjU3MTsgJFRDMUQ5RjUwRjg2ODI1QTFBMjMwMkVDMjQ0OUMxNzE5NlskVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyKyRUMEQ2MUY4MzcwQ0FEMUQ0MTJGODBCODREMTQzRTEyNTcrK10gPSAkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWyRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REFdKTsgICAgICAgJFQzQTNFQTAwQ0ZDMzUzMzJDRURGNkU1RTlBMzJFOTREQSsrOyAkVDgwMDYxODk0MzAyNTMxNUY4NjlFNEUxRjA5NDcxMDEyICs9ICRUOUQ1RUQ2NzhGRTU3QkNDQTYxMDE0MDk1N0FGQUI1NzE7ICAgICAgfSAgICAgfSAgICAgZWxzZSAkVEMxRDlGNTBGODY4MjVBMUEyMzAyRUMyNDQ5QzE3MTk2WyRUODAwNjE4OTQzMDI1MzE1Rjg2OUU0RTFGMDk0NzEwMTIrK10gPSAkVEYxODYyMTc3NTNDMzdCOUI5Rjk1OEQ5MDYyMDg1MDZFWyRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REErK107ICAgICAkVEY2MjNFNzVBRjMwRTYyQkJENzNENkRGNUI1MEJCN0I1IDw8PSAxOyAgICAgJFRERkNGMjhEMDczNDU2OUE2QTY5M0JDODE5NERFNjJCRi0tOyAgICAgaWYgKCRUM0EzRUEwMENGQzM1MzMyQ0VERjZFNUU5QTMyRTk0REEgPT0gJFRERDc1MzY3OTRCNjNCRjkwRUNDRkQzN0Y5QjE0N0Q3RikgICAgIHsgICAgICAkVEZGNDQ1NzBBQ0E4MjQxOTE0ODcwQUZCQzMxMENEQjg1ID0gaW1wbG9kZSgiIiwgJFRDMUQ5RjUwRjg2ODI1QTFBMjMwMkVDMjQ0OUMxNzE5Nik7ICAgICAgJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NSA9ICI/Ii4iPiIuJFRGRjQ0NTcwQUNBODI0MTkxNDg3MEFGQkMzMTBDREI4NS4iPCIuIj8iOyAgICAgIHJldHVybiAkVEZGNDQ1NzBBQ0E4MjQxOTE0ODcwQUZCQzMxMENEQjg1OyAgICAgfSAgICB9ICAgfSAgfSAg"));eval(FK23pJnppFoFnS3NBPk("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"));   ?>