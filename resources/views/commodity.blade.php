@php
    $title = 'Global Mohbea';
    $description = 'Discover curated safaris, authentic pathways, and immersive cultural adventures in Africa with';
@endphp
@extends('layouts.app')
<style>
   .products-section {
    width: 100%;
    overflow: hidden;
    padding-bottom: 80px;
    background-image: linear-gradient(hsla(41, 98%, 50%, 0.7), hsla(41, 98%, 50%, 0.7)), url(/assets/images/irrigation-two.png);
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: cover
}

.section-header {
    
    color: #000;
    padding: 30px;
    text-align: center;

      
}

.section-header h2 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    font-weight: 700;
    color: #000
}

.section-header p {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
    opacity: 0.9;
    color: #006342}

.products-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns for large screens */
    gap: 20px;
    padding: 30px;
}

.products-container1 {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns for large screens */
    gap: 20px;
    padding: 30px;
    text-align: center;
}

.product-item {
    
    border-radius: 10px;
    padding: 25px;
    transition: all 0.3s ease;      
    display: flex;
    flex-direction: column;
}
.product-item1 {
    
    border-radius: 10px;
    padding: 25px;
    transition: all 0.3s ease;      
    display: flex;
    flex-direction: column;
    text-align: center
}

.product-item:hover {
    transform: translateY(-5px);
    background: #f4be49;
}

.product-title {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    color: #006342;
    font-size: 1.4rem;
    font-weight: 600;
}

.product-title1 img {
    width: 170px;
    height: 170px;
    margin-right: 15px;
    object-fit: contain;
    text-align: center
}

.product-description {
    color: #4b5563;
    line-height: 1.6;
    font-size: 1rem;
}

/* Medium devices (tablets, 768px and below) */
@media (max-width: 768px) {
    .products-container {
        grid-template-columns: repeat(2, 1fr); /* 2 columns for medium screens */
        padding: 20px;
        gap: 15px;
    }
    
    .section-header {
        padding: 20px;
    }
    
    .section-header h2 {
        font-size: 2rem;
    }
    
    .section-header p {
        font-size: 1rem;
    }
    
    .product-item {
        padding: 20px;
    }
}

/* Small devices (phones, 480px and below) */
@media (max-width: 480px) {
    .products-container {
        grid-template-columns: 1fr; /* 1 column for small screens */
        padding: 15px;
        gap: 15px;
    }
    
    .product-item {
        padding: 20px;
    }
    
    .product-title {
        font-size: 1.2rem;
    }
    
    .product-title img {
        width: 35px;
        height: 35px;
        margin-right: 12px;
    }
}
    </style>

@section('content')
    <section class="hero-section2 pt-32 pb-24  w-full py-12 md:py-16 bg-safari-cream">

        <div class="container mx-auto px-4 md:px-8">

            <div class="flex flex-col md:flex-row items-start md:items-center pt-16">

                <div class="w-full md:w-2/3 md:pr-12">

                    <h1 class="text-yellow " style="font-size: 4.8rem; font-weight:bold;">Commodity Trade</h1>
                    <div class="text-white " style=" font-size: 2.5rem; font-weight: 600;">From Source to Shelf, With Trust
                    </div>
                    <p class="text-white mb-6 text-lg leading-relaxed" style="font-size: 2rem; font-weight:600;">
                        <strong>Global MOHBEA</strong> is a <span class="text-yellow">proudly Kenyan-owned company</span>
                        specializing in the <span class="text-yellow">trade and distribution of essential food commodities
                            across East Africa.</span> </p>

                </div>
                <div class="w-full md:w-1/3 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="w- h-" src="assets/images/beans.png"
                            alt="African Experience"></div>
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

                    We work with <span class="about-green">Trusted Suppliers</span> 
                    Tanzania, and Kenya to ensure that
                    households, institutions, and
                    businesses <span class="about-green">have reliable access to
                        high-quality, affordable food staples.</span>
                </h3>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center">
                <div class="w-full md:w-1/2 mt-10 md:pr-12">
                    <div class="rounded-lg overflow-hidden"><img class="w-full h-auto" src="assets/images/transport.png"
                            alt="African Experience"></div>
                </div>
                <div class="w-full md:w-1/2 md:pr-12">                  
                    <p>
                        Food security and affordability are central to community well-being. That’s why our business model
                        is built on trust, transparency, and efficiency.

                        <br><br>From rice in Tanzania to milk in Uganda and cooking oil in Kenya, we ensure consistency in
                        quality and delivery.

                        <br><br><br>With integrated logistics and warehousing, Global MOHBEA manages the supply chain
                        end-to-end, offering unmatched reliability to local and regional clients.
                    </p>
                </div>



            </div>
         
        </div>
    </section>
     <div class="products-section ">
        <div class="section-header">
            <h2>OUR PRODUCTS</h2>
            <p>We focus exclusively on high-demand staples that sustain households and industries</p>
        </div>
        
        <div class="products-container">
            <div class="product-item">
                <h3 class="product-title">
                   <img src="/assets/images/milk.png" alt="" srcset="">  Milk
                </h3>
                <p class="product-description">Free: 1.5m² & powdered milk for carcass, retailers, and installations.</p>
            </div>
            
            <div class="product-item">
                <h3 class="product-title">
                   <img src="/assets/images/oil.png" alt="" srcset=""> Cooking Oils
                </h3>
                <p class="product-description">Retired edible oils, including sunflower oil, supporting local farmers.</p>
            </div>
            
            <div class="product-item">
                <h3 class="product-title">
                  <img src="/assets/images/sugar.png" alt="" srcset="">  Sugar
                </h3>
                <p class="product-description">Plantation white and refined sugar sourced directly from trusted milk.</p>
            </div>
            
            <div class="product-item">
                <h3 class="product-title">
                 <img src="/assets/images/rice.png" alt="" srcset="">   Rice
                </h3>
                <p class="product-description">Long-grain and aromatic varieties in both bulk and consumer packaging.</p>
            </div>
            
            <div class="product-item">
                <h3 class="product-title">
                   <img src="/assets/images/eggs.png" alt="" srcset="">  Eggs
                </h3>
                <p class="product-description">Term-fresh eggs, carefully graded and delivered with freshness assurance.</p>
            </div>
            
            <div class="product-item">
                <h3 class="product-title">
                    <img src="/assets/images/cereals.png" alt="" srcset="">Grain Fruits
                </h3>
                <p class="product-description">Sourced to for instalment feeding programs and relief efforts.</p>
            </div>
        </div>
    </div>
     <section class="w-full py-12 md:py-16 bg-safari-cream" style="background-color: #fff; text-align: center;">
        <div class="container mx-auto px-4 md:px-8">
            <div
                style="
    background-color: white;
    opacity: 0.75;
    text-align: center;
    padding: 10px;
    margin: -140 auto 140px auto;
    max-width: 800px;
    border-radius: 2px;
    font-size: 28px;
    line-height: 1.6;
    color: #000;
">
                <h3 style="color: #006342 !important; font-weight: 700; text-shadow: 0 1px 2px rgba(0,0,0,0.3); margin: 0;">

                   <span style="color: #000; text-transform:uppercase">Our Source Network</span> <br>
                    Our regional partnerships bridge<br>
producers and markets:
                    
                </h3>
            </div>

         <div class="products-container1" >
            <div class="product-item1" >
                <h3 class="product-title1" style="text-align: center;">
                   <img src="/assets/images/kenya.png" alt="" srcset=""> Kenya
                </h3>
                <p class="product-description">Free: 1.5m² & powdered milk for carcass, retailers, and installations.</p>
            </div>
            
            <div class="product-item1">
                <h3 class="product-title1">
                   <img src="/assets/images/uganda.png" alt="" srcset=""> Cooking Oils
                </h3>
                <p class="product-description">Retired edible oils, including sunflower oil, supporting local farmers.</p>
            </div>
            
            <div class="product-item1">
                <h3 class="product-title1">
                  <img src="/assets/images/tanzania.png" alt="" srcset="">  Sugar
                </h3>
                <p class="product-description">Plantation white and refined sugar sourced directly from trusted milk.</p>
            </div>
            
           
        </div>
        </div>
    </section>
    <section class="py-16 bg-cover bg-center"
        style="text-align:center;background-image: linear-gradient( rgba(0,0,0,0.2)), url('assets/images/footer.png')">
        <div class="container mx-auto text-white flex flex-col">
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Reliable. Rugged. Ready for the Journey.</h2>

            </div>

        </div>

    </section>
@stop
