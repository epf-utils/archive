<?php

/**
 * C��������� �������
 * @author PHPShop Software
 * @version 1.6
 * @package PHPShopCoreFunction
 * @param obj $obj ������ ������
 * @return mixed
 */
function query_filter($obj) {

    $sort = null;

    if (count($obj->category_array) === 0) {
        $obj->category_array = array($obj->category);
    }

    $dop_cats = '';
    foreach ($obj->category_array as $category) {
        $dop_cats .= ' OR dop_cat LIKE \'%#' . $category . '#%\' ';
    }
    $categories_str = implode("','", $obj->category_array);

    $catt = "(category IN ('$categories_str') " . $dop_cats . " ) ";

    if (!empty($_REQUEST['v']))
        $v = $_REQUEST['v'];
    else
        $v = null;

    if (!empty($_REQUEST['s']))
        $s = intval($_REQUEST['s']);
    else
        $s = null;

    if (!empty($_REQUEST['f']))
        $f = intval($_REQUEST['f']);
    else
        $f = null;

    if (!empty($_REQUEST['l']))
        $l = $_REQUEST['l'];
    else
        $l = null;

    // ���������� �� ���������������
    if (is_array($v)) {
        foreach ($v as $key => $value) {

            // ������������� ����� [][]
            if (is_array($value)) {
                $sort .= " and (";
                foreach ($value as $v) {
                    if (PHPShopSecurity::true_num($key) and PHPShopSecurity::true_num($v)) {
                        $obj->selected_filter[$key][] = $v;
                        $hash = $key . "-" . $v;
                        $sort .= " vendor REGEXP 'i" . $hash . "i' and";
                    }
                }
                $sort = substr($sort, 0, strlen($sort) - 3);
                $sort .= ")";
            }
            // ������� ����� []
            elseif (PHPShopSecurity::true_num($key) and PHPShopSecurity::true_num($value)) {
                $obj->selected_filter[$key][] = $value;
                $hash = $key . "-" . $value;
                $sort .= " and vendor REGEXP 'i" . $hash . "i' ";
            }
        }
    }

    // ���������� �� �������� ?l=a
    if (!empty($l)) {
        $sort .= " and name LIKE '" . strtoupper(substr(urldecode($l), 0, 1)) . "%' ";
    }

    // ����������� ���������� �� �������� ��������. ������ ����� ������ � sort.class.php
    if (empty($f))
        switch ($obj->PHPShopCategory->getParam('order_to')) {
            case(1): $order_direction = "";
                $obj->set('productSortImg', 1);
                break;
            case(2): $order_direction = " desc";
                $obj->set('productSortImg', 2);
                break;
            default: $order_direction = "";
                $obj->set('productSortImg', 1);
                break;
        }


    // ���������� �� �������� ��������. ������ ����� ������ � sort.class.php
    if (empty($s))
        switch ($obj->PHPShopCategory->getParam('order_by')) {
            case(1): $order = array('order' => 'name' . $order_direction);
                $obj->set('productSortA', 'sortActiv');
                break;
            case(2):
                // ���������� �� ���� ����� �������������� �������
                if ($obj->multi_currency_search)
                    $order = array('order' => 'price_search' . $order_direction . ',' . $obj->PHPShopSystem->getPriceColumn() . $order_direction);
                else
                    $order = array('order' => $obj->PHPShopSystem->getPriceColumn() . $order_direction);

                $obj->set('productSortB', 'sortActiv');
                break;
            case(3): $order = array('order' => 'num' . $order_direction . ", items desc");
                $obj->set('productSortC', 'sortActiv');
                break;
            default: $order = array('order' => 'num' . $order_direction . ", items desc");
                $obj->set('productSortC', 'sortActiv');
                break;
        }

    // ���������� �������������� �������������
    if ($s or $f) {
        switch ($f) {
            case(1): $order_direction = "";

                break;
            case(2): $order_direction = " desc";
                break;
            default: $order_direction = "";
                break;
        }
        switch ($s) {
            case(1): $order = array('order' => 'name' . $order_direction);
                break;
            case(2):
                // ���������� �� ���� ����� �������������� �������
                if ($obj->multi_currency_search)
                    $order = array('order' => 'price_search' . $order_direction . ',' . $obj->PHPShopSystem->getPriceColumn() . $order_direction);
                else
                    $order = array('order' => $obj->PHPShopSystem->getPriceColumn() . $order_direction);
                break;
            case(3): $order = array('order' => 'num' . $order_direction);
                break;
            case(4): $order = array('order' => 'discount ' . $order_direction);
                break;
            default: $order = array('order' => 'num, name' . $order_direction);
        }
    }

    // ����������� ������ ������ ���������� � ������
    foreach ($order as $key => $val)
        $string = $key . ' by ' . $val;

    // ����� �� ����
    if (!empty($_REQUEST['min']) and !empty($_REQUEST['max'])) {

        $priceOT = intval($_REQUEST['min']) - 1;
        $priceDO = intval($_REQUEST['max']) + 1;

        $percent = $obj->PHPShopSystem->getValue('percent');

        if (empty($priceDO))
            $priceDO = 1000000000;


        // ���� � ������ ��������� ������
        $priceOT /= $obj->currency('kurs');
        $priceDO /= $obj->currency('kurs');

        // ���������� �� ������ ����� �������������� �������
        if ($obj->multi_currency_search)
            $sort .= " and (price_search BETWEEN " . ($priceOT / (100 + $percent) * 100) . " AND " . ($priceDO / (100 + $percent) * 100) . ") ";
        else
            $sort .= " and (" . $obj->PHPShopSystem->getPriceColumn() . " BETWEEN " . ($priceOT / (100 + $percent) * 100) . " AND " . ($priceDO / (100 + $percent) * 100) . ") ";
    }

    return array('sql' => $catt . " and enabled='1' and parent_enabled='0' " . $sort . $string);
}

?>