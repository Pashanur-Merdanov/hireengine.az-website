<style>
    .stripe-button-el{
        display: none;
    }
</style>
<div id="event-detail">
    <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-cash"></i> Choose Payment Method</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    </div>
    <div class="modal-body">
        <div class="form-body button-center">
            <div class="row">
                    <div class="col-12 col-sm-12 mt-40 text-center">
                        <div class="d-flex justify-content-center flex-wrap">
                        @if($stripeSettings->paypal_client_id != null && $stripeSettings->paypal_secret != null && $stripeSettings->paypal_status == 'active')
                            <button type="submit" class="btn btn-warning waves-effect mx-2 waves-light paypalPayment pull-left" data-toggle="tooltip" data-placement="top" title="Choose Plan">
                                <i class="icon-anchor display-small"></i><span>
                                        <i class="fa fa-paypal"></i> @lang('app.payPaypal')</span>
                            </button>
                        @endif
                        @if($stripeSettings->razorpay_key != null && $stripeSettings->razorpay_secret != null  && $stripeSettings->razorpay_status == 'active')
                            <button type="submit" class="btn btn-info waves-effect mx-2 waves-light pull-left m-l-10" onclick="razorpaySubscription();" data-toggle="tooltip" data-placement="top" title="Choose Plan">
                                <i class="icon-anchor display-small"></i><span>
                                        <i class="fa fa-credit-card-alt"></i> RazorPay </span>
                            </button>
                        @endif
                        @if($stripeSettings->api_key != null && $stripeSettings->api_secret != null  && $stripeSettings->stripe_status == 'active')
                            <div class="">
                                <form action="{{ route('admin.payments.stripe') }}" method="POST">
                                <input type="hidden" name="plan_id" value="{{ $package->id }}">
                                <input type="hidden" name="type" value="{{ $type }}">
                                {{ csrf_field() }}
                                <script
                                        src="https://checkout.stripe.com/checkout.js"
                                        class="stripe-button d-flex flex-wrap justify-content-between align-items-center"
                                        data-email="{{ $user->email }}"
                                        data-key="{{ config('services.stripe.key') }}"
                                        @if($type == 'annual')
                                        data-amount="{{ round($package->annual_price) * 100 }}"
                                        @else
                                        data-amount="{{ round($package->monthly_price) * 100 }}"
                                        @endif
                                        data-button-name="Choose Plan"
                                        data-description="Payment through debit card."
                                        data-image="{{ $logo }}"
                                        data-locale="auto"
                                        data-currency="{{ $superSettings->currency->currency_code }}">
                                </script>

                                <button type="submit" class="btn btn-success mx-2 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Choose Plan">
                                    <i class="icon-anchor display-small"></i><span>
                                <i class="fa fa-cc-stripe"></i> @lang('app.payStripe')</span></button>
                            </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
    </div>
</div>
<script src="{{ asset('pricing/js/index.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // redirect on paypal payment page
    $('body').on('click', '.paypalPayment', function(){
        $.easyBlockUI('#package-select-form', 'Redirecting Please Wait...');
        var url = "{{ route('admin.paypal', [$package->id, $type]) }}";
        window.location.href = url;
    });
    //Confirmation after transaction
    function razorpaySubscription() {
        var plan_id = '{{ $package->id }}';
        var type = '{{ $type }}';
        $.easyAjax({
            type:'POST',
            url:'{{route('admin.subscribe.razorpay-subscription')}}',
            data: {plan_id: plan_id,type: type,_token:'{{csrf_token()}}'},
            success:function(response){
                razorpayPaymentCheckout(response.subscriprion)
            }
        })
    }

    //Razorpay payment checkout
    function razorpayPaymentCheckout(subscriptionID) {
        var options = {
            "key": "{{ $stripeSettings->razorpay_key }}",
            "subscription_id":subscriptionID,
            "name": "{{$companyName}}",
            "description": "{{ $package->description }}",
            "image": "{{ $logo }}",
            "handler": function (response){
                confirmRazorpayPayment(response);
            },
            "notes": {
                "package_id": '{{ $package->id }}',
                "package_type": '{{ $type }}',
                "company_id": '{{ $company->id }}'
            },
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    }

    //Confirmation after transaction
    function confirmRazorpayPayment(response) {
        var plan_id = '{{ $package->id }}';
        var type = '{{ $type }}';
        var payment_id = response.razorpay_payment_id;
        var subscription_id = response.razorpay_subscription_id;
        var razorpay_signature = response.razorpay_signature;
        $.easyAjax({
            type:'POST',
            url:'{{route('admin.subscribe.razorpay-payment')}}',
            data: {paymentId: payment_id,plan_id: plan_id,subscription_id: subscription_id,type: type,razorpay_signature: razorpay_signature,_token:'{{csrf_token()}}'},
            redirect:true,
        })
    }
</script>

