<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAIR BY LADY H | Videos</title>
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
        /* Responsive Aspect Ratio for YouTube embeds */
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-luxury-serif">
    <div class="bg-dark-section text-dark-orchid text-xs text-center py-2 tracking-widest uppercase font-luxury-serif">Now Accepting Reservations — BOOK NOW & GET PAMPERED!</div>
    
    <!-- Header -->
    <?php include "includes/header.php" ?>
    <!-- END -->

    <main>
        <section class="py-20 md:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="font-luxury-serif text-6xl text-center mb-16 text-dark-orchid">
                    Video Tutorials & Lookbooks
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div>
                        <div class="video-container shadow-xl mb-4 border border-gray-300">
                            <iframe 
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <h3 class="font-luxury-serif text-xl text-gray-900">The Signature Bridal Updo: Step-by-Step</h3>
                        <p class="text-gray-500 text-sm">15.5K views</p>
                    </div>

                    <div>
                        <div class="video-container shadow-xl mb-4 border border-gray-300">
                             <iframe 
                                src="https://www.youtube.com/embed/5a6B-3E77p4" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <h3 class="font-luxury-serif text-xl text-gray-900">2025 Color Forecast: Deep Amethyst & Charcoal</h3>
                        <p class="text-gray-500 text-sm">8.1K views</p>
                    </div>

                    <div class="md:col-span-2 max-w-4xl mx-auto">
                        <div class="video-container shadow-xl mb-4 border border-gray-300">
                             <iframe 
                                src="https://www.youtube.com/embed/r1S_S-Xv-rU" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <h3 class="font-luxury-serif text-xl text-center text-gray-900">Luxury Skincare: Maintaining Your Glow Between Facials</h3>
                        <p class="text-gray-500 text-sm text-center">32.9K views</p>
                    </div>

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
    <?php include "includes/footer.php" ?>
</body>
</html>