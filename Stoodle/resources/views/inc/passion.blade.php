<div class="form-group">
    <label for="passion"> {{ $text[0] }} </label>
    <select class="custom-select" id="passionSelect" name="passion">

        @foreach ( $data['passions'] as $passion )
            <option value="{{ $passion->id }}"> {{ $passion->name }} </option>
        @endforeach
    </select>
    @error('passion')
        {{ $message }}
    @enderror
</div>