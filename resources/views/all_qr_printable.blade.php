

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Guard shift logs</title>
     <div align="center">
        <figure>
            {{--{{ public_path() }}/uploads/tanay_logo.jpg--}}
            <img src="" width="100px" />
            <figcaption style="font-family:Arial, Helvetica, sans-serif;">Republic of the Philippines</figcaption>
             <figcaption style="text-align: center; font-family:Arial, Helvetica, sans-serif;"><b style="text-decoration: underline;">Intelligent Logbook</b></figcaption><br>
             <figcaption style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">List of Qr Code Generated By The System.</figcaption>
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
      table, td, th{
          border: 1px solid black;
          border-collapse: collapse;
      }
      .borderless{
          border-bottom: 0px;
          border-left: 0px;
          border-right: 0px;
          border-top:0px;
          border-collapse: separate;
      }
      </style>
   
         <table style="width: 100%; background-color: transparent">
             <tr>
            
              <td class="borderless" style="width: 70%; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase; ">All Personnel</b></td>
              <td class="borderless" style="width: 30%; font-family:Arial, Helvetica, sans-serif;" >Date: <?php echo date('F d, Y');?><b style="text-decoration: underline;"></b></td>
              
          </tr>
         
          <tr>
            
              <td class="borderless" style="width: 70%; font-family:Arial, Helvetica, sans-serif;">&nbsp;</td>
              <td class="borderless" style="width: 30%; font-family:Arial, Helvetica, sans-serif;" >&nbsp;<b style="text-decoration: underline;"></b></td>
              
          </tr>
      </table>
      <br>
      <table style="font-size: 15px; width: 100%;" border="1" cellpadding="5">
          <thead style="text-align:center" >
              
            
              <tr>
                  
                  <th colspan="3" style=" font-family:Arial, Helvetica, sans-serif;"> Name </th>
                  <th colspan="3" style="font-family:Arial, Helvetica, sans-serif;"> QR Code </th>
                  
                       
              </tr>
              
          </thead>
          <tbody>
            @php ($qr_name = "asd"); @endphp
            @foreach($guards as $row)
            {{ $qr_name = $row->RAI_ACCOUNTID.$row->RAI_LASTNAME.".png" }} ;
               
            <tr>
                
                <td colspan="3" style=" text-align: center; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;">{{$row->RAI_FIRSTNAME}} {{$row->RAI_MIDDLENAME}} {{$row->RAI_LASTNAME}}</td>
                <td colspan="3" style=" text-align: center; font-family:Arial, Helvetica, sans-serif; ">
                    
                <br>
                <div id="qrcode">
                        <center>
                        <img src="{{ public_path('qr-codes/') }}{{$qr_name}}" height="200px" weight="100%">
                        </center>
                    </div>
                    <br>
                </td>
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
          <u>Supevisor</u><br>
          Name and Signature<br><br>
          
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