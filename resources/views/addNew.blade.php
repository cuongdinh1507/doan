@extends("index")
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">PROJECT GENERAL INFORMATION</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addNew.add') }}">
                        @csrf
                        <input id="userid" type="userid" class="form-control @error('userid') is-invalid @enderror" name="userid" style="display:none" value="{{Auth::user()->id}}">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Your role in project</label>

                            <div class="col-md-6">
                                {{-- <input id="role" type="role" class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="role"> --}}
                                <div class="input-group" placeholder="Choose">
                                  <select id="role" type="role" name="role" required autocomplete="role" class="custom-select form-control @error('role') is-invalid @enderror">
                                    <option selected></option>
                                    <option value="Project leader" selected>Project leader</option>
                                    <option value="Researcher">Researcher</option>
                                  </select>
                                </div>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" required autocomplete="subject">

                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="species" class="col-md-4 col-form-label text-md-right">Species</label>

                            <div class="col-md-6">
                                <input id="species" type="species" class="form-control @error('species') is-invalid @enderror" name="species" required autocomplete="species">

                                @error('species')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lang" class="col-md-4 col-form-label text-md-right">Languages</label>

                            <div class="col-md-6">
                                {{-- <input id="lang" type="lang" class="form-control @error('lang') is-invalid @enderror" name="lang" required autocomplete="lang"> --}}
                                <div class="input-group" placeholder="Choose">
                                  <select id="lang" type="lang" name="lang" required autocomplete="lang" class="custom-select form-control @error('lang') is-invalid @enderror">
                                    <option selected></option>
                                  </select>
                                </div>
                                @error('lang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(function(){
    $.getJSON("https://gist.githubusercontent.com/piraveen/fafd0d984b2236e809d03a0e306c8a4d/raw/eb8020ec3e50e40d1dbd7005eb6ae68fc24537bf/languages.json", function(data){
      $("#lang").append(
        $.map(data,function(v){
          return $("<option>", { value: v.name, text: v.name, id: v.name});
        }),
      );
      $("#English").attr("selected","true")
    });
  });
</script>
@endsection
