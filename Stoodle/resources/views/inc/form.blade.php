@if ( $for === 'college' )
    <div class="form-group">
        <label for="admittance"> {{ $text[1] }} </label>
        <select class="custom-select" name="admittance" id="admittanceSelect">
            <option value="1">Da</option>
            <option value="0">Nu</option>
        </select>
        @error('admiitance')
                <small> {{ $message }} </small>
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
        <small> {{ $message }} </small>
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
                <small> {{ $message }} </small>
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
            <small> {{ $message }} </small>
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject2" class="classSelect">
        @foreach ( $data['subjects'] as $subject )
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    @error('subject2')
            <small> {{ $message }} </small>
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject3" class="classSelect">
        @foreach ( $data['subjects'] as $subject )
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    @error('subject3')
            <small> {{ $message }} </small>
    @enderror
    @if ( session('error') )
        <small> {{ session('error') }} </small>
    @endif
</div>
<div class="form-group">
    <label for="profil"> {{ $text[3] }} </label>
    <select class="custom-select" name="profil" id="branchSelect">
        @foreach ( $data['profils'] as $profil )
            <option value="{{ $profil->id }}">{{ $profil->name }}</option>
        @endforeach
    </select>
    @error('profil')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="stress"> {{ $text[4] }} </label>
    <select class="custom-select" name="stress" id="passionSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('stress')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="job"> {{ $text[5] }} </label>
    <select class="custom-select" name="job" id="jobSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('job')
            <small> {{ $message }} </small>
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
            <small> {{ $message }} </small>
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
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="social"> {{ $text[8] }} </label>
    <select class="custom-select" name="social" id="socialSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>   
    </select>
    @error('social')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="sport"> {{ $text[9] }} </label>
    <select class="custom-select" name="sport" id="sportSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>                       
    </select>
    @error('sport')
            <small> {{ $message }} </small>
    @enderror
</div>