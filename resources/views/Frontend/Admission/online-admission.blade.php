@extends('Frontend.master')

@section('title')
    Admission
@endsection
<style>
    label.error{
    color: red !important;
}
</style>


@section('content')

  <main>
        <!-- Banner section End -->

        <section class="section_padding">
          <div class="container">

            <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-8 col-sm-12">
                <div class="section_title">
                  <div class="d-flex align-items-center justify-content-center">
                    <h2 class="">Admission Form</h2>
                  </div>
                </div>
              </div>
            </div>
            <form id="admission_form" action="{{ route('online-admission.save') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <h3 class="text-uppercase header">Student:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        id="name"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="email"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Birth Certificate Number</label>
                      <input
                        type="text"
                        name="birth_certificate"
                        class="form-control"
                        id="secondery_eamil"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Gender</label>
                      <div class="input-group">
                        <select
                          name="gender"
                          class="form-select"
                          id="gender"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select Your Gender </option>
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name">Religion</label>
                      <div class="input-group">
                        <select
                          name="religion"
                          class="form-select"
                          id="inputGroupSelect03"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                          <option value="Islam">Islam</option>
                          <option value="Hinduism">Hinduism</option>
                          <option value="Christianity">Christianity</option>
                          <option value="Buddhism">Buddhism</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Student Photo</label
                      ><br />
                      <input
                        type="file"
                        name="image"
                        class="form-control-file mt-2"
                        id="image"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Mobile Number</label>
                      <input
                        type="text"
                        name="phone"
                        class="form-control"
                        id="phone"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">BirthDate</label>
                      <input
                        type="date"
                        name="date"
                        class="form-control"
                        id="date"
                        placeholder=""
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Blood Group</label>
                      <div class="input-group">
                        <select
                          name="blood_group"
                          class="form-select"
                          id="blood_group"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select Blood Group</option>
                          <option value="A+">A+</option>
                          <option value="B+">B+</option>
                          <option value="AB+">AB+</option>
                          <option value="O+">O+</option>
                          <option value="A-">A-</option>
                          <option value="B-">B-</option>
                          <option value="AB-">AB-</option>
                          <option value="O-">O-</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name">Nationality</label>
                      <input
                        type="text"
                        name="nationality"
                        class="form-control"
                        id="nationality"
                        aria-describedby="emailHelp"
                      />
                    </div>
                </div>
              </div>
              <h3 class="text-uppercase mt-4 header">Parents:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">
                  <h6>Father's Information:</h6>
                    <div class="form-group">
                      <label for="name">Father's Name</label>
                      <input
                        type="text"
                        name="father_name"
                        class="form-control"
                        id="father_name"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Mobile Number</label>
                      <input
                        type="text"
                        name="father_phone"
                        class="form-control"
                        id="father_phone"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="NID">NID</label>
                      <input
                        type="text"
                        name="father_nid"
                        class="form-control"
                        id="NID"
                        aria-describedby="emailHelp"
                      />
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                  <h6>Mother's Information:</h6>
                    <div class="form-group">
                      <label for="mother_name"> Mother's Name</label>
                      <input
                        type="text"
                        name="mother_name"
                        class="form-control"
                        id="mother_name"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Mobile Number</label>
                      <input
                        type="text"
                        name="mother_phone"
                        class="form-control"
                        id="phone"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="NID">NID</label>
                      <input
                        type="text"
                        name="mother_nid"
                        class="form-control"
                        id="NID"
                        aria-describedby="emailHelp"
                      />
                    </div>
                </div>
              </div>
              <h3 class="text-uppercase mt-4 header">local guardian:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input
                        type="text"
                        name="local_guardian_name"
                        class="form-control"
                        id="name"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email </label>
                      <input
                        type="email"
                        name="local_guardian_email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                      />
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="phone">Mobile Number</label>
                      <input
                        type="text"
                        name="local_guardian_phone"
                        class="form-control"
                        id="phone"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="NID">NID</label>
                      <input
                        type="text"
                        name="local_guardian_nid"
                        class="form-control"
                        id="NID"
                        aria-describedby="emailHelp"
                      />
                    </div>
                </div>
              </div>
              <h3 class="text-uppercase mt-4 header">Present Address:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">

                    <div class="form-group">
                      <label for="phone">Division</label>
                      <div class="input-group">
                        <select
                          name="division"
                          class="form-select"
                          id="divisionId"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                          @foreach($divisions as $division)
                             <option value="{{ $division->id }}">{{ $division->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>




                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                      <label for="phone">District</label>
                      <div class="input-group">
                        <select
                          name="district"
                          class="form-select"
                          id="disId"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                        </select>
                      </div>
                    </div>
                </div>

                 <div class="col-lg-6 col-sm-12">

                    <div class="form-group">
                      <label for="phone">Thana/Upozila</label>
                      <div class="input-group">
                        <select
                          name="thana"
                          class="form-select"
                          id="thanaId"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">


                    <div class="form-group">
                      <label for="name">Union</label>
                      <select
                          name="union"
                          class="form-select"
                          id="unionId"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                        </select>

                    </div>

                </div>
                <div class="col-lg-6 col-sm-12">

                    <div class="form-group">
                      <label for="phone">Village</label>
                      <div class="input-group">
                        <input
                        type="text"
                        name="village"
                        class="form-control"
                        id="village"
                        aria-describedby="emailHelp"
                      />
                      </div>
                    </div>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col-lg-6">
                  <div class="form-group form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="check"
                    />
                    <span class="form-check-label" for="exampleCheck1"
                      >Same as present address</span
                    >
                  </div>
                </div>
              </div>

              <h3 class="text-uppercase mt-4 header">Permanent Address:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="phone">Division</label>
                      <div class="input-group">
                        <select
                          name="per_division"
                          class="form-select"
                          id="divisionIdPer"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                          @foreach($divisions as $division)
                             <option value="{{ $division->id }}">{{ $division->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                   <div class="form-group">
                      <label for="phone">District</label>
                      <div class="input-group">
                        <select
                          name="per_district"
                          class="form-select"
                          id="disIdPer"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                   <div class="form-group">
                      <label for="phone">Thana/Upozila</label>
                      <div class="input-group">
                        <select
                          name="per_thana"
                          class="form-select"
                          id="thanaIdPer"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="name">Union</label>
                    <select
                        name="per_union"
                        class="form-select"
                        id="unionIdPer"
                        aria-label="Example select with button addon"
                      >
                      <option selected>Select</option>

                    </select>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                      <label for="phone">Village</label>
                      <div class="input-group">
                        <input
                        type="text"
                        name="per_village"
                        class="form-control"
                        id="perVillage"
                        aria-describedby="emailHelp"
                      />
                      </div>
                  </div>
                </div>
              </div>

              <h3 class="text-uppercase mt-4 header">SSC:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">

                    <div class="form-group">
                      <label for="name">Roll</label>
                      <input
                        type="text"
                        name="ssc_roll"
                        class="form-control"
                        id="roll"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="name">GPA</label>
                      <input
                        type="text"
                        name="ssc_gpa"
                        class="form-control"
                        id="gpa"
                        aria-describedby="emailHelp"
                      />
                    </div>

                    <div class="form-group">
                      <label for="phone">Depertment</label>
                      <div class="input-group">
                        <select
                          name="ssc_depertment"
                          class="form-select"
                          id="inputGroupSelect03"
                          aria-label="Example select with button addon"
                        >
                          <option selected>---Select---</option>
                          <option value="Science">Science</option>
                          <option value="Arts">Arts</option>
                          <option value="Commerce">Commerce</option>
                        </select>
                      </div>
                    </div>



                </div>
                <div class="col-lg-6 col-sm-12">

                    <div class="form-group">
                      <label for="name">Registration</label>
                      <input
                        type="text"
                        name="ssc_registation"
                        class="form-control"
                        id="regi"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="form-group">
                      <label for="phone">Board</label>
                      <div class="input-group">
                        <select
                          name="ssc_borad"
                          class="form-select"
                          id="inputGroupSelect03"
                          aria-label="Example select with button addon"
                        >
                          <option selected>Select</option>
                          <option value="Barisal">Barisal</option>
                          <option value="Chittagong">Chittagong</option>
                          <option value="Comilla">Comilla</option>
                          <option value="Dhaka">Dhaka</option>
                          <option value="Dinajpur">Dinajpur</option>
                          <option value="Jessore">Jessore</option>
                          <option value="Mymensingh">Mymensingh</option>
                          <option value="Rajshahi">Rajshahi</option>
                          <option value="Sylhet">Sylhet</option>
                          <option value="Madrasah">Madrasah</option>
                          <option value="Technical">Technical</option>
                          <option value="DIBS(Dhaka)">DIBS(Dhaka)</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>

              <h3 class="text-uppercase mt-4 header">Willing To Admission:</h3>
              <div class="row border-section">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Course</label>
                        <div class="input-group">
                          <select
                            name="course_id"
                            class="form-select"
                            id="coursesId"
                            aria-label="Example select with button addon"
                          >
                          <option selected>---Select Course---</option>
                          @foreach($courses as $course)
                          <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                          @endforeach


                          </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                    <label for="phone">Trade</label>
                        <div class="input-group">
                            <select
                            name="trade_id"
                            class="form-select"
                            id="tradeId"
                            aria-label="Example select with button addon"
                            >
                            <option selected>---Select Trade---</option>

                            </select>
                        </div>
                    </div>
                </div>
              </div>

              <div class="button-primary mt-5 text-center">
                  <button type="submit" class="btn" style="background: #FFA601; color: #030C3D;" > Submit </button>
              </div>
            </form>
          </div>
        </section>
      </main>
@endsection



@section('js')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    if($('#admission_form'). length > 0){
        $('#admission_form').validate({
            rules: {
                name: {
                    required:true,
                },phone:{
                    required:true,
                },image:{
                    required:true,
                },email:{
                    required:true,
                    email:true,
                },image:{
                    required:true,
                },gender:{
                    required:true,
                },date:{
                    required:true,
                },nationality:{
                    required:true,
                },father_name:{
                    required:true,
                },father_phone:{
                    required:true,
                },father_nid:{
                    required:true,
                },mother_name:{
                    required:true,
                },mother_nid:{
                    required:true,
                },division:{
                    required:true,
                },thana:{
                    required:true,
                },district:{
                    required:true,
                },village:{
                    required:true,
                },union:{
                    required:true,
                },ssc_roll:{
                    required:true,
                },ssc_gpa:{
                    required:true,
                },ssc_depertment:{
                    required:true,
                },ssc_registation:{
                    required:true,
                },ssc_borad:{
                    required:true,
                },trade_id:{
                    required:true,
                },course_id:{
                    required:true,
                }
            },
            messages:{
                name: {
                    required:"Please enter Your name",
                },phone:{
                    required:"please enter mobile number",
                },image:{
                    required:"Please select image",
                },email:{
                    required:"Please enter email",
                    email:"Please enter a valid email",
                },image:{
                    required:"Please select image",
                },gender:{
                     required:"Please enter gender",
                },date:{
                    required:"Please enter date",
                },nationality:{
                    required:"Please enter nationality",
                },father_name:{
                    required:"Please enter father name",
                },father_phone:{
                    required:"Please enter father phone",
                },father_nid:{
                    required:"Please enter father nid",
                },mother_name:{
                   required:"Please enter mother name",
                },mother_nid:{
                    required:"Please enter  mother nid",
                },division:{
                    required:"Please select division",
                },thana:{
                   required:"Please select Upozila",
                },district:{
                  required:"Please select  district",
                },village:{
                    required:"Please enter  village",
                },union:{
                    required:"Please select  union",
                },ssc_roll:{
                    required:"Please enter ssc roll",
                },ssc_gpa:{
                    required:"Please enter ssc ssc GPA",
                },ssc_depertment:{
                    required:"Please select ssc Depertment",
                },ssc_registation:{
                    required:"Please enter ssc Registration",
                },ssc_borad:{
                   required:"Please enter ssc Board",
                },trade_id:{
                   required:"Please select trade",
                },course_id:{
                   required:"Please select course",
                }
            }
        })
    }


</script>


<script type="text/javascript">

  $(document).ready(function(){

    $('#divisionId').change(function(){
           var divId = $(this).val();

           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


           $.ajax({
               type:'POST',
               url:"get-district",
               data: {div_id:divId},
               success:function(data) {
                   $('#disId').html(data);

               }
           });
    });

      $('#disId').change(function(){
            var disId = $(this).val();

            $.ajax({
               type:'POST',
               url:"get-thana",
               data: {dis_id:disId},
               success:function(data) {
                   $('#thanaId').html(data);
                   // alert(data);
               }
           });
      });

      $('#thanaId').change(function(){
            var thanaId = $(this).val();

            $.ajax({
               type:'POST',
               url:"get-union",
               data: {thana_id:thanaId},
               success:function(data) {
                   $('#unionId').html(data);
                   // alert(data);
               }
           });
      });


      $("#check").click(function(){
            if(this.checked){
                var divisionId = $('#divisionId option:selected').text();
                var districtId = $('#disId option:selected').text();
                var thanaId = $('#thanaId option:selected').text();
                var unionId = $('#unionId option:selected').text();
                var village = $('#village').val();
                var divisionIdPer = $('#divisionIdPer option:selected').text(divisionId);
                var divisionIdPer = $('#disIdPer option:selected').text(districtId);
                var divisionIdPer = $('#thanaIdPer option:selected').text(thanaId);
                var divisionIdPer = $('#unionIdPer option:selected').text(unionId);
                var perVillage = $('#perVillage').val(village);

            }else{
                var divisionIdPer = $('#divisionIdPer option:selected').text('');
                var divisionIdPer = $('#disIdPer option:selected').text('');
                var divisionIdPer = $('#thanaIdPer option:selected').text('');
                var divisionIdPer = $('#unionIdPer option:selected').text('');
                var perVillage = $('#perVillage').val('');
            }
      });


      $('#divisionIdPer').change(function(){
           var divId = $(this).val();

           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


           $.ajax({
               type:'POST',
               url:"get-district-per",
               data: {div_id:divId},
               success:function(data) {
                   $('#disIdPer').html(data);

               }
           });
    });

      $('#disIdPer').change(function(){
            var disId = $(this).val();

            $.ajax({
               type:'POST',
               url:"get-thana-per",
               data: {dis_id:disId},
               success:function(data) {
                   $('#thanaIdPer').html(data);
                   // alert(data);
               }
           });
      });

      $('#thanaIdPer').change(function(){
            var thanaId = $(this).val();

            $.ajax({
               type:'POST',
               url:"get-union-per",
               data: {thana_id:thanaId},
               success:function(data) {
                   $('#unionIdPer').html(data);
                   // alert(data);
               }
           });
      });
  });


   $(document).ready(function(){

    $('#coursesId').change(function(){
           var courseId = $( "#coursesId option:selected" ).val();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


           $.ajax({
               type:'POST',
               url:"get-trade",
               data: {course_id:courseId},
               success:function(data) {
                  $('#tradeId').html(data);
               }
           });
    });
    });

</script>





@endsection
