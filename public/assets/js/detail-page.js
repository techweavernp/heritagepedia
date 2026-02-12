document.addEventListener('DOMContentLoaded', () => {

    /* --- Gallery Modal Logic --- */
    const galleryItems = document.querySelectorAll('.gallery-item');
    const imageModal = document.getElementById('image-modal');
    const modalImg = document.getElementById('modal-img');
    const modalCaption = document.getElementById('modal-caption');
    const closeModal = document.querySelector('.close-modal');

    // Arrays to store gallery data
    let galleryData = [];
    galleryItems.forEach((item, index) => {
        galleryData.push({
            src: item.querySelector('img').src,
            desc: item.dataset.desc || "Detail View"
        });
        // Store index on the item for easy access
        item.dataset.index = index;
    });

    let currentSlideIndex = 0;

    function openModal(index) {
        currentSlideIndex = index;
        const data = galleryData[currentSlideIndex];
        modalImg.src = data.src;
        modalCaption.innerText = data.desc;
        imageModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    // Previous/Next controls
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    if (prevBtn) {
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            changeSlide(-1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            changeSlide(1);
        });
    }

    function changeSlide(n) {
        currentSlideIndex += n;
        // Loop logic
        if (currentSlideIndex >= galleryData.length) { currentSlideIndex = 0; }
        if (currentSlideIndex < 0) { currentSlideIndex = galleryData.length - 1; }

        const data = galleryData[currentSlideIndex];

        // Simple fade effect
        modalImg.style.opacity = 0;
        setTimeout(() => {
            modalImg.src = data.src;
            modalCaption.innerText = data.desc;
            modalImg.style.opacity = 1;
        }, 200);
    }

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const index = parseInt(item.dataset.index);
            openModal(index);
        });
    });

    closeModal.addEventListener('click', () => {
        imageModal.classList.remove('show');
        document.body.style.overflow = '';
    });

    imageModal.addEventListener('click', (e) => {
        if (e.target === imageModal) {
            imageModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!imageModal.classList.contains('show')) return;
        if (e.key === 'ArrowLeft') changeSlide(-1);
        if (e.key === 'ArrowRight') changeSlide(1);
        if (e.key === 'Escape') {
            imageModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    /* --- Bottom Sheet Modals (Generic) --- */
    function toggleSheet(sheetId) {
        const sheet = document.getElementById(sheetId);
        if (sheet.classList.contains('show')) {
            sheet.classList.remove('show');
            document.body.style.overflow = '';
        } else {
            // Close any other open sheets first
            document.querySelectorAll('.bottom-sheet-modal').forEach(s => s.classList.remove('show'));

            sheet.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    // Sheet Triggers
    document.getElementById('btn-emergency').addEventListener('click', () => toggleSheet('emergency-modal'));
    document.getElementById('btn-quick-links').addEventListener('click', () => toggleSheet('quick-links-modal'));

    // Close logic for sheets
    document.querySelectorAll('.close-sheet').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const sheet = e.target.closest('.bottom-sheet-modal');
            sheet.classList.remove('show');
            document.body.style.overflow = '';
        });
    });

    // Close sheet when clicking outside content
    document.querySelectorAll('.bottom-sheet-modal').forEach(sheet => {
        sheet.addEventListener('click', (e) => {
            if (e.target === sheet) {
                sheet.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    /* --- Scroll to Top --- */
    const scrollTopBtn = document.getElementById('btn-top');
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    /* --- Map Button Dummy Action --- */
    const mapBtn = document.querySelector('.btn-map');
    if (mapBtn) {
        mapBtn.addEventListener('click', () => {
            alert("Interactive Map feature coming soon!");
        });
    }

    /* --- Header Scroll Effect --- */
    const header = document.querySelector('.page-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    /* --- Quick Link Click Closes Modal --- */
    const quickLinks = document.querySelectorAll('.quick-link-item');
    quickLinks.forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('quick-links-modal').classList.remove('show');
            document.body.style.overflow = '';
        });
    });

    /* --- Language Selector Logic --- */
    const langMenu = document.getElementById('lang-menu');
    if (langMenu) {
        const currentText = langMenu.querySelector('.current-text');
        const options = langMenu.querySelectorAll('.lang-option');

        // Toggle Menu
        langMenu.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent immediate close from document listener
            langMenu.classList.toggle('active');
        });

        // Option Select
        options.forEach(opt => {
            opt.addEventListener('click', (e) => {
                e.stopPropagation();
                const lang = opt.dataset.lang;
                const url = opt.dataset.url;

                currentText.textContent = lang;
                langMenu.classList.remove('active');

                if (url) {
                    window.location.href = url;
                }
            });
        });

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!langMenu.contains(e.target)) {
                langMenu.classList.remove('active');
            }
        });
    }

    /* --- Audio Player Functionality --- */
    const audioPlayers = document.querySelectorAll('.audio-player');

    audioPlayers.forEach(player => {
        const audioId = player.dataset.audioId;
        if (!audioId) return;

        const audio = document.getElementById(audioId);
        if (!audio) return;

        const playBtn = player.querySelector('.play-btn');
        const playIcon = playBtn.querySelector('i');
        const progressBar = player.querySelector('.progress');
        const progressContainer = player.querySelector('.progress-bar');
        const timeDisplay = player.querySelector('.audio-time');

        // Format time (seconds to MM:SS)
        function formatTime(seconds) {
            if (isNaN(seconds)) return '0:00';
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${secs.toString().padStart(2, '0')}`;
        }

        // Update time display
        function updateTime() {
            const current = formatTime(audio.currentTime);
            const duration = formatTime(audio.duration);
            timeDisplay.textContent = `${current} / ${duration}`;
        }

        // Update progress bar
        function updateProgress() {
            const percent = (audio.currentTime / audio.duration) * 100;
            progressBar.style.width = `${percent}%`;
        }

        // Play/Pause toggle
        playBtn.addEventListener('click', () => {
            if (audio.paused) {
                // Pause all other audio players
                document.querySelectorAll('audio').forEach(a => {
                    if (a !== audio) {
                        a.pause();
                        const otherPlayer = document.querySelector(`[data-audio-id="${a.id}"]`);
                        if (otherPlayer) {
                            const otherIcon = otherPlayer.querySelector('.play-btn i');
                            otherIcon.className = 'fas fa-play';
                        }
                    }
                });

                audio.play();
                playIcon.className = 'fas fa-pause';
            } else {
                audio.pause();
                playIcon.className = 'fas fa-play';
            }
        });

        // Update progress and time as audio plays
        audio.addEventListener('timeupdate', () => {
            updateProgress();
            updateTime();
        });

        // Initialize time display when metadata loads
        audio.addEventListener('loadedmetadata', () => {
            updateTime();
        });

        // Reset when audio ends
        audio.addEventListener('ended', () => {
            playIcon.className = 'fas fa-play';
            progressBar.style.width = '0%';
            audio.currentTime = 0;
            updateTime();
        });

        // Click on progress bar to seek
        progressContainer.addEventListener('click', (e) => {
            const rect = progressContainer.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            audio.currentTime = percent * audio.duration;
        });
    });
});
