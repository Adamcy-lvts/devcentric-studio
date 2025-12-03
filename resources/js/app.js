import './bootstrap';
import { gsap } from "gsap";
import { TextPlugin } from "gsap/TextPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(TextPlugin, ScrollTrigger, ScrollToPlugin);

document.addEventListener('DOMContentLoaded', () => {

    // --- Smooth Scroll ---
    function smoothScroll(target) {
        gsap.to(window, {
            duration: 1,
            scrollTo: {
                y: target,
                offsetY: 70
            },
            ease: "power3.inOut"
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                smoothScroll(targetId);
            }
        });
    });

    // --- Hero Section Animations ---
    const initHero = () => {
        const heroSection = document.querySelector('.hero-section');
        if (!heroSection) return;

        const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

        // Initial Entrance
        tl.to('.hero-badge', { y: 0, opacity: 1, duration: 0.8, delay: 0.2 })
            .to('.hero-description', { y: 0, opacity: 1, duration: 0.8 }, "-=0.4")
            .to('.hero-cta-group', { y: 0, opacity: 1, duration: 0.8 }, "-=0.4")
            .to('.hero-scroll-indicator', { opacity: 0.6, duration: 1 }, "-=0.2");

        // Headline Slider Logic
        const slides = document.querySelectorAll('.hero-headline-slide');
        if (slides.length > 1) {
            let currentSlide = 0;
            const slideDuration = 1.2;
            const stayDuration = 4; // Time to stay on each slide

            // Initialize first slide
            gsap.set(slides, { autoAlpha: 0 });
            gsap.set(slides[0], { autoAlpha: 1 });
            gsap.from(slides[0].querySelectorAll('span, p'), {
                y: 30,
                opacity: 0,
                duration: 1,
                stagger: 0.1,
                ease: "power3.out"
            });

            // Cycle function
            const nextSlide = () => {
                const next = (currentSlide + 1) % slides.length;

                const slideTl = gsap.timeline();

                // Animate out current
                slideTl.to(slides[currentSlide].querySelectorAll('span, p'), {
                    y: -20,
                    opacity: 0,
                    duration: 0.8,
                    stagger: 0.05,
                    ease: "power3.in"
                })
                    .set(slides[currentSlide], { autoAlpha: 0 }) // Hide container after elements leave

                    // Animate in next
                    .set(slides[next], { autoAlpha: 1 }) // Show container
                    .fromTo(slides[next].querySelectorAll('span, p'),
                        { y: 30, opacity: 0 },
                        { y: 0, opacity: 1, duration: 1, stagger: 0.1, ease: "power3.out" },
                        "-=0.2"
                    );

                currentSlide = next;
            };

            // Start loop
            setInterval(nextSlide, (slideDuration + stayDuration) * 1000);
        } else if (slides.length === 1) {
            gsap.set(slides[0], { autoAlpha: 1 });
            gsap.from(slides[0].querySelectorAll('span, p'), {
                y: 30,
                opacity: 0,
                duration: 1,
                stagger: 0.1,
                ease: "power3.out"
            });
        }
    };

    // --- Services Section Animations ---
    const initServices = () => {
        const servicesSection = document.querySelector('#services-section');
        if (!servicesSection) return;

        // Animate Header
        gsap.from('#services-section h2, #services-section p, #services-section .inline-flex', {
            scrollTrigger: {
                trigger: '#services-section',
                start: "top 80%",
                toggleActions: "play none none reverse"
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.1,
            ease: "power3.out"
        });

        // Animate Cards
        const cards = document.querySelectorAll('.service-card');

        // Set initial state
        gsap.set(cards, { autoAlpha: 0, y: 50 });

        ScrollTrigger.batch(cards, {
            start: "top 85%",
            onEnter: batch => gsap.to(batch, {
                autoAlpha: 1,
                y: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power3.out",
                overwrite: true
            }),
            onLeaveBack: batch => gsap.to(batch, {
                autoAlpha: 0,
                y: 50,
                stagger: 0.1,
                duration: 0.5,
                overwrite: true
            })
        });
    };

    // --- Other Sections (Legacy Support) ---
    const initLegacySections = () => {
        // Why Choose Us
        const whyChooseUs = document.querySelector('#why-choose-us-section');
        if (whyChooseUs) {
            gsap.from('.why-choose-us-title, .why-choose-us-description', {
                scrollTrigger: { trigger: whyChooseUs, start: "top 80%" },
                y: 30, opacity: 0, duration: 0.8, stagger: 0.2
            });
            gsap.from('.why-choose-us-item', {
                scrollTrigger: { trigger: whyChooseUs, start: "top 70%" },
                x: -20, opacity: 0, duration: 0.5, stagger: 0.1
            });
            gsap.from('.why-choose-us-diagram', {
                scrollTrigger: { trigger: whyChooseUs, start: "top 70%" },
                scale: 0.9, opacity: 0, duration: 0.8, ease: "back.out(1.7)"
            });
        }

        // Success Stories
        const successSection = document.querySelector('#success-stories-section');
        if (successSection) {
            gsap.utils.toArray('.success-story').forEach((story, i) => {
                gsap.from(story.children, {
                    scrollTrigger: { trigger: story, start: "top 85%" },
                    y: 30, opacity: 0, duration: 0.8, stagger: 0.2
                });
            });
        }

        // Approach
        const approachSection = document.querySelector('#approach-section');
        if (approachSection) {
            gsap.from('.approach-step', {
                scrollTrigger: { trigger: approachSection, start: "top 60%" },
                x: -30, opacity: 0, duration: 0.6, stagger: 0.15
            });
        }

        // Industry
        const industrySection = document.querySelector('#industry-solutions-section');
        if (industrySection) {
            gsap.utils.toArray('.industry-solution-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: { trigger: card, start: "top 90%" },
                    y: 30, opacity: 0, duration: 0.6, delay: i * 0.1
                });
            });
        }
    };

    // Initialize All
    initHero();
    initServices();
    initLegacySections();
});
