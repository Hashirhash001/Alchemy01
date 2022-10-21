class WhyChooseUs extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div
      class="section-full content-inner-3 services-box bg-pink-light"
      style="
        background-image: url(images/background/bg5.jpg);
        background-position: bottom;
        background-size: 100%;
        background-repeat: no-repeat;
      "
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
            <div
              class="icon-bx-wraper p-lr15 p-b30 p-t20 bg-white center fly-box-ho"
            >
              <div class="icon-lg m-b10">
                <span class="icon-cell text-primary"
                  ><i class="flaticon-woman"></i
                ></span>
              </div>
              <div class="icon-content">
                <h6 class="dlab-tilte">We are Professional</h6>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </p>
                <a href="services-details.html" class="site-button-secondry"
                  >Read More</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
            <div
              class="icon-bx-wraper p-lr15 p-b30 p-t20 bg-white center fly-box-ho"
            >
              <div class="icon-lg m-b10">
                <span class="icon-cell text-primary"
                  ><i class="flaticon-mortar"></i
                ></span>
              </div>
              <div class="icon-content">
                <h6 class="dlab-tilte">Lux Cosmetic</h6>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </p>
                <a href="services-details.html" class="site-button-secondry"
                  >Read More</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
            <div
              class="icon-bx-wraper p-lr15 p-b30 p-t20 bg-white center fly-box-ho"
            >
              <div class="icon-lg m-b10">
                <span class="icon-cell text-primary"
                  ><i class="flaticon-candle"></i
                ></span>
              </div>
              <div class="icon-content">
                <h6 class="dlab-tilte">Medical Education</h6>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </p>
                <a href="services-details.html" class="site-button-secondry"
                  >Read More</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 m-b10">
            <div
              class="icon-bx-wraper p-lr15 p-b30 p-t20 bg-white center fly-box-ho"
            >
              <div class="icon-lg m-b10">
                <span class="icon-cell text-primary"
                  ><i class="flaticon-sauna-1"></i
                ></span>
              </div>
              <div class="icon-content">
                <h6 class="dlab-tilte">The Newest Equipment</h6>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </p>
                <a href="services-details.html" class="site-button-secondry"
                  >Read More</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    `
  }
}

customElements.define('why-choose-us', WhyChooseUs);