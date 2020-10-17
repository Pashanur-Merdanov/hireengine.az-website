<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ $headerData->translation->meta_details['title'] ?: 'Hireengine' }}</title>
        <!-- Favicon icon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="{{ $headerData->translation->meta_details['title'] ?: '' }}">
        <meta name="description" content="{{ $headerData->translation->meta_details['description'] ?: '' }}">
        <meta name="keywords" content="{{ $headerData->translation->meta_details['keywords'] ?: '' }}">
        <link href="{{ asset('saas-front/css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('saas-front/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('saas-front/css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('saas-front/css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />

        <link href="{{ asset('froiden-helper/helper.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/node_modules/sweetalert/sweetalert.css') }}" rel="stylesheet">


        <link href="{{ asset('saas-front/css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('saas-front/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('assets/node_modules/switchery/dist/switchery.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Sans+serif:200,300,400,400i,500,600,700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
        <link rel='stylesheet prefetch'
              href='//cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
        <link rel="stylesheet" href="{{ asset('saas-front/css/bootstrap-select.min.css') }}">

        <script src="https://www.google.com/recaptcha/api.js"></script>

            @if($headerData->header_background_color != '')
            <style>
                .background-color {
                    border: none;
                    background: {{ $headerData->header_background_color }}
                }

                #header-section {
                    background: {{ $headerData->header_background_color }}
                }

                .feature-icon {
                    color: {{ $headerData->header_background_color }}
                }

            </style>
            @endif

            @if($headerData->header_backround_image != '')
            <style>
                #header-section {
                    background: url("{{ $headerData->header_backround_image_url }}");
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }

                #header-section:before {
                    content: "";
                    position: absolute;
                    left: 0; right: 0;
                    top: 0; bottom: 0;
                    background: rgba(0,0,0,.3);
                }
            </style>
            @endif

            @if($headerData->custom_css != '')
                <style>
                    {!! $headerData->custom_css !!}
                </style>
            @endif
        <style>
            .language-switcher {
                font-size: 14px;
                text-align: center;
                padding: 5px 20px;
                font-weight: 600;
            }
            .language-switcher button {
                padding:3px !important;
                background: #fff;
            }
            .language-switcher button:hover {
                background: #fff;
                -webkit-transform: none !important;
            }
            .language-switcher.show > .btn-light.dropdown-toggle{
                background-color: #fff !important;
            }
            .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
                width: 94px;
            }

        </style>

    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="index.html">
                                <img class="logo logo-dark" alt="logo" src="{{ $headerData->logo_url }}" />
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs pos-fixed">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="{{ url('/')}}">
                                    <img class="logo logo-dark" alt="logo" src="{{ $headerData->logo_url }}" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                            <div class="bar__module">
                                <ul class="menu-horizontal text-left">
                                    <li class="dropdown">
                                        <a class="inner-link" href="#header-section">@lang('menu.home')</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="inner-link" href="#features">@lang('menu.features')</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="inner-link" href="#pricing">@lang('menu.pricing')</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="inner-link" href="#contact">@lang('menu.contact')</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="bar__module">
                                <select name="language_selecter" class=" selectpicker language-switcher" id="language_switcher">
                                    @forelse ($languages as $language)
                                    <option
                                            @if (\Cookie::has('language_code') && \Cookie::get('language_code') == $language->language_code)
                                            selected
                                            @elseif(app()->getLocale() == $language->language_code)
                                            selected
                                            @endif
                                            value="{{ $language->language_code }}" data-content=' <span style="margin-top: 10px;" class="flag-icon  @if($language->language_code == 'en') flag-icon-us @else  flag-icon-{{ $language->language_code }} @endif"></span> {{ ucfirst($language->language_code) }}'>{{ ucfirst($language->language_code) }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <!--end module-->
                            <div class="bar__module">
                                @if($headerData->show_login_in_menu)
                                    <a class="btn btn--sm type--capitalize" href="{{ module_enabled('Subdomain')?route('front.workspace'):route('login') }}">
                                    <span class="btn__text">
                                        @lang('app.login')
                                    </span>
                                </a>
                                @endif

                                @if($headerData->show_register_in_menu)
                                <a class="btn btn--sm btn--primary type--capitalize "style="background-color: #4145a0; border-color: #4145a0;" href="{{ route('register') }}">
                                    <span class="btn__text">
                                        @lang('app.register')
                                    </span>
                                </a>
                                @endif
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>

        </div>
        <div class="main-container">
            <section class="switchable switchable--switch bg--primary" id="header-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5 col-md-7">
                            <div class="mt--2">
                                <h1> {{ $headerData->translation->title }} </h1>
                                <p class="lead"> {!! $headerData->translation->description !!} </p>

                                @if($headerData->show_register_in_header)
                                <a class="btn btn--primary type--capitalize" href="{{ route('register') }}">
                                    <span class="btn__text" style="color: #4145a0;">
                                        @lang('app.register')
                                    </span>
                                </a>
                                @endif

                                @if($headerData->show_login_in_header)
                                <a class="btn btn--primary type--capitalize" href="{{ route('login') }}">
                                    <span class="btn__text">
                                        @lang('app.login')
                                    </span>
                                </a>
                                @endif

                        <span class="block type--fine-print"><br></span> </div>
                        </div>
                        <div class="col-lg-7 col-md-5 col-12"> <img alt="Image" src="{{ $headerData->header_image_url }}"> </div>
                    </div>
                </div>
            </section>

            <section class=" " style="padding: 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider slider--inline-arrows slider--arrows-hover text-center" data-arrows="true">
                                <ul class="slides">
                                    @forelse($featuredCompanies as $featuredCompany)
                                    <li class="col-md-3 col-6">
                                        <a href="{{ route('jobs.jobOpenings',$featuredCompany->career_page_link) }}" target="_blank">
                                            <img alt="Image" class="image--xs" src="{{ $featuredCompany->logo_url }}" />
                                        </a>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end of container-->
            </section>

            <div id="features">
            @foreach ($imageFeatures as $key=>$item)
                <section @if($key%2 == 0) class="switchable feature-large" @else class="switchable feature-large  switchable--switch bg--secondary" @endif>
                    <div class="container">
                        <div class="row justify-content-around">
                            <div class="col-md-6"> <img alt="{{ $item->translation->title }}" class="border--round box-shadow-wide" src="{{ $item->image_url }}"> </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="switchable__text">
                                    <h2>{{ ucfirst($item->translation->title) }}</h2>
                                    <p class="lead">{{ ucfirst($item->translation->description) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach

            @if(count($iconFeatures) > 0)
                <section class="text-center">
                    <div class="container">
                        <div class="row">
                            @foreach ($iconFeatures as $item)
                                <div class="col-md-6 col-lg-3">
                                    <div class="text-block boxed boxed--sm boxed--border"> <i class="feature-icon icon--sm {{ $item->icon }} color--dark"></i>
                                        <h5>{{ ucfirst($item->translation->title) }}</h5>
                                        <p>{{ ucfirst($item->translation->description) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            </div>

            @if(count($feedbacks) > 0)
            <section class="text-center bg--dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10">
                            <div class="slider" data-paging="true">
                                <ul class="slides">
                                    @foreach ($feedbacks as $item)
                                        <li>
                                            <div class="testimonial">
                                            <blockquote> “{{ ucfirst($item->translation->feedback) }}” </blockquote>
                                                <h5>{{ ucfirst($item->translation->client_title) }}</h5></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

            <section class="pricing-section-2 text-center" id="pricing">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            @lang('app.monthlyPackages')  <input id="package-switch" @if($global->package_type == 'annual') checked @endif type="checkbox" class="js-switch" />  @lang('app.yearlyPackages')
                        </div>
                        @foreach ($packages as $item)
                        <div class="col-md-6 col-lg-4 monthly-packages">
                            <div class="pricing pricing-3">
                                @if($item->recommended)
                                    <div class="pricing__head bg--primary boxed background-color"> <span class="label">@lang('modules.saasFront.recommended')</span>
                                        <h5>{{ ucwords($item->name) }}</h5> <span class="h1"><span class="pricing__dollar">{{ $global->currency->currency_symbol }}</span>{{ $item->monthly_price }}</span>
                                        <p class="type--fine-print">@lang('app.PerMonth'), {{ $global->currency->currency_code }}.</p>
                                    </div>
                                @else
                                    <div class="pricing__head bg--secondary boxed">
                                    <h5>{{ ucwords($item->name) }}</h5> <span class="h1"><span class="pricing__dollar">{{ $global->currency->currency_symbol }}</span>{{ $item->monthly_price }}</span>
                                        <p class="type--fine-print">@lang('app.PerMonth'), {{ $global->currency->currency_code }}.</p>
                                    </div>
                                @endif
                                <ul>
                                    @if ($item->career_website)
                                        <li>
                                            <span>@lang('modules.saasFront.careerWebsite')</span>
                                        </li>
                                    @endif
                                    @if ($item->multiple_roles)
                                        <li>
                                            <span>@lang('modules.saasFront.multipleRoles')</span>
                                        </li>
                                    @endif
                                    <li>
                                        <span>{!! ($item->no_of_job_openings > 0) ? $item->no_of_job_openings : "" !!} @lang('app.Unlimited') @lang('modules.saasFront.activeJobs')</span>
                                    </li>
                                    <li>
                                        <span>{!! ($item->no_of_candidate_access > 0) ? $item->no_of_candidate_access : ""  !!} @lang('app.Unlimited') @lang('modules.saasFront.candidateAccess')</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($packages as $item)
                        <div class="col-md-6 col-lg-4 annual-packages" style="display:none;">
                            <div class="pricing pricing-3">
                                @if($item->recommended)
                                    <div class="pricing__head bg--primary boxed background-color"> <span class="label">@lang('modules.saasFront.recommended')</span>
                                        <h5>{{ ucwords($item->name) }}</h5> <span class="h1"><span class="pricing__dollar">{{ $global->currency->currency_symbol }}</span>{{ $item->annual_price }}</span>
                                        <p class="type--fine-print">@lang('app.yearlyPackages'), {{ $global->currency->currency_code }}.</p>
                                    </div>
                                @else
                                    <div class="pricing__head bg--secondary boxed">
                                    <h5>{{ ucwords($item->name) }}</h5> <span class="h1"><span class="pricing__dollar">{{ $global->currency->currency_symbol }}</span>{{ $item->annual_price }}</span>
                                        <p class="type--fine-print">@lang('app.yearlyPackages'), {{ $global->currency->currency_code }}.</p>
                                    </div>
                                @endif
                                <ul>
                                    @if ($item->career_website)
                                        <li>
                                            <span>@lang('modules.saasFront.careerWebsite')</span>
                                        </li>
                                    @endif
                                    @if ($item->multiple_roles)
                                        <li>
                                            <span>@lang('modules.saasFront.multipleRoles')</span>
                                        </li>
                                    @endif
                                    <li>
                                        <span>{!! ($item->no_of_job_openings > 0) ? $item->no_of_job_openings : "" !!} @lang('app.Unlimited') @lang('modules.saasFront.activeJobs')</span>
                                    </li>
                                    <li>
                                        <span>{!! ($item->no_of_candidate_access > 0) ? $item->no_of_candidate_access : "" !!} @lang('app.Unlimited') @lang('modules.saasFront.candidateAccess')</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </section>
            <section class="text-center imagebg" data-gradient-bg="#4876BD,#5448BD,#8F48BD,#BD48B1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <div class="cta">
                                <h2>{{ $headerData->translation->call_to_action_title }}</h2>

                                @if($headerData->call_to_action_button == 'login')
                                <a class="btn btn--primary type--capitalize" style="background-color: white; border-color: white;" href="{{ route('login') }}">
                                    <span class="btn__text" style="color: #4145a0;">
                                        @lang('app.login')
                                    </span>
                                </a>
                                @endif

                                @if($headerData->call_to_action_button == 'register')
                                <a class="btn btn--primary type--capitalize background-color" href="{{ route('register') }}">
                                    <span class="btn__text">
                                        @lang('app.register')
                                    </span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="switchable" id="contact">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                        <p class="lead">{!! $headerData->translation->contact_text !!}</p>
                        </div>
                        <div class="col-md-6 col-12">
                            <form class="ajax-form row mx-0" id="createForm">
                                @csrf
                                <div class="col-md-6 col-12">
                                    <label>@lang('modules.front.yourName'):</label>
                                    <input type="text" name="name" class="validate-required">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>@lang('modules.front.emailAddress'):</label>
                                    <input type="email" name="email" class="validate-required validate-email">
                                </div>
                                <div class="col-md-12 col-12">
                                    <label>@lang('modules.front.message'):</label>
                                    <textarea rows="4" name="message" class="validate-required"></textarea>
                                </div>

                                <div class="col-md-12 col-12">
                                <div class="g-recaptcha" data-sitekey="{{ $global->google_recaptcha_key }}"></div>
                                <br>
                                </div>

                                <div class="col-md-5 col-lg-4 col-6">
                                    <a href="javascript:;" id="save-form" class="btn btn--primary type--capitalize background-color">
                                        <span class="btn__text">@lang('modules.front.sendEnquiry')</span>
                                    </a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="{{ asset('saas-front/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('saas-front/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('saas-front/js/flickity.min.js') }}"></script>
        <script src="{{ asset('saas-front/js/parallax.js') }}"></script>
        <script src="{{ asset('saas-front/js/granim.min.js') }}"></script>
        <script src="{{ asset('saas-front/js/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('saas-front/js/scripts.js') }}"></script>
        <script src="{{ asset('froiden-helper/helper.js') }}"></script>

        <script src="{{ asset('assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
        <script src="{{ asset('assets/node_modules/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/node_modules/switchery/dist/switchery.min.js') }}"></script>
{{--        <script src="{{ asset('assets/plugins/custom-select/custom-select.js') }}"></script>--}}
        <script src="{{ asset('saas-front/js/bootstrap-select.min.js') }}"></script>
        <script>
             var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
            var switchery = new Switchery(html, { size: 'medium' });
            });

            $('#package-switch').change(function () {
                let checked = $(this).is(":checked");
                if(checked) {
                    $('.monthly-packages').hide();
                    $('.annual-packages').show();
                }
                else {
                    $('.annual-packages').hide();
                    $('.monthly-packages').show();
                }
            })

            $('#save-form').click(function (e) {
                @if(!is_null($global->google_recaptcha_key))
                    if(grecaptcha.getResponse().length == 0){
                        e.preventDefault();
                        alert('Please click the reCAPTCHA checkbox');
                        return false;
                    }
                @endif

                $.easyAjax({
                    url: '{{route('contact')}}',
                    container: '#createForm',
                    type: "POST",
                    data: $('#createForm').serialize(),
                    success: function(response) {
                        $('#createForm').trigger("reset");
                        swal("Sent!", "We will contact you soon!", "success");
                    },
                    error: function (response) {
                        swal("Error!", "Your need to fill all the form fields!", "error");
                    }
                })
            });
             $(function () {
                 $('.selectpicker').selectpicker();
             });
             $('#language_switcher').change(function () {
                 var code = $(this).val();
                 var url = '{{ route('changeLanguage', ':code') }}';
                 url = url.replace(':code', code);

                 $.easyAjax({
                     url: url,
                     type: 'POST',
                     container: 'body',
                     data: {
                         _token: '{{ csrf_token() }}'
                     },
                     success: function (response) {
                         if (response.status == 'success') {
                             location.reload();
                         }
                     }
                 })
             })
        </script>
    </body>

</html>
