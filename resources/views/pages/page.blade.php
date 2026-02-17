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
                    <span class="fi fi-{{ strtolower($lang['icon']) }}"></span> {{ $lang['name'] }}
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
        @if($detail->audio)
            <div class="audio-player" data-audio-id="{{'audio-'.$detail->id}}">
                <button class="play-btn"><i class="fas fa-play"></i></button>
                <div class="audio-info">
                    <div class="progress-bar">
                        <div class="progress" style="width: 0%;"></div>
                    </div>
                </div>
                <span class="audio-time">0:00 / 0:00</span>
                <audio id="{{'audio-'.$detail->id}}" preload="metadata">
                    <source src="{{asset('storage/' . $detail->audio)}}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        @endif

        <p class="text-content">{!! $detail->description !!}</p>
    </section>
    @endforeach

    <!-- Gallery Section -->
    <section id="gallery" class="content-section">
        <div class="section-header">
            <div class="red-bar"></div>
            <h2>{{ \App\Services\LabelService::gallery($heritage->lang->code ?? null) }}</h2>
        </div>

        <div class="gallery-grid">
            <!-- Gallery Item -->
            @foreach($galleries as $gallery)
                <div class="gallery-item"
                     data-desc="{!! $gallery->caption !!}">
                    <img src="{{asset('storage/' . $gallery->image)}}" alt="Heritage Pedia">
                </div>
            @endforeach
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
                    <span class="source-role">{{ \App\Services\LabelService::researcher($heritage->lang->code ?? null) }} -</span>
                    <span class="source-name">{{$heritage->source['researcher']}}</span>
                    <span class="source-detail">{{$heritage->source['title']}}</span>
                    <br>
                    <span class="source-role">{{ \App\Services\LabelService::photographer($heritage->lang->code ?? null) }} -</span>
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

<!-- Modals -->
<x-modals.emergency />
<x-modals.quick-links :details="$heritage->heritage_details" />

<script src="{{asset('assets/js/detail-page.js')}}"></script>
</x-layout>
