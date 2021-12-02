

$(function () {

    var id;
    var oAdminManager = {

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


            // label elements


            //button elements

            this.loading = $('span[id=loading]');
            this.approve = $('#a-submit');
            this.decline = $('#d-submit');

            //this.a_btn = $('#a-btn');
            //this.d_btn = $('#d-btn');
            // counters
            

        },

        setElementEvents: function () {
            $("#datatable").on('click','#a-btn',function(){
                id = $(this).attr('vals');

            });

            $("#datatable").on('click','#d-btn',function(){
                id = $(this).attr('vals');

            });

            this.approve.on('click', function() {
                api = 'approve/requirement'
                $id = $(this.approve).attr('vals');
                
                oAdminManager.updateStatus(api);
            });

            this.decline.on('click', function() {
                api = 'decline/requirement'
                oAdminManager.updateStatus(api);
            });
        },


        updateStatus: function (api) {

            this.loading.show();
            this.decline.attr('disabled', true);
            this.approve.attr('disabled', true);
            
            data = {
                req_id : id
                
            }
            

            setTimeout(function(){

                $.ajax({
                    url: $('#url').val()+api
                    ,type: 'post'
                    ,async: false
                    ,data : data
                    ,success:function(data){
                        console.log(data)
                        
                    }
                    ,error:function(error){
                        console.table(error)
                    }
                });

                window.location.reload(); 
                
            }, 2000);
            
        },

        declineRequirement: function () {

            this.loading.show();
            this.decline.attr('disabled', true);
            this.approve.attr('disabled', true);
            alert($('#business_id').val())
        },

    };

    oAdminManager.init();
});