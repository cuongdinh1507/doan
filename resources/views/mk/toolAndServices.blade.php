@extends("index")
@section('content')
<section>
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="img-slide d-block w-100" src="{!! asset('img/mk/bg01.jpg') !!}" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>MEKONG WATER WELCOMES YOU</h3>
                    <p>Search. Share. Collaborate.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-slide d-block w-100" src="{!! asset('img/mk/bg02.jpg') !!}" alt="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>MEKONG WATER WELCOMES YOU</h3>
                    <p>Search. Share. Collaborate.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-slide d-block w-100" src="{!! asset('img/mk/bg03.jpg') !!}" alt="Third slide" />
                <div class="carousel-caption d-none d-md-block">
                    <h3>MEKONG WATER WELCOMES YOU</h3>
                    <p>Search. Share. Collaborate.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="jumbotron text-center section1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-justify text-muted">
                    The Mekong Water Data Platform (MWDP) is a collaborative effort of Mekong stakeholders and
                    global partners to promote the sustainable management of the Mekong River basin and the
                    wellbeing of its people. This page includes a growing catalogue of resources (e.g., data,
                    models, analyses, and expert services) available from MWDP collaborators. This list is being
                    updated regularly. We kindly ask for your contribution as well! Those who wish to link or
                    share their resources with the Mekong community may do so HERE.
                </p>
            </div>

        </div>
    </div>
</section>

<div class="container">
    <section class="services">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service1.png') !!}" alt="Service 1" />
                        <div class="content">
                            <h5 class="text-capitalize">US Government Open Data Portal</h5>
                            <h7 class="other-info"></h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>Open-access data, tools, and resources to conduct research, design data
                            visualizations, and more.
                            (over 252,745 datasets available)
                            Click <a href="">HERE</a> to access!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service2.png') !!}" alt="Service 2" />
                        <div class="content">
                            <h5 class="text-capitalize">US National Oceanic and Atmospheric Administration</h5>
                            <h7 class="other-info">National Centers for Environmental Information</h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>
                            Integrated portal to a global archive of comprehensive oceanic, atmospheric, and
                            geophysical data.
                            Click <a href="">HERE</a> to access!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service3.png') !!}" alt="Service 3" />
                        <div class="content">
                            <h5 class="text-capitalize">US Burerau of Reclamation</h5>
                            <h7 class="other-info">Reclamation data and tool</h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>
                            Data and tools from the Bureau of Reclamation
                        </p>
                        <ul>
                            <li><a href="">Data from gauges and reservoir (with graphs)</a></li>
                            <li><a href="">Evapotranspiration Demands Tool</a></li>
                            <li><a href="">WaterSMART visualization Tool</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service4.png') !!}" alt="Service 4" />
                        <div class="content">
                            <h5 class="text-capitalize">US Geological Survey</h5>
                            <h7 class="other-info">South Florida integrated information access</h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>Integrated portal to information and data for the US Florida Greater Everglades
                            region.
                            Click <a href="">HERE</a> to access!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service5.png') !!}" alt="Service 5" />
                        <div class="content">
                            <h5 class="text-capitalize">US Geological Survey</h5>
                            <h7 class="other-info">Everglades depth estimation network</h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>EDEN is an integrated network providing real-time hydrologic tools for biological and
                            ecological assessments for adaptive management
                            Click <a href="">HERE</a> to access!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="item-service">
                    <div class="inner-item-service">
                        <img src="{!! asset('img/mk/service6.png') !!}" alt="Service 6" />
                        <div class="content">
                            <h5 class="text-capitalize"></h5>
                            <h7 class="other-info">Coatal wetland planing, protection & restoration -coastswide
                                reference mornitoring system</h7>
                        </div>
                    </div>
                    <div class="inner-item-service-hover p-4">
                        <p>CRMS (coastwide reference monitoring system) includes data from ~390 monitoring sites
                            encompassing a range of ecological conditions in swamp habitats and fresh,
                            intermediate, brackish, and salt marshes
                            Click <a href="">HERE</a> to access!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section id="share-form" class="m-5">
    <div class="container text-center">
        <h3 class="text-center">Share your resources with the Mekong community!</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="" id="" class="form-control" placeholder="Contact name">
            </div>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control"
                    placeholder="Name of agency or organization / website">
            </div>
            <div class="form-group text-left">
                <select name="" class="form-control">
                    <option>---Resource type---</option>
                    <option value="Data or data portal">Data or data portal</option>
                    <option value="Simulations tool">Simulations tool</option>
                    <option value="Data analysis tool">Data analysis tool</option>
                    <option value="Compute resource">Compute resource (e.g., storage, HPC)</option>
                    <option value="Expertise / Services">Expertise / Services</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control"
                    placeholder="Weblink to resource to be shared">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="" id="" rows="4"
                    placeholder="Please provide a few sentences describing the resource you would like to shareshare... "></textarea>
            </div>
            <input type="submit" class="btn btn-secondary mb-5 text-center" value="Submit">
        </form>
    </div>

</section>
@endsection
