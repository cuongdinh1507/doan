@extends("index")
@section('content')

<form action="postUpdate" method="POST">
  @csrf
  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">PROJECT DESCRIPTION</div>

                <div class="card-body">
                  <input id="titleid" type="titleid" class="form-control @error('titleid') is-invalid @enderror" name="titleid" style="display:none" value="{{$id}}">
                  <div class="form-group row">
                      <label for="abstract" class="col-md-4 col-form-label text-md-right">Abstract</label>

                      <div class="col-md-6">
                          {{-- <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus> --}}
                          <textarea id="abstract" type="abstract" class="form-control @error('abstract') is-invalid @enderror" name="abstract" value="{{ old('abstract') }}" required autocomplete="abstract" autofocus cols="30" rows="10"></textarea>
                          @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="keyword" class="col-md-4 col-form-label text-md-right">Keyword</label>

                      <div class="col-md-6">
                          <input id="keyword" type="keyword" class="form-control @error('keyword') is-invalid @enderror" name="keyword" required autocomplete="keyword">

                          @error('keyword')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>


                  <div class="form-group row">
                      <label for="funding" class="col-md-4 col-form-label text-md-right">Funding</label>

                      <div class="col-md-6">
                          <input id="funding" type="funding" class="form-control @error('funding') is-invalid @enderror" name="funding" required autocomplete="funding">

                          @error('funding')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="start" class="col-md-4 col-form-label text-md-right">Year start</label>

                      <div class="col-md-6 date">
                          <input id="start" type="start" class="ys form-control @error('start') is-invalid @enderror" name="start" required autocomplete="start">

                          @error('start')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="end" class="col-md-4 col-form-label text-md-right">Year end</label>

                      <div class="col-md-6 date">
                          <input id="end" type="end" class="ys form-control @error('end') is-invalid @enderror" name="end" required autocomplete="end">
                          @error('end')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="publication" class="col-md-4 col-form-label text-md-right">Publications</label>

                      <div class="col-md-6">
                          <input id="publication" type="publication" class="form-control @error('publication') is-invalid @enderror" name="publication" required autocomplete="publication">

                          @error('publication')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                </div>
            </div>
        </div>
  </div>

  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">PROJECT PERSONNEL</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
  </div>
</div>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">PROJECT DATA DESCRIPTION</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
  </div>
</div>

<div class="col-md-8 mx-auto text-center mt-3">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>

</form>
<script>
  $(function(){
    $(".ys").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
  });
</script>
@endsection
