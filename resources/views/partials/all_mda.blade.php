<select name="mda_id" required class="form-control" id="mda_id_">
    @foreach( auth()->user()->fetch_all_mda() as $mda )
    <option value="{{ $mda->id }}"> {{ $mda->name}} </option>
    @endforeach
</select> 