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
            <div class="col-md-8">
                <h3 class="jumbotron-heading">
                    About the Mekong Water Data Platform
                </h3>
                <p class="text-justify text-muted">
                    The Mekong Water data platform is part of the multi-partner effort to support the Mekong
                    Water Data Initiative (MWDI) and the goals of the Lower Mekong Initiative. The MWDI
                    encourages Mekong stakeholders to share water and water-related data and collaborate
                    to ensure the long-term sustainability of the Mekong River basin.
                </p>
                <p class="text-justify text-muted">
                    The Mekong Water data platform will be deployed in several stages. In the first stage, the
                    Mekong Hydroshare data management system is offered at no cost to Mekong stakeholders (more
                    on Mekong Hydroshare can be found HERE). In the 2nd stage (coming in
                    2020), web-based tutorials and in-person trainings will be delivered to encourage use of
                    peer-to-peer data exchange mechanisms (more information on the Mekong Data Exchange can be
                    found HERE). Additional deployment
                    stages will incorporate the data, tools, and services shared through the Mekong Water data
                    platform as part of capacity building exercises provided through the Lower Mekong
                    Initiative.
                </p>
                <p class="text-justify text-muted">
                    The purpose of the Mekong Water data platform is to provide the means and resources for
                    Mekong stakeholders to share data and collaborate in ways that meet their needs. Through
                    this platform, Mekong users can also share and access publicly available water
                    and water-related data, tools, and services from global partners.
                </p>
            </div>
            <div class="col-md-4">

                <h3 class="jumbotron-heading">Mekong Data Resources</h3>
                <p class="text-center text-muted">Discover, use, and share data.</p>


                <h4 class="card-title">
                    <a href="#" class="text-info"> <i class="fas fa-user-friends"></i> Mekong Hydroshare</a>
                </h4>
                <p class="card-text text-justify text-muted">
                    Mekong Hydroshare is a community database where Mekong users can store and share their data
                    securely and for free. Mekong Hydroshare is built on the U.S. Hydroshare community.
                </p>


                <h4 class="card-title">
                    <a href="#" class="text-info"><i class="fas fa-database"></i>
                        Mekong Partners Data Tools & Services</a>
                </h4>
                <p class="card-text text-justify text-muted">
                    In addition to sharing water data in the Mekong, users can also access a catalog of publicly
                    available data portals, models, and analyses tools from global partners such as USGS, NASA,
                    NOAA, etc.

            </div>
        </div>
    </div>
</section>
<section id="event" class="text-center mx-auto section2">
    <div class="container ">
        <h3 class="commingsoon">Upcoming Events</h3>
        <div class="list-event p-3">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="inner-list">
                        <div class="list-item">
                            <img src="{!! asset('img/mk/item1.png')!!}" alt="Bridge" />
                            <div class="detail-content p-5">
                                <h4>Mekong River Commission...</h4>
                                <h7>Sun, Aug 18 | New Orleans</h7>
                            </div>
                        </div>
                        <div class="list-item-hover">
                            <a href="#">
                                <h4>Mekong River Commission visiting Missisippi River Commission</h4>
                                <h7>Aug 18, 2:40 AM New Orleans, New Orleans, LA, USA</h7>
                            </a>
                            <p>Join Us for a visit to the USGS Hydrologic Instrumentation Facility (HIF)</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="inner-list">
                        <div class="list-item">
                            <img src="{!! asset('img/mk/item2.png')!!}" alt="Sầu riêng" />
                            <div class="detail-content p-5">
                                <h4>First Technical Mekong...</h4>
                                <h7>Thu, Aug 29 | Bangkok</h7>
                            </div>
                        </div>
                        <div class="list-item-hover">
                            <a href="#">
                                <h4>First Technical Mekong Socioeconomic and Data Experts Meeting</h4>
                                <h7>Aug 29, 7:00 AM Bangkok, Bangkok, Thailand</h7>
                            </a>
                            <p>LMI-SIP socio-economic data</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="inner-list">
                        <div class="list-item">
                            <img src="{!! asset('img/mk/item3.png')!!}" alt="Mekong" />
                            <div class="detail-content p-5">
                                <h4>Mekong Cascading...</h4>
                                <h7>Thu, Sep 26 | Bangkok</h7>
                            </div>
                        </div>
                        <div class="list-item-hover">
                            <a href="#">
                                <h4>Mekong Cascading Hydropower Management Forum</h4>
                                <h7>Sep 26, 8:00 AM – 05:00 PM GMT+7 Bangkok, Bangkok, Thailand</h7>
                            </a>
                            <p>Design of the Mekong Water Data Platform</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="inner-list">
                        <div class="list-item">
                            <img src="{!! asset('img/mk/item4.png')!!}" alt="Event" />
                            <div class="detail-content p-5">
                                <h4>2019 Mekong Research...</h4>
                                <h7>Wed, Dec 04 | Location is...</h7>
                            </div>
                        </div>
                        <div class="list-item-hover">
                            <a href="#">
                                <h4>2019 Mekong Research Symposium</h4>
                                <h7>Dec 04, 7:00 PM Location is TBD</h7>
                            </a>
                            <p>2nd Annual Mekong Research Symposium</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection