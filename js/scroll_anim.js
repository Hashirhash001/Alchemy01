

const faders = document.querySelectorAll(".fade_in"); 

const sliders = document.querySelectorAll(".slide_in");

const top_sliders = document.querySelectorAll(".top_sliders");

const appearOptions = {
    threshold: 1,
    rootMargin: "0px 0px 250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add('appear');
            appearOnScroll.unobserve(entry.target);
        }
    });
}, appearOptions);

faders.forEach(fader => {
    appearOnScroll.observe(fader);
})

sliders.forEach(slider => {
    appearOnScroll.observe(slider);
})

top_sliders.forEach(top_slider => {
    appearOnScroll.observe(top_slider);
})