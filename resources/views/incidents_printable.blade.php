<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Incident Logs</title>
    <div align="center">
        <figure>
            
            <img src="{{ public_path() }}/uploads/ilog_dark.png" width="100px" />
            {{--<figcaption style="font-family:Arial, Helvetica, sans-serif;">Republic of the Philippines</figcaption>--}}
            <figcaption style="text-align: center; font-family:Arial, Helvetica, sans-serif;"><b style="text-decoration: underline;">Intelligent Logbook</b></figcaption><br>
            <figcaption style="font-family:Arial, Helvetica, sans-serif;">Incident Logbook.</figcaption>
        </figure>

    </div>
    <div class="row" style="padding:4px; background-color: #666666; margin-bottom: 4px; "></div>
    <style>
        .text-right {
            text-align: right;
        }
    </style>


</head>



<body style="background: white">

    <div class="panel-body">
        <!-- FIRST ROW -->
        <p style="font-size: 18px">

        </p>

        <style>
            table,
            td,
            th {
                border: 1px solid black;
                border-collapse: collapse;
            }

            .borderless {
                border-bottom: 0px;
                border-left: 0px;
                border-right: 0px;
                border-top: 0px;
                border-collapse: separate;
            }
        </style>

        <table style="width: 100%; background-color: transparent">
        
            <tr >
            
                <td class="borderless" style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; ">&nbsp;&nbsp;Guard Name: <b style="text-decoration: underline;">{{$name}}</b></td>
                <td class="borderless" style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;">date: <b style="text-decoration: underline;"><?php echo date('F d, Y'); ?></b></td>

            </tr>

            <tr>
                
                <td class="borderless" style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;">&nbsp;&nbsp;job role: <b style="text-decoration: underline;">{{$job_role}}</b></td>
                
                @if($start!="" && $end!="")
                    <td class="borderless" style="font-family:Arial, Helvetica, sans-serif;">DATE FROM: <b style="text-decoration: underline;">{{$start}}</b>
                    DATE TO: <b style="text-decoration: underline;">{{$end}}</b></td>
                @elseif(empty($start) && empty($end) )
                    <td class="borderless" style="font-family:Arial, Helvetica, sans-serif;">&nbsp;<b style="text-decoration: underline;"></b></td>
                @elseif($start!="" && $end=="")
                    <td class="borderless" style="font-family:Arial, Helvetica, sans-serif;">INCIDENT DATE: <b style="text-decoration: underline;">{{$start}}</b></td>
                @endif
            </tr>

            
            
        </table>
        <br>
        <table style="font-size: 15px; width: 100%;" border="1" cellpadding="5">
            <thead style="text-align:center">


                <tr>

                    <th  style=" font-family:Arial, Helvetica, sans-serif;"> Location </th>
                    <th  style="font-family:Arial, Helvetica, sans-serif;"> Type </th>
                    <th  style="font-family:Arial, Helvetica, sans-serif;"> Date Created </th>
                    <th  style="font-family:Arial, Helvetica, sans-serif;"> Description </th>
                    

                </tr>

            </thead>
            <tbody>

                @foreach($logs as $row)


                <tr>

                    <td  style=" text-align: center; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; " >{{$row->RLI_LOCATIONAME}}</td>
                    <td  style=" text-align: center; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;">{{$row->RIT_TYPE}}</td>
                    <td  style=" text-align: center; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; width:22%">{{$row->RIL_DATEADDED}}</td>
                    <td  style=" text-align: center; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;">{{$row->RIL_DESC}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    <div class="row" style="padding:4px; background-color: #666666; margin-bottom: 4px; "></div>
    <div class="" style="font-size: 17px; font-family: arial; text-align: center">
        <br>
        <br>

    </div>
    <!-- end panel-body -->
    <div class="panel" style="text-align: center">
        <b style="width: 70%; font-family:Arial, Helvetica, sans-serif;">Generated by</b><br><br>
        <p style=" font-family:Arial, Helvetica, sans-serif;">
            <u>{{Auth::user()->name}}</u><br>
            Name<br><br>

        </p>
    </div>
    </div>
    <!-- END TABLE -->

</body>

</html>

<script type="text/javascript">
</script>
<!--  <label><b>CERTIFICATION</b></label>
        <p style="margin: 20px">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        I hereby certify on my official oath that the foregoing is a correct and complete record of all residents.
        </p> -->