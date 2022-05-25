<select name="grade_id" required class="form-control grade_id_" id="grade_id_">
    <option value=""> - select Department - </option>
    @foreach( auth()->user()->fetch_all_grades() as $grade_level )
    <option value="{{ $grade_level->id }}/{{$grade_level->mda->id}}"> {{ $grade_level->name}} - {{ $grade_level->mda->name}} </option>
    @endforeach
</select>