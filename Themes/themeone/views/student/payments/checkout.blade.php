@extends($layout)

@push('js_head')
    @php
        $isProd = app()->environment(['local', 'staging', 'testing', 'dev', 'development']) == false;
        
        $snapScript = 'https://app.sandbox.midtrans.com/snap/snap.js';
        
        if ($isProd) {
            $snapScript = 'https://app.midtrans.com/snap/snap.js';
        }
        
        $snapClientKey = config('midtrans.MIDTRANS_CLIENT_KEY');
        $snapTokenQuery = request()->query('md_snap_token', null);
    @endphp
    <script src="{{ $snapScript }}" data-client-key="{{ $snapClientKey }}"></script>

    @if ($snapTokenQuery)
        <script>
            function triggerSnapUI() {
                window.snap.pay("{{ $snapTokenQuery }}");
            }

            window.addEventListener("DOMContentLoaded", triggerSnapUI);
        </script>
    @endif
@endpush


@section('content')



    <div id="page-wrapper" ng-init="intilizeData({{ $item }})" ng-controller="couponsController">

        {!! Form::open(['url' => URL_PAYNOW . $item->slug, 'method' => 'POST', 'id' => 'payform']) !!}

        <input type="hidden" name="item_name" id="item_name" ng-model="item_name" value="{{ $item->slug }}">

        <input type="hidden" name="gateway" id="gateway" value="">

        <input type="hidden" name="type" ng-model="item_type" value="{{ $item_type }}">

        <input type="hidden" name="is_coupon_applied" id="is_coupon_applied" value="0">

        <input type="hidden" name="coupon_id" id="coupon_id" value="0">

        <input type="hidden" name="actual_cost" id="actual_cost" value="{{ $item->cost }}">

        <input type="hidden" name="discount_availed" id="discount_availed" value="0">

        <input type="hidden" name="after_discount" id="after_discount" value="{{ $item->cost }}">

        <input type="hidden" name="parent_user" value="{{ $parent_user }}">

        <?php
        
        $selected_child_id = 0;
        
        if ($parent_user) {
            if (count($children)) {
                $selected_child_id = $children[0]->id;
            }
        }
        
        ?>

        <input type="hidden" name="parent_user" value="{{ $parent_user }}">

        <input type="hidden" id="selected_child_id" name="selected_child_id" value="{{ $selected_child_id }}">

        {!! Form::close() !!}


        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">

                <div class="col-lg-12">

                    <ol class="breadcrumb">

                        <li><a href="{{ PREFIX }}"><i class="mdi mdi-home"></i></a> </li>

                        @if ($item_type == 'combo' || $item_type == 'exam')
                            <li> <a href="{{ URL_STUDENT_EXAM_SERIES_LIST }}">{{ getPhrase('exam_series') }} </a> </li>
                        @else
                            <li> <a href="{{ URL_STUDENT_LMS_SERIES }}">{{ getPhrase('learning_management_series') }} </a>
                            </li>
                        @endif

                        <li class="active"> {{ $title }} </li>

                    </ol>

                </div>

            </div>

            <!-- /.row -->

            <div class="panel panel-custom">

                <div class="panel-heading">
                    <h1>{{ getPhrase('checkout') }}</h1>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="checkout-table-heading">
                            <div class="col-md-6"><strong>{{ getPhrase('item') }}</strong></div>
                            <div class="col-md-3 text-right"><strong>{{ getPhrase('cost') }}</strong></div>
                            <div class="col-md-3 text-right"><strong>{{ getPhrase('total') }}</strong></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="ordered-item">

                            <div class="col-md-6 centered">

                                <div class="box">



                                    <?php
									$image = IMAGE_PATH_UPLOAD_LMS_DEFAULT;
									if($item_type=='combo' || $item_type=='lms' || $item_type == 'subscribe')	{

										if($item->image)

											$image = IMAGE_PATH_UPLOAD_SERIES_THUMB.$item->image;

										$image_path = $image;

										if($item_type=='lms') {

											if($item->image)

											$image_path = IMAGE_PATH_UPLOAD_LMS_SERIES_THUMB.$item->image;

										}

									?>


                                    <i class="icon">
                                        <img class="icon-images" src="{{ $image_path }}" alt="{{ $item->title }}"
                                            height="70" width="70">
                                    </i>

                                    <?php } ?>

                                    <h3>{{ $item->name }}</h3>
                                    <p>{{ getPhrase('valid_for') . ' ' . $item->validity . ' ' }}
                                        @if ('subscribe' === $item_type)
                                            {{ str_plural($item->validity_type, $item->validity) }}
                                        @else
                                            {{ getPhrase('days') }}
                                        @endif
                                    </p>

                                </div>

                            </div>

                            <div class="col-md-3  text-right">
                                <strong>{{ getCurrencyCode() . ' ' . idrFormat($item->cost) }}</strong>
                            </div>

                            <div class="col-md-3  text-right">
                                <strong>{{ getCurrencyCode() . ' ' . idrFormat($item->cost) }}</strong>
                            </div>

                        </div>

                    </div>



                    <div class="row">

                        <div class="ordered-item">



                            <div class="col-md-6 centered">

                                <div class="apply-coupon">

                                    @if (getSetting('coupons', 'module') == '1')
                                        <div class="input-group">

                                            <input type="text" ng-model="coupon_code" class="form-control apply-input-lg"
                                                placeholder="{{ getPhrase('enter_coupon_code') }}" ng-disabled="isApplied">

                                            <span class="input-group-btn">

                                                <button class="btn btn-success button apply-input-button"
                                                    ng-click="validateCoupon('{{ $item->slug }}','{{ $item_type }}', {{ $item->cost }}, {{ $selected_child_id }})"
                                                    type="button"
                                                    ng-disabled="isApplied">{{ getPhrase('apply') }}</button>

                                            </span>

                                        </div>
                                    @endif

                                </div>

                            </div>



                            <div class="col-md-6 ">

                                <ul class="budget">

                                    <li>

                                        <p class="pull-left light">{{ getPhrase('cart_subtotal') }}</p>

                                        <p class="pull-right">{{ getCurrencyCode() . ' ' . idrFormat($item->cost) }}</p>


                                    </li>

                                    <li>

                                        <p class="pull-left light">{{ getPhrase('discount') }}</p>

                                        <p class="pull-right">{{ getCurrencyCode() }}
                                            <span contenteditable="false" ng-bind="ngdiscount">0</span>
                                        </p>

                                    </li>

                                    <hr>

                                    <li class="order-total">

                                        <p class="pull-left">{{ getPhrase('order_total') }}</p>

                                        <p class="pull-right ">{{ getCurrencyCode() }}

                                            <span contenteditable="false"
                                                ng-bind="ngtotal">{{ idrFormat($item->cost) }}</span>
                                        </p>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>



                    @if ($parent_user)

                        @if (count($children))
                            <div id="childrens_list_div">
                                @include('student/payments/childrens-list', [
                                    'children' => $children,
                                    'item_type' => $item_type,
                                    'item_id' => $item->id,
                                ])
                            </div>
                        @else
                            <h3>{{ getPhrase('please_add_children_to_continue_payment') }}</h3>
                        @endif

                    @endif



                    <?php
                    
                    $is_eligible_for_payment = true;
                    $razorpay_gateway = 0;
                    
                    if ($parent_user) {
                        if (!count($children)) {
                            $is_eligible_for_payment = false;
                        }
                    }
                    
                    ?>

                    @if ($is_eligible_for_payment)

                        <div class="row">

                            <div class="col-md-12 text-center">

                                <div class="payment-type">

                                    <div class="text-center">



                                        <?php

									$payu = getSetting('payu', 'module');

									$paypal = getSetting('paypal', 'module');

									$offline = getSetting('offline_payment', 'module');

									$razorpay_gateway = getSetting('razorpay', 'module');

									$midtrans = '1';

                                    if($razorpay_gateway == '1'){


                                   ?>

                                        
                                        <?php }

									if($payu == '1'){

									?>

                                        
                                        <?php }



									if($paypal=='1') {

									?>



                                       

                                        <?php }

									if($offline=='1') {

									?>

                                        <button type="submit" class="btn-lg btn button btn-info"
                                            onclick="submitForm('offline');" data-toggle="tooltip" data-placement="right"
                                            title="{{ getPhrase('click_here_to_update_payment_details') }}"><i
                                                class="fa fa-money"></i> {{ getPhrase('offline_payment') }}</button>

                                        <?php } if ($midtrans=='1') { ?>

                                        @if ($snapTokenQuery)
                                            <button type="submit" class="btn-lg btn button btn-info"
                                                onclick="triggerSnapUI()"><i class="fa fa-money"></i> Bayar</button>
                                        @else
                                            <button type="submit" class="btn-lg btn button btn-info"
                                                onclick="submitForm('midtrans');"><i class="fa fa-money"></i>
                                                Bayar</button>
                                        @endif

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>



        <script type="text/javascript">
            function submitForm(gatewayType) {

                $('#gateway').val(gatewayType);

                $('#payform').submit();

            }
        </script>

    </div>
    <!-- /#page-wrapper -->
@stop

@section('footer_scripts')

    @include('coupons.scripts.js-scripts', ['item' => $item])

    @include('common.alertify')

@stop
