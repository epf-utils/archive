<?php

function tab_info($data) {
    global $PHPShopGUI;
    
    $Info = '<p>
      <h4>��������� ���������� ���������� � ������.������</h4>
        <ol>
        <li>� ���� "�����-����" ������� ����� YML �����: <code>http://' . $_SERVER['SERVER_NAME'] .$GLOBALS['SysValue']['dir']['dir']. '/yml/</code>
        </ol>
        <h4>��������� ������</h4>
        <ol>
       <li>���� ������ <b>��������</b> �� ������������������� ����� ��������. ��� ������������� ������ ������ �� ���� YML ������ ��� <code>http://' . $_SERVER['SERVER_NAME'] . '/yml/yandex.php?pas=*******</code>. ��� ������������� ������ ��������� ��� �� �������� ������ � ������.�������.
</li> </ol>
      <h4>��������� ������</h4>
        <ol>
        <li>� �������� �������������� ������ � �������� <kbd>������.�����</kbd> ��������� �������������� ��������� ������ ��� ������.�������.
        <li>��������� ��� � ��� ������������. ��� ������������� ����� ��� �� ������� ����� �������������� �����.
        <li>��������� ����� ������ ������� � ������ �������� �������������.
        <li>��������� �����������. ����������� ������������ ��� ��������� ���������� � ����������� ����� ������, ����������� ������ ������, ������������� ���������� (�������� �������� �����������) ��� ��������� ������, �������� ����� � ���������. ���������� ����� ������ � �������� � 50 ��������.
        <li>��������� ����� ������ ������ �������������.
        <li>��������� ����� �������������� � ������� ��� ��������. ���������� ��� ����������� ������, �������� ��������� � �������������� ����������� ������������, ���� ���� ������� ���������������� ������� � �����.
        <li>��������� ����������� ���������� �������� ������.
        <li>��������� ����������� ���������� ������ �� ������� ������.
        <li>��������� ����������� ������� ������ � ��������� ��������.
        </ol>
        
      <h4>��������� ��������</h4>
        <ol>
        <li>� �������� �������������� �������� � �������� <kbd>������.�����</kbd> ��������� �������������� ��������� ������ ��� ������.�������.
        <li>��������� ������������ ���������� ���� ��������.
        <li>��������� ����� ������ ��� ���������� ����� ��������.
        <li>��������� ����� ������ �������� ��� ������.�������.
        <li>��������� ����� �������������� �������� ������ ��� ���������� �������.
        <li>��������� �������� ���� �������� (����������, ��������� ��� �����).
        </ol>
        
      <h4>��������� ��������������</h4>
        <ol>
        <li>� �������� �������������� �������������� � �������� <kbd>������.�����</kbd> ��������� �������������� ��������� ������ ��� ������.�������.
        <li>��������� ����� ������ �������������� ��� ��� ������.�������. ���������� �������������� ��������� � YML ����� � ����� "Param"
        <li>��������� ������� ��������� ��� �������� ���������� (����, ��, �� � �.�.)
        </ol>
        

      <h4>SQL ������� ��� �������� ���������</h4>
      <p>
      ��� ������������� SQL ������ � ����������� ������� �������� ������� ����������� ������ ���������� ��������� <kbd>����</kbd> -  <kbd>SQL ������ � ����</kbd>.
      </p>
       <table class="table table-bordered table-striped">
   <thead>
        <tr>
          <th>#</th>
          <th>SQL</th>
          <th>��������</th>
        </tr>
      </thead>
    <tbody>
        <tr>
          <th scope="row">1</th>
          <td>update phpshop_products set manufacturer_warranty=\'1\';</td>
          <td>��������� �������� � ������.������� ��� ���� �������</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>update phpshop_products set sales_notes="����������� ������ - 1��; ����������� ����� ������ - 1000 ���.";</td>
          <td>��������� ����������� �� ���� ������� ��� ������.�������</td>
        </tr>
         <tr>
          <th scope="row">3</th>
          <td>update phpshop_products set country_of_origin="��������";</td>
          <td>��������� ������ ������������� �� ���� ������� ��� ������.�������</td>
        </tr>
         <tr>
          <th scope="row">4</th>
          <td>update phpshop_products set yml=\'0\' where price<1 or items<1;</td>
          <td>������ ������� ������� � ������.������� (������ �� ��������) ��� ������ ������ ��� ������� ����</td>
        </tr>
         <tr>
          <th scope="row">5</th>
          <td>update phpshop_products set yml=\'1\' where price>0 or items>0;</td>
          <td>������ ������� ������� � ������.������� (������ �� ��������) ��� ������������� ������ ��� ������� ����</td>
        </tr>
   </tbody>
</table>
        

        </p>';
    
    return $PHPShopGUI->setInfo($Info, 280, '98%');
}
?>
