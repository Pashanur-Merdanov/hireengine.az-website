@extends('layouts.app') @push('head-script')
<link rel="stylesheet" href="//cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<style>
    .mb-20 {
        margin-bottom: 20px
    }
</style>


@endpush 

@if(in_array("add_jobs", $userPermissions))
@section('create-button')
<a href="{{ route('admin.jobs.create') }}" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> @lang('app.createNew')</a>
@endsection
@endif

@section('content')

<div class="row">
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card" style="border-radius: 15px;">
            <div class="box bg-light text-center" style="background:transparent; border:3px solid #f8f9fa; border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                <h1 class="font-light" style="color:#4145a0;"  >{{ number_format($totalJobs) }}</h1>
                <h6 class="" style="color:#4145a0;margin-right: 30px;" > <div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:  #0000ff;" ></div>@lang('modules.dashboard.totalJobs')</h6>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card" style="border-radius: 15px;">
            <div class="box bg-light text-center" style="background:transparent; border:3px solid #f8f9fa; border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                <h1 class="font-light" style="color:#4145a0;">{{ number_format($activeJobs) }}</h1>
                <h6 class="" style="color:#4145a0;margin-right: 30px;" > <div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:   #228B22;" ></div>@lang('modules.dashboard.activeJobs')</h6>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card" style="border-radius: 15px;">
            <div class="box bg-light text-center" style="background:transparent; border:3px solid #f8f9fa; border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
                <h1 class="font-light" style="color:#4145a0;"  >{{ number_format($inactiveJobs) }}</h1>
                <h6 class="" style="color:#4145a0;margin-right: 30px;" > <div class="foo blue" style="border-radius: 4px;float: left;width: 35px;height: 18px;margin-left: 10px;background:   #ff0000;" ></div>@lang('modules.dashboard.inactiveJobs')</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-3" >
        <div class="form-group" >
            <select name="" id="filter-status" class="form-control">
                <option value="">@lang('app.filter') @lang('app.status'): @lang('app.viewAll')</option>
                <option value="active">@lang('app.active')</option>
                <option value="inactive">@lang('app.inactive')</option>
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 15px; box-shadow: 3px 3px 3px #888888;">
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-md-12 mb-20">
                        @if(in_array("view_question", $userPermissions))
                            <a href="{{ route('admin.questions.index') }}"><button class="btn btn-sm btn-primary" style="border-color: #4145a0;background-color: #4145a0;" type="button">
                                    <i class="fa fa-plus-circle"></i> @lang('menu.customQuestion')
                                </button></a> 
                        @endif
                        @if(in_array('add_jobs', $userPermissions))
                            <a href="{{ route('admin.jobs.sendEmail') }}"><button class="btn btn-sm btn-success" type="button">
                                    <i class="fa fa-envelope-o"></i> @lang('menu.sendJobEmails')
                            </button></a> 
                        @endif
                    </div>
                </div>

                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('modules.jobs.jobTitle')</th>
                                <th>@lang('menu.locations')</th>
                                <th>@lang('app.startDate')</th>
                                <th>@lang('app.endDate')</th>
                                <th>@lang('app.status')</th>
                                <th>@lang('app.action')</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 @push('footer-script')
<script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script>
    var table = $('#myTable').dataTable({
            responsive: true,
            // processing: true,
            serverSide: true,
            ajax: {'url' : '{!! route('admin.jobs.data') !!}',
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "filter_company": $('#filter-company').val(),
                            "filter_status": $('#filter-status').val(),
                        } );
                    }
                },
            language: languageOptions(),
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [
                { data: 'DT_Row_Index', name: 'DT_Row_Index' , orderable: false, searchable: false},
                { data: 'title', name: 'title' },
                { data: 'location_id', name: 'location_id' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', width: '20%' }
            ]
        });

        new $.fn.dataTable.FixedHeader( table );

        $('#filter-company, #filter-status').change(function () {
            table._fnDraw();
        })

        $('body').on('click', '.open-url', function(){
            var url = $(this).data('row-open-url');
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();

                $.showToastr('@lang('messages.CopiedToClipboard')', 'success')
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

                    var url = "{{ route('admin.jobs.destroy',':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                table._fnDraw();
                            }
                        }
                    });
                }
            });
        });

</script>


@endpush