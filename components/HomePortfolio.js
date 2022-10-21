class HomePortfolio extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div
      class="section-full content-inner-2 our-portfolio"
      style="
        background-image: url(images/background/bg6.jpg);
        background-size: cover;
      "
      >
      <div class="container">
        <div class="section-head text-black text-center m-b20">
          <h2 class="text-primary m-b10">Our Portfolio</h2>
          <div class="dlab-separator-outer m-b0">
            <div class="dlab-separator text-primary style-icon">
              <i class="flaticon-spa text-primary"></i>
            </div>
          </div>
          <p class="m-b0">
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy
            text ever since the.
          </p>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="site-filters style1 clearfix center">
              <ul class="filters" data-toggle="buttons">
                <li data-filter="" class="btn active">
                  <input type="radio" /><a href="#"><span>All</span></a>
                </li>
                <li data-filter="image-1" class="btn">
                  <input type="radio" /><a href="#"
                    ><span>Haircuts</span></a
                  >
                </li>
                <li data-filter="image-2" class="btn">
                  <input type="radio" /><a href="#"
                    ><span>Coloring</span></a
                  >
                </li>
                <li data-filter="image-3" class="btn">
                  <input type="radio" /><a href="#"
                    ><span>Highlights</span></a
                  >
                </li>
                <li data-filter="image-4" class="btn">
                  <input type="radio" /><a href="#"
                    ><span>Highlights</span></a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix">
          <ul
            id="masonry"
            class="portfolio-box dlab-gallery-listing gallery-grid-4 gallery row lightgallery"
          >
            <li
              class="image-1 image-4 card-container col-lg-3 col-md-3 col-sm-3"
            >
              <div class="dlab-box">
                <div
                  class="dlab-media dlab-img-overlay9 dlab-img-effect zoom"
                >
                  <img
                    width="385"
                    height="385"
                    src="images/gallery/middle/image-1.jpg"
                    alt=""
                  />
                  <div class="overlay-bx">
                    <div class="overlay-icon">
                      <span
                        data-exthumbimage="images/gallery/middle/thumb/pic1.jpg"
                        data-src="images/gallery/image-1.jpg"
                        class="icon-bx-xs check-km"
                        title="Image Title Come Here 1"
                      >
                        <i class="ti-fullscreen"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dlab-box p-tb30 image-2">
                <div
                  class="dlab-media dlab-img-overlay9 dlab-img-effect zoom"
                >
                  <img
                    width="385"
                    height="385"
                    src="images/gallery/middle/image-2.jpg"
                    alt=""
                  />
                  <div class="overlay-bx">
                    <div class="overlay-icon">
                      <span
                        data-exthumbimage="images/gallery/middle/thumb/pic2.jpg"
                        data-src="images/gallery/image-2.jpg"
                        class="icon-bx-xs check-km"
                        title="Image Title Come Here 1"
                      >
                        <i class="ti-fullscreen"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="image-2 card-container col-lg-6 col-md-6 col-sm-6">
              <div class="dlab-box m-b30">
                <div
                  class="dlab-media dlab-img-overlay9 dlab-img-effect zoom"
                >
                  <img src="images/gallery/image-3.jpg" alt="" />
                  <div class="overlay-bx">
                    <div class="overlay-icon">
                      <span
                        data-exthumbimage="images/gallery/middle/thumb/pic3.jpg"
                        data-src="images/gallery/image-3.jpg"
                        class="icon-bx-xs check-km"
                        title="Image Title Come Here 1"
                      >
                        <i class="ti-fullscreen"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li
              class="image-3 image-4 card-container col-lg-3 col-md-3 col-sm-3"
            >
              <div class="dlab-box m-b30">
                <div
                  class="dlab-media dlab-img-overlay9 dlab-img-effect zoom"
                >
                  <img
                    width="385"
                    height="385"
                    src="images/gallery/middle/image-4.jpg"
                    alt=""
                  />
                  <div class="overlay-bx">
                    <div class="overlay-icon">
                      <span
                        data-exthumbimage="images/gallery/middle/thumb/pic4.jpg"
                        data-src="images/gallery/image-4.jpg"
                        class="icon-bx-xs check-km"
                        title="Image Title Come Here 1"
                      >
                        <i class="ti-fullscreen"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dlab-box">
                <div
                  class="dlab-media dlab-img-overlay9 dlab-img-effect zoom"
                >
                  <img
                    width="385"
                    height="385"
                    src="images/gallery/middle/image-5.jpg"
                    alt=""
                  />
                  <div class="overlay-bx">
                    <div class="overlay-icon">
                      <span
                        data-exthumbimage="images/gallery/middle/thumb/pic5.jpg"
                        data-src="images/gallery/image-5.jpg"
                        class="icon-bx-xs check-km"
                        title="Image Title Come Here 1"
                      >
                        <i class="ti-fullscreen"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    `
  }
}

customElements.define('home-portfolio', HomePortfolio);