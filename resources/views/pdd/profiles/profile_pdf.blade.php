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
    <title>{{$employee->name}}</title>

</head>
<body>
    <table id="customer"> 
<tr>
    <td>
        <!-- <h2> -->
            <!-- <?php $image_path ='/upload/employee/20211019024459.png';?> -->
           
            <img id="message"src="{{(!empty($employee->picture))?url('/profile_picture/' . $employee->picture):url('/logo/'.'logo.png')}}"   style="width: 150px;"/> 
            <!-- <img src =" public_path(). $image_path" width="100" height="100"> -->

         <!-- </h2> -->
    </td>

       
		             
		
           
      



<td style="text-align: center">
    <h2>Ministry of Fisheries and Marine Resource Development</h2>
    <p>Phone:75021099</p>
    <p>Email:info@mfmrd.gov.ki</p>
    
    <p></p>

</td>  
 
</tr>

    </table>
    <br>
    <br>
    {{--<div class="columnTitle">
        <h3 style=" margin-top: 0px;">
		             
			Employee attendance report  for the <strong>Month : </strong>  </br>
        </h3>

         <table width="100%">
            <tr>
                <td align="left"><h6>ID#: {{$employee->id_no}} </h6></td>
                <td width="40px">&nbsp;</td>
                <td align="left">
                   <img id="message" src="{{url('/profile_picture/20220615232745.jpg')}}"   style="width: 150px;"/>
              </td>
            </tr>
        </table> 
    </div>--}}
</div>
    <br>
    <br>
    <strong>Employee Name :</strong> {{$employee->name}}
    

    <table id="customer"> 
            {{--<tr>

            <td width=50%>Date</td>
            <td width=50%>Father Name</td>
            <td width=50%>Mother Name</td>
            <td width=50%>DoB</td>
            
        
            </tr>

            <tr>

            <td width=50%>{{$employee['father_name']}}</td>
            <td width=50%>{{$employee->mother_name}}</td>
            <td width=50%>{{$employee->date_of_birth}}</td>
            
                
            </tr>
  

    <tr id="customer">
        <td id="customer" colspan="2">
            <strong>Total Absent : </strong> {{$employee['designation']['designation']}}
            <strong>Total Leave :</strong> 
        </td>
    </tr>--}}
        <tbody >
   
    
    <tr >
      <th >DoB</th>
      <td >{{$employee->date_of_birth}}</td>
    </tr>
    <tr >
      <th >Joining Date</th>
      <td  >{{$employee->joining_date}}</td>
    </tr>
    <tr >
      <th >Email</th>
      <td >{{$employee->email}}</td>
    </tr>
    <tr >
      <th >Current Address</th>
      <td >{{$employee->present_address}}</td>
    </tr>
   
   
    <tr >
      <th  >Emergency Contact</th>
      <td >{{$employee->emergency_contact}}</td>
    </tr>

    
    <tr >
      <th >Designation</th>
      <td >{{$employee->designation}}</td>
    </tr>

    <tr >
      <th >Acadaemic Qualification</th>
      <td >{{$employee->academic_qualification}}</td>
    </tr>

   {{--<tr >
      <th >Department</th>
      <td >{{$employee->department?'':''}}</td>
    </tr>--}}

   {{--<tr >
      <th >Home Island</th>
      <td >{{$employee->home_district}}</td>
    </tr>--}}

  </tbody>
    </table>
    <br>
    <br>
    <br>
    <hr>
    <i style="font-size: 10px; float: right;"><strong>Print Date : {{date("d M Y")}}</strong></i>
    <!-- <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px"> -->

    
</body>
</html>