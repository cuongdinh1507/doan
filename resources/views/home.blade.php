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
<section id="subjectHome" class="mx-auto section2">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner carousel-inner-subject col-lg-10 mx-auto"></div>
        {{-- <button class="btn btn-primary">
            <i class="fas fa-arrow-left"><a class="" href="#carouselExampleControls" role="button" data-slide="prev"></a></i>
        </button>
        
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> --}}
    </div>
</section>
<section id="event" class="text-center mx-auto section2">
    <div class="container ">
        <h3 class="commingsoon">Upcoming Events</h3>
        <div class="list-event p-3">
            <div class="row event"></div>
        </div>
    </div>
</section>
<script>
    $(function(){
        $.getJSON("{!! route('getEvent') !!}", (data) => {
            $(".event").append(
                data.map((v)=>{
                    return $("<div>", { class: "col-md-3 col-sm-6 col-12"}).append(
                        $("<div>", { class: "inner-list"}).append(
                            $("<div>", { class: "list-item"}).append(
                                $("<img>", { src: v.imageEvent, alt: "Event"}),
                                $("<div>", { class: "detail-content p-5"}).append(
                                    $("<h5>", { class: "text-large", text: v.titleEvent }),
                                    $("<div>", { class: "", text: v.timeEvent + " | " + v.addressEvent }),
                                ),
                            ),
                            $("<div>", { class: "list-item-hover" }).append(
                                $("<a>", { href: "#" }).append(
                                    $("<h4>", { class: "", text: v.titleEvent }),
                                    $("<div>", { class: "", text: v.timeEvent + " | " + v.addressEvent }),
                                ),
                                $("<div>", { class: "", text: v.descriptionEvent }),
                            ),
                        ),
                    );
                }),
            );
        });
        makeArray = arrayLength => {
            var array = [];
            for (var i=0; i < arrayLength ; i++){
                array.push(i);
            }
            return array;
        }
        $.getJSON("{!! route('getSubject') !!}", (data) => {
            var numSlide = Math.ceil(data.length / 4);
            for (var i=0 ; i < numSlide; i++){
                var loop = i == numSlide - 1 ? makeArray(data.length % 4) : [0,1,2,3];
                $(".carousel-inner-subject").append(
                    $("<div>", { class: "carousel-item cp col-lg-12" + ( i == 0 ? " active" : "") }).append(
                        $.map(loop, (v)=> {
                            var n = v +4*i;
                            return $("<div>", { class : "col-lg-3 d-inline-block"}).css({"overflow": "hidden"}).append(
                                $("<div>", { class: "position-relative ts12h"}).css({
                                    "background": "url('" + data[n].imageSubject + "')",
                                    "height":"200px",
                                    "background-repeat" : "no-repeat",
                                    "background-size" : "cover",
                                    "padding-left" : "0",
                                    "transition" : "0.7s"
                                }).append(
                                    $("<div>", { class: "position-absolute w-100 h-100"}).css({"background-color" : "rgba(0,0,0,0.7)"}).append(
                                        $("<div>", { class: "position-absolute text-light text-center", text: data[n].nameSubject }).css({
                                            "top" : "50%",
                                            "left" : "50%",
                                            "transform" : "translate(-50%,-50%)",
                                            "font-size" : "1.2rem"
                                        }),
                                    ),
                                ),
                            ).on("click", ()=>{
                                console.log(data[n].id,data[n].nameSubject);
                            });
                        }),
                    ),
                    $("<a>", { class: "bg-primary position-absolute", href: "#carouselExampleControls", "data-slide": "prev", role: "button"}).css({"top":"50%","left":"0","transform":"translateY(-50%)"}).append(
                        $("<div>", { class: "btn bg-primary text-light"}).append(
                            $("<i>", { class: "fas fa-arrow-left"}),
                        )
                    ),
                    $("<a>", { class: "bg-primary position-absolute", href: "#carouselExampleControls", "data-slide": "next", role: "button"}).css({"top":"50%","right":"0","transform":"translateY(-50%)"}).append(
                        $("<div>", { class: "btn bg-primary text-light"}).append(
                            $("<i>", { class: "fas fa-arrow-right"}),
                        )
                    ),
                );
            }
        });
    });
</script>
@endsection