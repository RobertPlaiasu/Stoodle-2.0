@if ( $for === 'college' )
    <div class="form-group">
        <label for="admittance"> {{ $text[1] }} </label>
        <select class="custom-select" name="admittance" id="admittanceSelect">
            <option value="1">Da</option>
            <option value="0">Nu</option>
        </select>
        @error('admiitance')
                {{ $message }}
        @enderror
    </div>
@endif
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
@if ( $for === 'user')
    <div class="form-group">
        <label for="passion-metter"> {{ $text[1] }} </label> <br>
        <input class="radio" type="radio" name="passionIntensity" id="budget-1" value="1" checked>
            <label class="for-radio" for="budget-1">
                <span data-hover="1">1</span>
            </label>
        <input class="radio" type="radio" name="passionIntensity" id="budget-2" value="2">
            <label class="for-radio" for="budget-2">							
                <span data-hover="2">2</span>
            </label>    
        <input class="radio" type="radio" name="passionIntensity" id="budget-3" value="3">
            <label class="for-radio" for="budget-3">							
                <span data-hover="3">3</span>
            </label>
        <input class="radio" type="radio" name="passionIntensity" id="budget-4" value="4">
            <label class="for-radio" for="budget-4">							
                <span data-hover="4">4</span>
            </label>
        <input class="radio" type="radio" name="passionIntensity" id="budget-5" value="5">
            <label class="for-radio" for="budget-5">							
                <span data-hover="5">5</span>
            </label>
            @error('passionIntenstity')
                {{ $message }}
            @enderror
    </div>
@endif
<div class="form-group">
    <label for="classes"> {{ $text[2] }} </label>
    <select class="custom-select mb-2 classSelect" name="subject1" class="classSelect">
        @foreach ( $data['subjects'] as $subject )
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    @error('subject1')
            {{ $message }}
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject2" class="classSelect">
        @foreach ( $data['subjects'] as $subject )
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    @error('subject2')
            {{ $message }}
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject3" class="classSelect">
        @foreach ( $data['subjects'] as $subject )
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    @error('subject3')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="profil"> {{ $text[3] }} </label>
    <select class="custom-select" name="profil" id="branchSelect">
        @foreach ( $data['profils'] as $profil )
            <option value="{{ $profil->id }}">{{ $profil->name }}</option>
        @endforeach
    </select>
    @error('profil')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="stress"> {{ $text[4] }} </label>
    <select class="custom-select" name="stress" id="passionSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('stress')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="job"> {{ $text[5] }} </label>
    <select class="custom-select" name="job" id="jobSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('job')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="books"> {{ $text[6] }} </label>
    <select class="custom-select" name="books" id="booksSelect">
        @foreach ( $data['books'] as $book )
            <option value="{{ $book->id }}">{{ $book->name }}</option>
        @endforeach
    </select>
    @error('books')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="county"> {{ $text[7] }} </label>
    <select class="custom-select" name="county" id="countyPassion">
        @foreach ( $data['counties'] as $county )
            <option value="{{ $county->id }}">{{ $county->name }}</option>
        @endforeach
    </select>
    @error('county')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="social"> {{ $text[8] }} </label>
    <select class="custom-select" name="social" id="socialSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>   
    </select>
    @error('social')
            {{ $message }}
    @enderror
</div>
<div class="form-group">
    <label for="sport"> {{ $text[9] }} </label>
    <select class="custom-select" name="sport" id="sportSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>                       
    </select>
    @error('sport')
            {{ $message }}
    @enderror
</div>