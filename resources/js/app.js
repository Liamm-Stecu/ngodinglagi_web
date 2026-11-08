//

const prefersReducedMotion = () =>
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function initScrollReveal() {
    const nodes = document.querySelectorAll('[data-reveal]');

    if (!nodes.length) {
        return;
    }

    document.querySelectorAll('[data-stagger]').forEach((parent) => {
        let index = 0;

        parent.querySelectorAll('[data-reveal]').forEach((el) => {
            if (el.style.transitionDelay) {
                return;
            }

            el.style.transitionDelay = `${Math.min(index * 50, 200)}ms`;
            index += 1;
        });
    });

    if (prefersReducedMotion() || !('IntersectionObserver' in window)) {
        nodes.forEach((node) => node.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            });
        },
        {
            rootMargin: '0px 0px -8% 0px',
            threshold: 0.12,
        },
    );

    nodes.forEach((node) => observer.observe(node));
}

function initHeaderScroll() {
    const header = document.querySelector('[data-header]');

    if (!header) {
        return;
    }

    const update = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
}

function initStatCounters() {
    const counters = document.querySelectorAll('[data-count-to]');

    if (!counters.length || prefersReducedMotion() || !('IntersectionObserver' in window)) {
        return;
    }

    const animate = (el) => {
        const target = Number(el.getAttribute('data-count-to'));

        if (!Number.isFinite(target)) {
            return;
        }

        const duration = 700;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = String(Math.round(target * eased));

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        el.textContent = '0';
        requestAnimationFrame(tick);
    };

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                animate(entry.target);
                obs.unobserve(entry.target);
            });
        },
        { threshold: 0.4 },
    );

    counters.forEach((el) => observer.observe(el));
}

function initThemeToggle() {
    const root = document.documentElement;
    const buttons = document.querySelectorAll('[data-theme-toggle]');

    if (!buttons.length) {
        return;
    }

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const next = root.classList.contains('dark') ? 'light' : 'dark';
            root.classList.toggle('dark', next === 'dark');

            try {
                localStorage.setItem('theme', next);
            } catch {
                /* storage unavailable — ignore */
            }
        });
    });
}

function initCopyButtons() {
    const buttons = document.querySelectorAll('[data-copy]');

    if (!buttons.length || !navigator.clipboard) {
        return;
    }

    buttons.forEach((button) => {
        button.addEventListener('click', async () => {
            const value = button.getAttribute('data-copy');

            if (!value) {
                return;
            }

            try {
                await navigator.clipboard.writeText(value);
                button.classList.add('is-copied');
                window.setTimeout(() => button.classList.remove('is-copied'), 320);

                const label = button.querySelector('[data-copy-label]');

                if (label) {
                    const original = label.textContent;
                    label.textContent = 'tersalin!';
                    window.setTimeout(() => {
                        label.textContent = original;
                    }, 1600);
                }
            } catch {
                /* clipboard unavailable — ignore */
            }
        });
    });
}

function initAccordions() {
    const items = document.querySelectorAll('[data-accordion-item]');

    if (!items.length) {
        return;
    }

    items.forEach((item) => {
        const trigger = item.querySelector('[data-accordion-trigger]');

        if (!trigger) {
            return;
        }

        trigger.addEventListener('click', () => {
            const isOpen = item.classList.toggle('is-open');
            trigger.setAttribute('aria-expanded', String(isOpen));
        });
    });
}

function initMobileNav() {
    const toggle = document.querySelector('[data-nav-toggle]');
    const panel = document.querySelector('[data-nav-panel]');

    if (!toggle || !panel) {
        return;
    }

    const iconOpen = toggle.querySelector('[data-nav-icon="open"]');
    const iconClose = toggle.querySelector('[data-nav-icon="close"]');

    const setOpen = (open) => {
        panel.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');

        if (iconOpen) {
            iconOpen.classList.toggle('hidden', open);
        }

        if (iconClose) {
            iconClose.classList.toggle('hidden', !open);
        }
    };

    toggle.addEventListener('click', () => {
        setOpen(panel.classList.contains('hidden'));
    });

    panel.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });

    document.addEventListener('click', (event) => {
        if (panel.classList.contains('hidden')) {
            return;
        }

        if (!panel.contains(event.target) && !toggle.contains(event.target)) {
            setOpen(false);
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
    initHeaderScroll();
    initStatCounters();
    initThemeToggle();
    initCopyButtons();
    initAccordions();
    initMobileNav();
});
