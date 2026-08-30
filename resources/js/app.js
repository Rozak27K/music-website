import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.fade-up');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.16,
                rootMargin: '0px 0px -40px',
            }
        );

        revealElements.forEach((element) => observer.observe(element));
    } else {
        revealElements.forEach((element) => element.classList.add('show'));
    }

    const mobileToggle = document.querySelector('[data-mobile-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const accountToggle = document.querySelector('[data-account-toggle]');
    const accountMenu = document.querySelector('[data-account-menu]');

    const closeMobileMenu = () => {
        if (!mobileToggle || !mobileMenu) {
            return;
        }

        mobileMenu.classList.add('hidden');
        mobileToggle.setAttribute('aria-expanded', 'false');
    };

    const closeAccountMenu = () => {
        if (!accountToggle || !accountMenu) {
            return;
        }

        accountMenu.classList.add('hidden');
        accountToggle.setAttribute('aria-expanded', 'false');
    };

    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', (event) => {
            event.stopPropagation();

            const isOpen = !mobileMenu.classList.contains('hidden');

            mobileMenu.classList.toggle('hidden', isOpen);
            mobileToggle.setAttribute('aria-expanded', String(!isOpen));
            closeAccountMenu();
        });
    }

    if (accountToggle && accountMenu) {
        accountToggle.addEventListener('click', (event) => {
            event.stopPropagation();

            const isOpen = !accountMenu.classList.contains('hidden');

            accountMenu.classList.toggle('hidden', isOpen);
            accountToggle.setAttribute('aria-expanded', String(!isOpen));
            closeMobileMenu();
        });

        accountMenu.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    }

    document.addEventListener('click', closeAccountMenu);

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        closeAccountMenu();
        closeMobileMenu();
    });

    const articleSearch = document.querySelector('[data-article-search]');
    const articleItems = document.querySelectorAll('[data-article-item]');
    const emptySearch = document.querySelector('[data-empty-search]');

    if (articleSearch && articleItems.length) {
        articleSearch.addEventListener('input', () => {
            const keyword = articleSearch.value.trim().toLowerCase();
            let visibleCount = 0;

            articleItems.forEach((item) => {
                const isVisible = item.dataset.title.includes(keyword);

                item.classList.toggle('hidden', !isVisible);

                if (isVisible) {
                    visibleCount += 1;
                }
            });

            if (emptySearch) {
                emptySearch.classList.toggle('hidden', visibleCount > 0);
            }
        });
    }

    const galleryFilters = document.querySelector('[data-gallery-filters]');
    const galleryItems = document.querySelectorAll('[data-gallery-item]');

    if (galleryFilters && galleryItems.length) {
        galleryFilters.addEventListener('click', (event) => {
            const button = event.target.closest('[data-filter]');

            if (!button) {
                return;
            }

            const filter = button.dataset.filter;

            galleryFilters.querySelectorAll('[data-filter]').forEach((filterButton) => {
                const isActive = filterButton === button;

                filterButton.classList.toggle('bg-[#202427]', isActive);
                filterButton.classList.toggle('text-white', isActive);
                filterButton.classList.toggle('border', !isActive);
                filterButton.classList.toggle('border-slate-300', !isActive);
                filterButton.classList.toggle('bg-white', !isActive);
                filterButton.classList.toggle('text-slate-700', !isActive);
            });

            galleryItems.forEach((item) => {
                const isVisible = filter === 'all' || item.dataset.category === filter;

                item.classList.toggle('hidden', !isVisible);
            });
        });
    }

    document.querySelectorAll('[data-gallery-card]').forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - 0.5;
            const y = (event.clientY - rect.top) / rect.height - 0.5;

            card.style.transform = `translateY(-4px) rotateX(${y * -3}deg) rotateY(${x * 3}deg)`;
        });

        card.addEventListener('pointerleave', () => {
            card.style.transform = '';
        });
    });

    const musicLogo = document.querySelector('[data-music-logo]');

    if (musicLogo && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const rings = musicLogo.querySelectorAll('[data-logo-ring]');
        const core = musicLogo.querySelector('[data-logo-core]');
        const bars = musicLogo.querySelectorAll('[data-logo-bars] span');
        const notesContainer = musicLogo.querySelector('[data-logo-notes]');
        const notes = ['♪', '♫', '♬'];
        let pointerX = 0;
        let pointerY = 0;
        let noteTimer = 0;

        const makeNote = () => {
            if (!notesContainer) {
                return;
            }

            const note = document.createElement('span');
            note.className = 'music-logo-note';
            note.textContent = notes[Math.floor(Math.random() * notes.length)];
            note.dataset.life = '0';
            note.dataset.x = String(90 + Math.random() * 220);
            note.dataset.y = String(210 + Math.random() * 60);
            note.dataset.drift = String(-20 + Math.random() * 40);

            notesContainer.appendChild(note);
        };

        musicLogo.addEventListener('pointermove', (event) => {
            const rect = musicLogo.getBoundingClientRect();

            pointerX = ((event.clientX - rect.left) / rect.width - 0.5) * 14;
            pointerY = ((event.clientY - rect.top) / rect.height - 0.5) * 14;
        });

        musicLogo.addEventListener('pointerleave', () => {
            pointerX = 0;
            pointerY = 0;
        });

        const animateLogo = (time) => {
            const seconds = time / 1000;

            rings.forEach((ring, index) => {
                const direction = index % 2 === 0 ? 1 : -1;
                ring.style.transform = `rotate(${seconds * 16 * direction}deg) scale(${1 + Math.sin(seconds + index) * 0.025})`;
            });

            if (core) {
                core.style.transform = `translate(${pointerX}px, ${pointerY + Math.sin(seconds * 1.8) * 5}px)`;
            }

            bars.forEach((bar, index) => {
                const height = 18 + Math.abs(Math.sin(seconds * 2.5 + index * 0.7)) * 34;
                bar.style.height = `${height}px`;
            });

            noteTimer += 1;

            if (noteTimer % 70 === 0) {
                makeNote();
            }

            notesContainer?.querySelectorAll('.music-logo-note').forEach((note) => {
                const life = Number(note.dataset.life || 0) + 0.012;
                const x = Number(note.dataset.x || 0);
                const y = Number(note.dataset.y || 0);
                const drift = Number(note.dataset.drift || 0);

                note.dataset.life = String(life);
                note.style.opacity = String(Math.max(0, 1 - life));
                note.style.transform = `translate(${x + drift * life}px, ${y - life * 170}px) rotate(${life * 18}deg)`;

                if (life >= 1) {
                    note.remove();
                }
            });

            requestAnimationFrame(animateLogo);
        };

        makeNote();
        requestAnimationFrame(animateLogo);
    }
});
