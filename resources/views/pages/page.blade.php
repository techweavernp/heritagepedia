<x-layout>
<!-- Header / Nav -->
<header class="page-header">
    <a href="index.html"><i class="fas fa-map-marker-alt"></i></a>
    <div class="header-title">Kathmandu</div>
    <div class="lang-selector" id="lang-menu">
        <div class="selected-lang">
            <span class="fas fa-language"></span> <span class="current-text">English</span> <i
                class="fas fa-chevron-down"></i>
        </div>
        <div class="lang-dropdown">
            <div class="lang-option" data-lang="English" data-url="https://heritagepedia.info/ktm-23-kumari-che">
                <span class="fi fi-us"></span> English
            </div>
            <div class="lang-option" data-lang="नेपाली" data-url="https://heritagepedia.info/ktm-23-kumari-che-np">
                <span class="fi fi-np"></span> नेपाली
            </div>
            <div class="lang-option" data-lang="हिन्दी" data-url="https://heritagepedia.info/ktm-23-kumari-che-hn">
                <span class="fi fi-in"></span> हिन्दी
            </div>
            <div class="lang-option" data-lang="中文" data-url="https://heritagepedia.info/ktm-23-kumari-che-cn"><span
                    class="fi fi-cn"></span> 中文</div>
            <div class="lang-option" data-lang="日本語" data-url="https://heritagepedia.info/ktm-23-kumari-che-jp">
                <span class="fi fi-jp"></span> 日本語
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg">
        <!-- Placeholder for the main detailed image -->
        <img src="https://heritagepedia.info/wp-content/uploads/2024/03/Kumari-Che-New-Borderless.jpg"
             alt="Heritage Pedia Info">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <h1 class="hero-title">Bhaktapur Durbar Square</h1>
        <div class="location">
            <i class="fas fa-map-marker-alt"></i> Bhaktapur, Nepal
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="content-container">

    <!-- Introduction Section -->
    <section id="introduction" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>Introduction</h2>
        </div>

        <!-- Audio Player Component -->
        <div class="audio-player" data-audio-id="audio-intro">
            <button class="play-btn"><i class="fas fa-play"></i></button>
            <div class="audio-info">
                <div class="progress-bar">
                    <div class="progress" style="width: 0%;"></div>
                </div>
            </div>
            <span class="audio-time">0:00 / 0:00</span>
            <audio id="audio-intro" preload="metadata">
                <source src="{{asset('assets/audio/RS-jiwani-01.mp3')}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <p class="text-content">
            Known as the <strong>'City of Devotees'</strong>, Bhaktapur Durbar Square is a museum of medieval art
            and architecture
            with many examples of sculpture, woodcarving, and colossal pagoda temples consecrated to different gods
            and goddesses.
        </p>
        <p class="text-content">
            It is located 12 km east of Kathmandu and consists of four distinct squares: Durbar Square, Taumadhi
            Square, Dattatreya Square, and Pottery Square.
        </p>
    </section>

    <!-- History Section -->
    <section id="history" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>History</h2>
        </div>

        <!-- Audio Player Component (History) -->
        <div class="audio-player" data-audio-id="audio-history">
            <button class="play-btn"><i class="fas fa-play"></i></button>
            <div class="audio-info">
                <div class="progress-bar">
                    <div class="progress" style="width: 0%;"></div>
                </div>
            </div>
            <span class="audio-time">0:00 / 0:00</span>
            <audio id="audio-history" preload="metadata">
                <source src="{{asset('assets/audio/RS-jiwani-01.mp3')}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <p class="text-content">
            The history of the square is deeply intertwined with the Malla Dynasty, particularly the reign of King
            Yaksha Malla in the 15th century. It served as the royal palace complex for the Bhaktapur Kingdom.
        </p>

        <!-- Timeline -->
        <div class="timeline-table">
            <div class="timeline-header">
                <span>ERA / YEAR</span>
                <span>HISTORICAL EVENT</span>
            </div>
            <div class="timeline-row">
                <div class="time-col">12th Century</div>
                <div class="event-col">Initial construction by King Ananda Deva.</div>
            </div>
            <div class="timeline-row">
                <div class="time-col">1427 AD</div>
                <div class="event-col">Palace of Fifty-five Windows commissioned.</div>
            </div>
            <div class="timeline-row">
                <div class="time-col">1934 AD</div>
                <div class="event-col">Significant damage due to the Great Earthquake.</div>
            </div>
            <div class="timeline-row">
                <div class="time-col">1979 AD</div>
                <div class="event-col">Inscribed as a UNESCO World Heritage Site.</div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>Gallery</h2>
        </div>

        <div class="gallery-grid">
            <!-- Gallery Item 1 -->
            <div class="gallery-item"
                 data-desc="The iconic Golden Gate (Lu Dhowka), the entrance to the main courtyard of the Palace of 55 Windows.">
                <img src="https://images.unsplash.com/photo-1605640840605-14ac1855827b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                     alt="Golden Gate">
            </div>
            <!-- Gallery Item 2 -->
            <div class="gallery-item"
                 data-desc="Nyatapola Temple, the tallest pagoda in Nepal, demonstrating traditional Newari architecture.">
                <img src="photo-1582650625119-3a31f8fa2699?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                     alt="Nyatapola Temple">
            </div>
            <!-- Gallery Item 3 -->https://images.unsplash.com/
            <div class="gallery-item"
                 data-desc="Traditional wood carvings visible on the struts of the temples around the square.">
                <img src="https://images.unsplash.com/photo-1518005068251-37900150dfca?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                     alt="Wood Carvings">
            </div>
            <!-- Gallery Item 4 -->
            <div class="gallery-item"
                 data-desc="Pottery Square, where traditional potters impress their clay wares in the sun.">
                <img src="https://images.unsplash.com/photo-1518005068251-37900150dfca?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                     alt="Pottery Square">
            </div>
        </div>
    </section>

    <!-- Sources Section -->
    <section id="sources" class="content-section sources-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>Exploring</h2>
        </div>

        <div class="sources-grid">
            <div class="source-item">
                <div class="source-info">
                    <span class="source-role">Researcher</span>
                    <span class="source-name">Junu Maiya Basukala</span>
                    <span class="source-detail">Ph.D. in Buddhist Studies</span>
                    <br>
                    <span class="source-role">Photographer</span>
                    <span class="source-name">Rameshwor Maharjan</span>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Required Bottom Navigation Bar -->
<nav class="bottom-nav">
    <button class="nav-item" id="btn-emergency">
        <i class="fas fa-phone-alt"></i>
        <span>Emergency</span>
    </button>
    <button class="nav-item" id="btn-quick-links">
        <i class="fas fa-list-ul"></i>
        <span>Quick Links</span>
    </button>
    <button class="nav-item" id="btn-top">
        <i class="fas fa-arrow-up"></i>
        <span>Top</span>
    </button>
</nav>

<!-- Image Modal -->
<div id="image-modal" class="modal">
    <span class="close-modal">&times;</span>
    <div class="modal-content">
        <img id="modal-img" src="" alt="">
        <div id="modal-caption"></div>

        <!-- Navigation Buttons -->
        <button class="nav-btn prev"><i class="fas fa-chevron-left"></i></button>
        <button class="nav-btn next"><i class="fas fa-chevron-right"></i></button>
    </div>
</div>

<!-- Emergency Numbers Modal/Sheet -->
<div id="emergency-modal" class="bottom-sheet-modal">
    <div class="sheet-content">
        <div class="sheet-header">
            <h3>Emergency Contacts</h3>
            <span class="close-sheet">&times;</span>
        </div>

        <div class="emergency-body">
            <!-- General Numbers -->
            <div class="emergency-section">
                <h4>General Emergency</h4>
                <ul class="emergency-list">
                    <li><span class="service-name">Tourist Police</span> <a href="tel:1144"
                                                                            class="service-number">1144</a></li>
                    <li><span class="service-name">Police Assistance</span> <a href="tel:100"
                                                                               class="service-number">100</a></li>
                    <li><span class="service-name">Traffic Police</span> <a href="tel:103"
                                                                            class="service-number">103</a></li>
                </ul>
            </div>

            <!-- Head Office -->
            <div class="emergency-section">
                <h4>Tourist Police Head Office</h4>
                <p class="location-detail">Bhrikutimandap, Kathmandu (Nepal Tourism Board)</p>
                <ul class="contact-list">
                    <li><i class="fas fa-phone"></i> <a href="tel:014247041">01-4247041</a></li>
                    <li><i class="fas fa-mobile-alt"></i> <a href="tel:9851289444">9851289444</a></li>
                    <li><i class="fas fa-envelope"></i> <a
                            href="mailto:policetourist@nepalpolice.gov.np">policetourist@nepalpolice.gov.np</a></li>
                </ul>
            </div>

            <!-- Kathmandu District -->
            <div class="emergency-section">
                <h4>Kathmandu District</h4>
                <ul class="emergency-list">
                    <li><span class="service-name">Thamel</span> <a href="tel:9851289453"
                                                                    class="service-number">9851289453</a></li>
                    <li><span class="service-name">Basantapur</span> <a href="tel:9851289454"
                                                                        class="service-number">9851289454</a></li>
                    <li><span class="service-name">Pashupati</span> <a href="tel:9851289446"
                                                                       class="service-number">9851289446</a></li>
                    <li><span class="service-name">Swoyambhu</span> <a href="tel:9851289452"
                                                                       class="service-number">9851289452</a></li>
                    <li><span class="service-name">Airport</span> <a href="tel:9851289450"
                                                                     class="service-number">9851289450</a></li>
                    <li><span class="service-name">Bouddha</span> <a href="tel:9851289451"
                                                                     class="service-number">9851289451</a></li>
                </ul>
            </div>

            <!-- Lalitpur & Bhaktapur -->
            <div class="emergency-section">
                <h4>Lalitpur & Bhaktapur</h4>
                <ul class="emergency-list">
                    <li><span class="service-name">Patan (Lalitpur)</span> <a href="tel:9851289449"
                                                                              class="service-number">9851289449</a></li>
                    <li><span class="service-name">Bhaktapur</span> <a href="tel:9851289448"
                                                                       class="service-number">9851289448</a></li>
                    <li><span class="service-name">Nagarkot</span> <a href="tel:9851289447"
                                                                      class="service-number">9851289447</a></li>
                </ul>
            </div>

            <!-- Immigration -->
            <div class="emergency-section">
                <h4>Department of Immigration</h4>
                <p class="location-detail">Kalikasthan, Kathmandu</p>
                <ul class="contact-list">
                    <li><i class="fas fa-phone"></i> <a href="tel:014529659">01-4529659</a>, <a
                            href="tel:014429660">4429660</a></li>
                    <li><i class="fas fa-phone"></i> <a href="tel:014433935">01-4433935</a>, <a
                            href="tel:014433934">4433934</a></li>
                    <li><i class="fas fa-envelope"></i> <a
                            href="mailto:info@immigration.gov.np">info@immigration.gov.np</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links Sheet -->
<div id="quick-links-modal" class="bottom-sheet-modal">
    <div class="sheet-content">
        <div class="sheet-header">
            <h3>Quick Navigate</h3>
            <span class="close-sheet">&times;</span>
        </div>
        <ul class="quick-links-list">
            <li><a href="#introduction" class="quick-link-item">Introduction</a></li>
            <li><a href="#history" class="quick-link-item">History</a></li>
            <li><a href="#gallery" class="quick-link-item">Gallery</a></li>
        </ul>
    </div>
</div>

<script src="{{asset('assets/js/detail-page.js')}}"></script>
</x-layout>
