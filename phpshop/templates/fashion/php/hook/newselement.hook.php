<?php


function index_newselement_hook($obj, $dataArray, $rout) {

    if ($rout == 'START') {
        $obj->limit = 4;
        $obj->disp_only_index=false;
    }
}

/**
 * ���������� � ������ ��������� ��������������� ������� � 3 ������, ����� 3
 */
$addHandler = array
    (
    'index' => 'index_newselement_hook'
);
?>