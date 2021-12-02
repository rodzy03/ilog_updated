
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery-1.11.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/theme/default.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>


    
	<!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/js/demo/login-v2.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        
    </script>
    <script>
        
        
        function update(data,url,status, is_guard) {
            
            if(is_guard == 1) {
                $('#modal-loading').modal('show');
                guards(data,url,status);
                reload();
                
                
            } else if(status == "normal" || status == "add" || status == "assign") {
                $('#modal-loading').modal('show');
                main(data,url,status);
                reload();
                
            } else {
                swal({
                title: "Wait!",
                text: "Are you sure you want update?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // show_swal();
                        $('#modal-loading').modal('show');
                        main(data,url,status);
                        reload();
                    } else {
                        swal("Operation Cancelled.", {
                            icon: "error",
                            timer: 1000,
                            button: false
                        });
                    }
                });

            }   
        }

        function show_swal() {
            swal("Data have been successfully updated!", {
                    icon: "success",
                    timer:10000,
                    button:false,
                    
                });
        }

        async function main(data,url,status) 
        {
            try {
                    
                await $.ajax({
                        url: url,
                        type: 'post',
                        data: data,
                        
                        success: function(data) {
                            console.log(data)
                            
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                
            } catch (error) {
                console.log(error)
            }
        }

        async function guards(data,url,status) 
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
                            console.log(data)
                            
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                
            } catch (error) {
                console.log(error)
            }
        }


        function import_excel(data,url,status) {
            $('#modal-loading').modal('show');
            main_excel(data,url,status);
            reload();
            
        }

        function reload() {

            setTimeout(function(){
                //show_swal();
                location.reload();
            },1000);
        }
        
        async function main_excel(data,url,status) {
            
            try {
                    
                    await $.ajax({
                        url: url,
                        type: 'post',
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: data,
                        success: function(data) { },
                        error: function(error) {
                            console.log(error)
                        }
                    });

                } catch (error) {
                    console.log(error)
            }
        }
        // async function update(data,url,status) {
        //     if(status == "normal"||status == "add") {
        //         await execute(data,url,status);
        //         window.location.reload();
        //     } else {
        //         swal({
        //         title: "Wait!",
        //         text: "Are you sure you want update?",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) {
        //                 await execute(data,url,status);
        //                 window.location.reload();

        //             } else {
        //                 swal("Operation Cancelled.", {
        //                     icon: "error",
        //                     timer: 1000,
        //                     button: false
        //                 });
        //             }
        //         });
        //     }
        // }

        function execute(data,url,status) {
            swal("Data have been successfully updated!", {
                icon: "success",
                timer:1000,
                button:false
            });

            setTimeout(function() {


            $.ajax({
                url: url,
                type: 'post',
                data: data,
                
                success: function(data) {
                    console.log(data)
                    resolve('resolved');
                },
                error: function(error) {
                    console.log(error)
                }
            });

            
            }, 1000);
            

        }

        // function execute(data,url,status) {
        //     swal("Data have been successfully updated!", {
        //         icon: "success",
        //         timer:1000,
        //         button:false
        //     });

        //     setTimeout(function() {


        //     $.ajax({
        //         url: url,
        //         type: 'post',
        //         data: data,
        //         async:false,
        //         success: function(data) {
        //             console.log(data)
        //         },
        //         error: function(error) {
        //             console.log(error)
        //         }
        //     });

        //     window.location.reload();


        //     }, 1000);

        // }
    </script>

