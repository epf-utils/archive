<!-- Hero Section -->
<div class="container space-top-1 space-top-sm-1" itemscope itemtype="http://schema.org/Product">
    <meta itemprop="image" content="@productImgBigFoto@">
     <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <meta itemprop="ratingValue" content="@productRatingValue@">
        <meta itemprop="ratingCount" content="@productRatingCount@">
    </div>
    <div class="container p-0">
        <h1 itemprop="name" class="h2 page-title d-none">@productName@</h1>                          
    </div>
    <div class="row">
        <div class="col-lg-7 mb-7 mb-lg-0">
            <div class="pr-lg-4">
                <div class="position-relative">

                    <!-- Main Slider -->
                    <div id="heroSlider" class="js-slick-carousel slick border rounded-lg"
                         data-hs-slick-carousel-options='{
                         "prevArrow": "<span class=\"fas fa-arrow-left slick-arrow slick-arrow-primary-white slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-n3 ml-sm-2 ml-xl-4\"></span>",
                         "nextArrow": "<span class=\"fas fa-arrow-right slick-arrow slick-arrow-primary-white slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-n3 mr-sm-2 mr-xl-4\"></span>",
                         "fade": true,
                         "infinite": true,
                         "autoplay": true,
                         "autoplaySpeed": 7000,
                         "asNavFor": "#heroSliderNav"
                         }'>
                        @productHeroSlider@
                    </div>
                    <!-- End Main Slider -->

                    <!-- Slider Nav -->
                    <div class="position-absolute bottom-0 right-0 left-0 px-4 py-3">
                        <div id="heroSliderNav" class="js-slick-carousel slick slick-gutters-1 slick-transform-off max-w-27rem mx-auto"
                             data-hs-slick-carousel-options='{
                             "infinite": true,
                             "autoplaySpeed": 7000,
                             "slidesToShow": @productHeroCount@,
                             "isThumbs": true,
                             "isThumbsProgressCircle": true,
                             "thumbsProgressOptions": {
                             "color": "#377DFF",
                             "width": 8
                             },
                             "thumbsProgressContainer": ".js-slick-thumb-progress",
                             "asNavFor": "#heroSlider"
                             }'>
                            @productHeroSliderNav@
                        </div>
                    </div>
                    <!-- End Slider Nav -->
                </div><div class="m-3 p-3 mb-2">@promotionInfo@</div>

            </div>
        </div>

        <!-- Product Description -->
        <div class="col-lg-5">
            <!-- Rating -->
            <div class="d-flex align-items-center small mb-5">
                <div class="rating mr-2">
                    @rateUid@
                </div>
                <a class="link-underline" href="#commentList">{������}: @avgRateNum@</a>
                @brandUidDescription@
            </div>
            <!-- End Rating -->

            <!-- Title -->
            <div class="mb-5 small mb-0">
                @productContent@
            </div>
            <!-- End Title -->
            <!-- ���� �������� -->
            <div class="media align-items-center mb-4 text-primary ">
                <span class="w-100 max-w-4rem mr-0">
                    <i class="fas fa-heart nav-icon"></i>
                </span>
                <div class="text-body small mr-4">
                    <a class="text-primary addToWishList" data-uid="@productUid@" href="#">{� ���������}</a>
                </div>

                <span class="w-100 max-w-4rem mr-0">
                    <i class="fas fa-sliders-h nav-icon"></i>
                </span>
                <div class="media-body text-body small">
                    <a class="text-primary addToCompareList" data-uid="@productUid@" href="#">{� ���������}</a>
                </div>
                @productArt@
            </div>
            <!-- ����� ����� �������� -->

            <!-- ���� -->
            <div class="d-flex align-items-center mb-2" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <span class="text-dark font-size-2 font-weight-bold">
                    <span itemprop="price" class="priceService" content="@productSchemaPrice@">@productPrice@</span> 
                    <span itemprop="priceCurrency" class="rubznak" content="RUB">@productValutaName@</span>  
                </span>
                <span class="text-body ml-4 @php __hide('productPriceOld'); php@"><del class="price-old">@productPriceOld@</del> @specIcon@</span>
            </div>

            <div class="option-block">
                <!-- ����� -->
                @optionsDisp@

                <!-- ������� -->
                @productParentList@
            </div>

            <!-- ���������� -->
            <div>    
                <div class="text-body space-bottom-1 small" id="items">@productSklad@</div>
                @ComStartNotice@
                <div class="text-danger space-bottom-1 small">@productOutStock@</div>
                @ComEndNotice@
            </div>


            <div class="border rounded-lg py-2 px-3 mb-3 @elementCartHide@">
                <div class="js-quantity-counter row align-items-center">
                    <div class="col-7">
                        <small class="d-block text-body font-weight-bold">{�������� ����������}:</small>
                        <input class="js-result form-control h-auto border-0 rounded-lg p-0" type="text" value="1" name="quant[1]">
                    </div>
                    <div class="col-5 text-right">
                        <a class="js-minus btn btn-xs btn-icon btn-outline-secondary rounded-circle" href="javascript:;">
                            <i class="fas fa-minus"></i>
                        </a>
                        <a class="js-plus btn btn-xs btn-icon btn-outline-secondary rounded-circle" href="javascript:;">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border rounded-lg py-2 px-3 mb-3 @elementCartOptionHide@">
                <div class="js-quantity-counter row align-items-center">
                    <div class="col-7">
                        <small class="d-block text-body font-weight-bold">{�������� ����������}:</small>
                        <input class="js-result form-control h-auto border-0 rounded-lg p-0" type="text" value="1" name="quant[1]">
                    </div>
                    <div class="col-5 text-right">
                        <a class="js-minus btn btn-xs btn-icon btn-outline-secondary rounded-circle" href="javascript:;">
                            <i class="fas fa-minus"></i>
                        </a>
                        <a class="js-plus btn btn-xs btn-icon btn-outline-secondary rounded-circle" href="javascript:;">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ������ ������ -->
            @productservices_list@

            <!-- ����� ������� ��������� ��� �������� ������ -->
            @sticker_accordion@

            <div class="mb-4 @elementCartHide@">
                <button type="button" class="btn btn-block btn-primary btn-pill transition-3d-hover addToCartFull" data-num="1" data-uid="@productUid@">@flowProductSale@</button>
            </div>
            
            <div class="mb-4 @elementCartOptionHide@">
                <button type="button" class="btn btn-block btn-primary btn-pill transition-3d-hover addToCartFull" data-num="1" data-uid="@productUid@">@flowProductSale@</button>
            </div>

            <!-- ������ ������ � 1 ���� -->
            @oneclick@          

            <!-- Help Link -->
            @sticker_chat@

        </div>
        <!-- End Product Description -->
    </div>
</div>
<!-- End Hero Section -->

<!-- Product Description Section -->
<div class="container">

    <div class="row">
        <div class="col-md-7 mb-6 mb-md-0">
            <div class="@php __hide('productDes'); php@">
                <h4>{��������}</h4>
                <div class="pr-lg-4">
                    @productDes@
                </div>
            </div>


            <h4>{������}</h4>
            <div class="pr-lg-4">
                <div id="commentList"></div>
                <!--<a class="comment-more hide-click link-underline" href="#">{�������� ���}</a><br>-->
                <a href="#" class="link-underline" data-toggle="modal" data-target="#reviewModal">{�������� �����}</a>

                <script type="text/javascript">
                    $(document).ready(function () {
                        commentList('@productUid@', 'list');
                    });
                </script>

            </div>
        </div>

        <div class="col-md-5 mb-4 mb-md-0">
            <div class="@php __hide('vendorDisp'); php@">
                <h4>{��������������}</h4>

                <div class="pr-lg-4">
                    @vendorDisp@
                </div>
            </div>

            @productFilesStart@
            <div class="mt-3">
                <h4>{�����}</h4>

                <div class="pr-lg-4">
                    @productFiles@
                </div>
            </div>
            @productFilesEnd@

        </div>
        <!-- End Product Description Section -->

        <!-- ��������� ���� ������-->
        <div class="modal fade new-modal" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="{�������� �����}" aria-hidden="true">
            <div class="modal-dialog small-modal" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4><a href="/shop/UID_@productUid@.html" title="@productNameClean@">@productName@</a></h4>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="image">
                                    <a href="/shop/UID_@productUid@.html" title="@productNameClean@">
                                        @productSliderOneImage@
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form id="addComment" method="post" name="ajax-form" action="phpshop/ajax/review.php" data-modal="reviewModal">
                            <h4>{������� �����}</h4>
                            <div class="btn-group rating-group" data-toggle="buttons">
                                <label class="btn ">
                                    <input type="radio" name="rate" value="1">
                                </label>
                                <label class="btn ">
                                    <input type="radio" name="rate" value="2">
                                </label>
                                <label class="btn ">
                                    <input type="radio" name="rate" value="3">
                                </label>
                                <label class="btn ">
                                    <input type="radio" name="rate" value="4">
                                </label>
                                <label class="btn ">
                                    <input type="radio" name="rate" value="5" checked>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class=""></div>
                                <div class="">
                                    <textarea placeholder="{�����������}" name="message" id="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                </div>
                                <div class="">
                                    <input placeholder="{���}" type="text" name="name_new" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                </div>
                                <div class="">
                                    <input placeholder="E-mail" type="email" name="mail" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                </div>
                                <div class="">
                                    @review_captcha@
                                </div>
                            </div>
                            <p class="small"><label><input name="rule" value="1" required="" checked="" type="checkbox">
                                    @rule@</label></p>
                            <div class="form-group">
                                <div class=""></div>
                                <div class="">
                                    <input type="hidden" name="send_price_link" value="ok">
                                    <input type="hidden" name="ajax" value="1">
                                    <input type="hidden" name="productId" value="@productUid@">
                                    <button type="submit" class="btn btn-block btn-primary btn-pill transition-3d-hover">{�������� �����}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ ��������� ���� ������-->

        <!-- ��������� ���� ������-->
        <div id="thanks-box" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- ��������� ���������� ���� -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="h4 modal-title">{���������}</div>
                    </div>
                    <!-- �������� ���������� ���������� ���� -->
                    <div class="modal-body">

                    </div>
                    <!-- ����� ���������� ���� 
                    <div class="modal-footer">
        
                    </div>
                    -->
                </div>
            </div>
        </div>
        <!--/ ��������� ���� ������-->