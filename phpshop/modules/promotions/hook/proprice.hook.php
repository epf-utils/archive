<?php

/**
 * ����������� �������� ������ �� 250 �������� � �����
 * @param array $obj ������
 */
function product_grid_hook($obj, $row) {
    global $PHPShopModules, $promotionslist;

    $category = $row['category'];
    $uid = $row['id'];

    //������ �����
    $dataf = $promotionslist;

    //��������� ������ ���� ������ ����
    if ($dataf[0]['id'] == '') {
        $data[0] = $dataf;
    }
    else {
        $data = $dataf;
    }

    //�������� ��������� � ������
    unset($category_ar);
    unset($products_ar);

    if (isset($data)) {
        foreach ($data as $key => $pro) {


            $versphp = phpversion(); //5.3.0
            //$versphp = "4.1.1";
            $version_status = version_compare($versphp,"5.3.0");

            if($version_status!='-1') {
                //�������� ���������� �� ����
                if($pro['active_check']==1) {
                    //���� �������
                    $date_today = date("d-m-Y");
                    //���� �� � ��
                    $date_ot = $pro['active_date_ot'];
                    $date_do = $pro['active_date_do'];
                    //����� ������ �� � ��
                    $d_ot_ar = explode('-', $pro['active_date_ot']);
                    $d_do_ar = explode('-', $pro['active_date_do']);
                    $date_f_ot = $d_ot_ar[2].'-'.$d_ot_ar[1].'-'.$d_ot_ar[0];
                    $date_f_do = $d_do_ar[2].'-'.$d_do_ar[1].'-'.$d_do_ar[0];
                    //������ ���
                    $begin = new DateTime( $date_f_ot );
                    $end = new DateTime( $date_f_do );
                    $end = $end->modify( '+1 day' ); 
                    $interval = new DateInterval('P1D');
                    $daterange = new DatePeriod($begin, $interval ,$end);

                    if(isset($daterange)) {
                        foreach($daterange as $date){
                            $data_interval = $date->format("d-m-Y");
                            if($date_today==$data_interval) {
                                $date_act = 1;
                                break;
                            }
                        }
                    }
                }
                else {
                    $date_act=1; //������ ������������� ���������� ���� ����� ���� ��������� � ����������
                }
            }
            else {
                    $date_act=1; //������ ������������� ���������� ���� ����� ���� ��������� � ����������
            }

            if($date_act==1) {
                if($pro['code_check']!=1) {

                    //������ ��������� ��� ����� ����
                    if ($pro['categories_check'] == 1):
                        //��������� ������
                        $category_ar = explode(',', $pro['categories']);
                    endif;

                    if ($pro['products_check'] == 1):
                        //��������� ������
                        $products_ar = explode(',', $pro['products']);
                    endif;

                    $sumche = 0;
                    $sumchep = 0;

                    //������ �� ����� ����������
                    if (isset($category_ar)) {
                        foreach ($category_ar as $val_c) {
                            if ($val_c == $category) {
                                $sumche = 1;
                                break;
                            } else {
                                $sumche = 0;
                            }
                        }
                    }

                    //������ �� ����� �������
                    if (isset($products_ar)) {
                        foreach ($products_ar as $val_p) {
                            if ($val_p == $uid) {
                                $sumchep = 1;
                                break;
                            } else {
                                $sumchep = 0;
                            }
                        }
                    }

                    //�������� ��������� � ������
                    unset($category_ar);
                    unset($products_ar);

                    if ($sumche == 1 or $sumchep == 1):
                        //���� �������
                        if ($pro['discount_tip'] == 1) {
                            $pro['discount'];
                            $discount[] = $pro['discount'];
                        }
                        if ($pro['discount_tip'] == 0) {
                            $pro['discount'];
                            $discountsum[] = $pro['discount'];
                        }

                    endif;
                }
                else {
                    unset($discount);
                    unset($discountsum);
                }
            }
        }
        //����� ����� ������� ������
        if (isset($discount))
            $discount = max($discount) / 100;

        if (isset($discountsum))
            $discountsum = max($discountsum);
    }

    //���� ���� ������
    if ($discount != '' or $discountsum != '') {

        $priceDiscount[] = $obj->price($row) - ($obj->price($row) * $discount);
        $priceDiscount[] = $obj->price($row) - $discountsum;
        $priceDiscounItog = min($priceDiscount);
        $priceDiscount = $priceDiscounItog;
        //�������� ���� � ����� ������
        if ($priceDiscount < 0) {
            $priceDiscount = 0;
        }

        $productPrice = $priceDiscount;
        $productPriceNew = $obj->price($row, true);
        $obj->set('productPrice', $productPrice);
        $obj->set('productPriceRub', PHPShopText::strike($obj->price($row) . " " . $obj->currency()));



        //������ �����
        $obj->set('promotionsIcon', '<span class="sale-icon" style="background-color: rgba(115, 41, 2, 0.29) !important;">�����-�����</span>');
    } else {
        $obj->set('promotionsIcon', '');
    }
}

$addHandler = array
    (
    'product_grid' => 'product_grid_hook'
);
?>