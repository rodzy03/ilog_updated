<style>
    #table_db {
        table-layout: fixed;
        width: 100%;
    }
</style>


<div class="row" style="margin-top:-20px; ">
    <div class="table-responsive">
        <table class="table m-b-0" id="table_db">
            <tbody>
                <tr>
                    <td>
                        <!-- begin col-3 -->
                        <div class="">
                            <div class="widget widget-stats " style="background-color: #050A30;">
                                <div class="stats-icon"><i class="fa fa-user-secret" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL SUPERVISORS </h4>
                                    <p>
                                        {{\DB::table('r_account_information')->where('RAI_TYPE',2)->where('ACTIVE_FLAG',1)->count()}}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                    </td>
                    <td>
                        <div class="">
                            <div class="widget widget-stats bg-blue-darker">
                                <div class="stats-icon"><i class="fa fa-user"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL GUARDS <strong style="color: white"></strong></h4>
                                    <p>
                                        {{\DB::table('r_account_information')->where('RAI_TYPE',1)->where('ACTIVE_FLAG',1)->count()}}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="widget widget-stats" style="background-color: #050A30;">
                                <div class="stats-icon"><i class="fa fa-user-secret" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>SUPERVISORS ON DUTY</h4>


                                    <p>
                                    {{ DB::table('v_admin_get_locations')->where('TGS_STATUS',1)->where('RAI_TYPE',2)->count() }}
                                        
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="widget widget-stats bg-blue-darker">
                                <div class="stats-icon"><i class="fa fa-user"></i></div>
                                <div class="stats-info">
                                    <h4>GUARD ON DUTY </h4>
                                    <p>
                                        {{ DB::table('v_admin_get_locations')->where('TGS_STATUS',1)->where('RAI_TYPE',1)->count() }}
                                        
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- begin col-3 -->
                        <div class="">
                            <div class="widget widget-stats bg-green-darker">
                                <div class="stats-icon"><i class="fa fa-map-marker-alt"></i></div>
                                <div class="stats-info">
                                    <h4>ACTIVE PERSONNEL</h4>
                                    <p>
                                    {{ DB::table('v_admin_get_locations')->where('TGS_STATUS',1)->count() }}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end row -->
<div class="row" style="margin-top:-22px; ">
    <div class="table-responsive">
        <table class="table m-b-0" id="table_db">
            <tbody>
                <tr>
                    <td>
                        <!-- begin col-3 -->
                        <div class="">
                            <div class="widget widget-stats " style="background-color: #050A30;">
                                <div class="stats-icon"><i class="fa fa-user-secret" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL CLIENTS </h4>
                                    <p>
                                    {{\DB::table('t_clients')->count()}}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                    </td>
                    <td>
                        <!-- begin col-3 -->
                        <div class="">
                            <div class="widget widget-stats bg-black-darker">
                                <div class="stats-icon"><i class="fa fa-hourglass" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL PERSONNEL</h4>
                                    <p>
                                    {{\DB::table('r_account_information')->count()}}

                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <!-- end col-3 -->
                    </td>
                    
                    <td>
                        <div class="">
                            <div class="widget widget-stats bg-yellow-darker">
                                <div class="stats-icon"><i class="fa fa-user-secret" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL LOCATIONS</h4>
                                    <p>
                                    {{ \DB::table('v_get_duty_hours')->value('LOCATION_COUNT') }}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="widget widget-stats " style="background-color: #050A30;">
                                <div class="stats-icon"><i class="fa fa-wrench"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL ASSETS</h4>
                                    <p>
                                    {{\DB::table('r_assets')->where('ACTIVE_FLAG',1)->count()}}
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <div class="widget widget-stats bg-black-darker">
                                <div class="stats-icon"><i class="fa fa-wrench" style="filter: brightness(0) invert(1);"></i></div>
                                <div class="stats-info">
                                    <h4>TOTAL VISITORS</h4>
                                    <p>
                                        0
                                    </p>
                                </div>
                                <div class="stats-link">
                                    <a href="javascript:;">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end row -->
