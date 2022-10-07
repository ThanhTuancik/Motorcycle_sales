var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    // grabCursor: 'true', Hiển thị con trỏ chuột thành bàn tay khi trỏ vào.
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true, // Các dấu chấm nhỏ dần về hai đầu
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      660: {
        slidesPerView: 2,
      },
      920: {
        slidesPerView: 3,
      },
      1000: {
        slidesPerView: 4,
      },
    },
  });