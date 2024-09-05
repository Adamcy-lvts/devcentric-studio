import './bootstrap';
import { gsap } from "gsap";
import { TextPlugin } from "gsap/TextPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";  //

gsap.registerPlugin(TextPlugin, ScrollTrigger, ScrollToPlugin);

document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll function using GSAP
    function smoothScroll(target) {
        gsap.to(window, {
            duration: 1,
            scrollTo: {
                y: target,
                offsetY: 70 // Adjust this value based on your fixed header height
            },
            ease: "power3.inOut"
        });
    }

    // Add click event listeners to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            smoothScroll(targetId);
        });
    });



    const headlines = document.querySelectorAll('.headline');
    const headlineContainer = document.querySelector('.headline-container');
    const industryDataElement = document.getElementById('industry-data');
    const descriptionElement = document.getElementById('hero-description');



    if (!headlineContainer || headlines.length === 0) return;  // Exit if elements don't exist


    // Function to get a random direction
    const getRandomDirection = () => Math.random() < 0.5 ? "left" : "right";

    // Set initial positions
    gsap.set(headlines, {
        x: "100%",
        visibility: "hidden"
    });
    gsap.set(headlines[0], {
        x: "0%",
        visibility: "visible"
    });

    // Ensure the container height matches the first headline
    gsap.set(headlineContainer, { height: headlines[0].offsetHeight });

    // Headline animation
    const headlineTl = gsap.timeline({ repeat: -1 });

    headlines.forEach((headline, index) => {
        const nextIndex = (index + 1) % headlines.length;
        const direction = getRandomDirection();
        const currentExit = direction === "left" ? "-100%" : "100%";
        const nextEntry = direction === "left" ? "100%" : "-100%";

        headlineTl
            .to(headline, {
                x: currentExit,
                duration: 1.5,
                ease: "power2.inOut"
            })
            .set(headline, { visibility: "hidden" })
            .set(headlines[nextIndex], { visibility: "visible", x: nextEntry }, "<")
            .to(headlines[nextIndex], {
                x: "0%",
                duration: 1.5,
                ease: "power2.inOut"
            }, "<")
            .to({}, { duration: 3 });  // Pause between transitions
    });
    // if (!descriptionElement || headlines.length === 0) return;  // Exit if elements don't exist

    let industries = [];
    if (industryDataElement && industryDataElement.dataset.industries) {
        industries = JSON.parse(industryDataElement.dataset.industries);
    }

    console.log('Industries:', industries);  // Debug: Log industries

    if (industries.length === 0) {
        console.warn('No industries found');
        return;  // Exit if no industries
    }


    // Create a span for the industry text if it doesn't exist
    let industrySpan = descriptionElement.querySelector('.industry-text');
    if (!industrySpan) {
        const originalText = descriptionElement.textContent;
        const updatedText = originalText.replace('various industries', '<span class="industry-text font-bold text-blue-400">various industries</span>');
        descriptionElement.innerHTML = updatedText;
        industrySpan = descriptionElement.querySelector('.industry-text');
    }

    // Industry text animation
    const industryTl = gsap.timeline({ repeat: -1, delay: 1 });

    industries.forEach((industry, index) => {
        industryTl.to(industrySpan, {
            duration: 1,
            text: {
                value: industry,
                delimiter: ""
            },
            ease: "power2.inOut",
        }).to({}, { duration: 2 });  // Pause between transitions
    });

    // Animate other elements
    gsap.from("p", { opacity: 0, y: 30, duration: 1, ease: "power3.out", delay: 0.7 });
    gsap.from(".flex a", { opacity: 0, y: 50, duration: 1, ease: "power3.out", delay: 0.9 });


    // About Us section animations
    if (document.querySelector('.about-devcentric')) {
        gsap.from(".about-devcentric", {
            opacity: 0,
            y: 30,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".about-devcentric",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }
    if (document.querySelector('.about-title')) {
        gsap.from(".about-title", {
            opacity: 0,
            x: -50,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".about-title",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }

    if (document.querySelector('.about-title')) {
        gsap.from(".about-description", {
            opacity: 0,
            y: 30,
            duration: 1,
            ease: "power3.out",
            delay: 0.3,
            scrollTrigger: {
                trigger: ".about-description",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }
    if (document.querySelector('.about-card')) {
        gsap.from(".about-card", {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out",
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".about-card",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }

    if (document.querySelector('.cta-section')) {
        gsap.from(".cta-section", {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".cta-section",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }
    if (document.querySelector('.cta-button')) {
        gsap.from(".cta-button", {
            scale: 0.8,
            opacity: 0,
            duration: 1,
            ease: "elastic.out(1, 0.5)",
            delay: 0.5,
            scrollTrigger: {
                trigger: ".cta-section",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    }

    const serviceCards = gsap.utils.toArray('.service-card');

    serviceCards.forEach((card, index) => {
        gsap.set(card, {
            autoAlpha: 0,
            y: 50
        });

        ScrollTrigger.create({
            trigger: card,
            start: "top 80%",
            onEnter: () => {
                gsap.to(card, {
                    duration: 0.8,
                    autoAlpha: 1,
                    y: 0,
                    ease: "power3.out",
                    delay: index * 0.2
                });

                gsap.from(card.querySelector('.service-icon'), {
                    scale: 0,
                    duration: 0.6,
                    ease: "back.out(1.7)",
                    delay: index * 0.2 + 0.3
                });

                gsap.from(card.querySelector('.service-title'), {
                    y: 20,
                    autoAlpha: 0,
                    duration: 0.6,
                    ease: "power3.out",
                    delay: index * 0.2 + 0.5
                });

                gsap.from(card.querySelector('.service-links'), {
                    y: 20,
                    autoAlpha: 0,
                    duration: 0.6,
                    ease: "power3.out",
                    delay: index * 0.2 + 0.7
                });
            },
            once: true
        });
    });

    const whyChooseUsSection = document.querySelector('#why-choose-us-section');

    if (whyChooseUsSection) {
        gsap.registerPlugin(ScrollTrigger);

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: whyChooseUsSection,
                start: "top 80%",
                end: "bottom 20%",
                toggleActions: "play none none none"
            }
        });

        tl.from('.why-choose-us-title', {
            y: 50,
            opacity: 0,
            duration: 0.6,
            ease: "power3.out"
        })
            .from('.why-choose-us-description', {
                y: 30,
                opacity: 0,
                duration: 0.6,
                ease: "power3.out"
            }, "-=0.3")
            .from('.why-choose-us-item', {
                x: -30,
                opacity: 0,
                stagger: 0.1,
                duration: 0.4,
                ease: "power2.out"
            }, "-=0.3")
            .from('.why-choose-us-diagram', {
                scale: 0.9,
                opacity: 0,
                duration: 0.6,
                ease: "back.out(1.7)"
            }, "-=0.4");

        // Animate individual diagram elements
        gsap.from('.why-choose-us-diagram > *', {
            y: 20,
            opacity: 0,
            stagger: 0.1,
            duration: 0.4,
            ease: "power2.out",
            scrollTrigger: {
                trigger: '.why-choose-us-diagram',
                start: "top 70%",
                toggleActions: "play none none none"
            }
        });
    }

    const successSection = document.querySelector('#success-stories-section');

    if (!successSection) return;

    // Animate header
    gsap.from('.success-stories-header', {
        opacity: 0,
        y: 50,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: successSection,
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    });

    // Animate each success story
    gsap.utils.toArray('.success-story').forEach((story, index) => {
        const isEven = index % 2 === 0;
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: story,
                start: "top 80%",
                toggleActions: "play none none reverse"
            }
        });

        // Set initial state
        gsap.set(story.querySelector('.success-story-image'), { opacity: 0, x: isEven ? 50 : -50 });
        gsap.set(story.querySelectorAll('.success-story-subtitle, .success-story-title, .success-story-description'), { opacity: 0 });

        // Animate
        tl.to(story.querySelector('.success-story-image'), {
            opacity: 1,
            x: 0,
            duration: 1,
            ease: "power3.out"
        })
            .to(story.querySelector('.success-story-subtitle'), {
                opacity: 1,
                duration: 0.6,
                ease: "power3.out"
            }, "-=0.4")
            .to(story.querySelector('.success-story-title'), {
                opacity: 1,
                duration: 0.6,
                ease: "power3.out"
            }, "-=0.4")
            .to(story.querySelector('.success-story-description'), {
                opacity: 1,
                duration: 0.6,
                ease: "power3.out"
            }, "-=0.4");
    });

    const approachSection = document.querySelector('#approach-section');

    if (approachSection) {
        gsap.registerPlugin(ScrollTrigger);

        // Animate header
        gsap.from('.approach-header', {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: approachSection,
                start: "top 80%",
                end: "top 20%",
                toggleActions: "play none none none"
            }
        });

        // Animate heading
        gsap.from('.approach-content h3', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            ease: "power3.out",
            scrollTrigger: {
                trigger: '.approach-content',
                start: "top 80%",
                end: "bottom 20%",
                toggleActions: "play none none none"
            }
        });

        // Animate description text - now targeting the new div
        gsap.from('.approach-text', {
            opacity: 0,
            y: 20,
            duration: 0.8,
            ease: "power3.out",
            scrollTrigger: {
                trigger: '.approach-content',
                start: "top 70%",
                end: "bottom 20%",
                toggleActions: "play none none none"
            }
        });

        // Animate steps
        gsap.from('.approach-step', {
            opacity: 0,
            x: -30,
            stagger: 0.2,
            duration: 0.6,
            ease: "power3.out",
            scrollTrigger: {
                trigger: '.approach-content',
                start: "top 60%",
                end: "bottom 20%",
                toggleActions: "play none none none"
            }
        });

        // Animate image
        gsap.from('.approach-image', {
            opacity: 0,
            scale: 0.9,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: '.approach-image',
                start: "top 80%",
                end: "bottom 20%",
                toggleActions: "play none none none"
            }
        });
    }
    const industrySection = document.querySelector('#industry-solutions-section');

    if (!industrySection) return;

    // Animate header
    gsap.from('.industry-solutions-header', {
        opacity: 0,
        y: 50,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: industrySection,
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    });

    // Animate solution cards
    gsap.utils.toArray('.industry-solution-card').forEach((card, index) => {
        gsap.from(card, {
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: "power3.out",
            scrollTrigger: {
                trigger: card,
                start: "top 90%",
                toggleActions: "play none none reverse"
            },
            delay: index * 0.1 // Stagger effect
        });

        // Animate icon
        gsap.from(card.querySelector('.industry-solution-icon'), {
            scale: 0,
            duration: 0.6,
            ease: "back.out(1.7)",
            scrollTrigger: {
                trigger: card,
                start: "top 90%",
                toggleActions: "play none none reverse"
            },
            delay: index * 0.1 + 0.3
        });
    });

    // About Us Section Animation
    const aboutUsSection = document.querySelector('#aboutus');
    if (aboutUsSection) {
        const aboutUsTl = gsap.timeline({
            scrollTrigger: {
                trigger: aboutUsSection,
                start: "top 80%",
                toggleActions: "play none none reverse"
            }
        });

        aboutUsTl.from('.about-us-header', {
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: "power3.out"
        }).from('.about-us-content', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            ease: "power3.out"
        }, "-=0.4");

        // Animate list items
        gsap.utils.toArray('#aboutus ul li').forEach((item, index) => {
            gsap.from(item, {
                opacity: 0,
                x: -30,
                duration: 0.5,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: item,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                },
                delay: 0.1 * index
            });
        });
    }

    // Our Mission Section Animation
    const ourMissionSection = document.querySelector('#ourmission');
    if (ourMissionSection) {
        const ourMissionTl = gsap.timeline({
            scrollTrigger: {
                trigger: ourMissionSection,
                start: "top 80%",
                toggleActions: "play none none reverse"
            }
        });

        ourMissionTl.from('.our-mission-header', {
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: "power3.out"
        }).from('.our-mission-content', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            ease: "power3.out"
        }, "-=0.4");

        // Animate list items
        gsap.utils.toArray('#ourmission ul li').forEach((item, index) => {
            gsap.from(item, {
                opacity: 0,
                x: -30,
                duration: 0.5,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: item,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                },
                delay: 0.1 * index
            });
        });
    }

    const contactFormSection = document.querySelector('#contact-form-section');

    if (contactFormSection) {
        const contactFormTl = gsap.timeline({
            scrollTrigger: {
                trigger: contactFormSection,
                start: "top 80%",
                toggleActions: "play none none reverse"
            }
        });

        contactFormTl
            .from('.contact-form-header', {
                opacity: 0,
                y: 30,
                duration: 0.8,
                ease: "power3.out"
            })
            // .from('.contact-form-card', {
            //     opacity: 0,
            //     y: 50,
            //     duration: 0.8,
            //     ease: "power3.out"
            // }, "-=0.4");

        // Animate form elements
        gsap.utils.toArray('.form-element').forEach((element, index) => {
            gsap.from(element, {
                opacity: 0,
                y: 20,
                duration: 0.5,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                },
                delay: 0.1 * index
            });
        });
    }


});

