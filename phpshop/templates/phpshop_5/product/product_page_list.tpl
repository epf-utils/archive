<div class="siteMiddleDivContent">
    <div id="bg_catalog_1">@catalogCat@ / @catalogCategory@</div>
    <div id="bglist"></div>
    <div id="allspec">
        @breadCrumbs@
    </div>
    <div align="center">
        <span id="catalogContent">@catalogContent@</span>
    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <td id="allspec">

                <table cellpadding="0" cellspacing="0" >
                    <tr>
                        <td style="padding:5px" class="black">
                            ���������� ��: <a href="?@productVendor@&f=@productSortNext@&s=@productSort@" title="�������� �����������"><img src="images/shop/@productSortImg@.gif" alt="�������� �����������" hspace="3" border="0" align="absmiddle"></a><a href="?@productVendor@&f=@productSortTo@&s=1" class="@productSortA@">��������</a> - <a href="?v=@productVendor@&f=@productSortTo@&s=2"  class="@productSortB@">����</a> - <a href="?v=@productVendor@&f=@productSortTo@&s=3"  class="@productSortC@">������������</a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    @vendorDisp@
                                    <td> @vendorSelectDisp@</td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                </table>
            </td>

        </tr>
    </table>
    <div align="right" style="padding:10px">
        <img src="images/shop/page_excel.gif" alt="" border="0" align="absmiddle" hspace="5"><a href="/price/CAT_SORT_@pcatalogId@.html" title="�����-���� �������� @catalogCategory@">�����-���� ��������</a>
    </div>
</div>
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <!-- main_product_forma -->
                @productPageDis@
                <!-- main_product_forma-->
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" style=padding-left:10 class=style8 colspan="2">
            <div style="padding-top:15;padding-bottom:15" class=black>
                @productPageNav@
            </div>
        </td>
    </tr>
</table>