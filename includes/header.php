    <header class="sticky top-0 z-50 bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex justify-between items-center">
            <a href="/" class="h-12 flex items-center">
                <img src="./images/brand_logo.png" alt="HAIR BY LADY H Logo" class="h-full w-auto object-contain">
            </a>
            <nav class="hidden lg:flex space-x-6 h-full items-center font-luxury-serif">
                <a href="services" class="text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Services</a>
                <a href="gallery" class="text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Gallery</a>
                <a href="blog" class="text-sm uppercase tracking-wider text-dark-orchid transition duration-200">Blog</a>
                <a href="videos" class="text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Videos</a>
                <a href="about" class="text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">About Us</a>
                <a href="contact" class="text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Contact</a>
                <button onclick="openEnquiryModal()" class="glitter-hover text-deep-plum text-sm py-2 px-5 uppercase tracking-widest shadow-lg">Enquire Now</button>
            </nav>
            <div class="flex items-center space-x-4">
                <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <nav id="mobile-menu" class="hidden lg:hidden bg-dark-section border-b border-gray-200 w-full z-40 shadow-lg">
        <div class="flex flex-col py-3 px-6 space-y-2 font-luxury-serif">
            <a href="services" class="py-2 text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Services</a>
            <a href="gallery" class="py-2 text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Gallery</a>
            <a href="blog" class="py-2 text-sm uppercase tracking-wider text-dark-orchid transition duration-200">Blog</a>
            <a href="videos" class="py-2 text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Videos</a>
            <a href="about" class="py-2 text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">About Us</a>
            <a href="contact" class="py-2 text-sm uppercase tracking-wider text-gray-800 hover:text-dark-orchid transition duration-200">Contact</a>
            <button onclick="openEnquiryModal(); toggleMobileMenu();" class="glitter-hover text-deep-plum text-sm py-2 mt-4 uppercase tracking-widest shadow-lg">Enquire Now</button>
        </div>
    </nav>