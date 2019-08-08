@extends("index")
@section('content')
  <!-- Default form contact -->

<div class="h1 text-center">Contact us</div>
<form class="text-center border border-light shadow-lg p-5 mx-auto mt-5 ctForm" id="formContact">

    <p class="h5 mb-4">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

    <!-- Email -->
    <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">
  
    <input type="organization" id="defaultContactFormOrganization" class="form-control mb-4" placeholder="Organization">

    <input type="foi" id="defaultContactFormField" class="form-control mb-4" placeholder="Field of interest">

    <input type="subject" id="defaultContactFormField" class="form-control mb-4" placeholder="Subject">

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block mx-auto" type="submit" id="btn-send">Send</button>

</form>
<!-- Default form contact -->
@endsection