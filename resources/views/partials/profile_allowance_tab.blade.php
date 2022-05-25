<p><b> Assign Additional Allowance to this Employee </b></p>

<form action="{{ route('store_employee_allowance')}}" id="store_employee_allowance_form">
    <input type="hidden" name="created_by" value="{{auth()->id()}}">
    <input type="hidden" name="user_id" class="employee_id_value__">
    @csrf()
    
<section class="row">
    <div class="col-md-4">
        <div class="form-group">
          <input type="text" name="name" required class="form-control" placeholder="Allowance Name...">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <input type="text" name="description" class="form-control" placeholder="Description...">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <input type="number" step="any" name="amount" required class="form-control" placeholder="Amount... ">
        </div>
    </div>
</section>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-success"> Add Allowance </button>
</div>
</form>

<hr>
<section class="table-responsive">
    <table class="table-hover table-bordered table-striped">
        <thead class='word_no_wrap'>
            <tr>
                <th>#</th>
                <th> Allowance </th>
                <th> Amount ({{currency()}})</th>
                <th> Description</th>
                <th> Created By</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody class="employee_allowance_table_records_"></tbody>
    </table>
</section>

