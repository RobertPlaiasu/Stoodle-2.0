
<div class="form-group">
    <label for="classes"> {{ $text[1] }} </label>
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
    <label for="profil"> {{ $text[2] }} </label>
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
    <label for="stress"> {{ $text[3] }} </label>
    <select class="custom-select" name="stress" id="passionSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('stress')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="job"> {{ $text[4] }} </label>
    <select class="custom-select" name="job" id="jobSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>
    </select>
    @error('job')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="books"> {{ $text[5] }} </label>
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
    <label for="county"> {{ $text[6] }} </label>
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
    <label for="social"> {{ $text[7] }} </label>
    <select class="custom-select" name="social" id="socialSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>   
    </select>
    @error('social')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="sport"> {{ $text[8] }} </label>
    <select class="custom-select" name="sport" id="sportSelect">
        <option value="1">Da</option>
        <option value="0">Nu</option>                       
    </select>
    @error('sport')
            <small> {{ $message }} </small>
    @enderror
</div>