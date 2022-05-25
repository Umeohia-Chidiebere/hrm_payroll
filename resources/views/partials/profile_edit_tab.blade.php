
<form action="{{route('register_employee')}}" method="post" class="update_profile_form_data">
    <input type="hidden" value="1" name="update_profile">
    <input type="hidden" name="id" id="employee_id_value">
    @csrf()
    
            <section class="row"><!-- row -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Surname </label>
                   <input type="text" required class="form-control" id="employee_lastname" name="lastname" placeholder="Surname">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> First name </label>
                   <input type="text" required class="form-control" id="employee_firstname" name="firstname" placeholder="First Name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Other name</label>
                   <input type="text" class="form-control" id="employee_other_name" name="other_name" placeholder="Other name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Department / Organization </label>
                        @include('partials.all_grades')
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Level </label>
                        @include('partials.all_steps')
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Qualification </label>
                   <input type="text" class="form-control" name="qualification" id="employee_qualification" placeholder="Qualification">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Contact Address </label>
                   <input type="text" class="form-control" name="address" id="employee_address"  placeholder="Address">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Email </label>
                   <input type="email" class="form-control" name="email" id="employee_email"  placeholder="Email">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Phone </label>
                   <input type="tel" class="form-control" name="phone" id="employee_phone"  placeholder="Phone">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Computer No. </label>
                   <input type="text" class="form-control" name="computer_no" id="employee_computer_no"  placeholder="Computer No.">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Staff ID Card No</label>
                   <input type="text"  class="form-control" name="staff_id_card_no" id="employee_staff_id_card_no"  placeholder="Staff ID Card No">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for="">  File Number </label>
                   <input type="text" class="form-control" name="file_no" id="employee_file_no"  placeholder="File No">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Date of Birth </label>
                   <input type="date" required class="form-control" id="employee_dob" name="dob" >
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Date of First Appointment </label>
                   <input type="date" class="form-control" name="date_of_first_appointment" id="employee_date_of_first_appointment">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Entry Level </label>
                   <input type="text" class="form-control" name="entry_level" id="employee_entry_level"  placeholder="Entry Level">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Bank Name </label>
                       @include("partials.all_banks")
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Account Number </label>
                   <input type="text" required maxlength="10" minlength="10" class="form-control" name="account_number" id="employee_account_number" placeholder="Account Number">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Account Name </label>
                   <input type="text" required class="form-control" name="account_name" id="employee_account_name" placeholder="Account Name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> BVN </label>
                   <input type="text" required maxlength="11" minlength="11" class="form-control" id="employee_bvn" name="bvn" placeholder="BVN">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> NIN </label>
                   <input type="text" class="form-control" name="nin" id="employee_nin" placeholder="NIN">
                   </div>
                </div><!-- //col -->

            
            </section><!-- //row -->
            <hr>

            <p class="text-muted"> Make this Employee an Administrator </p>

            <section class="row">

                <div class="col-md-6"><!-- col -->
                 <div class="form-group">
                  <label for=""> Password </label>
                  <input type="password" name="password" class="form-control" placeholder='Your Password'>
                 </div>
                </div><!-- //col -->

                <div class="col-md-6"><!-- col -->
                 <div class="form-group">
                  <label for=""> Role </label>
                  <select name="status" class="form-control">
                  <option value="0"> None </option>
                  <option value="1"> Cashier </option>
                  <option value="2"> Supervisor </option>
                  <option value="3"> Admin </option>
                  </select>
                 </div>
                </div><!-- //col -->

            </section>

            <section class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success"> Update Profile </button> &nbsp;&nbsp; 
              <button type="reset" class="btn btn-outline-primary"> Reset Form </button>&nbsp;&nbsp; 
            </section>
           
    </form>