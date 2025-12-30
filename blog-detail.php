<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAIR BY LADY H | The Signature Guide to Effortless Style</title>
    <link rel="icon" type="image/x-icon" href="./images/fav.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .font-luxury-serif { font-family: 'Playfair Display', serif; font-weight: 500; }
        h1, h2, h3, h4 { font-family: 'Playfair Display', serif; font-weight: 600; }
        p { font-weight: 400; }
        /* COLOR PALETTE */
        .bg-accent-purple { background-color: #E7D8D9; } 
        .text-dark-orchid { color: #8D4665; } 
        .bg-dark-section { background-color: #F8F8F8; } 
        .text-deep-plum { color: #4A0E4E; } 
        .hover\:bg-accent-purple-dark:hover { background-color: #C1A0C1; } 
        body { @apply bg-white text-gray-900 font-luxury-serif; }
        .modal { transition: opacity 0.3s ease-in-out; }
        
        .glitter-hover {
            position: relative; z-index: 1;
            background-image: radial-gradient(circle at 100% 100%, #FFFFFF 0%, #E7D8D9 50%, #C1A0C1 100%);
            background-size: 250% 250%;
            transition: all 0.5s ease-in-out;
            border: 1px solid #D8BFD8;
        }
        .glitter-hover:hover { background-position: 50% 50%; }
        /* Image for Detail Page Banner */
        .blog-banner {
            height: 50vh;
            background-image: url('./images/service_hair.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-luxury-serif">
    <div class="bg-dark-section text-dark-orchid text-xs text-center py-2 tracking-widest uppercase font-luxury-serif">Now Accepting Reservations — BOOK NOW & GET PAMPERED!</div>
     <!-- Header -->
    <?php include "includes/header.php" ?>
    <!-- END -->

    <main>
        <div class="blog-banner"></div>
        
        <section class="py-16 md:py-24">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <p class="text-dark-orchid text-sm uppercase mb-2">Hair & Color</p>
                <h1 class="font-luxury-serif text-5xl md:text-6xl text-gray-900 mb-4">
                    The Signature Guide to Effortless Style
                </h1>
                <p class="text-gray-500 text-sm mb-12 border-b border-gray-200 pb-4">
                    Posted by **Evelyn Reed** on October 1, 2025 | 8 min read
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="md:col-span-2">
                        <p class="text-lg text-gray-800 mb-6 first-letter:text-6xl first-letter:float-left first-letter:mr-2">
                            At HAIR BY LADY H, true elegance is found not in extravagance, but in refinement. The secret to effortless style—that look of "I woke up like this"—is meticulous preparation and personalized care. This year, we are seeing a strong pull toward bespoke hair color that complements the natural undertones of the skin, maximizing glow with minimal maintenance.
                        </p>
                        <p class="text-gray-800 mb-6">
                            We specialize in bespoke hair coloring. It's not just about selecting a shade, but understanding the client's lifestyle and current hair health. A consultation is where the true transformation begins, focusing on longevity and shine. We are meticulous about patch testing (required 24-48 hours prior) to ensure safety and superior results.
                        </p>
                        <blockquote class="border-l-4 border-dark-orchid pl-4 italic text-gray-600 my-8">
                            "Effortless style requires effort in the right places—namely, your foundation and the quality of your products."
                        </blockquote>
                        <p class="text-gray-800 mb-6">
                            This philosophy extends to our makeup services. We focus on enhancing features with high-quality, sustainable products that nourish the skin. Whether you need a subtle daily routine or a full bridal transformation, our master stylists are trained to deliver a look that feels authentic and luxurious. To book any service, simply visit our Services page and choose your treatment.
                        </p>
                    </div>
                    
                    <div class="md:col-span-1">
                        <div class="bg-dark-section p-6 border border-gray-200 shadow-md mb-8">
                            <h4 class="font-luxury-serif text-xl text-dark-orchid mb-3">Author</h4>
                            <p class="text-gray-700 text-sm">Evelyn Reed is the Creative Director at HAIR BY LADY H, specializing in bespoke color and transformative treatments since 2015.</p>
                        </div>
                        <div class="bg-dark-section p-6 border border-gray-200 shadow-md">
                            <h4 class="font-luxury-serif text-xl text-dark-orchid mb-3">Related Topics</h4>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="text-gray-700 hover:text-dark-orchid border-b border-dotted">Why Tailored Abayas are the Future of Modesty</a></li>
                                <li><a href="#" class="text-gray-700 hover:text-dark-orchid border-b border-dotted">Mastering the Simple Scarf Style</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="text-center pt-16 border-t border-gray-200 mt-16">
                     <a href="services.html" class="border border-dark-orchid text-dark-orchid hover:bg-dark-orchid hover:text-white font-luxury-serif py-3 px-10 uppercase tracking-widest transition duration-300">
                        Explore Full Services
                    </a>
                </div>
            </div>
        </section>
    </main>

    <div id="enquiry-modal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none" onclick="closeEnquiryModal()">
        <div class="bg-dark-section text-gray-900 p-8 rounded-lg shadow-2xl w-full max-w-md transform scale-95 transition-transform duration-300" onclick="event.stopPropagation()">
            
            <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-6">
                <h2 class="font-luxury-serif text-4xl text-dark-orchid">General Enquiry</h2>
                <button onclick="closeEnquiryModal()" class="text-gray-900 hover:text-dark-orchid text-2xl leading-none">&times;</button>
            </div>
            
            <p class="font-luxury-serif text-gray-600 mb-4 text-sm">Let us know how we can help you. We will respond within 24 hours.</p>

            <form class="flex flex-col gap-4">
                <input type="text" placeholder="Your Name" class="p-3 bg-white border border-gray-400 font-luxury-serif focus:ring-dark-orchid focus:border-dark-orchid" required>
                <input type="email" placeholder="Your Email" class="p-3 bg-white border border-gray-400 font-luxury-serif focus:ring-dark-orchid focus:border-dark-orchid" required>
                <textarea placeholder="Your Enquiry / Message" rows="4" class="p-3 bg-white border border-gray-400 font-luxury-serif focus:ring-dark-orchid focus:border-dark-orchid"></textarea>
                <button type="submit" class="glitter-hover text-deep-plum font-luxury-serif py-3 uppercase tracking-widest transition duration-300 mt-2">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>

     <?php include "includes/footer.php" ?>
     
    <script>
        const enquiryModal = document.getElementById('enquiry-modal');
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