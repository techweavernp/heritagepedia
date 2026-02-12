document.addEventListener('DOMContentLoaded', () => {
    const mainTitle = document.querySelector('.main-title');
    const subtitle = document.querySelector('.subtitle');
    const separatorLines = document.querySelectorAll('.separator-line');

    // Split text into spans for character animation
    if (mainTitle) {
        // Function to wrap characters in spans
        const wrapText = (text) => {
            return text.split('').map(char => {
                if (char === ' ') return '<span class="space">&nbsp;</span>';
                return `<span class="char">${char}</span>`;
            }).join('');
        };

        // Get original HTML (handling <br>)
        const originalHTML = mainTitle.innerHTML;
        // Split by <br> tag to preserve line break
        const parts = originalHTML.split('<br>');

        // Reconstruct with wrapped characters
        mainTitle.innerHTML = parts
            .map(part => wrapText(part.trim())) // Trim to avoid weird spaces around BR
            .join('<br>');

        // Add staggering animation delay for entrance or continuous wave
        const chars = mainTitle.querySelectorAll('.char');
        chars.forEach((char, index) => {
            // Random or sequential delay for a more organic feel
            char.style.animationDelay = `${index * 0.05}s`;
        });
    }

    // Initial Fade In (Block level)
    // We modify this to be less intrusive since characters handle their own stuff, 
    // but we still want the container to fade in smoothly.
    mainTitle.style.opacity = '0';
    mainTitle.style.transform = 'translateY(20px)';
    mainTitle.style.transition = 'opacity 1s ease-out, transform 1s ease-out';

    if (subtitle) {
        subtitle.style.opacity = '0';
        subtitle.style.transform = 'translateY(20px)';
        subtitle.style.transition = 'opacity 1s ease-out 0.5s, transform 1s ease-out 0.5s';
    }

    separatorLines.forEach(line => {
        line.style.opacity = '0';
        line.style.transform = 'scaleX(0)';
        line.style.transition = 'opacity 0.8s ease-out 0.2s, transform 0.8s ease-out 0.2s';
    });

    // Trigger animations
    setTimeout(() => {
        mainTitle.style.opacity = '1';
        mainTitle.style.transform = 'translateY(0)';
    }, 100);

    setTimeout(() => {
        separatorLines.forEach(line => {
            line.style.opacity = '1';
            line.style.transform = 'scaleX(1)';
        });
    }, 300);

    setTimeout(() => {
        if (subtitle) {
            subtitle.style.opacity = '1';
            subtitle.style.transform = 'translateY(0)';
        }
    }, 600);
});
