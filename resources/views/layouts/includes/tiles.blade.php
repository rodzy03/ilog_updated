<style>
    #table_db {
        table-layout: fixed;
        width: 100%;
    }
</style>    
<div class="client" style="margin: 0 -23px; margin-top: -2px;" >
        <div class="col-lg-4">
            <div class="stats-content">
                <label>&nbsp;Select Period <span class="required"></span></label>
                <select name="sel_period" class="form-control sel_period" style="text-transform: uppercase; height: 40px">
                    <option value="TD">TODAY</option>
                    <option value="MTD">MTD</option>
                    <option value="QTD">QTD</option>
                    <option value="YTD">YTD</option>
                    <option value="ALL">ALL</option>
                    
                </select>
                
            </div>
        </div>
    </div>
    <br>
<div class="row" style="margin-top:-15px; ">
    <div class="table-responsive">
    


        <table class="table m-b-0" id="table_db">
            
                
                    <td >
                        <!-- begin col-3 -->
                        
                            <div class="widget widget-stats bg-red-darker">
                                <div class="stats-icon"><i class="far fa-bell"></i></div>
                                <div class="stats-info">
                                    <h4>EMERGENCY</h4>
                                    <p id="emergency">
                                        {{\DB::table('r_emergency_log')
                                            ->where(DB::raw('DATE(REL_DATEADDED)'),DB::raw('CURRENT_DATE'))
                                            ->count()}}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        
                        <!-- end col-3 -->
                    </td>
                    <td>
                        <!-- begin col-3 -->
                        
                            <div class="widget widget-stats bg-lime-darker">
                                <div class="stats-icon"><i class="fa fa-exclamation"></i></div>
                                <div class="stats-info">
                                    <h4>INCIDENTS<strong style="color: white"></strong></h4>
                                    <p id=incident>
                                        {{
                                            \DB::table('r_incident_log')
                                            ->where(DB::raw('DATE(RIL_DATEADDED)'),DB::raw('CURRENT_DATE'))
                                            ->count()
                                    }}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            
                        </div>
                        <!-- end col-3 -->
                    </td>
                    
                    <td>
                        
                            <div class="widget widget-stats bg-black-darker">
                                <div class="stats-icon"><i class="fa fa-wrench" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>INACTIVE HITS</h4>
                                    @php
                                        $inactive = \db::select("call SP_GET_INACTIVE_HITS_P(?)",array("TD"))
                                    @endphp
                                    <p id="inactive">
                                    {{
                                        (empty($inactive[0]->INACTIVE)) ? 0 : $inactive[0]->INACTIVE
                                    }}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        
                    </td>
                    <td>
                        <!-- begin col-3 -->
                        
                            <div class="widget widget-stats bg-green-darker">
                                <div class="stats-icon"><i class="fa fa-map-marker-alt"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL LEAVES</h4>
                                   
                                    <p>
                                        0
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        
                        <!-- end col-3 -->
                    </td>
                    <td>
                        
                            <div class="widget widget-stats bg-blue-darker">
                                <div class="stats-icon"><i class="fa fa-user"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL HOURS <strong style="color: white"></strong></h4>
                                    @php
                                        $total_hours = \db::select("call SP_GET_DUTY_HOURS_P(?)",array("TD"))
                                    @endphp
                                    <p id=total_hours>
                                    
                                        {{ (empty($total_hours[0]->TOTAL_HOURS) ) ? 0 : $total_hours[0]->TOTAL_HOURS }}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        
                    </td>
                   
                


            
        </table>
    </div>

</div>
<!-- end row -->

<div>
<script src="{{ asset('assets/plugins/jquery/jquery-1.11.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.sel_period').on('change', function(){

            $.ajax({
                url: "{{route('filter_inactive')}}"
                , method: "post"
                , data: {
                    _token:"{{csrf_token()}}"
                    , status:$('select[name=sel_period] option:selected').val()
                }
                , success:function(response) {
                    
                  
                    (response['inactive'].length > 0) ? 
                        $('#inactive').text(response['inactive'][0]['INACTIVE']) : $('#inactive').text(0);

                    (response['emergency'].length > 0) ? 
                        $('#emergency').text(response['emergency'][0]['EMERGENCY']) : $('#emergency').text(0);
                    
                    (response['incident'].length > 0) ? 
                        $('#incident').text(response['incident'][0]['INCIDENT']) : $('#incident').text(0);

                    (response['total_hours'].length > 0) ? 
                        $('#total_hours').text((response['total_hours'][0]['TOTAL_HOURS'] == null) ? 0 : response['total_hours'][0]['TOTAL_HOURS']) : $('#total_hours').text(0);


                    }
                
            });
        });
    });
    
</script>