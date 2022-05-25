<select name="step_id" required class="form-control step_id_" id="step_id">
<option value=""> -Level- </option>
    @foreach( auth()->user()->fetch_all_steps() as $step )
    <option value="{{ $step->id }}"> {{ $step->name}} </option>
    @endforeach
</select>