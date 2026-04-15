var swiper = new Swiper(".home-slider", {
  effect: "flip",
  grabCursor: true,
  loop: true,
  pagination: {
    clickable: true,
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 3000, // Thời gian chờ giữa các trang (đơn vị là mili giây)
    disableOnInteraction: false, // Tắt tự động chuyển trang khi người dùng tương tác
  },
});

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active'); 
    navbar.classList.remove('active');
} 

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
     navbar.classList.toggle('active'); 
     profile.classList.remove('active');

 }

window.onscroll = ()  =>{
    navbar.classList.remove('active');
    profile.classList.remove('active');
}



document.querySelectorAll('input[type="number"]').forEach(input =>{
    input.oninput = () =>{
        if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);  
    }
})

const text1_options = [
    "GUU cung cấp đủ loại nhạc cụ cho mọi đam mê.",
    "Sản phẩm chất lượng, độ bền vượt trội, đảm bảo sự hài lòng.",
    "Đội ngũ hỗ trợ 24/7 - Luôn lắng nghe và phục vụ bạn.",
    "Mua sắm thông minh với những ưu đãi đặc biệt chỉ có tại GUU."
  ];
  const text2_options = [
    "Sự Đa Dạng",
    "Chất Lượng Đỉnh Cao",
    "Dịch Vụ Chăm Sóc",
    "Ưu Đãi Hấp Dẫn"
  ];
  const color_options = ["#FFFF66", "#6CE5B1", "#FE9968", "#7FE0EB"];
  const image_options = [
    "../img/home1.jpg",
    "../img/home4.jpg",
    "../img/home3.jpg",
    "../img/home2.png"
  ];
  var i = 0;
  const currentOptionText1 = document.getElementById("current-option-text1");
  const currentOptionText2 = document.getElementById("current-option-text2");
  const currentOptionImage = document.getElementById("image");
  const carousel = document.getElementById("carousel-wrapper");
  const mainMenu = document.getElementById("menu1");
  const optionPrevious = document.getElementById("previous-option");
  const optionNext = document.getElementById("next-option");
  
  currentOptionText1.innerText = text1_options[i];
  currentOptionText2.innerText = text2_options[i];
  currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
  mainMenu.style.background = color_options[i];
  
  optionNext.onclick = function () {
    i = i + 1;
    i = i % text1_options.length;
    currentOptionText1.dataset.nextText = text1_options[i];
  
    currentOptionText2.dataset.nextText = text2_options[i];
  
    mainMenu.style.background = color_options[i];
    carousel.classList.add("anim-next");
    
    setTimeout(() => {
      currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
    }, 455);
    
    setTimeout(() => {
      currentOptionText1.innerText = text1_options[i];
      currentOptionText2.innerText = text2_options[i];
      carousel.classList.remove("anim-next");
    }, 650);
  };
  
  optionPrevious.onclick = function () {
    if (i === 0) {
      i = text1_options.length;
    }
    i = i - 1;
    currentOptionText1.dataset.previousText = text1_options[i];
  
    currentOptionText2.dataset.previousText = text2_options[i];
  
    mainMenu.style.background = color_options[i];
    carousel.classList.add("anim-previous");
  
    setTimeout(() => {
      currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
    }, 455);
    
    setTimeout(() => {
      currentOptionText1.innerText = text1_options[i];
      currentOptionText2.innerText = text2_options[i];
      carousel.classList.remove("anim-previous");
    }, 650);
  };

  function showInfo(element) {
    var productInfo = element.querySelector('.product-info');
    productInfo.style.opacity = '1';
    productInfo.style.transform = 'translateY(0)';
}

function hideInfo(element) {
    var productInfo = element.querySelector('.product-info');
    productInfo.style.opacity = '0';
    productInfo.style.transform = 'translateY(-100%)';
}



