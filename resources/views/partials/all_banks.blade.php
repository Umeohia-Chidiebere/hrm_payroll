<select name="bank_id" required class="form-control bank_id_" id="bank_id">
    <option value=""> - select Bank - </option>
    @foreach( auth()->user()->all_bank_names() as $bank )
    <option value="{{ $bank->id }}"> {{ $bank->name }} </option>
    @endforeach
</select>