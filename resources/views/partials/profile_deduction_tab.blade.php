<p><b> Assign Additional Deduction to this Employee </b></p>

<form action="{{ route('store_employee_deduction')}}" id="store_employee_deduction_form">
    <input type="hidden" name="created_by" value="{{auth()->id()}}">
    <input type="hidden" name="user_id" class="employee_id_value___">
    @csrf()
    
<section class="row">
    <div class="col-md-6">
        <div class="form-group">
          <input type="text" name="name" required class="form-control" placeholder="deduction Name...">
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
          <input type="number" step="any" name="amount" required class="form-control" placeholder="Amount... ">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for=""> Start Date </label>
          <input type="date" name="start_date" required class="form-control" placeholder="Start Date..">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for=""> Due Date </label>
          <select name="due_date" required class="form-control">
              <option value=""> - Select Period - </option>
              <option value="0"> This Month  </option>
              <option value="1"> Next Month </option>
              <option value="2"> 2 Months</option>
              <option value="3"> 3 Months</option>
              <option value="4"> 4 Months</option>
              <option value="5"> 5 Months</option>
              <option value="6">6 Months</option>
              <option value="7"> 7 Months</option>
              <option value="8">8 Months</option>
              <option value="9"> 9 Months</option>
              <option value="10">10 Months</option>
              <option value="11"> 11 Months </option>
              <option value="12">12 Months </option>
          </select>
        </div>
    </div>

    <div class="col-md-12"> 
        <div class="form-group">
          <input type="text" name="description" class="form-control" placeholder="Description...">
        </div>
    </div>
</section>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-success"> Add Deduction </button>
</div>
</form>

<hr>
<section class="table-responsive">
    <table class="table-hover table-bordered table-striped">
        <thead class='word_no_wrap'>
            <tr>
                <th>#</th>
                <th> Deduction </th>
                <th> Amount ({{currency()}})</th>
                <th> Description</th>
                <th> Start Date </th>
                <th> Due Date </th>
                <th> Created By</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody class="employee_deduction_table_records_"></tbody>
    </table>
</section>

