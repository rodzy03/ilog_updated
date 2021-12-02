@extends('layouts.main')
@section('title','guard task')
@section('content')

@section('extra-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->


@endsection

<!-- begin #content -->
<div id="content" class="content">

    
    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list">
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> EMPLOYEE LIST </a>
                </h4><br>
                
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-swim"><i class="fa fa-plus">&nbsp;</i>Add New Employee&nbsp;</button>
                
            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
                    <!-- <p>
                                The available scholarship programs are posted in the 
                                Facebook Page Scholarship and Financial Assistance Services – 
                                PUP Manila and Facebook Page PUPQC Scholarship and Financial Services.
                                </p> -->
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Full Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Created Date</th>
                                @if(Auth::user()->full_access == 1)
                                    <th class="text-nowrap">Action</th>
                                @endif
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td style="text-transform: uppercase;"><b>{{$row->name}}</b></td>
                                <td >{{$row->email}}</td>
                                <td >{{$row->created_at}}</td>
                                @if(Auth::user()->full_access == 1)
                                <td style="width: 20%;">
                                    <div class="row">
                                        @if($row->active_flag == 1 )

                                        <a id=edit vals="{{$row->id}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->id}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>&nbsp;
                                        @else
                                        <a id=act vals="{{$row->id}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif
                                        @if(Auth::user()->email == "duterterodelb@gmail.com")
                                            @if($row->full_access == 0)
                                            <a id=grant vals="{{$row->id}}" class="btn btn-danger" data-toggle="tooltip" title="Grant Full Access"><i class="fa fa-paper-plane text-white"></i></a>&nbsp;
                                            @else
                                            <a id=remove vals="{{$row->id}}" class="btn btn-danger" data-toggle="tooltip" title="Remove Full Access"><i class="fa fa-trash-alt text-white"></i></a>&nbsp;
                                            @endif
                                        @endif
                                    </div>

                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END panel -->

    </div>



    <div class="modal fade" id="modal-add-swim">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    &nbsp;
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-user"></i></div>
                            <div class="note-content text-left">
                                <h4><b>ADD EMPLOYEE</b></h4>
                                <p>
                                    
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input style="text-transform: uppercase;" class="form-control taskname_a" type="text"  />
                                    
                                </div>
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Email <span class="required">*</span></label>
                                    <input class="form-control email_a" type="text"  />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Password <span class="required">*</span></label>
                                    <input  class="form-control password_a" type="password"  />
                                    
                                </div>
                            </div>


                        </div>

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnAdd">
                        Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                &nbsp;
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-user"></i></div>
                            <div class="note-content text-left">
                                <h4><b>EDIT EMPLOYEE</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input style="text-transform: uppercase;" class="form-control taskname_e" type="text"  />
                                    
                                </div>
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Email <span class="required">*</span></label>
                                    <input  class="form-control email_e" type="text"  />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Password <span class="required">*</span></label>
                                    <input  class="form-control password_e" type="password"  />
                                    
                                </div>
                            </div>


                        </div>

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnUpdate">
                        Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end #content -->

@section('extra-js')


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        //DashboardV2.init();
        $('#data-table-default').DataTable({
            'paging'      : true,
            'searching'   : true,
            'ordering'    : true, 
        });
        $('.loading').hide();
    });


    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('employee_crud')}}";
        status = "deact"
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    $('#data-table-default').on('click', '#grant', function() {

        id = $(this).attr('vals');
        url = "{{route('employee_crud')}}";
        status = "grant"
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    $('#data-table-default').on('click', '#remove', function() {

        id = $(this).attr('vals');
        url = "{{route('employee_crud')}}";
        status = "remove"
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    

    $('#data-table-default').on('click', '#act', function() {

        id = $(this).attr('vals');
        url = "{{route('employee_crud')}}";
        status = "act";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });
    
    $('#data-table-default').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            firstname = $(row.find("td")[0]).text(),
            email = $(row.find("td")[1]).text()
            
            $('.taskname_e').val(firstname);
            $('.email_e').val(email);
            
    });

    $('#btnUpdate').click(function() {
        
        url = "{{route('employee_crud')}}";
        status = "normal";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            taskname:$('.taskname_e').val(),
            email:$('.email_e').val(),
            password:$('.password_e').val()
            
        }
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

    $('#btnAdd').click(function() {
        
        url = "{{route('employee_crud')}}";
        status = "add";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            taskname:$('.taskname_a').val(),
            email:$('.email_a').val(),
            password:$('.password_a').val()
            
        }
        
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });
</script>

@endsection
@endsection