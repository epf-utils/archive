<?php

$TitlePage = __('�������� �������');
$PHPShopOrm = new PHPShopOrm($GLOBALS['SysValue']['base']['banner']);

// ��������� ���
function actionStart() {
    global $PHPShopGUI, $PHPShopSystem, $PHPShopOrm, $PHPShopModules;

    // �������
    $data['flag'] = 1;
    $PHPShopGUI->setActionPanel(__("�������� �������"), false, array('��������� � �������'));

    // ���������� �������� 1
    $Tab1 = $PHPShopGUI->setField("���:", $PHPShopGUI->setInput("text", "name_new", $data['name'], false, 500)) .
            $PHPShopGUI->setField("������:", $PHPShopGUI->setRadio("flag_new", 1, "��������", $data['flag']) . $PHPShopGUI->setRadio("flag_new", 0, "���������", $data['flag'])) .
            $PHPShopGUI->setField("���������:", $PHPShopGUI->setInput("text", "dir_new", $data['dir']) .
                    $PHPShopGUI->setHelp(__('* ������: /,/page/,/shop/UID_1.html. ����� ������� ��������� ������� ����� �������.'))
    );

    // �������� 
    $PHPShopGUI->setEditor($PHPShopSystem->getSerilizeParam("admoption.editor"));
    $oFCKeditor = new Editor('content_new');
    $oFCKeditor->Height = '300';
    $oFCKeditor->Value = $data['content'];

    // ���������� �������� 2
    $Tab1.= $PHPShopGUI->setField("����������", $oFCKeditor->AddGUI());


    // ����� ����� ��������
    $PHPShopGUI->setTab(array("��������", $Tab1));

    // ������ ������ �� ��������
    $PHPShopModules->setAdmHandler(__FILE__, __FUNCTION__, $data);


    // ����� ������ ��������� � ����� � �����
   $ContentFooter = $PHPShopGUI->setInput("submit", "saveID", "��", "right", 70, "", "but", "actionInsert.banner.create");

    // �����
    $PHPShopGUI->setFooter($ContentFooter);
    return true;
}


// ������� ������
function actionInsert() {
    global $PHPShopOrm, $PHPShopModules;

    // �������� ������
    $PHPShopModules->setAdmHandler(__FILE__, __FUNCTION__, $_POST);

    $action = $PHPShopOrm->insert($_POST);
    header('Location: ?path=' . $_GET['path']);
    return $action;
}

// ����� ����� ��� ������
$PHPShopGUI->setLoader($_POST['editID'], 'actionStart');

// ��������� �������
$PHPShopGUI->getAction();
?>


