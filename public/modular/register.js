

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
            this.sName = $('#inName');
            this.sBusiness = $('#inBusiness');
            this.sTin = $('#inTin');

            // label elements


            //button elements
            this.sGender = $("input:radio[name=gender]");
            this.btnRegister = $('#btnRegister');
            this.loading = $('span[id=loading]');


            //rule panel
            this.name_r = $('#name_r');
            this.business_r = $('#business_r');
            this.tin_r = $('#tin_r');
            this.gender_r = $('#gender_r');

            // counters
            

        },

        setElementEvents: function () {

            this.btnRegister.attr('disabled', true);
            this.sName.on('input click', function () {
                oRegistrationManager.validateName();
                oRegistrationManager.validateAll();

            });

            this.sGender.on('change', function () {
                sGenderVal = $(this).val();
                oRegistrationManager.validateGender(sGenderVal);
                
            });

            this.sBusiness.on('input click', function () {
                oRegistrationManager.validateBusinessName();
                oRegistrationManager.validateAll();

            });

            this.sTin.on('input click', function () {
                oRegistrationManager.validateTin();
                oRegistrationManager.validateAll();
                console.log($(document).find('.is-valid').length)
            });

            this.btnRegister.on('click', function () {
                                
                oRegistrationManager.validateGender(sGenderVal);
                
                if(checkregister) {
                    
                    oRegistrationManager.registerUser();
                } 
            });
        },

        registerUser: function () {

            var len = document.getElementById('multiFiles').files.length, url = '';
            var form_data = new FormData();
                form_data.append("fullname", this.sName.val());
                form_data.append("gender", sGenderVal);
                form_data.append("business_name", this.sBusiness.val());
                form_data.append("tin_no", this.sTin.val());


                for (var x = 0; x < len; x++) {
                    form_data.append("myfiles[]", document.getElementById('multiFiles').files[x]);
                }
                
                form_data.append("_token", "{{csrf_token()}}");

                this.loading.show();
                this.btnRegister.attr('disabled', true);

                setTimeout(function(){

                        $.ajax({
                            url: 'api/register/user'
                            ,type: 'post'
                            ,processData:false
                            ,contentType:false
                            ,dataType: 'json'
                            ,async: false
                            ,data : form_data
                            ,success:function(data){

                                if(data["response"] == "success") {
                                    url = $('#url').val();
                                }
                            }
                            ,error:function(error){
                                console.table(error)
                            }
                        });

                        window.location.replace(url); 
                        
                    }, 2000);

        },

        validateName: function () {
            
            //let charRegex = new RegExp(/^[a-zA-Z/ /'.-]+$/),
            let charRegex = new RegExp(/^[a-zA-Z\s]*$/),
                validateNull = this.sName.val().length <= 0,
                validateMin = this.sName.val().length < 4,
                validateMax = this.sName.val().length > 150,
                validateFormat = this.sName.val().search(charRegex) !== 0;

            if (validateNull) {

                oRegistrationManager.addErrorClassForName('&times; Ops, required field.','inName',this.name_r);

            } else if (validateMin) {

                oRegistrationManager.addErrorClassForName('&times; Ops, minumum of </br>&nbsp;&nbsp;&nbsp; 4 characters.','inName',this.name_r);

            } else if (validateMax) {

                oRegistrationManager.addErrorClassForName('&times; Ops, Up to 150 </br>&nbsp;&nbsp;&nbsp; characters only.','inName',this.name_r);

            } else if (validateFormat) {

                oRegistrationManager.addErrorClassForName('Only accepts letters and </br>spaces between</br>characters.','inName',this.name_r);

            } else {

                this.name_r.removeClass('alert').html('');
            }

            ($('#name_r').is(':empty')) ? this.sName.addClass('is-valid').removeClass('is-invalid') : this.sName.addClass('is-invalid').removeClass('is-valid');


        },

        addErrorClassForName: function (value,subparent,errorclass) {

            var parent = document.getElementById(document.getElementById(subparent).parentElement.id).parentElement.id;
            document.getElementById(parent).className = 'field item form-group row bad';
            errorclass.addClass('alert').html(value);

        },

        validateBusinessName: function () {

            let charRegex = new RegExp(/^[a-zA-Z/ /'.-]+$/),
                validateNull = this.sBusiness.val().length <= 0,
                validateFormat = this.sBusiness.val().search(charRegex) !== 0;

            if (validateNull) {

                oRegistrationManager.addErrorClassForName('&times; Ops, required field.','inBusiness',this.business_r);

            } else if (validateFormat) {

                oRegistrationManager.addErrorClassForName('Only accepts letters and </br>spaces between</br>characters.','inBusiness',this.business_r);

            } else {

                this.business_r.removeClass('alert').html('');
            }

            ($('#business_r').is(':empty')) ? this.sBusiness.addClass('is-valid').removeClass('is-invalid') : this.sBusiness.addClass('is-invalid').removeClass('is-valid');
        },

        


        validateTin: function () {

            var ssn = new RegExp(/^\d{3}-?\d{2}-?\d{4}$|^XXX-XX-XXXX$/);
            var tin = new RegExp(/^\d{2}-?\d{7}$|^XX-XXXXXXX$/);
                let validateNull = this.sTin.val().length <= 0;

            if (validateNull) {

                oRegistrationManager.addErrorClassForName('&times; Ops, required field.','inTin',this.tin_r);

            } 

            if (ssn.test(this.sTin.val()) || tin.test(this.sTin.val())) {

                this.tin_r.removeClass('alert').html('');
            
            } else {
                
                oRegistrationManager.addErrorClassForName('&times; Ops, invalid tin format.','inTin',this.tin_r);
                
            }

            ($('#tin_r').is(':empty')) ? this.sTin.addClass('is-valid').removeClass('is-invalid') : this.sTin.addClass('is-invalid').removeClass('is-valid');
        },

        

        validateGender: function (value) {
           
            if (value === '') {
                
                checkregister = false;
                oRegistrationManager.addErrorClassForGender('&times; Ops, required field.');

            } else {

                checkregister = true;
                this.gender_r.removeClass('alert').html('');
            }

            ($('#gender_r').is(':empty')) ? this.sGender.addClass('is-valid').removeClass('is-invalid') : this.sGender.addClass('is-invalid').removeClass('is-valid');
        },

        addErrorClassForGender: function (value) {

            var parent = document.getElementById('gender-s').parentElement.id;
            document.getElementById(parent).className = 'col-md-6 col-sm-6 field item form-group row bad';
            this.gender_r.addClass('alert').html(value);

        },


        /**
         * Validating all Input Fields  
         */

        validateAll: function () {

            var len = $(document).find('.is-valid').length;
            ( len === 3 || len === 5) ? this.btnRegister.attr('disabled', false): this.btnRegister.attr('disabled', true);

        },

    };

    oRegistrationManager.init();
});