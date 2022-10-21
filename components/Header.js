class HeaderComponent extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <header class="site-header header center mo-left">
      <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
          <div class="container clearfix">
            <div class="logo-header mostion">
              <a href="index.html" class="dez-page"
                ><img src="images/alchemy-logo.png" alt=""
              /></a>
            </div>
            <button
              class="navbar-toggler collapsed navicon justify-content-end"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span></span>
              <span></span>
              <span></span>
            </button>
            <!-- main nav -->
            <div
              class="header-nav navbar-collapse collapse justify-content-between"
              id="navbarNavDropdown"
            >
              <ul class="nav navbar-nav">
                <li class="`+ (this.isLinkActive('index.html') ? `active` : ``) + `">
                  <a href="index.html"
                    >Home</i
                  ></a>
                </li>
                <li class="`+ (this.isLinkActive('service.html') ? `active` : ``) + `">
                  <a href="service.html"
                    >Our Services</a>
                </li>
                <li class="`+ (this.isLinkActive('booking.html') ? `active` : ``) + `">
                  <a href="booking.html"
                    >Book Now</a>
                </li>
              </ul>
              <ul class="nav navbar-nav">
              <li>
                  <a href="javascript:void(0);"
                    >Alchemy <i class="fa fa-chevron-down"></i
                  ></a>
                  <ul class="sub-menu">
                    <li>
                      <a href="about-us.html" class="dez-page"
                        >About Us
                      </a>
                    </li>
                    <li>
                      <a href="contact.html" class="dez-page"
                        >Contact Us
                      </a>
                    </li>
                    <li>
                      <a href="gallery.html" class="dez-page"
                        >Gallery
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="`+ (this.isLinkActive('blog.html') ? `active` : ``) + `">
                  <a href="blog.html"
                    >Blog</i
                  ></a>
                </li>
                <li class="`+ (this.isLinkActive('shop-columns.html') ? `active` : ``) + `">
                  <a href="shop-columns.html"
                    >Our Products</i
                  ></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    `
  }

  isLinkActive(url) {
    return window.location.pathname.replace('/', '') === url ? true : false
  }
}

customElements.define('header-area', HeaderComponent);
