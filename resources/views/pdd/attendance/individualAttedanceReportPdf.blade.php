<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    .columnLogo {
            /* font-size: 10px; */
            float: left;
            width: 10%;
            margin-right: 10px;
            /* text-align: center; */
        }
        #columnTitle {
            font-size: 10px;
            /* float: left; */
            width: 68%;
            text-align: center;
        }
        #customer{
            /* font-family: Arial, Helvetica, sans-serif;
            border-collapse: Collapse; */
            width: 100%;
            /* font-size: 13px; */
            /* float: left; */
            /* width: 68%; */
            /* text-align: left; */

               }

               #customer td, #customer th {
                   border: 1px solid #add;
                   padding: 8px;
                  

                }

                #customer tr:nth-child(even){
                   background-color: #f2f2f2;
                   padding: 8px;

                }

                #customer tr:hover{
                   background-color: #add;
                   padding: 8px;

                }

                #customer td:nth-child{
                   background-color: #f2f2f2;
                   padding-top: 1px;
                   padding-bottom: 1px;
                   text-align: #4CAF50;
                   color:white;
                   font-size: 26px;

                }

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>
<body>
    <table id="customer"> 
            <tr>
                <td style="text-align: center">
                    <img id="message" src="{{url('/logo/cams.png')}}"   style="width: 150px;"/>
                </td> 
                <td style="text-align: center">
                    <h2>Ministry of Fisheries and Marine Resource Development</h2>
                    <p>Phone:75021099</p>
                    <p>Email:info@mfmrd.gov.ki</p>
                </td>  

            </tr>

    </table>
   
    <table id="customer"> 
        <thead>
            <tr>
                <th> {{ __(' Date') }}</th>
                <th> {{ __(' In Time') }}</th>
                <th> {{ __(' Out Time') }} </th> 
            </tr>
        </thead>
        <tbody >

            @foreach($attendance as $attd)
                <tr>
                    <td>{{ $attd->logdate }}</td>          
                    <td>{{ $attd->timein }}</td>
                    <td>{{ $attd->timeout }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="st-left-body">
        <table class="table table-bordered table-striped">
        <thead>

        </thead>
            <tbody>
                <tr>
                    <th>{{ __('Total') }}</th>
                    <th>{{$attendance->count()}} days</th>
                </tr>
                <tr>
                    <th>{{ __('Total') }}</th>
                    <th>{{$attds->count()}} {{ __('Present') }}</th>
                </tr>
                <tr>
                    <th>{{ __('Total') }}</th>
                    <th>{{$abs->count()}} {{ __('Absence') }}</th>
                </tr>

                
            </tbody>
        </table>
    </div><!--printable-->
        <div class="sign-body-l">
            -----------------------------------<br>
        </div>
        <div class="sign-body-r">
            -----------------------------------<br>{{ __('Issued by') }}."".{{Auth::user()->name}}
        </div>
    <br>
    <br>
    <br>
    <hr>
    <i style="font-size: 10px; float: right;"><strong>Print Date : {{date("d M Y")}}</strong></i>
    

    
</body>
</html>