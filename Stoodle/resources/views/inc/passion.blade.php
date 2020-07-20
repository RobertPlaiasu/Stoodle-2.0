<div class="form-group">
    <label for="passion"> {{ $text[0] }} </label>
    <select class="custom-select" id="passionSelect" name="passion">
        @if (isset($college))
            @foreach ( $data['passions'] as $passion )
                <option value="{{ $passion->id }}"
                    @if ($passion->id == $college->passion_id)
                        selected
                    @endif
                    > {{ $passion->name }} </option>
            @endforeach
        @else
            @foreach ( $data['passions'] as $passion )
                <option value="{{ $passion->id }}"
                    @if ($passion->id == old('passion'))
                        selected
                    @endif> {{ $passion->name }} </option>
            @endforeach
        @endif
    </select>
    @error('passion')
        {{ $message }}
    @enderror
</div>