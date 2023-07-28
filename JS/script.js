let menu = document.querySelector('#menu-bars');

let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');

}



window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

}

document.querySelector('#search-icon').onclick = () => {
    document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () => {
    document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    loop: true,
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    loop: true,

    breakpoints: {
        0: {
            slidesPerView: 1,
        },

        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        }

    }
});

// function loader() {
//     document.querySelector('.loader-container').classList.add('fade-out');

// }

// function fadeOut() {
//     setInterval(loader, 3000);
// }

// window.onload = fadeOut;


const sidebar = document.querySelector('aside');
const showsidebar = document.querySelector('#show_side');
const hidesidebar = document.querySelector('#hide_side');

const show = () =>{
    sidebar.style.left='0';
    hidesidebar.style.display='inline-block';
    showsidebar.style.display='none';
};

const hide=()=>{
    sidebar.style.left='-100%';
    hidesidebar.style.display='none';
    showsidebar.style.display='inline-block';
};

showsidebar.addEventListener("click", show);
hidesidebar.addEventListener('click', hide);


function clickCheckBox(chcekboxclick){
    const clickcheck = document.querySelectorAll('.mycheckbox');

    clickcheck.forEach(item=>{
        if(item!=chcekboxclick){
            item.disabled = chcekboxclick.checked;
        }
    });
}





const currentUrl = window.location.href;
const navLinks = document.querySelectorAll('nav a');

for(const links of navLinks){
    if(links.href==currentUrl){
        links.classList.add('active');
    }
}


document.getElementById('search-form').addEventListener('submit', function(event){
    event.preventDefault();
    document.getElementById('search-form').reset();
});

