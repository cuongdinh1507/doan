@extends("index")
@section('content')
  <!-- Default form contact -->
<form class="text-center border border-light shadow-lg p-5 mx-auto mt-5 ctForm" id="formContact">

    <p class="h2 mb-4">Contact us</p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

    <!-- Email -->
    <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">

    <!-- Subject -->
    <label>Subject</label>
    <select class="browser-default custom-select mb-4">
        <option value="" disabled>Choose option</option>
        <option value="1" selected>Feedback</option>
        <option value="2">Report a bug</option>
        <option value="3">Feature request</option>
    </select>

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
    </div>

    <!-- Copy -->
    <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
        <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block mx-auto" type="submit" id="btn-send">Send</button>

</form>
<!-- Default form contact -->
@endsection