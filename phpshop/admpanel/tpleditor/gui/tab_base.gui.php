<?php

/**
 * ������ �������������� ��������
 * @param array $row ������ ������
 * @return string 
 */
function tab_base($data) {
    global $PHPShopGUI,$skin_base_path;


    // ������������� �������
    if (is_array($data))
        foreach ($data as $val) {
            $path_parts = pathinfo($val);
            $ready_theme[] = $path_parts['basename'];
        }


    $i = 1;
    $count = 0;
    $data_pic = xml2array($skin_base_path . '/template5.php', "template", true);
    $title='<p class="text-muted hidden-xs data-row">���� ������������ ������������ ������� ��������� HTML4 �� ���������� ������ PHPShop. ���������������� ������������ �������� ����� ���������� �� ����������� ��������. ��� 100% ���������������� �������� ������������� ������������ ����������� ������� ��������� HTML5.</p>';
    $img_list = null;
    if (is_array($data_pic))
        foreach ($data_pic as $row) {

            if ($i == 1)
                $img_list.='<div class="row">';

            if (in_array($row['name'],$ready_theme)){
                $main = "hide";
                $panel = 'panel-success';
                $mes = ' - ����������';
            }
            else{
                $main = "btn-default";
                $panel = 'panel-default';
                $mes = null;
            }

            $img_list.='<div class="col-md-4"><div class="panel '.$panel.'"><div class="panel-heading">' . $row['name'] .$mes. '<span class="glyphicon glyphicon-plus pull-right btn ' . $main . ' btn-xs skin-load" data-path="' . $row['name'] . '" data-toggle="tooltip" data-placement="top" title="' . __('���������') . '"></span></div><div class="panel-body text-center"><img class="image-shadow" src="' . $skin_base_path . $row['icon'] . '"></div></div></div>';

            if ($i == 3) {
                $img_list.='</div>';
                $i = 1;
            }
            else
                $i++;

            $count++;
        }


    if (count($data_pic) % 4 != 0)
        $img_list.='</div>';


    if (!empty($img_list))
        $disp= $PHPShopGUI->setCollapse(__('�������������� �������'), $title.$img_list);
    else $disp=$PHPShopGUI->setAlert('������ ����� � �������� '.$skin_base_path, $type = 'warning'); 

    $promo='������-���� <a href="http://www.phpshop.ru/news/ID_shop_design_2016.html" target="_blank">PHPShop.Design</a> ������ ������� ������ ���  PHPShop, � ������, �������������� ��� �������� ������� �� ����������, �  �� �������� ���������� ���������������� ������ � ����, ���������� ����  ����������� ������������ ���. <ol>
        <li>�� �� 100% ����� ���� ���������, � ��� ������, ���  ��� �� �������� ������������� �� ���� ������ ���������, �� ��������� �  PHPShop. </li>
        <li>�� ��������� ��������� ��� ���������������� PHPShop  ��� �� ������ ����� ��� ��������, � �� �������� ����������  ��������-������� �����, ����� �� ��� ������ �� ������������ ���� ������. </li>
        <li>����������� ���������, ����� �����������  ������������� � ��� ���������, �� ����� ������ PHPShop 5,  ������������ � ������� "������-�����", - ��� ������, ��� � ������� ��  ������� ����������� ��� ������ ���������. </li>
        <li>�� ��������� �����, � ������������� �������� - ����  ����� ���������� ������� �� �������� ������� � ����� �������  ��  �������� ���. </li>
    </ol>
    <p>��� ������ ������������� ������� ����� ��������� ����, � ������� ��  ������������ ������� ������, ��� ����������� ������� �������� � �����  �������������. C��� �������� ������ ������� - 15 ������� ����.</p>
    <p>
    <a href="http://www.phpshop.ru/calculation/brifdesign/" target="_blank" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-share-alt"></span> ���� �� ������������ ������ �����</a></p>';
    $disp.=$PHPShopGUI->setCollapse(__('������������ ������'), $promo);
    
    return $disp;
}

?>
