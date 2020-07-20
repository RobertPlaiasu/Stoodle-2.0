
<div class="form-group">
    <label for="classes"> {{ $text[1] }} </label>
    <select class="custom-select mb-2 classSelect" name="subject1" class="classSelect">
        @if (isset($college))
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == $college->subject_id_1)
                        selected
                    @endif>{{ $subject->name }}</option>
            @endforeach 
        @else
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == old('subject1'))
                        selected
                    @endif>{{ $subject->name }}</option>
            @endforeach
        @endif
    </select>
    @error('subject1')
            <small> {{ $message }} </small>
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject2" class="classSelect">
        @if (isset($college))
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == $college->subject_id_2)
                        selected
                    @endif>{{ $subject->name }}</option>
            @endforeach 
        @else
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == old('subject2'))
                    selected
                    @endif>{{ $subject->name }}</option>
            @endforeach
        @endif
    </select>
    @error('subject2')
            <small> {{ $message }} </small>
    @enderror
    <select class="custom-select mb-2 classSelect" name="subject3" class="classSelect">
        @if (isset($college))
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == $college->subject_id_3)
                        selected
                    @endif>{{ $subject->name }}</option>
            @endforeach 
        @else
            @foreach ( $data['subjects'] as $subject )
                <option value="{{ $subject->id }}"
                    @if ($subject->id == old('subject3'))
                    selected
                    @endif>{{ $subject->name }}</option>
            @endforeach
        @endif
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
        @if (isset($college))
            @foreach ( $data['profils'] as $profil )
                <option value="{{ $profil->id }}"
                    @if ($profil->id == $college->profil_id)
                        selected
                    @endif>{{ $profil->name }}</option>
            @endforeach 
        @else
            @foreach (  $data['profils'] as $profil )
                <option value="{{ $profil->id }}"
                    @if ($profil->id == old('profil'))
                    selected
                    @endif>{{ $profil->name }}</option>
            @endforeach
        @endif
    </select>
    @error('profil')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="stress"> {{ $text[3] }} </label>
    <select class="custom-select" name="stress" id="passionSelect">
        @if(isset($college))
        <option value="1"
                @if ($college->stress == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if ($college->stress == 0)
                    selected
                @endif>Nu</option>
        @else
            <option value="1"
                @if (old('stress') == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if (old('stress') == 0)
                    selected
                @endif>Nu</option>
        @endif
    </select>
    @error('stress')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="job"> {{ $text[4] }} </label>
    <select class="custom-select" name="job" id="jobSelect">
        @if(isset($college))
        <option value="1"
                @if ($college->job == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if ($college->job == 0)
                    selected
                @endif>Nu</option>
        @else
            <option value="1"
                @if (old('job') == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if (old('job') == 0)
                    selected
                @endif>Nu</option>
        @endif
    </select>
    @error('job')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="books"> {{ $text[5] }} </label>
    <select class="custom-select" name="books" id="booksSelect">
        @if (isset($college))
            @foreach ( $data['books'] as $book )
                <option value="{{ $book->id }}"
                    @if ($book->id == $college->book_id)
                        selected
                    @endif>{{ $book->name }}</option>
            @endforeach 
        @else
            @foreach ( $data['books'] as $book )
                <option value="{{ $book->id }}"
                    @if ($book->id == old('books'))
                     selected
                    @endif>{{ $book->name }}</option>
            @endforeach
        @endif
    </select>
    @error('books')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="county"> {{ $text[6] }} </label>
    <select class="custom-select" name="county" id="countyPassion">
        @if (isset($college))
            @foreach ( $data['counties'] as $county )
                <option value="{{ $county->id }}"
                    @if ($county->id == $college->county_id)
                        selected
                    @endif>{{ $county->name }}</option>
            @endforeach 
        @else
            @foreach ( $data['counties'] as $county )
                <option value="{{ $county->id }}"
                    @if ($county->id == old('county'))
                     selected
                    @endif>{{ $county->name }}</option>
            @endforeach
        @endif
    </select>
    @error('county')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="social"> {{ $text[7] }} </label>
    <select class="custom-select" name="social" id="socialSelect">
        @if(isset($college))
        <option value="1"
                @if ($college->social == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if ($college->social == 0)
                    selected
                @endif>Nu</option>
        @else
        <option value="1"
            @if (old('social') == 1)
                selected
            @endif>Da</option>
        <option value="0"
            @if (old('social') == 0)
                selected
            @endif>Nu</option>
        @endif
    </select>
    @error('social')
            <small> {{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <label for="sport"> {{ $text[8] }} </label>
    <select class="custom-select" name="sport" id="sportSelect">
        @if(isset($college))
        <option value="1"
                @if ($college->sport == 1)
                    selected
                @endif>Da</option>
            <option value="0"
                @if ($college->sport == 0)
                    selected
                @endif>Nu</option>
        @else
        <option value="1"
            @if (old('sport') == 1)
                selected
            @endif>Da</option>
        <option value="0"
            @if (old('sport') == 0)
                selected
            @endif>Nu</option>
        @endif                   
    </select>
    @error('sport')
            <small> {{ $message }} </small>
    @enderror
</div>