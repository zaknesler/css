import Prism from './vendor/prism';

Prism.highlightAll();

setTimeout(() => {
    document.querySelectorAll('*').forEach((element) => {
        try {
            if (! element.className) {
                return;
            }

            element.className = element.className.toString().replace(/\s\s+/g, ' ').trim();
        } catch (e) {}
    });
}, 1000);
