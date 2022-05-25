<div class="modal" id="register_modal">
    <div class="modal-dialog modal-xl" role="document">

<form action="{{route('register_employee')}}" method="post">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Employee Registration </div>
            
            <div class="modal-body"> <!-- Modal-body -->
              
            <section class="row"><!-- row -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Surname </label>
                   <input type="text" required class="form-control" name="lastname" placeholder="Surname">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> First name </label>
                   <input type="text" required class="form-control" name="firstname" placeholder="First Name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Other name</label>
                   <input type="text" class="form-control" name="other_name" placeholder="Other name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Grade / Mda Level </label>
                        @include('partials.all_grades')
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Step </label>
                        @include('partials.all_steps')
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Qualification </label>
                   <input type="text" class="form-control" name="qualification" placeholder="Qualification">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Contact Address </label>
                   <input type="text" class="form-control" name="address" placeholder="Address">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Email </label>
                   <input type="email" class="form-control" name="email" placeholder="Email">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Phone </label>
                   <input type="tel" class="form-control" name="phone" placeholder="Phone">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Computer No. </label>
                   <input type="text" class="form-control" name="computer_no" placeholder="Computer No.">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Staff ID Card No</label>
                   <input type="text"  class="form-control" name="staff_id_card_no" placeholder="Staff ID Card No">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for="">  File Number </label>
                   <input type="text" class="form-control" name="file_no" placeholder="File No">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Date of Birth </label>
                   <input type="date" required class="form-control" name="dob" placeholder="Date of Birth">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Date of First Appointment </label>
                   <input type="date" class="form-control" name="date_of_first_appointment" placeholder="Date of Birth">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Entry Level </label>
                   <input type="text" class="form-control" name="entry_level" placeholder="Entry Level">
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
                   <input type="text" required maxlength="10" minlength="10" class="form-control" name="account_number" placeholder="Account Number">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> Account Name </label>
                   <input type="text" required class="form-control" name="account_name" placeholder="Account Name">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> BVN </label>
                   <input type="text" required maxlength="11" minlength="11" class="form-control" name="bvn" placeholder="BVN">
                   </div>
                </div><!-- //col -->

                <div class="col-md-4"><!-- col -->
                   <div class="form-group">
                       <label for=""> NIN </label>
                   <input type="text" class="form-control" name="nin" placeholder="NIN">
                   </div>
                </div><!-- //col -->

                

            </section><!-- //row -->

            </div><!-- //modal-body -->
            
            <div class="modal-footer">
              <section class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-success"> Register </button> &nbsp;&nbsp; 
              <button type="reset" class="btn btn-outline-primary"> Reset Form </button>&nbsp;&nbsp; 
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> Close</button>
              </section>
            </div>

        </div>
</form>
    </div>
</div>
