const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = document.querySelectorAll('.carousel-slide img');

const prevBtn = document.querySelector('#prev_btn');
const nextBtn = document.querySelector('#next_btn');

let counter = 1;    //because 1st image, not 0
const size = carouselImages[0].clientWidth;     //gets img width

carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';  //starts at 1st picture, not duplicate

//Button listeners

nextBtn.addEventListener('click', function(){
    if (counter >= carouselImages.length - 1) return; //this line fix bug when user is clicking really fast and counter is not changed its value yet because it happens after transition is done
    carouselSlide.style.transition = "transform 0.6s ease-in-out";  //transition eff with slow start and end
    counter++;
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';  //moves 1 pic forward
});

prevBtn.addEventListener('click', function(){
    if (counter <= 0) return;   //this line fix bug when user is clicking really fast and counter is not changed its value yet because it happens after transition is done
    carouselSlide.style.transition = "transform 0.6s ease-in-out";  //transition eff with slow start and end
    counter--;
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';  //moves 1 pic back
});

carouselSlide.addEventListener('transitionend', function(){     //if you scroll to prev img, but there are no prev images, then this without transition jumps to last img, so it is possible to press prev continiously
    if (carouselImages[counter].id === 'last_clone') {
        carouselSlide.style.transition = 'none';
        counter = carouselImages.length - 2;    // -2 because of first clone
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
    if (carouselImages[counter].id === 'first_clone') {      //same, but for next button
        carouselSlide.style.transition = 'none';
        counter = carouselImages.length - counter;  //jumps to 1st image
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
});