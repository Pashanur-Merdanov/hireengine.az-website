@extends('layouts.app')

@push('head-script')
<link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
            <div class="card-body">
                <h4 class="card-title">@lang('menu.cmsFeatures')</h4>

                <form id="editSettings" class="ajax-form" >
                    @csrf

                    @foreach($languages as $language)
                    <div class="form-group">
                        <label>@lang('modules.frontCms.title') {{$language->language_code}}</label>
                        <input type="text" class="form-control" id="title-{{$language->id}}" name="translations[{{$language->id}}][title]" value="{!! $feature->translations->firstWhere('language_id', $language->id) != null ? $feature->translations->firstWhere('language_id', $language->id)->getAttribute('title') : "" !!}">
                    </div>
                    <div class="form-group">
                        <label>@lang('modules.frontCms.description') {{$language->language_code}}</label>
                        <textarea name="translations[{{$language->id}}][description]" class="form-control"
                                  id="description-{{$language->id}}" cols="30" rows="4">{!! $feature->translations->firstWhere('language_id', $language->id) != null ? $feature->translations->firstWhere('language_id', $language->id)->getAttribute('description') : "" !!}</textarea>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputPassword1">@lang('modules.frontCms.image')</label>
                        <div class="card">
                            <div class="card-body">
                                <input type="file" id="input-file-now" name="image" class="dropify"
                                    data-default-file="{{ $feature->image_url }}" />
                            </div>
                        </div>
                    </div>

                    <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                        @lang('app.save')
                    </button>
                    <button type="reset" class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-script')
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}" type="text/javascript"></script>


<script>
    var drEvent = $('.dropify').dropify({
            messages: {
                default: '@lang("app.dragDrop")',
                replace: '@lang("app.dragDropReplace")',
                remove: '@lang("app.remove")',
                error: '@lang('app.largeFile')'
            }
        });


        drEvent.on('dropify.afterClear', function(event, element){
//           $('#remove_header_background').val('yes'); 
        });

        $('#add-feature').click(function() {
            $('#editSettings').toggle();
        })

        $('#save-form').click(function () {
            $.easyAjax({
                url: '{{route("superadmin.front-cms.updatefeatures", $feature->id)}}',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });

</script>




@endpush
