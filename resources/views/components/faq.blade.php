@extends('main')

@section('content')
<div class="page-title page-faq  ">
            <div class="rellax" data-rellax-speed="5">
                <img src="./images/page-title/faq.jpg" alt="">
            </div>
            <div class="content-wrap">

                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <p class="sub-title">
                                    Answer All Your Questions About Our Farm
                                </p>
                                <h1 class="title">
                                    frequently asked questions
                                </h1>
                                <div class="icon-img">
                                    <img src="./images/item/line-throw-title.png" alt="">
                                </div>
                                <div class="breadcrumb">
                                    <a href="index.html">Home</a>
                                    <div class="icon">
                                        <i class="icon-arrow-right1"></i>
                                    </div>
                                    <a href="javascript:void(0)">Frequently Asked Questions </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="img-item item-2">
                <img src="./images/item/grass.png" alt="">
            </div>
        </div><!-- /.Page-title -->

        <!-- Main-content -->
        <div class="main-content page-faq">
            <div class="wg-tabs style-4">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tf-sidebar-2 ">
                                <div class="sidebar-item-2 list-tab has-bg-3 mb-40">
                                    <ul class="menu-tab">
                                        <li class="item active"><a href="#content" class="btn-tab">General
                                                Question</a></li>
                                        <li class="item"><a href="#content" class="btn-tab">Product
                                                Questions</a></li>
                                        <li class="item"><a href="#content" class="btn-tab">Questions About
                                                The Tour</a></li>
                                        <li class="item"><a href="#content" class="btn-tab">How do I log
                                                in</a></li>
                                        <li class="item"><a href="#content" class="btn-tab">How delivery works
                                                in Europe</a></li>
                                    </ul>
                                </div>
                                <div class="sidebar-item-2 has-bg-1 infor-contact">
                                    <p class="sub font-snowfall fs-30">
                                        DonalFarm Agriculture <br>
                                        Farm of laughter and happiness!
                                    </p>
                                    <p class="text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ex ligula,
                                        pulvinar ultrices justo sed.
                                    </p>
                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa-solid fa-location-dot fs-17"></i>
                                            <p class="address">
                                                Prinsengracht 250, 2501016 PM
                                                Amsterdam Netherlands
                                            </p>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-phone"></i>
                                            <p class="phone-number fs-15">
                                                Call us: (234) 109-6666
                                            </p>
                                        </li>
                                        <li> <i class="icon-package-box"></i>
                                            <p class="email fs-15">
                                                Mail: Donalfarms@gmail.com
                                            </p>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="time-open fs-15">
                                                Mon - Sat: 8.00am - 18.00pm
                                            </p>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="content" id="content">
                                <h2 class="title font-worksans fw-7">
                                    Do you have a few questions? <br>
                                    Check out our popular questions.
                                </h2>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales faucibus.
                                </p>
                                <div class="widget-content-tab">
                                    <div class="widget-content-inner active">
                                        <div class="tf-accordion accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        What proof do you need for Carer’s tickets?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a booking fee to cover the cost of processing
                                                        the booking. If you book an under 2 ticket please bring with you
                                                        proof of age.
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Do I have to pay extra for the shows?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a booking fee to cover the cost of processing
                                                        the booking. If you book an under 2 ticket please bring with you
                                                        proof of age.
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Can I bring my team or friends?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Can I join the farm as a permanent member?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Does ‘farming for nature’ make financial sense?
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a booking fee to cover the cost of processing
                                                        the booking. If you book an under 2 ticket please bring with you
                                                        proof of age.
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        I like my farm to look ‘neat’, will farming for nature effect
                                                        it?
                                                    </button>
                                                </h2>
                                                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a booking fee to cover the cost of processing
                                                        the booking. If you book an under 2 ticket please bring with you
                                                        proof of age.
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-inner">
                                        <div class="tf-accordion accordion" id="accordionExample1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                        What proof do you need for Carer’s tickets?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                        Do I have to pay extra for the shows?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo2" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                                        Can I bring my team or friends?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree3" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                                        Can I join the farm as a permanent member?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour4" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-inner">
                                        <div class="tf-accordion accordion" id="accordionExample2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne11" aria-expanded="true" aria-controls="collapseOne11">
                                                        What proof do you need for Carer’s tickets?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne11" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo12" aria-expanded="false" aria-controls="collapseTwo12">
                                                        Do I have to pay extra for the shows?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo12" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree13" aria-expanded="false" aria-controls="collapseThree13">
                                                        Can I bring my team or friends?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree13" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour14" aria-expanded="false" aria-controls="collapseFour14">
                                                        Can I join the farm as a permanent member?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour14" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-inner">
                                        <div class="tf-accordion accordion" id="accordionExample3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne21" aria-expanded="true" aria-controls="collapseOne21">
                                                        What proof do you need for Carer’s tickets?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne21" class="accordion-collapse collapse show" data-bs-parent="#accordionExample3">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo22" aria-expanded="false" aria-controls="collapseTwo22">
                                                        Do I have to pay extra for the shows?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo22" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree23" aria-expanded="false" aria-controls="collapseThree23">
                                                        Can I bring my team or friends?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree23" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour24" aria-expanded="false" aria-controls="collapseFour24">
                                                        Can I join the farm as a permanent member?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour24" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-inner">
                                        <div class="tf-accordion accordion" id="accordionExample4">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne31" aria-expanded="true" aria-controls="collapseOne31">
                                                        What proof do you need for Carer’s tickets?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne31" class="accordion-collapse collapse show" data-bs-parent="#accordionExample4">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo32" aria-expanded="false" aria-controls="collapseTwo32">
                                                        Do I have to pay extra for the shows?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo32" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree33" aria-expanded="false" aria-controls="collapseThree33">
                                                        Can I bring my team or friends?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree33" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour34" aria-expanded="false" aria-controls="collapseFour34">
                                                        Can I join the farm as a permanent member?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour34" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                                    <div class="accordion-body">
                                                        Under 2’s are free and will need a ticket. Tickets are free of
                                                        charge but attract a
                                                        booking fee to cover the cost of
                                                        processing the booking. If you book an under 2 ticket please
                                                        bring with you proof of
                                                        age.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bot">
                                    <p class="sub">
                                        Did not find the question satisfactory?
                                    </p>
                                    <p class="question">
                                        Ask Us A Question.
                                    </p>
                                    <a href="contact-us.html" class="tf-btn bg-white">
                                        <span class="text-style cl-primary">
                                            Contact us Today
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                    <div class="img-item item-1 scroll-element-3 ">
                                        <img class="wow fadeInRight" data-wow-delay="0s" data-wow-duration="1s" src="./images/item/faq.png" alt="">
                                    </div>
                                    <div class="img-item item-2 nhapNhap">
                                        <img src="./images/item/FAQs.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.Main-content -->

        <!-- Footer -->
        
@endsection