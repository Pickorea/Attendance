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
    <title>Leave application</title>

</head>
<body>

      <!-- Main content -->
      <section>
        <!-- Default box -->
        <div class="box">
        <table id="customer">
           <tr>
                <td>
                <img src="{{ url('/logo/'.'logo.png') }}"   style="width: 150px;"/> 
                </td>
                <td style="text-align: center">
                <h2>Ministry of Fisheries and Marine Resource Development</h2>
                <p>Phone:75021099</p>
                <p>Email:info@mfmrd.gov.ki</p>
                </td>
          </tr>
          </table>
          <br>
          <br>
          Name of Applicant:  &#160; {{$leave_application['name']}}
          <table id="customer">
              <tbody>
              
              <tr >
                  <th  >{{ __('Designation') }}</th>    
                  <td>{{$leave_application['designation']}}</td>
             </tr>
              <tr >
                <th >{{ __('Leave Category') }}</th>
                <td>{{ $leave_application['leave_category'] }}</td>
              </tr>
              <tr >
                <th >Start Leave Date</th>
                <td>{{ date("d F Y", strtotime( $leave_application['start_date'] )) }}</td>
              </tr>
              <tr >
                <th >Resume Date</th>
                <td>{{ date("d F Y", strtotime($leave_application['end_date'])) }}</td>
              </tr>
              <tr >
                <th >Leave Days</th>
                <td>{{$leave_application['num_days']}}</td>
              </tr>
              <tr >
                <th >Reason</th>
                <td>{{ $leave_application['reason'] }}</td>
              </tr>
              <tr >
                <th >Apply Date</th>
                <td>{{ date("D d F Y h:ia", strtotime($leave_application['created_at'])) }}</td>
              </tr>
                 </tbody>
            </table>
            <section>
              <br>
            <div class="signatur">
              <strong class="signleft">{{ __('Signature of Applicant') }}</strong>   &#160;    ..........................
            </div>

            <div class="oficsign"> 
              <h4><strong>{{ __('For Office Use only') }}</strong></h4>
            </div>
            </section>   
            <table class="table table-bordered table-striped">

              <tbody>
              
                <tr>
                  <td colspan="3"><strong>{{ __('ACTION ON APPLICATION') }}</strong></td>
                  
                </tr>

                <tr>
                  <td>
                    <div>
                    <h4> {{ __('APPROVED FOR') }}</h4>
                    <p>...........{{ __('Days With Pay') }}</p>              
                    <p>...........{{ __('Days without pay') }}</p>              
                    <p>...........{{ __('others') }}</p>
                  </div>
                  </td>
                  
                  <!-- <td>
                    <div class="dueappr">
                  <h4> {{ __('DISAPPROVED DUE TO') }} </h4>
                </div>
                </td> -->

                <!-- <td>
                    <div class="remark">
                  <h4> {{ __('Remarks') }} </h4>
                </div>
                </td> -->


                </tr>
              </tbody>
            </table>
            <br>
            <hr>
            <div>
              <strong>{{ __('Secretary') }}</strong>
            </div>
          </div><!--pintable-->
        </div>
        <!-- /.box-body -->

      <!-- /.box -->
      </section>
      <!-- /.content -->

      <div>
        <p>{{ __('Prepared By') }} {{ auth()->user()->name }}</p>
        <p>{{ __('Authorised Signature') }}</p>
    </div>
</div>
</div>
</div>
  
</body>
</html>
          

   