@extends('layouts.app')

@section('content')
    <section class="hero-section pt-42 pb-32 text-white text-center">
        <div class="container mx-auto px-10">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Your Journey to the Soul of Africa</h1>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Begins Here</h2>
            <p class="max-w-2xl text-2xl mx-auto mb-8">Discover curated safaris,<span class="text-yellow-400 ml-2">authentic
                    pathways</span>, and immersive cultural adventures designed
                just for you.</p><button class="btn-safari mb-12">Request Itinerary</button>
        </div>
    </section>

    <!-- About Us Section-->
    <section class="w-full py-12 md:py-16 bg-safari-cream">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center">
                <div class="w-full md:w-1/2 md:pr-12">
                    <h2 class="text-3xl font-bold text-safari-red mb-6">Contact Us</h2>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <!-- Contact Form -->
                    <form action="{{ route('contact.submit') }}" method="POST" class="mb-8">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-safari-red">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-safari-red">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-safari-red">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 mb-2">Your Message</label>
                            <textarea id="message" name="message" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-safari-red"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-safari-red text-white px-6 py-2 rounded hover:bg-safari-darkred transition">
                            Send Message
                        </button>
                    </form>

                    <hr class="border-t border-gray-300 my-8">

                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-safari-red hover:text-safari-darkred text-2xl">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-safari-red hover:text-safari-darkred text-2xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-safari-red hover:text-safari-darkred text-2xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-safari-red hover:text-safari-darkred text-2xl">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-safari-red hover:text-safari-darkred text-2xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-1/2 mt-10 md:mt-0">
                    <div class="rounded-lg overflow-hidden h-96">
                        <!-- Google Map Embed -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.808477395885!2d36.80521431533025!3d-1.292385535982247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d664d95aab%3A0x5c9d89b1a8e4f1a5!2sWoodvale%20Grove%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1620000000000!5m2!1sen!2ske"
                        width="700rem" height="500rem" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                    <div class="mt-4 text-gray-700">
                     
                        <h2 class="text-3xl font-bold text-safari-red mb-6">Our Office</h2>
                        <p>Suite 55, Woodvale Groove, Westlands, Nairobi, Kenya</p>
                        <p class="mt-2">Phone: +254 768 069 744</p>
                        <p>Email: <a href="mailto:info@mobheadventures.com">info@mobheadventures.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
