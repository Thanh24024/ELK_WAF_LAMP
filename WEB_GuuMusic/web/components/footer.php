<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <title>My Website</title>

  </head>
  <!-- Remove the container if you want to extend the Footer to full width. -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');
    ul {
            margin: 0px;
            padding: 0px;
        }
        .footer-section {
          margin-top: 100px;
          background: #363636;
          position: relative;
          width: 100%;
        }

        .footer-cta {
          border-bottom: 1px solid #373636;
          }
        .single-cta i {
          color: #ff5e14;
          font-size: 30px;
          float: left;
          margin-top: 8px;
        }
        .cta-text {
          padding-left: 15px;
          display: inline-block;
        }
        .cta-text h4 {
          color: #fff;
          font-size: 20px;
          font-weight: 600;
          margin-bottom: 2px;
        }
        .cta-text span {
          color: #757575;
          font-size: 15px;
          font-weight: bold;
        }
        .footer-content {
          position: relative;
          z-index: 2;
          
        }
        .footer-pattern img {
          position: absolute;
          top: 0;
          left: 0;
          height: 330px;
          background-size: cover;
          background-position: 100% 100%;
        }
        .footer-logo {
          margin-bottom: 25px;
        }
        .footer-logo img {
            max-width: 200px;
        }
        .footer-text p {
          margin-bottom: 14px;
          font-size: 18px;
              color: #7e7e7e;
          line-height: 28px;
          font-weight: bolder;
        }
        .footer-social-icon span {
          color: #fff;
          display: block;
          font-size: 20px;
          font-weight: 700;
          font-family: 'Poppins', sans-serif;
          margin-bottom: 20px;
        }
        .footer-social-icon a {
          color: #fff;
          font-size: 16px;
          margin-right: 15px;
        }
        .footer-social-icon i {
          height: 40px;
          width: 40px;
          text-align: center;
          line-height: 38px;
          border-radius: 50%;
        }
        .facebook-bg{
          background: #3B5998;
        }
        .twitter-bg{
          background: #55ACEE;
        }
        .google-bg{
          background: #DD4B39;
        }
        .footer-widget-heading h3 {
          color: #fff;
          font-size: 20px;
          font-weight: 600;
          margin-bottom: 40px;
          position: relative;
          
        }
        .footer-widget-heading h3::before {
          content: "";
          position: absolute;
          left: 0;
          bottom: -15px;
          height: 2px;
          width: 400px;
          background: #ff5e14;
        }
        .footer-widget ul li {
          display: inline-block;
          float: left;
          width: 50%;
          margin-bottom: 12px;
        }
        .footer-widget ul li a:hover{
          color: #ff5e14;
        }
        .footer-widget ul li a {
          color: #878787;
          text-transform: capitalize;
        }
        .subscribe-form {
          position: relative;
          overflow: hidden;
        }
        .subscribe-form input {
          width: 100%;
          padding: 14px 28px;
          background: #2E2E2E;
          border: 1px solid #2E2E2E;
          color: #fff;
        }
        .subscribe-form button {
            position: absolute;
            right: 0;
            background: #ff5e14;
            padding: 13px 20px;
            border: 1px solid #ff5e14;
            top: 0;
        }
        .subscribe-form button i {
          color: #fff;
          font-size: 22px;
          transform: rotate(-6deg);
        }

        .footer-menu li {
          display: inline-block;
          margin-left: 20px;
        }
        .footer-menu li:hover a{
          color: #ff5e14;
        }
        .footer-menu li a {
          font-size: 14px;
          color: #878787;
        }

        .footer-social-icon a {
          padding: 10px; 
          display: inline-block; 
        }

        .footer-social-icon {

          margin-top: 10px;
          margin-left: 40px
        }


        .footer-social-icon a:hover {
          color: #9933CC; /* Màu khi di chuột qua */
        }

</style>

  <body>
  <footer class="footer-section">
      <div class="container">
      <div class="footer-cta pt-5 pb-5">
                  <div class="row">
                      <div class="col-xl-4 col-md-4 mb-30">
                          <div class="single-cta">
                              <i class="fas fa-map-marker-alt"></i>
                              <div class="cta-text">
                                  <h4>Vị trí</h4>
                                  <span>470 Trần Đại Nghĩa, Hòa Hải, Ngũ Hành Sơn, Đà Nẵng</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-md-4 mb-30">
                          <div class="single-cta">
                              <i class="fas fa-phone"></i>
                              <div class="cta-text">
                                  <h4>Liên hệ qua điện thoại</h4>
                                  <span>0796135022</span><br>
                                  <span>0368506103</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-md-4 mb-30">
                          <div class="single-cta">
                              <i class="far fa-envelope-open"></i>
                              <div class="cta-text">
                                  <h4>Liên hệ qua mail</h4>
                                  <span>tuongtc.22ns@vku.udn.vn</span><br>
                                  <span>thanhtn.22ns@vku.udn.vn</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          <div class="footer-content pt-5 pb-5">
              <div class="row">
                  <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                              <div class="footer-logo">
                                  <a href="index.html"><img src="./img/logo3.png" class="img-fluid" alt="logo"></a>
                              </div>
                              <div class="footer-text">
                                  <p>Với đam mê âm nhạc, chúng tôi mang đến cho bạn sự lựa chọn hoàn hảo cho những cuộc phiêu lưu âm nhạc của bạn. Hãy tham gia cùng chúng tôi và biến mọi giai điệu thành hiện thực.</p>
                              </div>
                  
                          </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                              <div class="footer-widget-heading">
                                  <h3>Để lại đánh giá của bạn ở đây</h3>
                              </div>
                              <div class="subscribe-form">
                                  <form action="post">
                                      <input type="text">
                                      <button><i class="fab fa-telegram-plane"></i></button>
                                  </form>
                              </div>
                          </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 mb-50">
                      <div class="footer-social-icon">
                          <span>Theo dõi chúng tôi</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a><br>
                            <a href="#"><i class="fab fa-instagram" style="background-color: #FF0033;"></i></a> <!-- Instagram -->
                            <!-- <a href="#"><i class="fab fa-zalo" ></i></a> Zalo -->
                            <a href="#"><i class="fab fa-tiktok" style="background-color: #000;"></i></a> <!-- TikTok -->
                            <a href="#"><i class="fab fa-youtube" style="background-color: #ff0000;"></i></a> <!-- YouTube -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  </body>

  <!-- End of .container -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
  </html>