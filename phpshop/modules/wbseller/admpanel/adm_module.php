<?php

include_once dirname(__FILE__) . '/../class/WbSeller.php';

PHPShopObj::loadClass("order");
PHPShopObj::loadClass("delivery");

// SQL
$PHPShopOrm = new PHPShopOrm($PHPShopModules->getParam("base.wbseller.wbseller_system"));
$WbSeller = new WbSeller();

// ���������� ������ ������
function actionBaseUpdate() {
    global $PHPShopModules, $PHPShopOrm;
    $PHPShopOrm->clean();
    $option = $PHPShopOrm->select();
    $new_version = $PHPShopModules->getUpdate($option['version']);
    $PHPShopOrm->clean();
    $PHPShopOrm->update(array('version_new' => $new_version));
}

// ������� ����������
function actionUpdate() {
    global $PHPShopModules;


    $PHPShopOrm = new PHPShopOrm($PHPShopModules->getParam("base.wbseller.wbseller_system"));
    $PHPShopOrm->debug = false;
    $action = $PHPShopOrm->update($_POST);

    header('Location: ?path=modules&id=' . $_GET['id']);

    return $action;
}


function actionStart() {
    global $PHPShopGUI, $PHPShopOrm, $WbSeller, $PHPShopModules;

    $PHPShopGUI->field_col = 4;

    // �������
    $data = $PHPShopOrm->select();

    // ������
    $status[] = [__('����� �����'), 0, $data['status']];
    $statusArray = (new PHPShopOrm('phpshop_order_status'))->getList(['id', 'name']);
    foreach ($statusArray as $statusParam) {
        $status[] = [$statusParam['name'], $statusParam['id'], $data['status']];
    }

    // �������� ������� �������
    $PHPShopOrderStatusArray = new PHPShopOrderStatusArray();
    $OrderStatusArray = $PHPShopOrderStatusArray->getArray();
    $order_status_value[] = array(__('����� �����'), 0, $data['status']);
    if (is_array($OrderStatusArray))
        foreach ($OrderStatusArray as $order_status)
            $order_status_value[] = array($order_status['name'], $order_status['id'], $data['status']);


    $Tab1 = $PHPShopGUI->setField('API key', $PHPShopGUI->setTextarea('token_new', $data['token'],false, '100%','100'));
    $Tab1 .= $PHPShopGUI->setField('������ ������ ������', $PHPShopGUI->setSelect('status_new', $order_status_value, '100%'));
    $Tab1 .= $PHPShopGUI->setField('���� ����������', $PHPShopGUI->setRadio("type_new", 1, "ID ������", $data['type']) . $PHPShopGUI->setRadio("type_new", 2, "������� ������", $data['type']));

    $Tab1 = $PHPShopGUI->setCollapse('���������', $Tab1);

    $info = '<h4>��������� ������</h4>
    <ol>
        <li>������������������ � <a href="https://seller.wildberries.ru" target="_blank">WB Partners</a>.</li>
        <li>� ������ �������� WB Seller ������� <a href="https://seller.wildberries.ru/supplier-settings/access-to-api" target="_blank">��������� - ������ �  API</a>, ������� ����� ����� (��� ������ <kbd>�����������</kbd>, ��� ������ �����). ���������� ����������� �������� ������ � ���� <kbd>API key</kbd> � ���������� ������.
        </li>
        <li>� ���������� ������ ������� ������ �������, ����������� � WB.</li>
        <li>� ���������� ������ ������� ����� WB. ���� ����� �� ������, �� ��� ����� �������������� ������� � <a href="https://seller.wildberries.ru/marketplace-pass/warehouses" target="_blank">��� ������ � ��������</a>.</li>
    </ol>

   <h4>�������� ������� � WB</h4>
   WB ��������� ������ �� ������� � ����� ���������� ������� �� ���������� � ��������������� �� ���� WB.
   <ol>
    <li>� �������� �������������� ��������� � �������� ����������� ��������� ���� ��������� � ���������� WB � �������� <kbd>WB</kbd>, ���� <kbd>���������� � WB</kbd>. ��� ������ ����� ��������� ����� �������� ����������� ���� ��������� WB, ��������� �� ������ �������� ������. ��������� ����� � ����������� ��������, ����� ���� �������� ���� "������������� ������������� � WB".</li>
    <li>����������� ��� ������� ����������� �������������� � ���������� ����������.</li>
    <li>� �������� �������������� ������ � �������� ����� �������� "������ - WB" �������� ����� <kbd>�������� ������� � WB</kbd> � ��������� ������. ������ ������� ��� �������� � WB �������� � ������� "������ - WB Partners - ������ ��� WB".</li>
    <li>����� �������� �������� ������ �������� � ������� <a href="https://seller.wildberries.ru/new-goods" target="_blank">������ - �������� ������� - ���������</a> � WB.</li>
    <li>��� �������� ��� � �������� ������� � WB ������� �������� ����� ������ � ������ <a href="https://docs.phpshop.ru/moduli/razrabotchikam/cron" target="_blank">������</a> � ������� ������������ ����� <code>phpshop/modules/wbseller/cron/products.php</code>. ������� � ���� ����������� ��� �� ��� �������������� �������� ������ � ��������.</li>
  </ol>
  
  <h4>�������� ������� � WB</h4>
   <ol>
    <li>������ ������� ��� �������� �� WB �������� � ������� "������ - WB Partners - ������ �� WB". �� ����� �� ����� ������ ��������� �������� � ��������� ������ �� ������ � WB. ��� �������� ������ ������������ ������ <kbd>��������� �����</kbd>. ����������� ����� ����� ����� ������, ��������� � ���������� ������. � ���� "���������� ��������������" ������������ ������ ����� ���������� � �������� � WB � ��� �����. ��� ��������� �������� ������ ������� ������� ��� �� ���� ������� � ��������.</li>
    <li>� �������� "�������������" ������������� ������ � WB ��������� ������ ���������� �� ������ � ���� ������� ������.</li>
  </ol>
  
 <h4>�������� ������� � WB</h4>
   <ol>
    <li>������ ������� ��� �������� �� WB �������� � ������� "������ - WB Partners- ������ �� WB". �� ����� �� �������� ������ ��������� �������� � ��������� ������ �� ������ � WB. ��� �������� ������ ������������ ������ <kbd>��������� �����</kbd>. ��� ��������� �������� ������ ������� ������� ��� �� ���� ������� � ��������. �� WB ���������� ������ �� ������, � ��� ����� ����������� � ��������������.</li>
  </ol>
';

    if ($data['fee_type'] == 1) {
        $status_pre = '-';
    } else {
        $status_pre = '+';
    }
    
    $getWarehouse = $WbSeller->getWarehouse();
    if (is_array($getWarehouse))
        foreach ($getWarehouse as $warehouse)
            $warehouse_value[] = array($warehouse['name'], $warehouse['id'], $data['warehouse']);

    $Tab3 = $PHPShopGUI->setCollapse('����', $PHPShopGUI->setField('������� ��� WB', $PHPShopGUI->setSelect('price_new', $PHPShopGUI->setSelectValue($data['price'], 5), 100)) .
            $PHPShopGUI->setField('�������', $PHPShopGUI->setInputText($status_pre, 'fee_new', $data['fee'], 100, '%')) .
            $PHPShopGUI->setField('��������', $PHPShopGUI->setRadio("fee_type_new", 1, "���������", $data['fee_type']) . $PHPShopGUI->setRadio("fee_type_new", 2, "���������", $data['fee_type'])) .
            $PHPShopGUI->setField("����� WB", $PHPShopGUI->setSelect('warehouse_new', $warehouse_value, '100%'))
    );

    $Tab2 = $PHPShopGUI->setInfo($info);

    // ����� �����������
    $Tab4 = $PHPShopGUI->setPay(false, false, $data['version'], true);

    // ����� ����� ��������
    $PHPShopGUI->setTab(array("��������", $Tab1 . $Tab3, true, false, true), array("����������", $Tab2), array("� ������", $Tab4));

    // ����� ������ ��������� � ����� � �����
    $ContentFooter = $PHPShopGUI->setInput("hidden", "rowID", $data['id']) .
            $PHPShopGUI->setInput("submit", "saveID", "���������", "right", 80, "", "but", "actionUpdate.modules.edit");

    $PHPShopGUI->setFooter($ContentFooter);
    return true;
}

/**
 * ������ �������������
 */
function actionCategorySearch() {
    global $WbSeller;
    
    $data = $WbSeller->getTree(PHPShopString::win_utf8($_POST['words']))['data'];

    if (is_array($data)) {
        foreach ($data as $row) {

            $result .= '<a href=\'#\' class=\'select-search\' data-name=\'' . PHPShopString::utf8_win1251($row['objectName'],true) . '\'>' . PHPShopString::utf8_win1251($row['parentName'],true) . ' &rarr; ' . PHPShopString::utf8_win1251($row['objectName'],true) . '</a><br>';
        }
        $result .= '<button type="button" class="close pull-right" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        exit($result);
    } else
        exit();
}

// ��������� �������
$PHPShopGUI->getAction();

// ����� ����� ��� ������
$PHPShopGUI->setLoader($_POST['editID'], 'actionStart');
