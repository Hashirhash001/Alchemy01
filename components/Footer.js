class FooterGallery extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="portfolio-gallery">
      <div class="container-fluid">
        <div class="row">
          <div
            class="carousel-gallery dots-none owl-none owl-carousel owl-btn-center-lr owl-btn-3 owl-theme owl-btn-center-lr owl-btn-1 mfp-gallery"
          >
            <div class="item dlab-box">
              <a
                href="images/gallery/pic1.jpg"
                data-source="images/gallery/pic1.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic1.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic2.jpg"
                data-source="images/gallery/pic2.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic2.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic2.jpg"
                data-source="images/gallery/pic3.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic3.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic4.jpg"
                data-source="images/gallery/pic4.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic4.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic5.jpg"
                data-source="images/gallery/pic5.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic5.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic6.jpg"
                data-source="images/gallery/pic6.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic6.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic7.jpg"
                data-source="images/gallery/pic7.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic7.jpg"
                  alt=""
                />
              </a>
            </div>
            <div class="item dlab-box">
              <a
                href="images/gallery/pic8.jpg"
                data-source="images/gallery/pic8.jpg"
                class="mfp-link dlab-media dlab-img-overlay3"
                title="Image title come here"
              >
                <img
                  width="205"
                  height="184"
                  src="images/gallery/thumb/pic8.jpg"
                  alt=""
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    `
  }
}

class FooterTop extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="footer-top">
      <div class="container wow fadeIn" data-wow-delay="0.5s">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-5">
            <div class="widget widget_services border-0">
              <h6 class="m-b20">Company</h6>
              <ul>
                <li><a href="index.html">Home </a></li>
                <li><a href="service.html">Our Services</a></li>
                <li><a href="about-us.html">About Us </a></li>
                <li><a href="booking.html">Booking</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-7">
            <div class="widget widget_services border-0">
              <h6 class="m-b20">Useful Link</h6>
              <ul>
                <li><a href="shop-columns-sidebar.html">Shop </a></li>
                <li><a href="shop-checkout.html">Checkout</a></li>
                <li><a href="shop-cart.html">Cart</a></li>
                <li><a href="shop-login.html">Login</a></li>
                <li><a href="shop-register.html">Register</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-5">
            <div class="widget widget_getintuch">
              <h6 class="m-b30">Contact us</h6>
              <ul>
                <li>
                  <i class="ti-location-pin"></i
                  ><strong>address</strong> Alchemy Salon & Spa,
                  House 172,
                  Burnacherry, Kannur,
                  Kerala 670013 
                </li>
                <li>
                  <i class="ti-mobile"></i><strong>phone</strong>0497 276 6926
                </li>
                <li>
                  <i class="ti-email"></i
                  ><strong>email</strong>queensinnovationskannur@gmail.com
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="widget">
              <h6 class="m-b30">Subscribe To Our Newsletter</h6>
              <p class="text-capitalize m-b20">
                If you have any questions, you can contact with us so that
                we can give you a satisfying answer. Subscribe to our
                newsletter to get our latest products.
              </p>
              <div class="subscribe-form m-b20">
                <form
                  class="dzSubscribe"
                  action="script/mailchamp.php"
                  method="post"
                >
                  <div class="dzSubscribeMsg"></div>
                  <div class="input-group">
                    <input
                      name="dzEmail"
                      required="required"
                      class="form-control"
                      placeholder="Your Email Address"
                      type="email"
                    />
                    <span class="input-group-btn">
                      <button
                        name="submit"
                        value="Submit"
                        type="submit"
                        class="site-button radius-xl"
                      >
                        Subscribe
                      </button>
                    </span>
                  </div>
                </form>
              </div>
              <ul class="list-inline m-a0">
                <li>
                  <a
                    target="_blank"
                    href="https://www.facebook.com/queensbeautyparlour"
                    class="site-button facebook circle"
                    ><i class="fa fa-facebook"></i
                  ></a>
                </li>
                <li>
                  <a
                    target="_blank"
                    href="https://www.instagram.com/alchemybyqueens/"
                    class="site-button instagram circle"
                    ><i class="fa fa-instagram"></i
                  ></a>
                </li>
                <li>
                  <a
                    target="_blank"
                    href="https://g.page/Alchemysalonkannur?share"
                    class="site-button maps circle"
                    ><i class="fa fa-map"></i
                  ></a>
                </li>
                <li>
                  <a
                    target="_blank"
                    href="https://wa.me/+919995252007"
                    class="site-button whatsapp circle"
                    ><i class="fa fa-whatsapp"></i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    `
  }
}

class FooterBottom extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 text-center text-md-left">
            <span
              >Copyright © 2022
              <a
                href="https://tapclone.co.in/"
                class="dzlink"
                target="_blank"
                >Tapclone</a
              ></span
            >
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-center text-md-right">
            <div class="widget-link">
              <ul>
                <li><a href="contact.html"> Help Desk</a></li>
                <li><a href="contact.html"> Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    `
  }
}

customElements.define('footer-gallery', FooterGallery);
customElements.define('footer-top', FooterTop);
customElements.define('footer-bottom', FooterBottom)