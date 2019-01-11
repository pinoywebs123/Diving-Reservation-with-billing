@extends('customer.template')

@section('styles')
  
@endsection

@section('contents')
<h2 class="text-center">Reservation Form</h2>
<div class="row">
	   
      <div class="col-md-6">
        <h3 class="text-center">Diving Course</h3>
        <div class="alert alert-warning">
         <h4 style="color: black;">Note: Age below 12 are not allowed to take our services. Thank You.</h4>
       </div>
        <input type="date" class="form-control" id="start_date">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Course Title</th>
              <th>Description</th>
              <th>No. Pax</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="1" id="1">
                 Discover Scuba Diving
              </td>
              <td>
                <p>PHP 2,500</p>
                <p>2 Hours and 1 Dive</p>
               
              </td>
              <td>
                <input type="number" id="1a" class="form-control" disabled="" value="0">
              </td>
            </tr>

             <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="2">
                 Open Water
              </td>
              <td>
                <p>PHP 19,500</p>
                <p>3-4 Days and 5 Dives</p>
               
              </td>
              <td>
                <input type="number" id="2a" class="form-control" disabled="" value="0">
              </td>
            </tr>

            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="3">
                 Advance Open Water
              </td>
              <td>
                <p>PHP 16,500</p>
                <p>2 Days and 5 Dives</p>
                
              </td>
              <td>
                <input type="number" id="3a" class="form-control" disabled="" value="0">
              </td>
            </tr>

            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="4">
                 Rescue Diver
              </td>
              <td>
                <p>PHP 18,500</p>
                <p>2-3 Days and 5 Dives</p>
                
              </td>
              <td>
                <input type="number" id="4a" class="form-control" disabled="" value="0">
              </td>
            </tr>

            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="5">
                 Emergency First Response (E.F.R)
              </td>
              <td>
                <p>PHP 8,000</p>
                <p>Half Day</p>
                
              </td>
              <td>
                <input type="number" id="5a" class="form-control" disabled="" value="0">
              </td>
            </tr>

            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="6">
                 Dive Master Internship
              </td>
              <td>
                <p>PHP 35,000</p>
                <p>3 Weeks</p>
                
              </td>
              <td>
                <input type="number" id="6a" class="form-control" disabled="" value="0">
              </td>
            </tr>

            <tr>
              <td>
                 <input type="checkbox" name="vehicle1" value="2" id="7">
                Nitrox
              </td>
              <td>
                <p>PHP 12,000</p>
                <p>2 Days and 2 Dives</p>
                
              </td>
              <td>
                <input type="number" id="7a" class="form-control" disabled="" value="0">
              </td>
            </tr>
           
              
           
          </tbody>
        </table>
        <button class="btn btn-primary btn-block" id="submitBtn">SUBMIT COURSE</button>
      </div>

      <div class="col-md-6">
        
        <h3 class="text-center">Plain Diving</h3>
        
       <form action="{{route('customer_reservation_check')}}" method="POST">

        <div class="form-group {{$errors->has('start_date') ? 'has-error': ''}}">
          <label>Start Date</label>
          <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}">
        </div>
        <div class="form-group {{$errors->has('end_date') ? 'has-error': ''}}">
          <label>End Date</label>
          <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}">
        </div>
        <div class="form-group {{$errors->has('person') ? 'has-error': ''}}">
          <label>Number of Persons</label>
          <input type="number" name="person" class="form-control"  min="1" value="{{old('person')}}">
        </div>
        <div class="form-group {{$errors->has('diver') ? 'has-error': ''}}">
          <label>Do you have your own Diving equipments?</label>
          <select name="diver" class="form-control">
            <option value="1200">No</option>
            <option value="1000">Yes</option>
          </select>
        </div>

         <p class="text-center">
          <button class="btn btn-success" type="submit">SUBMIT</button>
          <button class="btn btn-default">CLEAR</button>
        </p>
        @csrf
      </form>
       
      </div>
      
      </div>
     
</div>

 
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    var start_date = $("#start_date").val();
    var url = '{{route('customer_diving_course')}}';
    var token = '{{Session::token()}}';
    var data = {
      "a1": 0,
      "a2": 0,
      "a3": 0,
      "a4": 0,
      "a5": 0,
      "a6": 0,
      "a7": 0

    };
    var a1 = 0;
    var a2 = 0;
    var a3 = 0;
    var a4 = 0;
    var a5 = 0;
    var a6 = 0;
    var a7 = 0;
    var a1_person = 0;
    var a2_person = 0;
    var a3_person = 0;
    var a4_person = 0;
    var a5_person = 0;
    var a6_person = 0;
    var a7_person = 0;
    $("#submitBtn").click(function(){

        if(a1 == 1){
          a1_person = $("#1a").val()
          
        }
        if(a2 == 1){
          a2_person = $("#2a").val()
         
        }
        if(a3 == 1){
           a3_person = $("#3a").val()
         
        }
        if(a4 == 1){
          a4_person = $("#4a").val()
         
        }
        if(a5 == 1){
          a5_person = $("#5a").val()
          
        }
        if(a6 == 1){
          a6_person = $("#6a").val()
          
        }
        if(a7 == 1){
          a7_person = $("#7a").val()
          
        }

     
        $.ajax({
            method: 'POST',
            url: url,
            data: {"_token": token ,"a1": a1_person,"a2": a2_person,"a3": a3_person,"a4": a4_person,"a5": a5_person,"a6": a6_person,"a7": a7_person, "date": $("#start_date").val()},
            success: function(msg){
              console.log(msg);
              if(msg.length < 1){
                 alert("Courses successfully submitted");
              }
              msg.forEach(function(aw) {
                if(aw == 1){
                  alert("Discover Scuba Diving has conflict");
                }else if(aw == 2){
                  alert("Open Water has conflict");
                }
                else if(aw == 3){
                    alert("Advance Open Water has conflict");
                }
                else if(aw == 4){
                  alert("Rescue Diver has conflict");
                }
                else if(aw == 5){
                  alert("Emergency First Response has conflict");
                }
                else if(aw == 6){
                  alert("Dive Master Internship has conflict");
                }
                else if(aw == 7){
                  alert("Nitrox has conflict");
                }

              });
            }

        });
    });

      $("#1").change(function() {
            if(this.checked) {
                $("#1a").removeAttr("disabled");
                a1 = 1;
                console.log(a1);
            }else if(!this.checked){
              $("#1a").attr("disabled","true");
              a1 = 0;
              console.log(a1);
            }
      });

      $("#2").change(function() {
            if(this.checked) {
                $("#2a").removeAttr("disabled");
                a2 = 1;
                console.log(a2);
            }else if(!this.checked){
            
              $("#2a").attr("disabled","true");
              a2 = 0;
              console.log(a2);
            }
      });

      $("#3").change(function() {
            if(this.checked) {
                $("#3a").removeAttr("disabled");
                a3 = 1;
                console.log(a3);
            }else if(!this.checked){
            
              $("#3a").attr("disabled","true");
              a3 = 0;
              console.log(a3);
            }
      });

      $("#4").change(function() {
            if(this.checked) {
                $("#4a").removeAttr("disabled");
                a4 = 1;
                console.log(a4);
            }else if(!this.checked){
            
              $("#4a").attr("disabled","true");
              a4 = 0;
              console.log(a4);
            }
      });

      $("#5").change(function() {
            if(this.checked) {
                $("#5a").removeAttr("disabled");
                a5 = 1;
                console.log(a5);
            }else if(!this.checked){
            
              $("#5a").attr("disabled","true");
              a5 = 0;
              console.log(a5);
            }
      });

      $("#6").change(function() {
            if(this.checked) {
                $("#6a").removeAttr("disabled");
                a6 = 1;
                console.log(a6);
            }else if(!this.checked){
            
              $("#6a").attr("disabled","true");
              a6 = 0;
              console.log(a6);
            }
      });

      $("#7").change(function() {
            if(this.checked) {
                $("#7a").removeAttr("disabled");
                a7 = 1;
                console.log(a7);
            }else if(!this.checked){
            
              $("#7a").attr("disabled","true");
              a7 = 0;
              console.log(a7);
            }
      });



  });
</script>
@endsection