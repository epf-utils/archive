<?php

function wbAddCaptions()
{
    global $PHPShopInterface;

    $memory = $PHPShopInterface->getProductTableFields();

    if(isset($memory['catalog.option']['price_wb'])) {
        $PHPShopInterface->productTableCaption[] = ["WB", "15%", ['view' => (int) $memory['catalog.option']['price_wb']]];
    }
}

$addHandler = [
    'getTableCaption' => 'wbAddCaptions'
];