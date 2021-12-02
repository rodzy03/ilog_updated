@extends('layouts.main')
@section('title','dashboard')
@section('content')

@section('extra-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet" />

<style>
    #qrcode {
        width: 128px;
        height: 128px;
        margin: 0 auto;
        text-align: center;
    }

    #qrcode a {
        font-size: 0.8em;
    }

    .qr-url,
    .qr-size {
        padding: 0.5em;
        border: 1px solid #ddd;
        border-radius: 2px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .qr-url {
        width: 79%;
    }

    .qr-size {
        width: 20%;
    }

    .lb-data {
        display: none;
    }

    .lb-nav a.lb-next {
        width: 0px;
    }

    .lb-nav a.lb-prev {
        width: 0px;
    }
</style>

@endsection

<!-- begin #content -->
<div id="content" class="content">
   
   
    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list">
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> GUARD LIST </a>
                </h4><br>


                <button class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-upload"></i>&nbsp;Import</button>
                    <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-guard"><i class="fa fa-plus">&nbsp;</i>Add New Guard&nbsp;</button>

                    <form action="{{ route('generate/all')}}" method="post">
                        @csrf
                        <input type="text" value="{{$stats}}" hidden id="job_role" name="job_role">
                        <br><button class="form-control col-md-3 btn btn-purple btn-gen-all">
                            <i class="fa fa-share"></i>&nbsp;Generate all QR</button>
                    </form>
                
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
                                
                                <th class="text-nowrap">Guard Information</th>
                                <th class="text-nowrap">Hiring Date</th>
                                <th class="text-nowrap">Job Status</th>
                                <th class="text-nowrap">Date Added</th>

                                <th class="text-nowrap" style="text-align: center;">Action</th>
                                <th hidden>firstname</th>
                                <th hidden>middlename</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                                <th hidden>lastname</th>
                            </tr>

                        </thead>
                        <tbody>
                            
                            @foreach($data as $row)
                            
                            <tr>
                            @php 
                                $pro = asset('uploads/profile/');
                                $src = asset('uploads/original_pictures/')
                             @endphp
                                <td style="text-transform: uppercase; width: 30%">

                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                    <a class="result-image" data-lightbox="gallery" href="{{$pro}}/{{$row->RAI_PICTURE}}">
                                            <img id="profile-image" src="{{$src}}/{{$row->RAI_PICTURE}}" alt="NO IMAGE" />&nbsp;</a>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                    <b>{{$row->RAI_FIRSTNAME}} {{$row->RAI_MIDDLENAME}} {{$row->RAI_LASTNAME}}</b><br>
                                {!! (!empty($row->HOME_ADDRESS)) ? "HOME ADDRESS: ".$row->HOME_ADDRESS."<br>": "" !!}
                                {!! (!empty($row->CITY)) ? "CITY: ".$row->CITY."<br>": "" !!}
                                {!! (!empty($row->PROVINCE)) ? "PROVINCE: ".$row->PROVINCE."<br>": "" !!}
                                {!! (!empty($row->MOBILE_NUMBER)) ? "CONTACT: ".$row->MOBILE_NUMBER."<br>": "" !!}
                                {!! (!empty($row->EMERGENCY_CONTACT_PERSON)) ? "EMERGENCY CONTACT PERSON: ".$row->EMERGENCY_CONTACT_PERSON."<br>": "" !!}
                                {!! (!empty($row->EMERGENCY_CONTACT_NUMBER)) ? "EMERGENCY CONTACT NUMBER: ".$row->EMERGENCY_CONTACT_NUMBER."<br>": "" !!}
                                    </div>
                                    
                                </div>
                                
                                    
                                
                                    
                                </td>
                                <td style="text-transform: uppercase; width: 15%">{{$row->HIRING_DATE}}</td>
                                <td style="text-transform: uppercase; width: 15%">{{$row->JOB_STATUS}}</td>
                                <td style="text-transform: uppercase; width: 15%">{{$row->RAI_DATEADDED}}</td>
                                <td style="width: 18%;">
                                    <div class="row">
                                        @if($row->ACTIVE_FLAG == 1)

                                        <form action="{{ route('generate/qrcode')}}" method="post">
                                            @csrf
                                            <input type="text" value="{{$row->RAI_ACCOUNTID}}" name="guard_id" hidden>
                                            <button type="submit" class="form-control btn btn-danger ">
                                                <i class="fa fa-share"></i>&nbsp;Print QR</button>

                                        </form>&nbsp;&nbsp;
                                        <a id=edit vals="{{$row->RAI_ACCOUNTID}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->RAI_ACCOUNTID}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        @else
                                        <a id=act vals="{{$row->RAI_ACCOUNTID}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif



                                    </div>

                                </td>
                                <td hidden>{{$row->RAI_FIRSTNAME}}</td>
                                <td hidden>{{$row->RAI_MIDDLENAME}}</td>
                                <td hidden>{{$row->RAI_LASTNAME}}</td>
                                <td hidden>{{$row->MOBILE_NUMBER}}</td>
                                <td hidden>{{$row->HOME_ADDRESS}}</td>
                                <td hidden>{{$row->CITY}}</td>
                                <td hidden>{{$row->PROVINCE}}</td>
                                
                                <td hidden>{{$row->EMERGENCY_CONTACT_PERSON}}</td>
                                <td hidden>{{$row->EMERGENCY_CONTACT_NUMBER}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END panel -->

    </div>


    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Generate QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT GUARDS</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Excel File <span class="required">*</span></label>
                                    <input class="form-control btn btn-inverse " style="height: 40px; " type="file" id="inMainDocument" />
                                    <label id="main_r_store" for="inMainDocument"></label>
                                </div>
                            </div>


                        </div>

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnRegister">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-transform: uppercase;" class="modal-title" id="header_txt">EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>EDIT INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;First Name <span class="required">*</span></label>
                                    <input class="form-control firstname_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Middle Name <span class="required">*</span></label>
                                    <input class="form-control middlename_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Last Name <span class="required">*</span></label>
                                    <input class="form-control lastname_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Mobile Number <span class="required">*</span></label>
                                    <input class="form-control mobile_number_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Home Address <span class="required">*</span></label>
                                    <input class="form-control home_address_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;City <span class="required">*</span></label>
                                    <input class="form-control city_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Province <span class="required">*</span></label>
                                    <input class="form-control province_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>

                        </div><br>
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Emergency Contact Person <span class="required">*</span></label>
                                    <input class="form-control contact_person_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Emergency Contact Number <span class="required">*</span></label>
                                    <input class="form-control contact_number_e" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Hiring Date <span class="required">*</span></label>
                                    <input class="form-control hiring_date_e" style="height: 40px; text-transform:uppercase" type="date" />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Job Status <span class="required">*</span></label>
                                    <select id=sel_job_e name="sel_job_e" class="form-control" style="text-transform: uppercase; height: 40px">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="RESIGNED">RESIGNED</option>
                                        <option value="LOA">LOA</option>
                                        <option value="DISMISSED">DISMISSED</option>
                                        <option value="AWOL">AWOL</option>
                                        <option value="RETIRED">RETIRED</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 text_pin" style="display: none;">
                                <div class="stats-content">
                                    <label>&nbsp;PIN <span class="required">*</span></label>
                                    <input class="form-control pin_value_e" style="height: 40px;" type="text" />
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;<span class="required"></span></label><br>
                                    <button type="button" class="btn btn-danger form-control btn_reset_pin" style="height: 39px;">
                                    <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Reset Pin</button>
                                    
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Picture <span class="required"></span></label>
                                    <input class="form-control btn btn-inverse " style="height: 40px; " type="file" id="inProfile_e" />
                                    <label id="main_r_store" for="inProfile_e"></label>
                                </div>
                            </div>


                        </div>
                        
                                
                                    

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnUpdate">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-guard">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD NEW GUARD</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>ADD INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;First Name <span class="required">*</span></label>
                                    <input class="form-control firstname_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>
                    

                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Middle Name <span class="required">*</span></label>
                                    <input class="form-control middlename_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Last Name <span class="required">*</span></label>
                                    <input class="form-control lastname_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>

                       
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Mobile Number <span class="required">*</span></label>
                                    <input class="form-control mobile_number_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Home Address <span class="required">*</span></label>
                                    <input class="form-control home_address_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;City <span class="required">*</span></label>
                                    <input class="form-control city_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Province <span class="required">*</span></label>
                                    <input class="form-control province_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>

                        </div><br>
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Emergency Contact Person <span class="required">*</span></label>
                                    <input class="form-control contact_person_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Emergency Contact Number <span class="required">*</span></label>
                                    <input class="form-control contact_number_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Hiring Date <span class="required">*</span></label>
                                    <input class="form-control hiring_date_a" style="height: 40px; text-transform:uppercase" type="date" />
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Job Status <span class="required">*</span></label>
                                    <select name="sel_job_a" class="form-control" style="text-transform: uppercase; height: 40px">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="RESIGNED">RESIGNED</option>
                                        <option value="LOA">LOA</option>
                                        <option value="DISMISSED">DISMISSED</option>
                                        <option value="AWOL">AWOL</option>
                                        <option value="RETIRED">RETIRED</option>
                                    </select>
                                    
                                </div>
                            </div>
                        </div><br>
                       
                        <div class="row">
                            <div class="col-lg-6 col-md-12 text_pin" style="display: none;">
                                <div class="stats-content">
                                    <label>&nbsp;PIN <span class="required">*</span></label>
                                    <input class="form-control pin_value_a" style="height: 40px;" type="text" />
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;<span class="required"></span></label><br>
                                    <button type="button" class="btn btn-danger form-control btn_reset_pin" style="height: 39px;">
                                    <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Generate Pin</button>
                                    
                                </div>
                            </div>


                        </div><br>
                        
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Picture <span class="required"></span></label>
                                    <input class="form-control btn btn-inverse " style="height: 40px; " type="file" id="inProfile" name="inProfile"/>
                                    <label id="main_r_store" for="inProfile"></label>
                                </div>
                            </div>


                        </div>
                                    

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnAdd">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
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
<script src="{{ asset('assets/plugins/lightbox/js/lightbox.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


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

    $('.btn-gen-all').click(function(){
        $('#modal-loading').modal('show');
    });

    
    const getRandomPin = (chars, len)=>[...Array(len)].map(
        (i)=>chars[Math.floor(Math.random()*chars.length)]
    ).join('');

    $('.btn_reset_pin').click(function(){
        $('.text_pin').show();
        $('.pin_value_a').val(getRandomPin('0123456789',6));
        $('.pin_value_e').val(getRandomPin('0123456789',6));
    });

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_guards')}}";
        import_excel(form_data,url,"");

    });
    
    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('guard_crud')}}";
        status = "deact"
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }
        
        update(data, url, status);
    });

    $('#data-table-default').on('click', '#act', function() {

        id = $(this).attr('vals');
        url = "{{route('guard_crud')}}";
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
            firstname = $(row.find("td")[5]).text()
            , middlename = $(row.find("td")[6]).text()
            , lastname = $(row.find("td")[7]).text()
            , mobile_number_e = $(row.find("td")[8]).text()
            , home_address_e = $(row.find("td")[9]).text()
            , city_e = $(row.find("td")[10]).text()
            , province_e = $(row.find("td")[11]).text()
            , contact_person_e = $(row.find("td")[12]).text()
            , contact_number_e = $(row.find("td")[13]).text()
            , hiring_date = $(row.find("td")[1]).text()
            , job_status = ($(row.find("td")[2]).text() == "") ? "ACTIVE" : $(row.find("td")[2]).text()


            full_name = lastname + " " + firstname;
            $('.firstname_e').val(firstname);
            $('.middlename_e').val(middlename);
            $('.lastname_e').val(lastname);

            $('.mobile_number_e').val(mobile_number_e);
            $('.home_address_e').val(home_address_e);
            $('.city_e').val(city_e);
            $('.province_e').val(province_e);
            $('.contact_person_e').val(contact_person_e);
            $('.contact_number_e').val(contact_number_e);
            $('.hiring_date_e').val(hiring_date);
            
            $('#header_txt').text(full_name)
            selectElement('sel_job_e', job_status) 
    });

    

    function selectElement(id, valueToSelect) {    
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }


    $('#btnUpdate').click(function() {
        
        url = "{{route('guard_crud')}}";
        status = "normal";
        is_guard = 1;
        var data = new FormData();
        data.append("file", document.getElementById('inProfile_e').files[0]);
        data.append("id", id);
        data.append("_token", "{{csrf_token()}}");
        data.append("firstname", $('.firstname_e').val());
        data.append("middlename", $('.middlename_e').val());
        data.append("lastname", $('.lastname_e').val());
        data.append("password", $('.pin_value_e').val());
        data.append("mobile_number", $('.mobile_number_e').val());
        data.append("home_address", $('.home_address_e').val());
        data.append("city", $('.city_e').val());
        data.append("province", $('.province_e').val());
        data.append("contact_person", $('.contact_person_e').val());
        data.append("contact_number", $('.contact_number_e').val());
        data.append("hiring_date", $('.hiring_date_e').val());
        data.append("job_status", $('select[name=sel_job_e] option:selected').val());
        data.append("guard_type", $('#job_role').val());
        data.append("status", status);

        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status, is_guard);
    });

    $('#btnAdd').click(function() {
        url = "{{route('guard_crud')}}";
        status = "add";
        is_guard = 1;
        var data = new FormData();
        data.append("file", document.getElementById('inProfile').files[0]);
        data.append("_token", "{{csrf_token()}}");
        data.append("firstname", $('.firstname_a').val());
        data.append("middlename", $('.middlename_a').val());
        data.append("lastname", $('.lastname_a').val());
        data.append("password", $('.pin_value_a').val());
        data.append("mobile_number", $('.mobile_number_a').val());
        data.append("home_address", $('.home_address_a').val());
        data.append("city", $('.city_a').val());
        data.append("province", $('.province_a').val());
        data.append("contact_person", $('.contact_person_a').val());
        data.append("contact_number", $('.contact_number_a').val());
        data.append("hiring_date", $('.hiring_date_a').val());
        data.append("job_status", $('select[name=sel_job_a] option:selected').val());
        data.append("guard_type", $('#job_role').val());
        data.append("status", status);


        var button = $(this);
        button.closest(".modal").modal('hide');
        
        update(data,url,status,is_guard);
    });
    
</script>

@endsection
@endsection