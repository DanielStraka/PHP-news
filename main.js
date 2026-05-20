// Header shadow on scroll
const header = document.querySelector('header');
if (header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 8);
    }, { passive: true });
}

// Fade-in + slide-up for article cards
const articles = document.querySelectorAll('.article');
if (articles.length > 0) {
    const articleObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
                // After fade-in finishes, remove inline transition so CSS hover kicks in
                el.addEventListener('transitionend', function cleanup() {
                    el.style.transition = '';
                    el.removeEventListener('transitionend', cleanup);
                });
                articleObserver.unobserve(el);
            }
        });
    }, { threshold: 0.08 });

    articles.forEach((article, i) => {
        article.style.opacity = '0';
        article.style.transform = 'translateY(22px)';
        article.style.transition = `opacity 0.45s ease ${i * 0.1}s, transform 0.45s ease ${i * 0.1}s`;
        articleObserver.observe(article);
    });
}

// Staggered fade-in for CategoryAuthor chips
const chips = document.querySelectorAll('.CategoryAuthor');
if (chips.length > 0) {
    const chipObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0) scale(1)';
                chipObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    chips.forEach((chip, i) => {
        chip.style.opacity = '0';
        chip.style.transform = 'translateY(14px) scale(0.95)';
        chip.style.transition = `opacity 0.38s ease ${i * 0.07}s, transform 0.38s ease ${i * 0.07}s, box-shadow 0.22s ease`;
        chipObserver.observe(chip);
    });
}

// Ripple effect on buttons
document.querySelectorAll('button').forEach((btn) => {
    btn.addEventListener('click', function (e) {
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const ripple = document.createElement('span');
        ripple.style.cssText = [
            'position:absolute',
            `width:${size}px`,
            `height:${size}px`,
            `left:${e.clientX - rect.left - size / 2}px`,
            `top:${e.clientY - rect.top - size / 2}px`,
            'background:rgba(255,255,255,0.35)',
            'border-radius:50%',
            'transform:scale(0)',
            'animation:ripple 0.55s ease-out forwards',
            'pointer-events:none',
        ].join(';');
        this.appendChild(ripple);
        ripple.addEventListener('animationend', () => ripple.remove());
    });
});

// Table row highlight on click (administration)
document.querySelectorAll('tr').forEach((row) => {
    row.addEventListener('click', function () {
        document.querySelectorAll('tr.selected').forEach((r) => r.classList.remove('selected'));
        this.classList.add('selected');
    });
});
