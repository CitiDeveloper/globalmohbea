@php
    $title = 'Global Mohbea';
    $description = 'Discover curated safaris, authentic pathways, and immersive cultural adventures in Africa with';
@endphp
@extends('layouts.app')

@section('content')
    <section class="hero-section pt-64 pb-24  w-full py-12 md:py-16 bg-safari-cream">

        <div class="container mx-auto px-4 md:px-8">

            <div class="flex flex-col md:flex-row items-start md:items-center pt-24">
                <div class="w-full md:w-1/3 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="w- h-" src="assets/images/bus.png"
                            alt="African Experience"></div>
                </div>
                <div class="w-full md:w-2/3 md:pr-12">

                    <h1 class="abou- text-white " style="font-size: 4.8rem; font-weight:bold;">Commodity Trade</h1>
                    <div class="text-white " style=" font-size: 2.5rem; font-weight: 600;">From Source to Shelf, With Trust
                    </div>
                    <p class="text-white mb-6 text-lg leading-relaxed" style="font-size: 2rem">At Global MOHBEA, transport
                        ins't just a service - It's a solution. We deliver efficient, professional, and flexible ground
                        transport for individuals, corporates, NGOs, and groups across Kenya and East Africa. </p>

                </div>



            </div>

        </div>


    </section>


    <section class="w-full py-12 md:py-16 bg-safari-cream">
        <div class="container mx-auto px-4 md:px-8">
            <div
                style="
    background-color: white;
    opacity: 0.75;
    text-align: center;
    padding: 50px;
    margin: -100px auto 140px auto;
    max-width: 800px;
    border-radius: 2px;
    font-size: 28px;
    line-height: 1.6;
    color: #000;
">
                <h3 style="color: #000 !important; font-weight: 700; text-shadow: 0 1px 2px rgba(0,0,0,0.3); margin: 0;">
                    We combine <span class="about-heading1">trust, efficiency and reliability </span>to serve communities,
                    businesses and institutions <span class="about-heading1">with two complementary divisions</span>.
                </h3>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center">
                <div class="w-full md:w-1/2 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="w-full h-auto" src="assets/images/transport.png"
                            alt="African Experience"></div>
                </div>
                <div class="w-full md:w-1/2 md:pr-12">

                    <h2 class="about-heading">Our Fleet</h2>
                    <div class="text-gray-800 text-lg mb-2 " style="text-transform: ==">We provide tailored transport
                        options:</div>
                    <div>
                        <ul class="space-y-4 text-lg">
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Executive Saloon Cars - </strong> For executives and premium
                                    transfers.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Luxury Vans -</strong> For families, small teams, and VIPs.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>4x4 Safari Land Cruisers - </strong> Rugged for safaris and field
                                    missions.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Tour Vans (14 Seater) - </strong> Perfect for small groups, NGOs,
                                    events.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Coaster Buses (22-33 Seater) - </strong> Delegations, schools and weddings</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Coach Buses (47-69 Seater) - </strong> Large scale events, conferences and field trips.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>SUVs (Prados, Alphards, etc.) - </strong> Secure, executive-grade travels.</span></li>
                        </ul>
                    </div>
                </div>



            </div>
            <div class="flex flex-col md:flex-row items-start md:items-center">
             
                <div class="w-full md:w-1/2 md:pr-12">

                    <h2 class="about-heading11">Why Choose <span class="about-heading">Global MOHBEA Transport?</span></h2>
                    
                        <ul class="space-y-4 text-lg">
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Professional Drivers - </strong> Trained, courteous, and safety-first.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>On-Time Service-</strong> Reliable and puctual transfers. </span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Comprehensive Insurance - </strong> Peace of mind for every ride.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>24/7 Support - </strong> backup and assistance when you need it.</span></li>
                            <li class="flex items-start"><svg class="h-5 w-5 text-safari-red mr-2 mt-1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg><span><strong>Flexible Options- </strong> From city transfers to remote missions.</span></li>
                          </ul>
                    </div>
                
                   <div class="w-full md:w-1/2 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="" src="assets/images/cars.png"
                            alt="African Experience"></div>
                </div>



            </div>
        </div>
    </section>
    <section class="py-16 bg-cover bg-center"
        style="text-align:center;background-image: linear-gradient( rgba(0,0,0,0.2)), url('assets/images/footer.png')">
        <div
            class="container mx-auto text-white flex flex-col">
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Reliable. Rugged. Ready for the Journey.</h2>

            </div>

        </div>
    
    </section>
@stop
