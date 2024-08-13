function showDetails(id) {
    document.getElementById(id).style.display = 'block';
}

function hideDetails(id) {
    document.getElementById(id).style.display = 'none';
}



let currentIndex = 0;
const totalImages = 7;
const visibleImages = 4;
const carouselImages = document.querySelector('.carousel-images');
const images = Array.from(carouselImages.children);

function moveCarousel(direction) {
    if (direction === 1) {
        currentIndex++;
        if (currentIndex >= totalImages) {
            currentIndex = 0;
        }
        const firstImage = images.shift();
        images.push(firstImage);
        carouselImages.appendChild(firstImage);
    } else {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = totalImages - 1;
        }
        const lastImage = images.pop();
        images.unshift(lastImage);
        carouselImages.prepend(lastImage);
    }

    carouselImages.style.transition = 'none';
    carouselImages.style.transform = `translateX(-${currentIndex * (100 / visibleImages)}%)`;
    setTimeout(() => {
        carouselImages.style.transition = 'transform 0.5s ease';
        carouselImages.style.transform = `translateX(0%)`;
    }, 0);
}

window.onload = () => {
    moveCarousel(0);
}

