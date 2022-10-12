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
            float: left;
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

                #customer tr:nth-child{
                   background-color: #f2f2f2;
                   padding-top: 12px;
                   padding-bottom: 12px;
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

    {{--<td>
        <!-- <h2> -->
            <!-- <?php $image_path ='/upload/employee/20211019024459.png';?> -->
           
            <img id="message"src="{{(!empty($employee->picture))?url('/profile_picture/' . $employee->picture):url('/logo/'.'logo.png')}}"   style="width: 150px;"/> 
            <!-- <img src =" public_path(). $image_path" width="100" height="100"> -->

         <!-- </h2> -->
    </td>
--}}
<td style="text-align: center">
<img id="message" src="{{url('/logo/cams.png')}}"   style="width: 150px;"/>
        </td>    
		             
		
           
      



<td style="text-align: center">
    <h2>Ministry of Fisheries and Marine Resource Development</h2>
    <p>Coastal Fisheries Division</p>
    <p>All Employees Attendance List</p>
    
    

</td>  
 
</tr>

    </table>
   
    {{--<div class="columnTitle">
        <h3 style=" margin-top: 0px;">
		             
			Employee attendance report  for the <strong>Month : </strong>  </br>
        </h3>

         <table width="100%">
            <tr>
                <td align="left"><h6>ID#: {{$users->name}} </h6></td>
                <td width="40px">&nbsp;</td>
                <td align="left">
                   <img id="message" src="{{url('/logo/cams.png')}}"   style="width: 150px;"/>
              </td>
            </tr>
        </table> 
    </div>--}}
</div>
  
   
    

    <table id="customer"> 
                <thead>
                            <tr>
                             
                                <th> {{ __(' Employee Name') }}</th>
                                <th> {{ __(' Date') }}</th>
                                <th> {{ __(' In Time') }}</th>
                                <th> {{ __(' Out Time') }} </th> 
                                
                            </tr>
                </thead>
        <tbody>
   
            @foreach($allAttendance as $attd)
            <tr>
          
              <td>{{ $attd->name }}</td>
              <td>{{ $attd->logdate }}</td>          
              <td>{{ $attd->timein }}</td>
              <td>{{ $attd->timeout }}</td>
              
            </tr>
            @endforeach

  </tbody>
    </table>
    <br>
    <br>
    <br>
    <hr>
    <i style="font-size: 10px; float: right;"><strong>Print Date : {{date("d M Y")}}</strong></i>
    

    
</body>
</html>