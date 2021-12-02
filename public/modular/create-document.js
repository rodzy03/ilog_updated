

$(function () {
    var checkregister = false;
    var sGenderVal = '';
    var oRegistrationManager = {

        /**
        * First function to be called, it initialized 
        * all the requried elements 
        */

        init: function () {

            this.setDOMElements();
            this.setElementEvents();
            this.loading.hide();

        },

        setDOMElements: function () {

            // input elements
            this.allInputs = $('input');
            this.inTitle = $('#inTitle');
            this.inDescription = $('#inDescription');
            this.inMainDocument = $('#inMainDocument');
            this.inSuppDocument = $('#inSuppDocument');

            this.btnRegister = $('#btnRegister');
            this.loading = $('span[id=loading]');


        },

        setElementEvents: function () {

            this.btnRegister.attr('disabled', true);
            this.inTitle.on('input click', function () {
                oRegistrationManager.validateName($('#inTitle'),$('#title-lbl'));
                oRegistrationManager.validateAll();

            });

            this.inDescription.on('input click', function () {
                oRegistrationManager.validateName($('#inDescription'),$('#desc-lbl'));
                oRegistrationManager.validateAll();
            });


            this.inMainDocument.on('input blur', function () {
                oRegistrationManager.validateMain('inMainDocument',$('#main_r'),$('#inMainDocument'),'notMultiple');
                oRegistrationManager.validateAll();
            });

            this.inSuppDocument.on('input blur', function () {
                oRegistrationManager.validateMain('inSuppDocument',$('#supp_r'),$('#inSuppDocument'),'isMultiple');
                oRegistrationManager.validateAll();
            });

            this.btnRegister.on('click', function () {
                    
                oRegistrationManager.registerUser();
                
            });
        },

        formatBytes: function (bytes,decimals=0) {

            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        },


        validateMain: function (id,label,input,multiple) {
            
            len = document.getElementById(id).files.length;
            if( multiple != 'isMultiple' )
            {
                if( len > 0 ) 
                {
                    inMainDocument = document.getElementById(id).files[0];
                    file_extension = inMainDocument.name.split('.').pop().toLowerCase();
                    file_size = oRegistrationManager.formatBytes(inMainDocument.size);
                    result = file_size.split(" ");
                    if( result[0] > 5 && result[1] == 'MB' ) 
                    {
                        
                        oRegistrationManager.addDesign(label,input,'Size of the file ['+ document.getElementById(id).files[y].name +'] is too large.','red');
                        //oRegistrationManager.addErrorClassForName('&times; Ops, Size of the file </br>&nbsp;&nbsp;&nbsp;&nbsp;is too large.</br>&nbsp;&nbsp;&nbsp;Maximum size is 5 MB.',id,label);
                        document.getElementById(id).value = "";

                    }
                    else
                    if (jQuery.inArray(file_extension, ['pdf','docx','xlsx','csv','xls']) == -1) 
                    {
                        oRegistrationManager.addDesign(label,input,'Ops, Invalid file format [pdf, docx, xlsx, csv, xls] are supported files.','red');
                        // oRegistrationManager.addErrorClassForName('&times; Ops, Invalid file format </br>&nbsp;&nbsp;&nbsp;&nbsp;[pdf, docx, xlsx, csv, xls] </br>&nbsp;&nbsp;&nbsp;&nbsp; are supported files.',id,label);
                        document.getElementById(id).value = "";
                    }
                    else 
                    {
                        label.text('');
                        input.css("border-color","");
                    }
                    
                }
                else
                {
                    oRegistrationManager.addDesign(label,input,'Ops, No file selected.','red');
                    // oRegistrationManager.addErrorClassForName('&times; ',id,label);
                }
            }
            else
            {
                if (len > 0)
                {
                    var form_data = new FormData();
                    var value = 0, size = 1;
                    var file_extensions = [], file_sizes = [], results = [], values = [], sizes = [];
                    for (var x = 0; x < len; x++) 
                    {
                        form_data.append("inSuppDocument[]", document.getElementById(id).files[x]);
                        file_extensions[x] = document.getElementById(id).files[x].name.split('.').pop().toLowerCase();
                        file_sizes[x] = oRegistrationManager.formatBytes(document.getElementById(id).files[x].size);
                        results[x] = file_sizes[x].split(" ");
                        values[x] = results[x][value];
                        sizes[x] = results[x][size];
                    }
                    
                    for (var y = 0; y < len; y++) 
                    {
                        if( values[y] > 5 && sizes[y] == 'MB' )
                        {
                            
                            oRegistrationManager.addDesign(label,input,'Size of the file ['+ document.getElementById(id).files[y].name +'] is too large.','red');;
                            document.getElementById(id).value = "";
                        }
                        else
                        if (jQuery.inArray(file_extensions[y], ['pdf','docx','xlsx','csv','xls']) == -1) 
                        {
                            oRegistrationManager.addDesign(label,input,'Ops, Invalid file format ['+ document.getElementById(id).files[y].name +'] [pdf, docx, xlsx, csv, xls] are supported files.','red');
                            document.getElementById(id).value = "";
                        }
                        else
                        {
                            // label.removeClass('alert').html('');
                            label.text('');
                            input.css("border-color","");
                        }
                        
                    }
                }
                else
                {
                    oRegistrationManager.addDesign(label,input,'Ops, No file selected.','red');
                }

            }
            
            (label.is(':empty')) ? input.addClass('is-valid').removeClass('is-invalid') : input.addClass('is-invalid').removeClass('is-valid');
        },     

        addDesign: function (label,input,message,color) {

            label.css("color",color);
            label.text(message);
            input.css("border-color",color);
            
        },

        validateName: function (input,label) {
            
            //let charRegex = new RegExp(/^[a-zA-Z/ /'.-]+$/),
            let charRegex = new RegExp(/^[a-zA-Z\s]*$/),
                validateNull = input.val().length <= 0,
                validateMin = input.val().length < 4,
                validateMax = input.val().length > 150,
                validateFormat = input.val().search(charRegex) !== 0;

            if (validateNull) {

                oRegistrationManager.addDesign(label,input,'This field is required.','red');
                
            } 
            else if (validateMin) {

                oRegistrationManager.addDesign(label,input,'Ops, minimum of 4 characters.','red');
                

            } else if (validateMax) {

                oRegistrationManager.addDesign(label,input,'Ops, Up to 150 characters only.','red');
                

            } else if (validateFormat) {

                oRegistrationManager.addDesign(label,input,'Only accepts letters and spaces between characters.','red');

            } else {

                label.text('');
                input.css("border-color","");
            }

            (label.is(':empty')) ? input.addClass('is-valid') : input.removeClass('is-valid');


        },


        addErrorClassForName: function (value,subparent,errorclass) {

            var parent = document.getElementById(document.getElementById(subparent).parentElement.id).parentElement.id;
            document.getElementById(parent).className = 'field item form-group row bad';
            errorclass.addClass('alert').html(value);

        },


        /**
         * Validating all Input Fields  
         */

        validateAll: function () {

            var len = $(document).find('.is-valid').length;
            ( len === 4) ? this.btnRegister.attr('disabled', false): this.btnRegister.attr('disabled', true);

        },

        registerUser: function () {
            
            var form_data = new FormData();
                form_data.append("title", this.inTitle.val());
                form_data.append("description", this.inDescription.val());
                form_data.append("category", $('select[name=selCategory] option:selected').val())
                form_data.append("purpose", $('select[name=selPurpose] option:selected').val())
                form_data.append("priority", $('select[name=selPriority] option:selected').val())
                form_data.append("approver", $('select[name=selApprover] option:selected').val())
                
                form_data.append("main_document", document.getElementById('inMainDocument').files[0])
                form_data.append("_token", $('#_token').val());
                for (var x = 0; x < document.getElementById('inSuppDocument').files.length; x++) {
                    form_data.append("supporting_document[]", document.getElementById('inSuppDocument').files[x]);
                }
                

                this.loading.show();
                this.btnRegister.attr('disabled', true);
                url = $('#base-url').val()+'employee/create/document';

                setTimeout(function(){


                        $.ajax({
                            url: url
                            ,type: 'post'
                            ,processData:false
                            ,contentType:false
                            ,dataType: 'json'
                            ,async: false
                            ,data : form_data
                            ,success:function(data){
                                console.log(data)
                            }
                            ,error:function(error){
                                console.log(error)
                            }
                        });

                        window.location.replace($('#base-url').val()+'employee/my-documents'); 
                        
                    }, 2000);

        },

    };

    oRegistrationManager.init();
});