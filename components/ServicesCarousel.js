class ServicesCarousel extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div
        class="section-full bg-white content-inner-2 overlay-white-middle"
        style="
          background-image: url(images/background/bg1.png),
            url(images/background/bg2.png);
          background-position: bottom, top;
          background-size: 100%;
          background-repeat: no-repeat;
        "
      >
        <div class="container">
          <div class="section-head text-black text-center">
            <h2 class="text-primary m-b10">Our Services</h2>
            <h6 class="m-b10">
              You Will Like To Look Like Goddes Every Day!
            </h6>
            <div class="dlab-separator-outer m-b0">
              <div class="dlab-separator text-primary style-icon">
                <i class="flaticon-spa text-primary"></i>
              </div>
            </div>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy
              text ever since the.
            </p>
          </div>
          <div
            class="img-carousel owl-carousel owl-theme owl-none owl-dots-primary-big owl-btn-center-lr owl-loade m-b30"
          >
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic1.jpg"
                    alt=""
                  />
                  <i class="flaticon-woman-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Cosmetics</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic2.jpg"
                    alt=""
                  />
                  <i class="flaticon-lotus"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Hairdressing</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic3.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Body Treatments</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic4.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Massages</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic1.jpg"
                    alt=""
                  />
                  <i class="flaticon-woman-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Cosmetics</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic2.jpg"
                    alt=""
                  />
                  <i class="flaticon-lotus"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Hairdressing</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic3.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Body Treatments</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic4.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Massages</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic1.jpg"
                    alt=""
                  />
                  <i class="flaticon-woman-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Cosmetics</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic2.jpg"
                    alt=""
                  />
                  <i class="flaticon-lotus"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Hairdressing</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic3.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Body Treatments</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-box text-center">
                <div class="service-images m-b15">
                  <img
                    width="300"
                    height="300"
                    src="images/our-services/pic4.jpg"
                    alt=""
                  />
                  <i class="flaticon-candle-1"></i>
                </div>
                <div class="service-content">
                  <h6 class="text-uppercase">
                    <a href="services-details.html" class="text-primary"
                      >Massages</a
                    >
                  </h6>
                  <p>
                    It is a long established fact that a reader will be
                    distracted by the readable content of a page.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <a href="service.html" class="site-button outline"
              >See all Services</a
            >
          </div>
        </div>
      </div>

    `
  }
}

customElements.define('services-carousel', ServicesCarousel);