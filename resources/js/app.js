import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;
window.Swiper = Swiper;

Alpine.start();
AOS.init({
    duration: 1000,
    once: true,
});
