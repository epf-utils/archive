
<div class="col-xs-12">
    <div class="product-col list clearfix">
        <div class="image">
            <a href="/shop/UID_@productUid@.html" title="@productName@"><img src="@productImg@" alt="@productName@"></a>
        </div>
        <div class="caption">
            <div class="description">
                <h4><a href="/shop/UID_@productUid@.html" title="@productName@">@productName@</a></h4>
                @productDes@
            </div>
            <div class="price">
                <span class="price-new">@productPrice@ <span class="rubznak">@productValutaName@</span></span> 
                <span class="price-old">@productPriceRub@</span>
            </div>
            <div class="cart-button button-group">
                @ComStartCart@
                <button type="button" class="btn btn-cart addToCartList" data-uid="@productUid@" role="button" data-cart="@productSaleReady@">
                    <i class="fa fa-shopping-cart"></i>                             
                     <span>@productSale@</span>
                </button>
                @ComEndCart@   
                
                                @ComStartNotice@
                <a class="btn btn-cart" href="/users/notice.html?productId=@productUid@" title="@productNotice@">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>                            
                    ���������
                </a>                                   
                @ComEndNotice@ 
            </div>
        </div>
    </div>
</div>