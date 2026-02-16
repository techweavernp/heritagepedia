<x-layout>
<!-- Header / Nav -->
<header class="page-header">
    <i class="fas fa-map-marker-alt"></i>
    <div class="header-title">{{$heritage->site->city->district->name}}</div>
    <div class="lang-selector" id="lang-menu">
        <div class="selected-lang">
            <span class="fas fa-language"></span> <span class="current-text">{{ $heritage->lang->name ?? 'English' }}</span> <i
                class="fas fa-chevron-down"></i>
        </div>
        <div class="lang-dropdown">
            @foreach($languages as $lang)
                <div class="lang-option"
                     data-lang="{{ $lang['name'] }}"
                     data-url="{{ config('app.url') }}/page/{{ substr($heritage->url_code, 0, -2) }}{{ $lang['code'] }}">
                    <span class="fi fi-{{ strtolower($lang['code']) }}"></span> {{ $lang['name'] }}
                </div>
            @endforeach
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-bg">
        <!-- Placeholder for the main detailed image -->
        <img src="{{ asset('storage/' . $heritage->feature_image) }}" alt="Heritage Pedia Info">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <h1 class="hero-title">{{$heritage->name}}</h1>
        <div class="location">
            <i class="fas fa-map-marker-alt"></i> {{$heritage->location}}
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="content-container">

    <!-- Main Section -->
    @foreach($heritage->heritage_details as $detail)
    <section id="{{$detail->qlink_tag}}" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>{{$detail->title}}</h2>
        </div>

        <!-- Audio Player Component -->
        <div class="audio-player" data-audio-id="{{'audio'.$detail->id}}">
            <button class="play-btn"><i class="fas fa-play"></i></button>
            <div class="audio-info">
                <div class="progress-bar">
                    <div class="progress" style="width: 0%;"></div>
                </div>
            </div>
            <span class="audio-time">0:00 / 0:00</span>
            <audio id="audio-intro" preload="metadata">
                <source src="{{asset('storage/' . $detail->audio)}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>

        <p class="text-content">{!! $detail->description !!}</p>
    </section>
    @endforeach

    <!-- Gallery Section -->
    <section id="gallery" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>@switch($heritage->lang->code)
                    @case('np')
                        फोटो
                        @break
                    @case('en')
                        Gallery
                        @break
                    @case('in')
                        गैलरी
                        @break
                    @default
                        Gallery
                @endswitch</h2>
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
                <img src="https://images.unsplash.com/photo-1582650625119-3a31f8fa2699?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                     alt="Nyatapola Temple">
            </div>
            <!-- Gallery Item 3 -->
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
                    <span class="source-role">Researcher -</span>
                    <span class="source-name">{{$heritage->source['researcher']}}</span>
                    <span class="source-detail">{{$heritage->source['title']}}</span>
                    <br>
                    <span class="source-role">Photographer -</span>
                    <span class="source-name">{{$heritage->source['photographer']}}</span>
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
            @foreach($heritage->heritage_details as $detail)
                <li><a href="#{{$detail->qlink_tag}}" class="quick-link-item">{{$detail->qlink_tag}}</a></li>
            @endforeach

        </ul>
    </div>
</div>

<script src="{{asset('assets/js/detail-page.js')}}"></script>
</x-layout>
