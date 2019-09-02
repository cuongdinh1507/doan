@extends("index")
@section('content')
  <!-- Default form contact -->

<div class="h1 text-center mt-5">Contact us</div>
@if (@session()->has(message))
    <div class="alert alert-success text-center" role="alert">
      <strong>Success</strong> {{session()->get("message")}}
    </div>
@endif
<form action="contact" method="POST" class="text-center border border-light shadow-lg p-5 mx-auto mt-5 ctForm" id="formContact">
    <div class="form-group">
       <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name" name="name">
       <div>{{ $errors->first("name") }}</div>
    </div>
    <div class="form-group">
        <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
        <div>{{ $errors->first("email") }}</div>
    </div>
    <div class="form-group">
        <input type="organization" id="defaultContactFormOrganization" class="form-control mb-4" placeholder="Organization" name="organization">
        <div>{{ $errors->first("organization") }}</div>
    </div>
    <div class="form-group">
        <input type="foi" id="defaultContactFormField" class="form-control mb-4" placeholder="Field of interest" name="field">
        <div>{{ $errors->first("field") }}</div>
    </div>
    <div class="form-group">
        <input type="subject" id="defaultContactFormField" class="form-control mb-4" placeholder="Subject" name="subject">
        <div>{{ $errors->first("subject") }}</div>
    </div>

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" name="message"></textarea>
        <div>{{ $errors->first("message") }}</div>
    </div>
    @csrf
    <!-- Send button -->
    <button class="btn btn-info btn-block mx-auto" type="submit" id="btn-send">Send</button>

</form>
<!-- Default form contact -->
@endsection