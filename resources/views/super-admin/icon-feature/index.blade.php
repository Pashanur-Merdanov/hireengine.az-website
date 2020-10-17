@extends('layouts.app')

@push('head-script')
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/iconpicker/css/fontawesome-iconpicker.css') }}">
@endpush


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
            <div class="card-body">
                <h4 class="card-title">@lang('menu.iconFeatures')</h4>

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <a href="javascript:;" id="add-feature" class="btn btn-success btn-sm"><i
                                class="fa fa-plus"></i> @lang('app.add') @lang('app.feature')</a>
                    </div>
                </div>

                <form id="editSettings" class="ajax-form">
                    @csrf

                    @foreach($languages as $language)
                    <div class="form-group" style="width: 48%;">
                        <label>@lang('modules.frontCms.title') {{$language->language_code}}</label>
                        <input type="text" class="form-control" id="title-{{$language->id}}"
                               name="translations[{{$language->id}}][title]">
                    </div>
                    <div class="form-group" style="width: 48%;margin-left: 50%;margin-top:-100px;padding: 20px;">
                        <label>@lang('modules.frontCms.description') {{$language->language_code}}</label>
                        <textarea name="translations[{{$language->id}}][description]" class="form-control" id="description-{{$language->id}}" cols="30"
                            rows="4"></textarea>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputPassword1">@lang('modules.frontCms.icon')</label>
                        <div class="btn-group">
                            <button data-selected="graduation-cap" type="button"
                                    class="icp icp-dd btn btn-sm btn-outline-secondary dropdown-toggle iconpicker-component"
                                    data-toggle="dropdown">
                                <i class="fa fa-fw"></i>
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu"></div>
                            <input class="" name="icon" id="iconInput" type="hidden"/>
                        </div>
                    </div>

                    <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                        @lang('app.save')
                    </button>
                    <button type="reset" class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
                </form>
                
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th style="width: 20px">#</th>
                            <th>@lang('modules.frontCms.icon')</th>
                            <th>@lang('modules.frontCms.title')</th>
                            <th>@lang('app.action')</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($features as $key=>$item)
                        <tr id="row-{{ $item->id }}">
                            <td>{{ $key+1 }}.</td>
                            <td><i class="{{ $item->icon }}"></i></td>
                            <td>{{ ucfirst($item->translation->title) }}</td>
                            <td>
                                <a href="{{ route('superadmin.icon-features.edit', $item->id) }}"
                                    class="btn btn-light btn-circle" data-toggle="tooltip" style="background-color: #4145a0; border-color: #4145a0;"
                                    data-original-title="@lang('app.edit')"><i class="fa fa-pencil" style="color: white;"
                                        aria-hidden="true"></i></a>

                                <a href="javascript:;" class="btn btn-danger btn-circle sa-params" data-toggle="tooltip"
                                    data-row-id="{{ $item->id }}" data-original-title="@lang('app.delete')"><i
                                        class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer-script')
<script src="{{ asset('assets/plugins/iconpicker/js/fontawesome-iconpicker.js') }}"></script>


<script>

$('.icp-dd').iconpicker({
        title: 'Dropdown with picker',
        component:'.btn > i',
        templates: {
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
    $(function () {
        $('.icp').on('iconpickerSelected', function (e) {
           $('#iconInput').val(e.iconpickerValue);
        });
    });
    
        $('#add-feature').click(function() {
            $('#editSettings').toggle();
        })

        $('#save-form').click(function () {
            $.easyAjax({
                url: '{{route("superadmin.icon-features.store")}}',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });

        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('row-id');
            swal({
                title: "@lang('errors.areYouSure')",
                text: "@lang('errors.deleteWarning')",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('app.delete')",
                cancelButtonText: "@lang('app.cancel')",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "{{ route('superadmin.icon-features.destroy',':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                                $('#row-'+id).remove();
                            }
                        }
                    });
                }
            });
        });

</script>




@endpush
