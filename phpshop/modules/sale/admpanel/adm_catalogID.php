<?php

function updateAllPrice() {
    global $LoadItems;
    $PHPShopOrm = new PHPShopOrm($GLOBALS['SysValue']['base']['products']);
    $price = ($price + (($price * $LoadItems['System']['percent']) / 100));
    $pr = $_POST['mod_sale_price'] / 100;

    switch ($_POST['mod_sale_old']) {
        case "null":
            $price_n = 'price_n=0, price=old_price_sale';
            break;
        case "price":
            $price_n = 'price_n=price';
            break;
        default:
            $price_n = null;
    }

    if(!empty($_POST['mod_sale_price'])){
        
        if(!empty($price_n)) $price_action=',';
        else $price_action=null;
        
        $price_action.=' price=price' . $_POST['mod_sale_opt'] . '(price*' . $pr . ')';
    }

    $PHPShopOrm->sql = 'update ' . $GLOBALS['SysValue']['base']['products'] . ' set 
    ' . $price_n .$price_action.' 
    where category=' . intval($_POST['catalogID']);
    $PHPShopOrm->update(false);
}

function addFieldSale($data) {
    global $PHPShopGUI;

    if (isset($data['icon'])) {

        // ��������� �������� � ������� actionStart
        $sel_value[] = array('+', '+', false);
        $sel_value[] = array('-', '-', 'selected');
        $sel = $PHPShopGUI->setSelect('mod_sale_opt', $sel_value, 40);
        $Tab9 = $PHPShopGUI->setField('����� ����', $PHPShopGUI->setInputText('�������� ���� � ����� ������ �������� �� ' . $sel, 'mod_sale_price', null, '30', '%'));

        $sel_value2[] = array('�������', 'none');
        $sel_value2[] = array('��������', 'null');
        $sel_value2[] = array('��������� �������� ��������� ���� �� ���������', 'price');

        $Tab9.=$PHPShopGUI->setField('������ ����', $PHPShopGUI->setSelect('mod_sale_old', $sel_value2, 300));

        $PHPShopGUI->addTab(array("����������", $Tab9, 450));
    }
}

$addHandler = array(
    'actionStart' => 'addFieldSale',
    'actionDelete' => false,
    'actionUpdate' => 'updateAllPrice',
    'actionSave' => false
);
?>