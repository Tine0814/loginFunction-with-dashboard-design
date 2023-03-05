let list = document.querySelectorAll('.sidebar_menu li');

function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');

}

list.forEach((item) =>
item.addEventListener('mouseover', activeLink));


let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.sidebar_menu');
let main = document.querySelector('.main');

toggle.onclick = function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}


//clock


const hourEl = document.querySelector(".hour")
const minuteEl = document.querySelector(".minute")
const secondEl = document.querySelector(".second")

function updateClock() {
    const currentDate = new Date();
    setTimeout(updateClock, 1000);
    const hour = currentDate.getHours();
    const minute = currentDate.getMinutes();
    const second = currentDate.getSeconds();
    const hourDeg = (hour / 12) * 360;
    hourEl.style.transform = `rotate(${hourDeg}deg)`;
    const minuteDeg = (minute / 60) * 360;
    minuteEl.style.transform =`rotate(${minuteDeg}deg)`;
    const secondDeg = (second / 60) * 360;
    secondEl.style.transform =`rotate(${secondDeg}deg)`;
}

updateClock();

//setInterval(updateClock, 1000);