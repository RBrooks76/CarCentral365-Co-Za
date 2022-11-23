@extends('layouts.front')

@section('styles')
    <style>

    </style>
@endsection

@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                        {{ $langg->lang301 }}
                    </h1>
                    <ul class="pages">
                        <li>
                            <a href="{{ route('front.index') }}">
                                {{ $langg->lang1 }}
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                {{ $langg->lang301 }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- sub-categori Area Start -->
    <section class="sub-categori">
        <div class="container">
            <div class="row">
                <div class="item-filter col-sm-12">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-12">
                            <select class="short-item sel-sort form-control" name="sort"
                                style="margin-left: 10px;width: 200px; float: right;">
                                <option value="desc" {{ request()->input('sort') == 'desc' ? 'selected' : '' }}>
                                    {{ $langg->lang24 }}</option>
                                <option value="asc" {{ request()->input('sort') == 'asc' ? 'selected' : '' }}>
                                    {{ $langg->lang25 }}</option>
                                <option value="price_desc"
                                    {{ request()->input('sort') == 'price_desc' ? 'selected' : '' }}>
                                    {{ $langg->lang26 }}</option>
                                <option value="price_asc" {{ request()->input('sort') == 'price_asc' ? 'selected' : '' }}>
                                    {{ $langg->lang27 }}</option>
                            </select>

                            <select class="short-itemby-no sel-view form-control" style="margin-left: 10px; width: 100px; float:right;">
                                <option value="10" {{ request()->input('per_page') == 10 ? 'selected' : '' }}>
                                    {{ $langg->lang29 }}</option>
                                <option value="20" {{ request()->input('per_page') == 20 ? 'selected' : '' }}>
                                    {{ $langg->lang30 }}</option>
                                <option value="30" {{ request()->input('per_page') == 30 ? 'selected' : '' }}>
                                    {{ $langg->lang31 }}</option>
                                <option value="40" {{ request()->input('per_page') == 40 ? 'selected' : '' }}>
                                    {{ $langg->lang32 }}</option>
                                <option value="50" {{ request()->input('per_page') == 50 ? 'selected' : '' }}>
                                    {{ $langg->lang33 }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="left-area">
                        <div class="design-area">
                            <div class="header-area">
                                <h4 class="title">
                                    Name
                                </h4>
                            </div>
                            <div class="body-area">
                                <input name="carname" id="carname" class="form-control" placeholder="Type car name"
                                    value="{{ !empty(request()->input('carname')) ? request()->input('carname') : '' }}">
                                <button class="filter-btn price-btn carname-btn"
                                    type="button">{{ $langg->lang34 }}</button>
                            </div>
                        </div>
                        <div class="design-area">
                            <?php
                            $locations = ['Eastern Cape', 'Free State', 'Gauteng', 'Kwazulu Natal', 'Limpopo', 'Mpumalanga', 'North West Province', 'Northern Cape', 'Western Cape'];
                            ?>
                            <div class="header-area">
                                <h4 class="title">
                                    Location
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list location-list">
                                    @foreach ($locations as $location)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input location-check" type="checkbox"
                                                            id="{{ 'location_' . str_replace(' ', '_', $location) }}"
                                                            value="{{ $location }}">
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label location-label"
                                                            for="{{ 'location_' . str_replace(' ', '_', $location) }}">
                                                            {{ $location }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="categori-select-area">
                            <?php
                            $car_conditions = ['New', 'Used'];
                            ?>
                            <div class="header-area">
                                <h4 class="title">
                                    {{ $langg->lang44 }}
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list condition-list">
                                    @foreach ($car_conditions as $car_condition)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input condition-check" type="checkbox"
                                                            id="{{ 'condition_' . $car_condition }}"
                                                            value="{{ $car_condition }}"
                                                            {{ in_array($car_condition, $derived_conditions) ? 'checked' : '' }}>
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label condition-label"
                                                            for="{{ 'condition_' . $car_condition }}">
                                                            {{ $car_condition }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="filter-result-area" style="margin-top: 30px;">
                            <div class="header-area">
                                <h4 class="title">
                                    Price (R)
                                </h4>
                            </div>
                            <div class="body-area">
                                <form action="#">
                                    <div class="price-range-block">
                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                        <div class="livecount">
                                            <input type="number" min=0 max="11499999"
                                                oninput="validity.valid||(value='0');" id="min_price"
                                                class="price-range-field" />
                                            <span>To</span>
                                            <input type="number" min=0 max="11499999"
                                                oninput="validity.valid||(value='10000');" id="max_price"
                                                class="price-range-field" />
                                        </div>
                                    </div>

                                    <button class="filter-btn price-btn price-apply-btn"
                                        type="button">{{ $langg->lang34 }}</button>
                                </form>
                            </div>
                        </div>

                        <div class="filter-result-area" style="margin-top: 30px;">
                            <div class="header-area">
                                <h4 class="title">
                                    Mileage (KM)
                                </h4>
                            </div>
                            <div class="body-area">
                                <form action="#">
                                    <div class="price-range-block">
                                        <div id="mile-slider-range" class="price-filter-range" name="rangeInput"></div>
                                        <div class="livecount">
                                            <input type="number" min=0 max="11499999"
                                                oninput="validity.valid||(value='0');" id="min_mile"
                                                class="price-range-field" />
                                            <span>To</span>
                                            <input type="number" min=0 max="11499999"
                                                oninput="validity.valid||(value='10000');" id="max_mile"
                                                class="price-range-field" />
                                        </div>
                                    </div>

                                    <button class="filter-btn price-btn mile-apply-btn"
                                        type="button">{{ $langg->lang34 }}</button>
                                </form>
                            </div>
                        </div>

                        <!-- <div class="all-categories-area">
                                                                                                                                                                                                                        <div class="header-area">
                                                                                                                                                                                                                         <h4 class="title">
                                                                                                                                                                                                                          {{ $langg->lang35 }}
                                                                                                                                                                                                                         </h4>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                        <div class="body-area">
                                                                                                                                                                                                                         <div class="accordion" id="accordionExample">
                                                                                                                                                                                                                          <div class="card">
                                                                                                                                                                                                                           <div class="card-header">
                                                                                                                                                                                                                            <a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="" @if (empty(request()->input('category_id'))) style="color: #0056b3;" @endif>
                                                                                                                                                                                                                              <i class="icofont-thin-double-right"></i> {{ $langg->lang35 }}
                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                           </div>
                                                                                                                                                                                                                          </div>
                                                                                                                                                                                                                          @foreach ($cats as $key => $cat)
    <div class="card">
                                                                                                                                                                                                                            <div class="card-header" id="headingOne">
                                                                                                                                                                                                                              <a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="{{ $cat->id }}" @if ($cat->id == request()->input('category_id')) style="color: #0056b3;" @endif>
                                                                                                                                                                                                                               <i class="icofont-thin-double-right"></i>{{ $cat->name }}
                                                                                                                                                                                                                             </a>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                           </div>
    @endforeach
                                                                                                                                                                                                                         </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                       </div> -->
                        <div class="design-area">
                            <div class="header-area">
                                <h4 class="title">
                                    Model
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list brand-list">
                                    @foreach ($brands as $key => $brand)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input brand-check" type="checkbox"
                                                            id="b{{ $brand->id }}" value="{{ $brand->name }}"
                                                            {{ in_array($brand->name, $derived_brands) ? 'checked' : '' }}>
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label brand-label"
                                                            for="b{{ $brand->id }}">
                                                            {{ $brand->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="#" id="showMore" class="d-inline-block mt-2">show more</a>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="design-area">
                            <?php
                            $fuel_types = ['Diesel', 'Electric', 'Hybrid', 'Petrol'];
                            ?>
                            <div class="header-area">
                                <h4 class="title">
                                    Fuel Type
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list fuel-type-list">
                                    @foreach ($fuel_types as $fuel_type)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input fuel-type-check" type="checkbox"
                                                            id="{{ 'fuel_type_' . $fuel_type }}"
                                                            value="{{ $fuel_type }}">
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label fuel-type-label"
                                                            for="{{ 'fuel_type_' . $fuel_type }}">
                                                            {{ $fuel_type }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="design-area">
                            <?php
                            $colors = ['Beige', 'Black', 'Blue', 'Brown', 'Gold', 'Green', 'Grey', 'Orange', 'Pink', 'Purple', 'Red', 'Silver', 'Unknown', 'White', 'Yellow'];
                            ?>
                            <div class="header-area">
                                <h4 class="title">
                                    Colors
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list color-list">
                                    @foreach ($colors as $color)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input color-check" type="checkbox"
                                                            id="{{ 'color_' . $color }}" value="{{ $color }}">
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label color-label"
                                                            for="{{ 'color_' . $color }}">
                                                            {{ $color }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="design-area">
                            <?php
                            $transmissions = ['Automatic', 'Manual'];
                            ?>
                            <div class="header-area">
                                <h4 class="title">
                                    Manual / Auto
                                </h4>
                            </div>
                            <div class="body-area">
                                <ul class="filter-list transmission-list">
                                    @foreach ($transmissions as $transmission)
                                        <li>
                                            <div class="content">
                                                <div class="check-box">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input transmission-check" type="checkbox"
                                                            id="{{ 'transmission_' . $transmission }}"
                                                            value="{{ $transmission }}">
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label transmission-label"
                                                            for="{{ 'transmission_' . $transmission }}">
                                                            {{ $transmission }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 order-first order-lg-last">
                    <div class="right-area">

                        <div class="categori-item-area">
                            <div class="row" id="loadingDiv" style="display: none;">
                                <div class="loading">
                                    <span class="loading__anim"></span>
                                </div>
                            </div>
                            <div class="row" id="carsDiv">

                            </div>
                        </div>
                        <div class="custom-pagination">
                            <div class="pagination">

                                <input type="hidden" value="{{ $totalPages }}" id="totalPages" />
                                <ul>
                                    <!--pages or li are comes from javascript -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sub-categori Area End -->

    <form id="searchForm" class="d-none" action="{{ route('front.cars') }}" method="get">
        <input type="text" name="minprice"
            value="{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}">
        <input type="hidden" name="maxprice"
            value="{{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }}">
        <input type="hidden" name="category_id"
            value="{{ !empty(request()->input('category_id')) ? request()->input('category_id') : null }}">
        @if (!empty(request()->input('brand_id')))
            @php
                $brands = request()->input('brand_id');
            @endphp
            @foreach ($brands as $key => $brand)
                <input type="hidden" name="brand_id[]" value="{{ $brand }}">
            @endforeach
        @endif
        <input type="hidden" name="fuel_type_id"
            value="{{ !empty(request()->input('fuel_type_id')) ? request()->input('fuel_type_id') : null }}">
        <input type="hidden" name="transmission_type_id"
            value="{{ !empty(request()->input('transmission_type_id')) ? request()->input('transmission_type_id') : null }}">
        <input type="hidden" name="type"
            value="{{ !empty(request()->input('type')) ? request()->input('type') : 'all' }}">
        <input type="hidden" name="sort"
            value="{{ !empty(request()->input('sort')) ? request()->input('sort') : 'desc' }}">
        <input type="hidden" name="per_page"
            value="{{ !empty(request()->input('per_page')) ? request()->input('per_page') : 10 }}">
        <input type="hidden" name="carname"
            value="{{ !empty(request()->input('carname')) ? request()->input('carname') : '' }}">
        <button type="submit"></button>
    </form>

    <form id="detailForm" class="d-none" action="{{ route('front.cars.detail') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="detail_data" value="">
    </form>

    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        var minprice = {{ $minprice }};
        var maxprice = {{ $maxprice }};

        // pricing range
        $(document).ready(function() {
            $("#price-range-submit").hide(), $("#min_price,#max_price").on("change", function() {
                $("#price-range-submit").show();
                var e = parseInt($("#min_price").val()),
                    i = parseInt($("#max_price").val());
                e > i && $("#max_price").val(e), $("#slider-range").slider({
                    values: [e, i]
                })
            }), $("#min_price,#max_price").on("paste keyup", function() {
                $("#price-range-submit").show();
                var e = parseInt($("#min_price").val()),
                    i = parseInt($("#max_price").val());
                e == i && (i = e + 100, $("#min_price").val(e), $("#max_price").val(i)), $("#slider-range")
                    .slider({
                        values: [e, i]
                    })
            }), $(function() {
                $("#slider-range").slider({
                    range: !0,
                    orientation: "horizontal",
                    min: 0,
                    max: 11499999,
                    values: [0, 11499999],
                    step: 50,
                    slide: function(e, i) {
                        if (i.values[0] == i.values[1]) return !1;
                        $("#min_price").val(i.values[0]), $("#max_price").val(i.values[1])
                    }
                }), $("#min_price").val($("#slider-range").slider("values", 0)), $("#max_price").val($(
                    "#slider-range").slider("values", 1))
            }), $("#slider-range,#price-range-submit").click(function() {
                var e = $("#min_price").val(),
                    i = $("#max_price").val();
                $("#searchResults").text("Here List of products will be shown which are cost between " + e +
                    " and " + i + ".")
            })
        });

        // mile range
        $(document).ready(function() {
            $("#mile-range-submit").hide(), $("#min_mile,#max_mile").on("change", function() {
                $("#mile-range-submit").show();
                var e = parseInt($("#min_mile").val()),
                    i = parseInt($("#max_mile").val());
                e > i && $("#max_mile").val(e), $("#mile-slider-range").slider({
                    values: [e, i]
                })
            }), $("#min_mile,#max_mile").on("paste keyup", function() {
                $("#mile-range-submit").show();
                var e = parseInt($("#min_mile").val()),
                    i = parseInt($("#max_mile").val());
                e == i && (i = e + 100, $("#min_mile").val(e), $("#max_mile").val(i)), $(
                    "#mile-slider-range").slider({
                    values: [e, i]
                })
            }), $(function() {
                $("#mile-slider-range").slider({
                    range: !0,
                    orientation: "horizontal",
                    min: 0,
                    max: 10199999,
                    values: [0, 10199999],
                    step: 50,
                    slide: function(e, i) {
                        if (i.values[0] == i.values[1]) return !1;
                        $("#min_mile").val(i.values[0]), $("#max_mile").val(i.values[1])
                    }
                }), $("#min_mile").val($("#mile-slider-range").slider("values", 0)), $("#max_mile").val(
                    $("#mile-slider-range").slider("values", 1))
            }), $("#mile-slider-range,#mile-range-submit").click(function() {
                var e = $("#min_mile").val(),
                    i = $("#max_mile").val();
                $("#searchResults").text("Here List of products will be shown which are cost between " + e +
                    " and " + i + ".")
            })
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".brand-list li").each(function(i) {
                if (i < 6) {
                    $(this).addClass('d-block');
                } else {
                    $(this).addClass('d-none addbrand');
                }
            });

            $("#showMore").on('click', function(e) {
                e.preventDefault();

                let btntxt = $(e.target).html();

                if (btntxt == 'show more') {
                    $(e.target).html('show less');
                } else {
                    $(e.target).html('show more');
                }

                $(".brand-list li").each(function() {
                    if ($(this).hasClass('addbrand')) {
                        $(this).toggleClass('d-none');
                    }
                });
            })
        })
    </script>



    {{-- Populate search form with values --}}
    <script>
        $(document).ready(function() {

            $(".price-btn").click(function() {
                $("input[name='minprice']").val($("#min_price").val());
                $("input[name='maxprice']").val($("#max_price").val());
            });

            $(".cat-anchor").click(function(e) {
                e.preventDefault();
                $("input[name='category_id']").val($(this).data('cat_id'));
                $("#searchForm").trigger('submit');
            });

            $(".brand-check").on("click", function() {
                if ($("input[name='brand_id[]']").length > 0) {
                    $("input[name='brand_id[]']").remove();
                }
                $(".brand-check").each(function() {
                    if ($(this).prop("checked")) {
                        // console.log($(this).prop("checked"));
                        $("#searchForm").append(
                            `<input type="hidden" name="brand_id[]" value="${$(this).val()}">`);
                    }
                });
            });

            $("#selFuel").on('change', function() {
                $("input[name='fuel_type_id']").val($(this).val());
                $("#searchForm").trigger('submit');
            });

            $("#selTransmission").on('change', function() {
                $("input[name='transmission_type_id']").val($(this).val());
                $("#searchForm").trigger('submit');
            });

            $("#selCondition").on('change', function() {
                $("input[name='condition_id']").val($(this).val());
                $("#searchForm").trigger('submit');
            });

            $(".apply-btn").on('click', function() {
                $("#searchForm").trigger('submit');
            });

            $(".sel-sort").on('change', function() {
                $("input[name='sort']").val($(this).val());
                $("#searchForm").trigger('submit');
            });

            $(".sel-view").on('change', function() {
                $("input[name='per_page']").val($(this).val());
                $("#searchForm").trigger('submit');
            });

            $(".sel-view").on('carname', function() {
                $("input[name='carname']").val($(this).val());
                $("#searchForm").trigger('submit');
            });
        })
    </script>

    {{-- get car info --}}
    <script>
        let currentApiData = [],
            locationArray = [],
            conditionsArray = {!! json_encode($derived_conditions) !!},
            brandsArray = {!! json_encode($derived_brands) !!},
            priceArray = [],
            mileArray = [],
            fueltypesArray = [],
            colorsArray = [],
            transmissionArray = [],
            totalPages = 0,
            page = 1,
            per_page = $("input[name='per_page']").val(),
            sort = $("input[name='sort']").val(),
            carname = $("input[name='carname']").val()

        priceArray[0] = $("input[name='minprice']").val();
        priceArray[1] = $("input[name='maxprice']").val();

        function generateCarDivContent(data) {
            // createPagination(totalPages, 1);
            let carDivHtml = "";
            data.forEach((apiDataItem) => {
                // var Carprice = apiDataItem.category == 1 ? apiDataItem.price ? 'R' + apiDataItem.price;
                carDivHtml += `
					<div class="col-lg-6 col-md-6">
						<a target="_blank" class="car-info-box" href='${apiDataItem.siteURL}'">
							<div class="img-area">
								<img class="light-zoom" src="${apiDataItem.imgURL}" alt="">
							</div>
							<div class="content">
								<h4 class="title">
									${apiDataItem.title}
								</h4>
								<ul class="top-meta">
									<li>
										<i class="fas fa-road"></i> ${apiDataItem.mileage}
									</li>
									<li>
										<i class="fas fa-code-branch"></i> ${apiDataItem.transmission}
									</li>
                                    <li>
                                        <img src="{{ asset('assets/front/images/calender-icon.png') }}" alt="" style="filter: grayscale(1);padding-bottom: 6px;">
                                        ${apiDataItem.makeYear}
									</li>
								</ul>
								<ul class="short-info">
									<li class="north-west" title="Position">
										<i class="fas fa-map-marker-alt"></i>
										<p>${apiDataItem.province}</p>
									</li>
									<li class="north-west" title="Fuel Type">
										<i class="fas fa-gas-pump"></i>
										<p>${apiDataItem.fuel_type}</p>
									</li>
									<li class="north-west" title="Color">
										<i class="fas fa-palette"></i>
										<p>${apiDataItem.colour}</p>
									</li>
								</ul>
								<div class="footer-area">
									<div class="left-area">																	
										<p class="price">
											R ${apiDataItem.price}
										</p>																	
									</div>
									<div class="right-area">
										<p class="condition">
											${apiDataItem.new_or_used}
										</p>
									</div>
								</div>
							</div>
						</a>
					</div>
				`;
            });

            $("#loadingDiv").hide();
            $("#carsDiv").show();
            $("#carsDiv").append(carDivHtml);
        }

        function getApiData(page) {
            $("#loadingDiv").show();
            $("#carsDiv").hide();
            $("#carsDiv").html('');

            var isLocation = (JSON.stringify(locationArray)).length;
            $.ajax({
                url: "{{ route('front.carApi') }}",
                data: {
                    "page": page,
                    "per_page": per_page,
                    "locations": JSON.stringify(locationArray),
                    "conditions": JSON.stringify(conditionsArray),
                    "brands": JSON.stringify(brandsArray),
                    "fuel_types": JSON.stringify(fueltypesArray),
                    "colors": JSON.stringify(colorsArray),
                    "transmissions": JSON.stringify(transmissionArray),
                    "prices": JSON.stringify(priceArray),
                    "miles": JSON.stringify(mileArray),
                    "sort": sort,
                    "carname": carname
                },
                type: 'POST',
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    var apiData = data.result;
                    totalPages = data.totalPage;
                    if (apiData.length > 0) {
                        currentApiData = apiData;
                        generateCarDivContent(apiData);
                        if (totalPages == 0) {
                            const element = document.querySelector(".pagination ul");
                            $(".pagination").html("");
                        }
                    } else {
                        $("#loadingDiv").hide();
                        $("#carsDiv").show();
                        $("#carsDiv").html('<h4 style="margin: 0 auto;">Sorry. You have 0 results. </h4>');
                    }
                    // createPagination(totalPages, page);
                    updatePagination(totalPages, page);
                },
                error: function(xhr, status, error) {
                    alert("There's an error unexpectedly. Please try it again.");
                }
            });
        }

        function showDetail(id) {
            let data = currentApiData.find(x => x.id == id);
            if (!data) {
                alert("No detail data. Please try again later.");
                return;
            }

            $("input[name='detail_data']").val(JSON.stringify(data));
            $("#detailForm").submit();
        }


        $('.location-check').change(function() {
            locationArray = [];
            $('.location-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    locationArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $('.condition-check').change(function() {
            conditionsArray = [];
            $('.condition-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    conditionsArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $('.brand-check').change(function() {
            brandsArray = [];
            $('.brand-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    brandsArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $('.fuel-type-check').change(function() {
            fueltypesArray = [];
            $('.fuel-type-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    fueltypesArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $('.color-check').change(function() {
            colorsArray = [];
            $('.color-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    colorsArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $('.transmission-check').change(function() {
            transmissionArray = [];
            $('.transmission-check').each(function() {
                var sThisVal = (this.checked ? $(this).val() : "");
                if (sThisVal != '')
                    transmissionArray.push(sThisVal);
            });
            page = 1;
            createPagination(totalPages, page);
        });

        $(".price-apply-btn").on('click', function() {
            priceArray = [];
            var min_price = $("#min_price").val();
            var max_price = $("#max_price").val();
            priceArray.push(min_price, max_price);
            page = 1;
            createPagination(totalPages, page);
        });

        $(".mile-apply-btn").on('click', function() {
            mileArray = [];
            var min_mile = $("#min_mile").val();
            var max_mile = $("#max_mile").val();
            mileArray.push(min_mile, max_mile);
            page = 1;
            createPagination(totalPages, page);
        });

        $(".carname-btn").on('click', function() {
            mileArray = [];
            carname = $("#carname").val();
            page = 1;
            createPagination(totalPages, page);
        });
    </script>

    {{-- Pagination --}}
    <script>
        const element = document.querySelector(".pagination ul");
        totalPages = parseInt($('#totalPages').val()) + 1;

        //calling function with passing parameters and adding inside element which is ul tag
        element.innerHTML = createPagination(totalPages, page);

        async function createPagination(totalPages, page) {
            await getApiData(page);
            console.log(totalPages);

            if (totalPages == 0) {
                element.innerHTML = "";
                return;
            }
            let liTag = '';
            let active;
            let beforePage = page - 1;
            let afterPage = page + 1;

            if (page > 1) { //show the next button if the page value is greater than 1
                liTag +=
                    `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
            }

            if (page > 2) { //if page value is less than 2 then add 1 after the previous button
                liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;
                if (page > 3) { //if page value is greater than 3 then add this (...) after the first li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                }
            }

            // how many pages or li show before the current li
            if (page == totalPages) {
                beforePage = beforePage - 2;
            } else if (page == totalPages - 1) {
                beforePage = beforePage - 1;
            }
            // how many pages or li show after the current li
            if (page == 1) {
                afterPage = afterPage + 2;
            } else if (page == 2) {
                afterPage = afterPage + 1;
            }

            for (var plength = beforePage; plength <= afterPage; plength++) {
                if (plength > totalPages) { //if plength is greater than totalPage length then continue
                    continue;
                }
                if (plength == 0) { //if plength is 0 than add +1 in plength value
                    plength = plength + 1;
                }
                if (page == plength) { //if page is equal to plength than assign active string in the active variable
                    active = "active";
                } else { //else leave empty to the active variable
                    active = "";
                }
                liTag +=
                    `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;
            }

            if (page < totalPages -
                1) { //if page value is less than totalPage value by -1 then show the last li or page
                if (page < totalPages -
                    2
                ) { //if page value is less than totalPage value by -2 then add this (...) before the last li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                }
                liTag +=
                    `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;
            }

            if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
                liTag +=
                    `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
            }

            if (totalPages == 1) {
                liTag = '<li class=" numb active " onclick="createPagination(totalPages, 1) "><span>1</span></li>';
            }
            element.innerHTML = liTag; //add li tag inside ul tag
            return liTag; //reurn the li tag
        }


        function updatePagination(totalPage, page) {
            if (totalPage == 0) {
                element.innerHTML = "";
                return;
            }
            let liTag = '';
            let active;
            let beforePage = page - 1;
            let afterPage = page + 1;
            if (page > 1) { //show the next button if the page value is greater than 1
                liTag +=
                    `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
            }

            if (page > 2) { //if page value is less than 2 then add 1 after the previous button
                liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;
                if (page > 3) { //if page value is greater than 3 then add this (...) after the first li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                }
            }

            // how many pages or li show before the current li
            if (page == totalPages) {
                beforePage = beforePage - 2;
            } else if (page == totalPages - 1) {
                beforePage = beforePage - 1;
            }
            // how many pages or li show after the current li
            if (page == 1) {
                afterPage = afterPage + 2;
            } else if (page == 2) {
                afterPage = afterPage + 1;
            }

            for (var plength = beforePage; plength <= afterPage; plength++) {
                if (plength > totalPages) { //if plength is greater than totalPage length then continue
                    continue;
                }
                if (plength == 0) { //if plength is 0 than add +1 in plength value
                    plength = plength + 1;
                }
                if (page == plength) { //if page is equal to plength than assign active string in the active variable
                    active = "active";
                } else { //else leave empty to the active variable
                    active = "";
                }
                liTag +=
                    `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;
            }

            if (page < totalPages - 1) { //if page value is less than totalPage value by -1 then show the last li or page
                if (page < totalPages -
                    2) { //if page value is less than totalPage value by -2 then add this (...) before the last li or page
                    liTag += `<li class="dots"><span>...</span></li>`;
                }
                liTag +=
                    `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;
            }

            if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
                liTag +=
                    `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
            }
            if (totalPages == 1) {
                liTag = '<li class=" numb active " onclick="createPagination(totalPages, 1) "><span>1</span></li>';
            }
            element.innerHTML = liTag; //add li tag inside ul tag
            return liTag; //reurn the li tag
        }
    </script>
@endsection
