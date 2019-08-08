@extends("index")
@section('content')
<div class="w-100 position-relative hbgm" id="bgm">
    <div class="position-absolute w-100 h-100 bgca05"></div>
    <div class="position-absolute fsslogan text-center" id="slogan">
        <div class="hydro-txt">HydroShare</div>
        <div class="line-txt"></div>
        <div class="under-txt">CUAHSI's online collaboration environment for sharing data, models, and code</div>
    </div>
</div>
<div class="data-resources p-5 text-center col-md-8 mx-auto">
    <h1 class="pt-4">Data Resources</h1>
    <span>Discover, use, and share data.</span>
    <div class="row pt-5">
        <div class="col-md-6 col-12">
            <a href="http://data.mekongwater.org/">
                <img src="{{asset('img/tears.png')}}" alt="Tears" />
                <h5 class="pt-3"><u>Mekong Hydroshare</u></h5>
            </a>
            <p>Mekong Hydroshare is a community database where Mekong users can store and share their
                data securely and for free. Mekong Hydroshare is built on the U.S. Hydroshare community.
            </p>
        </div>
        <div class="col-md-6 col-12">
            <a href="http://data.mekongwater.org/">
                <img src="{{asset('img/database.png')}}" alt="Database" />
                <h5 class="pt-3"><u>Mekong Partners Data Tools & Services</u></h5>
            </a>
            <p>In addition to sharing water data in the Mekong, users can also access a catalog of
                publicly available data portals, models, and analyses tools from global partners such as
                USGS, NASA, NOAA, etc.</p>
        </div>
    </div>
</div>
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

@endsection