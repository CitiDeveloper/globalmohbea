@php
    $title = 'Global Mohbea';
    $description = 'Discover curated safaris, authentic pathways, and immersive cultural adventures in Africa with';
@endphp
@extends('layouts.app')

@section('content')
    <section class="hero-section pt-42 pb-24 text-white text-center">
        <div class="container mx-auto px-10">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Connecting Goods and Mobility Solutions</h1>

            <p class="max-w-2xl text-2xl mx-auto mb-8">Global MOHBEA Limited is a proudly Kenyan-owned company that delivers
                essential food commodities and professional transport solutions across East Africa.</p>
            <br>
            <br>


        </div>
    </section><!-- About Us Section-->

    <section class="w-full py-12 md:py-16 bg-safari-cream">
        <div class="container mx-auto px-4 md:px-8">
            <div
                style="
    background-color: white;
    opacity: 0.75;
    text-align: center;
    padding: 10px;
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

                    <h2 class="about-heading11">Transport Solutions</h2>
                    <div class="text-gray-800 text-lg mb-2 ">SMART MOBILITY. RELIABLE SOLUTIONS</div>
                    <p class="text-gray-800 mb-6 text-lg leading-relaxed">We deliver efficient, professional, and flexible ground transport for individuals, corporates, NGOs, and groups across Kenya and East Africa.</p>
               <a
                        class="learn-more-btn inline-block" >Explore Service</a>
                </div>

            </div>
        </div>
    </section>
     <section class="w-full py-12 md:py-16 bg-safari-cream">
        <div class="container mx-auto px-4 md:px-8">
           
            <div class="flex flex-col md:flex-row items-start md:items-center">
              
                <div class="w-full md:w-1/2 md:pr-12">

                    <h2 class="about-heading11">Commodity Trade</h2>
                    <div class="text-gray-800 text-lg mb-2 " style="text-transform: uppercase">From Source to Shelf, With Trust</div>
                    <p class="text-gray-800 mb-6 text-lg leading-relaxed">From our base in Kenya, we work with trusted suppliers in Uganda, Tanzania, and Kenya to ensure that households, institutions, and businesses have reliable access to high-quality, affordable food staples.</p>
                 <br>
                    <a
                        class="learn-more-btn inline-block" >Explore Service</a>
                </div>

                  <div class="w-full md:w-1/2 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="w-full h-auto" src="assets/images/grains.png"
                            alt="African Experience"></div>
                </div>

            </div>
        </div>
    </section>
      <section class="py-16 bg-cover bg-center"
        style="text-align:center;background-image: linear-gradient( rgba(0,0,0,0.2)), url('assets/images/footer.png')">
        <div
            class="container mx-auto px-6 text-white flex flex-col lg:flex-row justify-between items-center text-center lg:text-left gap-y-8">
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Global MOHBEA Limited is built on one belief:
Trust powers trade and transport.</h2>
                
            </div>
         
        </div>
           <br>
                      <a
                        class="learn-more-btn inline-block" >Learn More</a>
    </section>
@stop
