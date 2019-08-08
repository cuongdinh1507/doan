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

@endsection