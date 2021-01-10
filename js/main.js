'use strict'
{

const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');
  for (let i = 0; i < smoothScrollTrigger.length; i++){
    smoothScrollTrigger[i].addEventListener('click', (e) => {
      e.preventDefault();
      let href = smoothScrollTrigger[i].getAttribute('href');
        let targetElement = document.getElementById(href.replace('#', ''));
      const rect = targetElement.getBoundingClientRect().top;
      const offset = window.pageYOffset;
      const gap = 20;
      const target = rect + offset - gap;
      window.scrollTo({
        top: target,
        behavior: 'smooth',
      });
    });
  }

  const scrollTop = document.querySelector('.js-scroll-top');

  scrollTop.addEventListener('click',()=>{
    window.scrollTo({
      top:0,
      behavior:'smooth'
    });
  },false);

  window.addEventListener('scroll',event=>{
    if(event.currentTarget.pageYOffset > 200) {
      scrollTop.classList.add('show');
    } else {
      scrollTop.classList.remove('show');
    }
  });


}