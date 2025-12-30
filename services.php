<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAIR BY LADY H | Services</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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

        /* COLOR PALETTE */
        .bg-accent-purple {
            background-color: #E7D8D9;
        }

        .text-accent-purple {
            color: #9932CC;
        }

        .bg-dark-section {
            background-color: #F8F8F8;
        }

        .text-deep-plum {
            color: #4A0E4E;
        }

        .text-dark-orchid {
            color: #8D4665;
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

        .booking-step {
            display: none;
        }

        .booking-step.active {
            display: block;
        }

        .time-slot.selected {
            background-color: #E7D8D9;
            color: #4A0E4E;
            border-color: #8D4665;
        }
    </style>
</head>

<body>
    <div class="bg-dark-section text-dark-orchid text-xs text-center py-2 tracking-widest uppercase font-luxury-serif">Now Accepting Reservations — Secure Your Elevated Experience</div>
    <!-- Header -->
    <?php include "includes/header.php" ?>
    <!-- END -->
    <main class="min-h-[80vh]">
        <section class="py-20 md:py-32 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <h2 class="font-luxury-serif text-6xl text-center mb-4 text-dark-orchid">Service Menu</h2>
                <p class="text-center text-gray-600 mb-16 max-w-3xl mx-auto">
                    Browse through the categories to view detailed pricing, duration, and other guidelines. Everything you need, in one place.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="group overflow-hidden border border-gray-200 shadow-lg transition-all duration-300 bg-dark-section hover:scale-[1.03] hover:shadow-2xl">
                        <img src="./images/service_hair.jpg" alt="Hair Colouring and Cutting" width="600" height="750" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-[1.05]">
                        <div class="p-6 text-center border-t border-dark-orchid">
                            <h3 class="font-luxury-serif text-2xl tracking-wide text-dark-orchid mb-4">Hair Cuts & Colour</h3>
                            <a href="hair-colour-cuts.html" class="glitter-hover text-deep-plum font-luxury-serif w-full inline-block py-2 uppercase tracking-widest text-sm transition duration-300">
                                More Info
                            </a>
                        </div>
                    </div>

                    <div class="group overflow-hidden border border-gray-200 shadow-lg transition-all duration-300 bg-dark-section hover:scale-[1.03] hover:shadow-2xl">
                        <img src="./images/service_spa.jpg" alt="Scalp Treatments" width="600" height="750" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-[1.05]">
                        <div class="p-6 text-center border-t border-dark-orchid">
                            <h3 class="font-luxury-serif text-2xl tracking-wide text-dark-orchid mb-4">Hair & Scalp Treatments</h3>
                            <a href="hair-treatments.html" class="glitter-hover text-deep-plum font-luxury-serif w-full inline-block py-2 uppercase tracking-widest text-sm transition duration-300">
                                More Info
                            </a>
                        </div>
                    </div>

                    <div class="group overflow-hidden border border-gray-200 shadow-lg transition-all duration-300 bg-dark-section hover:scale-[1.03] hover:shadow-2xl">
                        <img src="./images/service_nails.jpg" alt="Hair Styling & Sets" width="600" height="750" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-[1.05]">
                        <div class="p-6 text-center border-t border-dark-orchid">
                            <h3 class="font-luxury-serif text-2xl tracking-wide text-dark-orchid mb-4">Hair Styling & Sets</h3>
                            <a href="hair-styling.html" class="glitter-hover text-deep-plum font-luxury-serif w-full inline-block py-2 uppercase tracking-widest text-sm transition duration-300">
                                More Info
                            </a>
                        </div>
                    </div>

                    <div class="group overflow-hidden border border-gray-200 shadow-lg transition-all duration-300 bg-dark-section hover:scale-[1.03] hover:shadow-2xl">
                        <img src="./images/gallery_team_default.jpg" alt="Bridal Glamour" width="600" height="750" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-[1.05]">
                        <div class="p-6 text-center border-t border-dark-orchid">
                            <h3 class="font-luxury-serif text-2xl tracking-wide text-dark-orchid mb-4">Bridal Packages</h3>
                            <a href="bridal-packages.html" class="glitter-hover text-deep-plum font-luxury-serif w-full inline-block py-2 uppercase tracking-widest text-sm transition duration-300">
                                More Info
                            </a>
                        </div>
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