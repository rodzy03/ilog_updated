<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Jagwar | Emergency</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
   
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
    <style>
        #my_camera {
            width: 320px;
            height: 240px;
            border: 1px solid black;
        }

        #logo {
            display: inline-block;
            margin: 5px;
            height: 35px;
            width: auto;
            /* correct proportions to specified height */
            border-radius: 50%;
            /* makes it a circle */
        }
    </style>

</head>

<body width = "device-width">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="#"><img id="logo" src="{{asset('uploads/ilog_dark.png')}}"></a>

                <b style="font-size: 16px; margin-right: 0px; padding-right: 10xp">Iwasto</b>

            </div>
            <!-- end navbar-header -->


        </div>
        <!-- end #header -->



        <!-- begin #content -->
        <div id="content" class="content">
           


            <!-- begin panel -->
            <div class="panel ">
                <div class="panel-heading">

                    <!-- <h4 class="panel-title"><b>CITIZEN PATROL</b> </h4> -->
                </div>
                

                <div class="panel-body">
                <form  >
                
                    <div class="note note-secondary">
                        <div class="note-icon"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="note-content">
                            <center><h4><b>ADD EMERGENCY INFORMATION</b></h4></center>
                            <p>&nbsp; </p>
                        </div>
                    </div>
                    
                        <div class="alert alert-success fade show alert_div" style="display: none;">
                            <span class="close" data-dismiss="alert">×</span>
                            <strong>Success!</strong>
                            Emergency Added.
                            
                        </div>
                    
                    
                    <div class="row form-group m-b-10">
                        <label class="col-md-3 col-form-label">Image</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend"></div>
                                <img id="valid_id" src="{{asset('uploads/undraw.png')}}" alt="UPLOAD VALID ID" width="100%" height="auto">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Select Type</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-chevron-down"></i></span></div>
                                    <select style="background-color: white; text-transform:uppercase" name="selType" class="form-control">
                                        @foreach($type as $row)
										<option class="form-control" value="{{$row->RET_TYPEID}}">{{$row->RET_TYPENAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list"></i></span></div>
                                    <textarea type="text" class="form-control description" name="description" style="text-transform: uppercase;"></textarea>
                                    <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div>
                    <div class="row form-group m-b-10">
                        <label class="col-md-3 col-form-label">Upload Image</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-paper-plane"></i></span></div>
                                <input name="file" type="file" accept="file" class="form-control" id="file">
                                <div class="invalid-tooltip" hidden>Please choose a unique and valid username.</div>
                            </div>
                        </div>
                    </div><br>

                    <button id="btn-report-e" type="button" class="button form-control" style="background-color: #d65656; color: white">Submit</button>
                </form>
                    
                </div>
            </div>

            <!-- end panel -->
        </div>
        <!-- end #content -->


        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
   <!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	
	<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('assets/js/theme/default.min.js')}}"></script>
	<script src="{{asset('assets/js/apps.min.js')}}"></script>
    
	<!-- ================== END BASE JS ================== -->

    <script>
        $(document).ready(function() {
            App.init();
        });
        async function submit_report(data,url )
        {
            try {
                    
                await $.ajax({
                        url: url,
                        type: 'post',
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: data,
                        
                        success: function(data) {
                            
                            $('.alert_div').show();
                            $('.description').val('');
                            document.getElementById("file").value = null;
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                
            } catch (error) {
                console.log(error)
            }
        }

        $('#btn-report-e').click(function(){

            var data = new FormData();
            data.append("file", document.getElementById('file').files[0]);
            data.append("_token", "{{csrf_token()}}");
       
            data.append("description", $('.description').val());
            data.append("selType", $('select[name=selType] option:selected').val());

            submit_report(data,"{{route('submit_emergency')}}");
            

        });
        $('#photo').on('input blur', function(){
            var inMainDocument = document.getElementById('photo').files[0];
            file_extension = inMainDocument.name.split('.').pop().toLowerCase();
            file_size = formatBytes(inMainDocument.size);
            result = file_size.split(" ");
            if( result[0] > 10 && result[1] == 'MB' ) 
            {
                alert('size of the file is too large')
            }
            else
            if (jQuery.inArray(file_extension, ['pdf','png','jpg','jpeg']) == -1) 
            {
                alert('Invalid type')
            }
            else 
            {
                $('#valid_id').attr('src',window.URL.createObjectURL(document.getElementById('photo').files[0]) );
            }
        });
    
    function formatBytes(bytes,decimals=0) {
        if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
    </script>
</body>

</html>