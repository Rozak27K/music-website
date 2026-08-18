import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback);
        return;
    }

    callback();
};

ready(() => {
    const navbar = document.querySelector('.site-navbar');
    const backToTop = document.querySelector('.back-to-top');

    const updateScrollState = () => {
        const scrolled = window.scrollY > 24;
        navbar?.classList.toggle('is-scrolled', scrolled);
        backToTop?.classList.toggle('is-visible', window.scrollY > 420);
    };

    updateScrollState();
    window.addEventListener('scroll', updateScrollState, { passive: true });

    backToTop?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    const revealItems = document.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.14 });

        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const filterButtons = document.querySelectorAll('[data-gallery-filters] [data-filter]');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            filterButtons.forEach((item) => item.classList.remove('active'));
            button.classList.add('active');

            galleryItems.forEach((item) => {
                const isVisible = filter === 'all' || item.dataset.category === filter;
                item.closest('[class*="col-"]')?.classList.toggle('d-none', !isVisible);
            });
        });
    });

    const articleSearch = document.querySelector('[data-article-search]');
    const articleItems = document.querySelectorAll('.article-item');
    const emptySearch = document.querySelector('[data-empty-search]');

    articleSearch?.addEventListener('input', () => {
        const keyword = articleSearch.value.trim().toLowerCase();
        let visibleCount = 0;

        articleItems.forEach((item) => {
            const title = item.querySelector('[data-title]')?.dataset.title || item.textContent.toLowerCase();
            const isVisible = title.includes(keyword);
            item.classList.toggle('d-none', !isVisible);
            visibleCount += isVisible ? 1 : 0;
        });

        emptySearch?.classList.toggle('d-none', visibleCount !== 0);
    });
});
