import { Fancybox } from '@fancyapps/ui/dist/fancybox/';
import '@fancyapps/ui/dist/fancybox/fancybox.css';

Fancybox.bind('[data-fancybox="gallery"]', {
    animated: !window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    dragToClose: true,
    Carousel: { infinite: false },
    Thumbs: { type: 'classic' },
});
