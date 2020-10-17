@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-12">
            @if($global->system_update == 1)
                @if(isset($lastVersion))

                    <div class="alert alert-info col-md-12">
                        <div class="col-md-10"><i class="ti-gift"></i> @lang('modules.update.newUpdate') <label class="label label-success">{{ $lastVersion }}</label>
                        </div>
                    </div>
                @endif
            @endif
            @if (!$user->mobile_verified && $smsSettings->nexmo_status == 'active')
                <div id="verify-mobile-info">
                    <div class="alert alert-info col-md-12" role="alert">
                        <div class="row">
                            <div class="col-md-10 d-flex align-items-center">
                                <i class="fa fa-info fa-3x mr-2"></i>
                                @lang('messages.info.verifyAlert')
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-end">
                                <a href="{{ route('superadmin.profile.index') }}" class="btn btn-warning">
                                    @lang('menu.profile')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @if(!is_null($packageData) && $paymentSetting->stripe_status == 'active')

                <div class="alert alert-danger col-md-12">
                    <div class="col-md-12"><b><i class="ti-info"></i>@lang('app.setStripePlanID'): </b> @lang('messages.stripePlanIdRequired') <a    href="{{ route('superadmin.packages.index') }}">  <button class="btn btn-warning btn-sm ">@lang('menu.packages')</button></a>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card" style="border-radius: 15px;">
                <div class="box bg-light text-center" style="background:transparent; border:3px solid #f8f9fa; border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                    <h1 class="font-light" style="color: #4145a0;"  >{{ $totalCompanies }}</h1>
                    <h6 class="" style="color: #4145a0;margin-right: 23px;" > <div class="foo blue" style="float: left;width: 35px;height: 18px;margin-left: 10px;background:  #0000ff;border-radius: 4px;" ></div>@lang('modules.dashboard.totalCompanies')</h6>
                </div>
            </div>
        </div>
        <!-- Column -->

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card" style="border-radius: 15px;">
                <div class="box bg-light text-center "style="background:transparent; border:3px solid #f8f9fa;border-radius: 15px; box-shadow: 3px 3px 3px #888888;" >
                    <h1 class="font-light" style="color: #4145a0;">{{ $activeCompanies }}</h1>
                    <h6 class="" style="color: #4145a0;margin-right: 23px;"><div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:  #228B22;"></div>@lang('modules.dashboard.activeCompanies')</h6>
                </div>
            </div>
        </div>
        <!-- Column -->

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card" style="border-radius: 15px;">
                <div class="box bg-light text-center "style="background:transparent; border:3px solid #f8f9fa;border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                    <h1 class="font-light" style="color: #4145a0;">{{ $inactiveCompanies }}</h1>
                    <h6 class="" style="color: #4145a0;margin-right: 23px;"><div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:  #ff0000;"></div>@lang('modules.dashboard.inactiveCompanies')</h6>
                </div>
            </div>
        </div>
        <!-- Column -->

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card" style="border-radius: 15px;">
                <div class="box bg-light text-center "style="background:transparent; border:3px solid #f8f9fa;border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                    <h1 class="font-light" style="color: #4145a0;" >{{ $totalPackages }}</h1>
                    <h6 class="" style="color: #4145a0;margin-right: 23px;"><div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:  #0e97ff;"></div>@lang('modules.dashboard.totalPackages')</h6>
                </div>
            </div>
        </div>
        <!-- Column -->

        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card" style="border-radius: 15px;">
                <div class="box bg-light text-center  "style="background:transparent; border:3px solid #f8f9fa;border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                    <h1 class="font-light" style="color: #4145a0;">{{ $pendingRenewal }}</h1>
                    <h6 class="" style="color: #4145a0;margin-right: 23px;"><div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:  lawngreen;"></div>@lang('modules.dashboard.pendingRenewal')</h6>
                </div>
            </div>
        </div>
        <!-- Column -->


    </div>
    <div class="modal fade bs-modal-md in" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModal"
         aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Do you like recruit saas? Help us Grow :)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="note note-info font-14">

                        We hope you love it. If you do, would you mind taking 10 seconds to leave me a short review on codecanyon?
                        <br>
                        This helps us to continue providing great products, and helps potential buyers to make confident decisions.
                        <hr>
                        Thank you in advance for your review and for being a preferred customer.

                        <hr>

                        <p class="text-center">
                            <a href="{{\Froiden\Envato\Functions\EnvatoUpdate::reviewUrl()}}"> <img src="{{asset('front/assets/img/recruit-saas-review.png')}}" alt=""></a>
                            <button type="button" class="btn btn-link" data-dismiss="modal" onclick="hideReviewModal('closed_permanently_button_pressed')">Hide Pop up permanently</button>
                            <button type="button" class="btn btn-link" data-dismiss="modal" onclick="hideReviewModal('already_reviewed_button_pressed')">Already Reviewed</button>
                        </p>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{\Froiden\Envato\Functions\EnvatoUpdate::reviewUrl()}}" target="_blank" type="button" class="btn btn-success">Give Review</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('footer-script')
    <script>
        @if(\Froiden\Envato\Functions\EnvatoUpdate::showReview())
        $(document).ready(function () {
            $('#reviewModal').modal('show');
        })
        function hideReviewModal(type) {
            var url = "{{ route('hide-review-modal',':type') }}";
            url = url.replace(':type', type);

            $.easyAjax({
                url: url,
                type: "GET",
                container: "#reviewModal",
            });
        }
        @endif
    </script>
@endpush
