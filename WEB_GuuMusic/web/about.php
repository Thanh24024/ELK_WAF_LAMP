<?php
    include './components/connect.php';

    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id='';
    };

    include './components/add_cart.php';                                                                   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu</title>
    <link rel="icon" href="./img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
        var timeOut = 2e3,
            slideIndex = 0,
            autoOn = !0;

        function autoSlides() {
            timeOut -= 20, 1 == autoOn && timeOut < 0 && showSlides(), setTimeout(autoSlides, 20)
        }

        function prevSlide() {
            timeOut = 2e3;
            var e = document.getElementsByClassName("mySlides"),
                s = document.getElementsByClassName("dot");
            for (i = 0; i < e.length; i++) e[i].style.display = "none", s[i].className = s[i].className.replace(" active", "");
            --slideIndex > e.length && (slideIndex = 1), 0 == slideIndex && (slideIndex = 3), e[slideIndex - 1].style.display = "block", s[slideIndex - 1].className += " active"
        }

        function showSlides() {
            timeOut = 2e3;
            var e = document.getElementsByClassName("mySlides"),
                s = document.getElementsByClassName("dot");
            for (i = 0; i < e.length; i++) e[i].style.display = "none", s[i].className = s[i].className.replace(" active", "");
            ++slideIndex > e.length && (slideIndex = 1), e[slideIndex - 1].style.display = "block", s[slideIndex - 1].className += " active"
        }
        autoSlides();
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", serif;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
           
        }

        .abc .btn {
            font-size: 30px;
            color: #FFFF00;
            border: 2px solid #FFFF00;
            background: transparent;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            position: absolute;
            top: 55%; 
            left: 20%; 
            transform: translate(-50%, -50%); /* Để nút ở giữa video hoàn toàn */
            transition: 0.4s all ease-in-out 0s;
            border-radius: 70%; /* Để làm tròn nút thành hình elip */
            padding: 40px 50px;
        }

        .abc .btn:hover {
            color: black;
            border-radius: 50%;
        }

        .abc .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: 0.4s all ease-in-out 0s;
            border-radius: 50%;
        }

        .abc .btn:hover::before {
            background-color: #FFFF00;
        }

        video {
            position: relative; /* Đảm bảo video nằm phía dưới nút */
        }
        .about {
            grid-template-columns: repeat(12, 1fr);
            grid-column: 1/13;
            padding-top: 105px;
            padding-bottom: 100px;
        }

        .about__box {
            display: flex;
            justify-content: space-around;
            margin-left: 20px;
        }

        .about__content {
            width: 43%;
        }
        .about__img img {
            max-width: 100%;
            max-height: 100%;
        }

        .about__title {
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
            animation: titleAnimation 2s infinite alternate;
        }
        @keyframes titleAnimation {
            0% {
                transform: scale(1);
                color: #CCCC00;
            }
            100% {
                transform: scale(1.1);
                color: #66FF33;
            }
        }

        .about__text {
            margin-right: 100px;
            margin-bottom: 0;
            font-weight: 600;
            color: #929191;
            margin-top: 20px;
            text-align: justify;
            font-size: 20px;
        }
        .mySlides {
            transition: opacity 1s ease-in-out;
            }

        .mySlides.visible {
        opacity: 1;
        }
        .mySlides img {vertical-align:middle;width:100%}
        .wrap-dot{text-align:center;margin-top:10px}
        .slideshow-container{max-width:1000px;position:relative;margin:auto}
        .slideshow-container .prev,.slideshow-container .next{cursor:pointer;position:absolute;top:50%;padding:7px 15px;margin:-22px 5px 0 5px;color:white;font-weight:bold;font-size:18px;transition:0.6s ease;border-radius:50%;user-select:none}
        .slideshow-container .next{right:0}
        .slideshow-container .prev:hover,.slideshow-container .next:hover{background-color:rgba(0,0,0,0.8)}
        .slideshow-container .text{color:#f2f2f2;font-size:15px;padding:8px 12px;position:absolute;bottom:8px;width:100%;text-align:center}
        .wrap-dot .dot{cursor:pointer;height:15px;width:15px;margin:0 2px;background-color:#bbb;border-radius:50%;display:inline-block;transition:background-color 0.6s ease}
        .wrap-dot .dot.active{background-color:#f89000;width:30px;border-radius:20px}
        .fade{-webkit-animation-name:fade;-webkit-animation-duration:1.5s;animation-name:fade;animation-duration:1.5s}
        @-webkit-keyframes fade{from{opacity:.4}to{opacity:1}}@keyframes fade{from{opacity:.4}to{opacity:1}}
        @media only screen and (max-width:300px){.slideshow-container .prev,.slideshow-container .next,.slideshow-container .text{font-size:11px}}
        
        .contact__info {
            margin-top: 100px;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-column: 1/13;
            padding-bottom: 50px;
            }

        .contact__info_box {
            grid-column: 3/11;
        }
        .contact__info_box h2 {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            color: #2d2c2c;
            text-transform: uppercase;
        }

        .contact__info_box h3 {
            text-align: center;
            font-weight: ;
        }
        .contact__map {
          margin-bottom: 100px;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-column: 1/13;
        }
        .contact__map iframe {
            grid-column: 1/13;
            height: 700px;
        }
        .main_intro h2 {
        text-align: center;
        color: #000000;
        font-size: 40px;
        }
        .main_intro p {
        text-align: center;
        font-size: 24px;
        font-style: italic;
        color: #929191;
        line-height: 1.336;
        margin-bottom: 0;
        }

        .main_intro__items {
        margin-top: 6rem;
        display: flex;
        justify-content: space-evenly;
        }
        .intro_text {
        text-align: center;
        top: 40%;
        }
        .intro_text h1 {
        color: #FFffff;
        font-size: 60px;
        font-weight: 700;
        letter-spacing: -0.05rem;
        }
        .rating_4 i:first-child {
        color: #ffeb8d;
        }

        .rating_4 i:nth-child(2) {
        color: #fed46b;
        }

        .rating_4 i:nth-child(3) {
        color: #fbb53d;
        }

        .rating_4 i:nth-child(4) {
        color: #fa9e1b;
        }
        .main_cta__box {
        padding-top: 50px;
        }

        .cta_item {
        text-align: center;
        background-color: #FFFFFF;
        padding: 45px;
        }

        .cta_item__title {
        font-size: 30px;
        font-weight: 700;
        color: #2d2c2c;
        text-transform: uppercase;
        }

        .cta_item__text {
        font-weight: 600;
        line-height: 2.29;
        margin-top: 14px;
        margin-bottom: 0;
        }

/* DEFAULT STYLE */
/* :root {
  font-size: 16px;
  --card-img-height: 200px;
} */
.card-container {
  width: 100%;
  height: auto;
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  align-items: center;
  transition: all 200ms ease-in-out;
  --card-img-height: 200px;
  margin-top: 30px;
  border-radius: 20px;
}

.card {
  font-family: ;
  height: 370px;
  align-self: flex-start;
  position: relative;
  width: 325px;
  min-width: 275px;
  margin: 1.25rem 0.75rem;
  background: white;
  transition: all 300ms ease-in-out;

  .card-img {
    height: 150px;
    visibility: hidden;
    width: 100%;
    height: var(--card-img-height);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    height: var(--card-img-height);
  }

  .card-img-hovered {
    --card-img-hovered-overlay: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0),
      rgba(0, 0, 0, 0)
    );
    transition: all 350ms ease-in-out;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    width: 100%;
    position: absolute;
    height: var(--card-img-height);
    top: 0;
  }

  .card-info {
    position: relative;
    padding: 0.75rem 1.25rem;
    transition: all 200ms ease-in-out;

    .card-about {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 0;
      transition: all 200ms ease-in-out;

      .card-tag {
        width: 60px;
        max-width: 100px;
        padding: 0.2rem 0.5rem;
        font-size: 12px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: #505f79;
        color: #fff;

        &.tag-news {
          background: #36b37e;
        }

        &.tag-deals {
          background: #ffab00;
        }

        &.tag-politics {
          width: 111px;
          background: #ff5630;
          text-decoration: none;
          
        }
      }
    }

    .card-title {
      font-family: 'Roboto', sans-serif;
      font-weight: bolder;
      z-index: 10;
      font-size: 1.5rem;
      padding-bottom: 0.75rem;
      transition: all 350ms ease-in-out;
    }

    .card-creator {
      height: 20px;
      padding-bottom: 0.75rem;
      transition: all 250ms ease-in-out;
    }
  }

  &:hover {
    cursor: pointer;
    box-shadow: 0px 15px 35px rgba(227, 252, 239, 0.1),
      0px 5px 15px rgba(0, 0, 0, 0.07);
    transform: scale(1.025);

    .card-img-hovered {
      --card-img-hovered-overlay: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0),
        rgba(0, 0, 0, 0.65)
      );
      height: 100%;
    }

    .card-about,
    .card-creator {
      opacity: 0;
    }

    .card-info {
      background-color: transparent;
    }

    .card-title {
      font-family: 'Roboto', sans-serif;
      color: #ebecf0;
      // margin-bottom: -40px;
      transform: translate(0,40px);
    }
  }
}

// CARD IMAGES
.card-1 {
  .card-img,
  .card-img-hovered {
    background-image: var(--card-img-hovered-overlay),
      url(./img/intro_1.jpg);
  }
}

.card-2 {
  .card-img,
  .card-img-hovered {
    background-image: var(--card-img-hovered-overlay),
      url(./img/aboutpiano.jpg);
  }
}

.card-3 {
  .card-img,
  .card-img-hovered {
    background-image: var(--card-img-hovered-overlay),
      url(./img/aboutguitar.jpg);
  }
}

.card-4 {
  .card-img,
  .card-img-hovered {
    background-image: var(--card-img-hovered-overlay),
      url(./img/aboutsaxophone.jpg);
  }
}
.card-5 {
  .card-img,
  .card-img-hovered {
    background-image: var(--card-img-hovered-overlay),
      url(./img/aboutdrum.jpg);
  }
}

/* mưới */
article {
  --img-scale: 1.001;
  --title-color: black;
  --link-icon-translate: -20px;
  --link-icon-opacity: 0;
  position: relative;
  border-radius: 16px;
  box-shadow: none;
  background: #fff;
  transform-origin: center;
  transition: all 0.4s ease-in-out;
  overflow: hidden;
}

article a::after {
  position: absolute;
  inset-block: 0;
  inset-inline: 0;
  cursor: pointer;
  content: "";
}

article h2 {
  margin: 0 0 18px 0;
  font-family: "Bebas Neue", cursive;
  font-size: 3rem;
  letter-spacing: 0.06em;
  color: var(--title-color);
  transition: color 0.3s ease-out;
}

figure {
  margin: 0;
  padding: 0;
  aspect-ratio: 16 / 9;
  overflow: hidden;
}

article img {
  max-width: 100%;
  transform-origin: center;
  transform: scale(var(--img-scale));
  transition: transform 0.4s ease-in-out;
}

.article-body {
  padding: 24px;
}

article a {
  display: inline-flex;
  align-items: center;
  text-decoration: none;
  color: #28666e;
}

article a:focus {
  outline: 1px dotted #28666e;
}

article a .icon {
  min-width: 24px;
  width: 24px;
  height: 24px;
  margin-left: 5px;
  transform: translateX(var(--link-icon-translate));
  opacity: var(--link-icon-opacity);
  transition: all 0.3s;
}

/* using the has() relational pseudo selector to update our custom properties */
article:has(:hover, :focus) {
  --img-scale: 1.1;
  --title-color: #28666e;
  --link-icon-translate: 0;
  --link-icon-opacity: 1;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}


.articles {
  background-color: #ffd700;
  display: grid;
  max-width: 1200px;
  margin-inline: auto;
  padding-inline: 24px;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 24px;
}

@media screen and (max-width: 960px) {
  article {
    container: card/inline-size;
  }
  .article-body p {
    font-size: 2rem;
    display: none;
  }
}

@container card (min-width: 380px) {
  .article-wrapper {
    background-color: #CCCC00;
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 16px;
  }
  .article-body {
    padding-left: 0;
  }
  figure {
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  figure img {
    height: 100%;
    aspect-ratio: 1;
    object-fit: cover;
  }
  .article-body p {
    font-size: 2rem !important; /* Thêm !important để đảm bảo ưu tiên cao nhất */
  }
}

.sr-only:not(:focus):not(:active) {
  clip: rect(0 0 0 0); 
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap; 
  width: 1px;
}
.hh1 {
  perspective: 800px;
  text-align: center;
  margin-bottom: 30px;
}

.hh1 h1 {
  font-family: 'Arial', sans-serif;
  font-size: 7.5em;
  font-weight: bold;
  color: #333;
  margin: 0;
  padding: 10px;
  background-color: #ffd700;
  border-radius: 10px;
  display: inline-block;
  transform: rotateY(15deg) translateZ(30px);
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4); 
}

.hh1 h1:hover {
  transform: rotateY(0deg) translateZ(0);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4);
}

.sale-h1 {
  perspective: 800px;
  text-align: center;
  margin-bottom: 30px;
}

.sale-h1 h1 {
  font-family: 'Arial', sans-serif;
  font-size: 7.5em;
  font-weight: bold;
  color: #fff; /* Màu chữ */
  margin-top: 100px;
  padding: 10px;
  background-color: #e74c3c; /* Màu nền */
  border-radius: 50%; /* Để tạo hình tròn */
  display: inline-block;
  overflow: hidden; /* Để ẩn phần nội dung vượt ra khỏi hình tròn */
  transform: rotateY(15deg) translateZ(30px);
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4); 
  animation: pulse 2s infinite;
}
.sale-h1 h1:hover {
  transform: rotateY(0deg) translateZ(0);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4);
}
@keyframes pulse {
  0% {
    transform: scale(1);
    background-color: #e74c3c;
    box-shadow: 0 0 20px rgba(231, 76, 60, 0.8);  
  }
  50% {
    transform: scale(1.1);
    box-shadow: 0 0 40px rgba(243, 156, 18, 0.8);
  }
  100% {
    transform: scale(1);
    box-shadow: 0 0 20px rgba(231, 76, 60, 0.8);  
  }
}


    </style>
</head>
<body>
  <?php include('./components/user_header.php') ?>
<div class="abc">
    <video id="comp-kgjcvd4s_video" class="K8MSra" role="presentation" crossorigin="anonymous" playsinline="" preload="auto" muted="" loop="" tabindex="-1" autoplay="" src="../img/video.mp4" style="height: 100%; width: 100%; object-fit: cover; object-position: center center; opacity: 1;"></video>
    <a href="#" class="btn btn-1">Đến cửa hàng</a>
</div>
        <div class="about">
            <div class="about__box">
                <div class='slideshow-container'>

                <div class="mySlides visible">
                <a href="menu.php"><img src="./img/about.jpg"/></a>
                </div>

                <div class="mySlides visible">
                <a href="menu.php"><img src="./img/about2.jpg"/></a>
                </div>

                <div class="mySlides visible">
                <a href="menu.php"><img src="./img/about1.jpg"/></a>
                </div>

                    <a class='prev' onclick='prevSlide()'>&#10094;</a>
                    <a class='next' onclick='showSlides()'>&#10095;</a>

                    <div class='wrap-dot'>
                        <span class='dot'></span>
                        <span class='dot'></span>
                        <span class='dot'></span>
                    </div>
                </div>

        
        <div class="about__content">
            <div class="about__title">GUU CHAO XÌN</div>
            <p class="about__text">Chúng tôi tự hào là điểm đến lý tưởng cho những người yêu âm nhạc, từ người mới bắt đầu đến những nghệ sĩ chuyên nghiệp. Tại GUU, chúng tôi cung cấp một loạt các nhạc cụ chất lượng, từ đàn guitar, piano, violin cho đến trống và nhiều nhạc cụ khác. Chúng tôi cam kết đảm bảo rằng bạn sẽ tìm thấy những sản phẩm tốt nhất để nâng cao kỹ năng âm nhạc của bạn hoặc thể hiện tài năng âm nhạc của mình.</p>
        </div>
    </div>
</div>

<!-- <hr style="width: 60%; height: 10px; color:#FF3300; border: none; border-radius: 4px; margin-left: 300px; margin-bottom: 50px;"> -->

<div class="hh1">
  <h1>Âm nhạc ?</h1>
</div>


<section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="./img/beethoven.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Beethoven</h2>
        <p style="font-size: 2rem;">
        Sau sự im lặng, thứ thể hiện được nhất điều không thể diễn tả chính là âm nhạc.
        </p>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="./img/george.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>George Gershwin</h2>
        <p style="font-size: 2rem;">
          Chúng ta học cách thể hiện những sắc thái cảm xúc tinh tế nhờ tiến sâu vào những bí ẩn của hoà âm.</p>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="./img/victorhugo.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Victor Hugo</h2>
        <p style="font-size: 2rem;">
            Âm nhạc thể hiện những điều không thể nói nhưng cũng không thể lặng câm.</p>
      </div>
    </div>
  </article>
</section>

<div class="sale-h1">
  <h1>SALE 2024</h1>
</div>
<div class="card-container">
  <!-- <div class="card card-1">
    <div class="card-img"></div>
    <a href="" class="card-link">
      <div class="card-img-hovered"></div>
    </a>
    <div class="card-info">
      <div class="card-about">
        <a class="card-tag tag-news">NEWS</a>
      <div class="card-time">6/11/2018</div>
      </div>
      <h1 class="card-title">There have been big Tesla accident at New Jersey</h1>
      <div class="card-creator">by <a href="">Sardorbek Usmonov</a></div>
    </div>
  </div> -->
  <div class="card card-2">
    <div class="card-img"></div>
      <div class="card-img-hovered"></div>
    </a>
    <div class="card-info">
      <div class="card-about">
        <a class="card-tag tag-politics">SALE</a>
      </div>
      <h1 class="card-title">Yamaha YDP-144: Âm thanh trong trẻo, thiết kế đẹp mắt, hoàn hảo cho bắt đầu hành trình âm nhạc.</h1>
      <div class="card-creator"></div>
    </div>
  </div>
  <div class="card card-3">
    <div class="card-img"></div>
    <a href="" class="card-link">
      <div class="card-img-hovered"></div>
    </a>
    <div class="card-info">
      <div class="card-about">
        <a class="card-tag tag-politics">SALE</a>
      </div>
      <h1 class="card-title">Chơi piano chân thực, âm thanh đặc trưng, cảm giác phím tuyệt vời, đối tác lý tưởng cho đam mê âm nhạc.</h1>
      <div class="card-creator"></div>
    </div>
  </div>
  <div class="card card-4">
    <div class="card-img"></div>
    <a href="" class="card-link">
      <div class="card-img-hovered"></div>
    </a>
    <div class="card-info">
      <div class="card-about">
        <a class="card-tag tag-politics">SALE</a>
      </div>
      <h1 class="card-title">Âm thanh trầm ấm, kiểu dáng đẹp mắt, lựa chọn hàng đầu khám phá âm nhạc jazz.</h1>
      <div class="card-creator"></div>
    </div>
  </div>
  <div class="card card-5">
    <div class="card-img"></div>
    <a href="" class="card-link">
      <div class="card-img-hovered"></div>
    </a>
    <div class="card-info">
      <div class="card-about">
        <a class="card-tag tag-politics">SALE</a>
      </div>
      <h1 class="card-title">Thể hiện đẳng cấp và sáng tạo, trải nghiệm chơi trống điện tử, âm thanh chân thực và linh hoạt.</h1>
      <div class="card-creator"></div>
    </div>
  </div>
</div>

    <div class="contact__info">
        <div class="box contact__info_box">
            <h2>Địa chỉ</h2>
            <h3>470 Trần Đại Nghĩa, Hòa Quý, Ngũ Hành Sơn, TP.Đà Nẵng</h3>
        </div>
    </div>
    
    <div class="contact__map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30684.999138983676!2d108.25161195!3d15.980953600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.!5e0!3m2!1sen!2s!4v1700035126619!5m2!1sen!2s" width="100%" height="800px" frameborder="0" style="border:0" allowfullscreen></iframe>
  
    </div>
    

    <?php include('./components/footer.php') ?>
    
</body>
<script src="styles/js/main_js.js"></script>
<script>

    $("#single_item").slick({
        dots: true
    });
    $("#testimonials").slick({
        dots: false
    });
</script>
</html>
