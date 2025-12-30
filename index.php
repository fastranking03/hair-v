<?php
$page = "/";
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAIR BY LADY H | Home</title>
    <link rel="icon" type="image/x-icon" href="./images/fav.png">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <?php include "includes/head.php" ?>

    <style>
        .font-luxury-serif {
            font-family: 'Playfair Display', serif;
            font-weight: 500;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        p {
            font-weight: 400;
        }

        /* Color Palette (Rose/White) */
        .bg-accent-purple {
            background-color: #E7D8D9;
        }

        .text-dark-orchid {
            color: #8D4665;
        }

        .bg-dark-section {
            background-color: #F8F8F8;
        }

        .text-deep-plum {
            color: #4A0E4E;
        }

        .hover\:bg-accent-purple-dark:hover {
            background-color: #C1A0C1;
        }

        body {
            @apply bg-white text-gray-900 font-luxury-serif;
        }

        .modal {
            transition: opacity 0.3s ease-in-out;
        }

        /* GLITTER SHIMMER EFFECT CSS */
        .glitter-hover {
            position: relative;
            z-index: 1;
            background-image: radial-gradient(circle at 100% 100%, #FFFFFF 0%, #E7D8D9 50%, #C1A0C1 100%);
            background-size: 250% 250%;
            transition: all 0.5s ease-in-out;
            border: 1px solid #D8BFD8;
        }

        .glitter-hover:hover {
            background-position: 50% 50%;
        }

        /* Table Styling for a more defined look */
        .service-table {
            border-collapse: collapse;
            width: 100%;
        }

        .service-cell {
            padding: 2.5rem;
            /* Increased padding for luxury feel */
            border: 1px solid #E7D8D9;
            /* Light, elegant border */
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .service-cell:hover {
            background-color: #F4F0F4;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-luxury-serif">
    <div class="bg-dark-section text-dark-orchid text-xs text-center py-2 tracking-widest uppercase font-luxury-serif">
        Now Accepting Reservations — BOOK NOW & GET PAMPERED!
    </div>
    <!-- Header -->
    <?php include "includes/header.php" ?>
    <!-- END -->
 

    <main>
        <section class="relative h-[90vh] overflow-hidden">
            <img
                src="./images/service_spa.jpg"
                alt="Luxury Salon Interior"
                width="1920"
                height="1080"
                class="absolute inset-0 w-full h-full object-cover object-center brightness-[.35] transition-transform duration-1000 ease-out hover:scale-105">

            <div class="absolute inset-0 flex flex-col justify-center items-start max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
                <p class="font-luxury-serif text-xl uppercase tracking-widest mb-3 text-accent-purple">Need a glow-up?</p>
                <h1 class="font-luxury-serif text-7xl md:text-8xl lg:text-9xl leading-none mb-6 tracking-wide">
                    Walk in, relax, <span class="text-accent-purple">and transform</span> yourself.
                </h1>
                <p class="font-luxury-serif text-lg md:text-xl mb-10 max-w-2xl tracking-wide">
                    Experience world-class styling and step into your dream look. Book an appointment to give yourself that exquisite monthly self-care ritual you deserve 💗
                </p>
                <a href="services.html" class="glitter-hover text-deep-plum py-4 px-12 text-lg uppercase tracking-widest shadow-2xl">
                    Explore the best hair care there is
                </a>
            </div>
        </section>

        <section class="py-20 md:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="font-luxury-serif text-6xl text-center mb-12 text-dark-orchid">
                    An entire world of luxurious indulgence
                </h2>
                <table class="service-table">
                    <tr>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Hair & Scalp Treatments</h3>
                            <p class="text-gray-600 text-base">Because healthy hair equals a happier you.</p>
                        </td>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Colors</h3>
                            <p class="text-gray-600 text-base">Spice things up and flaunt a personality that you choose</p>
                        </td>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Luxurious Haircuts</h3>
                            <p class="text-gray-600 text-base">The one thing that changes the whole game</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Styling</h3>
                            <p class="text-gray-600 text-base">Charm every occasion with a little bit of flair</p>
                        </td>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Jewelry</h3>
                            <p class="text-gray-600 text-base">Hand-picked collection</p>
                        </td>
                        <td class="service-cell">
                            <h3 class="font-luxury-serif text-3xl mb-2 text-dark-orchid tracking-wide">Courses</h3>
                            <p class="text-gray-600 text-base">Become a hair expert yourself!</p>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        <section>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="font-luxury-serif text-6xl my-8 text-dark-orchid">Experiences you won’t forget!</h2>
                <p class="text-lg text-gray-600 mb-6 font-luxury-serif">
                    Beauty, when enhanced with the right care, can become art in itself. That’s what we’ve always believed at our salon. And that belief has made us pour craft generously into each of our clients. When you do visit us, you’ll notice how creating your dream look is like devotion for our stylists.
                </p>
                <p class="text-lg text-gray-600 mb-6 font-luxury-serif italic">
                    “I built this space so self-care could feel not only about the result, but a rejuvenating, deeply personal process for women to enjoy.”
                </p>
                <p class="text-lg text-gray-600 mb-6 font-luxury-serif font-semibold">
                    — Humaira, Founder
                </p>
            </div>
        </section>

        <section class="py-20 md:py-32 bg-dark-section">
            <h2 class="font-luxury-serif text-6xl text-center mb-4 text-dark-orchid">
                Love letters from our clients
            </h2>
            <p class="text-center pt-8 text-gray-500 text-sm mb-12">Our existing customers love us, and who knows, you might too. </p>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
                <div class="flex space-x-6 pb-4 snap-x snap-mandatory">
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "I recently came to get my hair done by Humaira. She was not only amazing at transforming my hair but was also very friendly to speak to. I felt as if I was speaking to my sister and best friend; her kind and empowering words made me fall in love with her immediately. She also gave me amazing after-care advice, and I left the salon not only feeling fabulous but also feeling like a weight was lifted after speaking to her. We need more people like Humaira who go the extra mile for customers. I will definitely be coming back for Humaira."
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— L R</p>
                    </div>
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "Humera did an amazing job with my hair. It was nice to meet a trustworthy, honest, and kind hairdresser. The staff at the salon are very welcoming and I would definitely recommend their services"
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— Amirah</p>
                    </div>
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "I booked my daughter for a scalp treatment, and I can honestly say, not a trace of dandruff was left on her scalp. The time and care taken by the lovely Humera were overwhelmingly amazing. I can not recommend her enough! She really took her time, guided me through the process, and explained every step. My daughter was comfortable throughout the treatment, and the ladies in the salon are all so welcoming and lovely. Will definitely be going again! 10/10 ladies!"
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— Asma Ahmed</p>
                    </div>
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "Hi just wanted to say visited the salon yesterday for a facial my skin hasn't ever looked better glowing and pain free my eyebrows are amazing and I got my hair cut washed and styled it was absolutely amazing can't fault Humaira such a brilliant person restored the condition of my damaged hair in minutes and not to forget Alisha your amazing my sisters wedding makeup was brilliant didn't even budget prices were unbeatable and so affordable can't wait to come back to you again may Allah swt bless you for your hard work and bless you with immense success inshallah x"
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— Fatima Z</p>
                    </div>
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "As a postpartum mum, self-care isn't really a thought; however, after seeing many good things online, I thought I'd book in after seeing an amazing offer. Humaira was my stylist, and she did an absolutely wonderful job. I was almost falling asleep! That's how relaxed she made me feel! My hair looked and felt amazing, and she was so mindful and considerate. I also brought my baby girl with me to the salon, and all the staff were so accommodating, which really made my experience as a new postpartum mum that extra special. I will definitely be coming again, my new safe space in Bradford! The owner should be proud of their staff!"
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— Saira Hussain</p>
                    </div>
                    <div class="flex-shrink-0 w-80 md:w-96 p-6 bg-white border border-gray-200 shadow-xl snap-center">
                        <p class="italic text-lg text-gray-800 font-luxury-serif mb-4">
                            "Humaira was absolutely amazing today! Did 4 wash, cut, dry, and style. She was patient and very helpful with recommendations for our hair. She literally revived my damaged hair. My hair looks and feels a lot healthier than the damaged mess I came in with. Cannot thank her enough!"
                        </p>
                        <p class="font-luxury-serif text-sm text-dark-orchid">— Harissa Ali</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-luxury-serif text-6xl text-center mb-6 text-dark-orchid">A World of Indulgence</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="services.html" class="group block bg-dark-section border border-transparent hover:border-dark-orchid transition duration-300 shadow-lg">
                    <img src="./images/service_hair.jpg" alt="Hair Design Preview" width="600" height="400" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-luxury-serif text-xl tracking-wide text-gray-900 group-hover:text-dark-orchid">Hair Design</h3>
                        <p class="text-gray-500 text-sm mt-1">Cuts, Color & Custom Styling</p>
                    </div>
                </a>
                <a href="services.html" class="group block bg-dark-section border border-transparent hover:border-dark-orchid transition duration-300 shadow-lg">
                    <img src="./images/service_spa.jpg" alt="Skin and Spa Preview" width="600" height="400" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-luxury-serif text-xl tracking-wide text-gray-900 group-hover:text-dark-orchid">Skin & Spa</h3>
                        <p class="text-gray-500 text-sm mt-1">Rejuvenating Facials & Massage</p>
                    </div>
                </a>
                <a href="services.html" class="group block bg-dark-section border border-transparent hover:border-dark-orchid transition duration-300 shadow-lg">
                    <img src="./images/service_nails.jpg" alt="Nail Artistry Preview" width="600" height="400" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-luxury-serif text-xl tracking-wide text-gray-900 group-hover:text-dark-orchid">Nail Artistry</h3>
                        <p class="text-gray-500 text-sm mt-1">Bespoke Manicures & Art</p>
                    </div>
                </a>
            </div>
            <div class="text-center pt-16">
                <button onclick="openEnquiryModal()" class="border border-dark-orchid text-dark-orchid hover:bg-dark-orchid  font-luxury-serif py-3 px-10 uppercase tracking-widest transition duration-300">
                    Enquire Now
                </button>
            </div>
        </section>

        <section class="py-20 md:py-32 bg-dark-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12">

                <div>
                    <h2 class="font-luxury-serif text-5xl mb-6 text-dark-orchid">Latest Style Guides</h2>
                    <p class="text-gray-600 mb-6 font-luxury-serif">
                        Watch our master stylists reveal the secrets to the season's most sought-after looks, from bridal updos to custom coloring.
                    </p>
                    <a href="videos.html" class="group block mb-4 border border-gray-300 hover:border-dark-orchid transition duration-300 shadow-lg">
                        <img src="./images/gallery_team_default.jpg" alt="Video Preview: Seasonal Trends" width="600" height="337" class="w-full object-cover">
                    </a>
                    <a href="videos.html" class="text-gray-800 hover:text-dark-orchid text-sm uppercase tracking-widest border-b border-gray-800 hover:border-dark-orchid transition duration-300">
                        View All Videos
                    </a>
                </div>

                <div>
                    <h2 class="font-luxury-serif text-5xl mb-6 text-dark-orchid">Aura's Journal</h2>
                    <p class="text-gray-600 mb-6 font-luxury-serif">
                        Discover articles on sustainable beauty, skincare routines, and the history of high-end fashion.
                    </p>
                    <div class="flex space-x-4 mb-4 border border-gray-300 p-3 bg-white hover:shadow-xl transition duration-300">
                        <img src="./images/service_nails.jpg" alt="Blog Thumb" width="80" height="80" class="object-cover flex-shrink-0">
                        <div>
                            <h4 class="font-luxury-serif text-lg text-gray-900 hover:text-dark-orchid">5 Ways to Elevate Your Winter Skincare Routine</h4>
                            <p class="text-gray-500 text-xs">Oct 1, 2025</p>
                        </div>
                    </div>
                    <a href="blog.html" class="text-gray-800 hover:text-dark-orchid text-sm uppercase tracking-widest border-b border-gray-800 hover:border-dark-orchid transition duration-300">
                        Read All Articles
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 md:py-32 bg-dark-section">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="font-luxury-serif text-6xl mb-8 text-dark-orchid">Our Philosophy</h2>
                <p class="text-lg text-gray-600 mb-6 font-luxury-serif">
                    HAIR BY LADY H was founded on the belief that beauty is an art form, and every client is a masterpiece waiting to be revealed. We blend classic European techniques with modern innovation to provide a truly bespoke experience.
                </p>
                <a href="about.html" class="text-gray-800 hover:text-dark-orchid text-sm uppercase tracking-widest border-b border-gray-800 hover:border-dark-orchid transition duration-300">
                    Read Our Story
                </a>
            </div>
        </section>
    </main>

    <div id="enquiry-modal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none" onclick="closeEnquiryModal()">
        <div class="bg-dark-section text-gray-900 p-8 rounded-lg shadow-2xl w-full max-w-md transform scale-95 transition-transform duration-300">

            <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-6">
                <h2 class="font-luxury-serif text-4xl text-dark-orchid">General Enquiry</h2>
                <button onclick="closeEnquiryModal()" class="text-gray-900 hover:text-dark-orchid text-2xl leading-none">&times;</button>
            </div>

            <p class="font-luxury-serif text-gray-600 mb-4 text-sm">Let us know how we can help you. We will respond within 24 hours.</p>

            <form class="flex flex-col gap-4">
                <input type="text" placeholder="Your Name" class="p-3 bg-white border border-gray-400 font-luxury-serif text-gray-900 placeholder-gray-500 focus:ring-dark-orchid focus:border-dark-orchid" required>
                <input type="email" placeholder="Your Email" class="p-3 bg-white border border-gray-400 font-luxury-serif text-gray-900 placeholder-gray-500 focus:ring-dark-orchid focus:border-dark-orchid" required>
                <textarea placeholder="Your Enquiry / Message" rows="4" class="p-3 bg-white border border-gray-400 font-luxury-serif text-gray-900 placeholder-gray-500 focus:ring-dark-orchid focus:border-dark-orchid"></textarea>
                <button type="submit" class="glitter-hover text-deep-plum font-luxury-serif py-3 uppercase tracking-widest transition duration-300 mt-2">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>


    <?php include "includes/footer.php" ?>
    <script>
        const enquiryModal = document.getElementById('enquiry-modal');

        // Function to toggle mobile menu visibility
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function openEnquiryModal() {
            enquiryModal.classList.remove('opacity-0', 'pointer-events-none');
            enquiryModal.classList.add('opacity-100');
        }

        function closeEnquiryModal() {
            enquiryModal.classList.remove('opacity-100');
            enquiryModal.classList.add('opacity-0', 'pointer-events-none');
        }
    </script>
</body>

</html>