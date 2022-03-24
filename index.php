<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="./uicons-regular-rounded/css/uicons-regular-rounded.css"
    />
    <link rel="stylesheet" href="./css/style.css" />

    <title>Landing Page</title>
  </head>
  <body>
    <main id="main_body">
      <div id="sidekick" class="sidekick">
        <div id="scron">
          <img class="sliding-background" src="./images/arrow-down-x.png" />
          <p>SCROLL DOWN</p>
        </div>

        <div
          style="
            display: flex;
            place-content: center;
            width: 100%;
            height: auto;
          "
        >
          <div
            style="
              width: 100%;
              height: auto;
              padding: 5px 20px;
              margin-top: 0px;
              z-index: 2;
            "
          >
            <br />
            <div
              class="tradingview-widget-container"
              style="margin-top: -20px; width: 100%; height: 44px"
            >
              <iframe
                scrolling="no"
                allowtransparency="true"
                frameborder="0"
                src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22displayMode%22%3A%22regular%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A44%2C%22utm_source%22%3A%22deercapitals.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
                style="box-sizing: border-box; height: 44px; width: 100%"
              ></iframe>

              <style>
                .tradingview-widget-copyright {
                  font-size: 13px !important;
                  line-height: 32px !important;
                  text-align: center !important;
                  vertical-align: middle !important;
                  color: #9db2bd !important;
                }

                .tradingview-widget-copyright .blue-text {
                  color: #2962ff !important;
                }

                .tradingview-widget-copyright a {
                  text-decoration: none !important;
                  color: #9db2bd !important;
                }

                .tradingview-widget-copyright a:visited {
                  color: #9db2bd !important;
                }

                .tradingview-widget-copyright a:hover .blue-text {
                  color: #1e53e5 !important;
                }

                .tradingview-widget-copyright a:active .blue-text {
                  color: #1848cc !important;
                }

                .tradingview-widget-copyright a:visited .blue-text {
                  color: #2962ff !important;
                }
              </style>
            </div>
          </div>
        </div>

        <div class="navbar">
          <div class="container">
            <img src="./images/logo.png" alt="Logo" class="logo-type" />
            <div class="dropdown" data-dropdown>
              <div class="dropdown-link">
                <button
                  class="dd-btn mobile-menu dropdown-link"
                  data-dropdown-button
                >
                  <i
                    id="mobile-cta"
                    class="fi fi-rr-menu-burger"
                    alt="open navigation"
                    data-dropdown-button
                  ></i>
                </button>
              </div>
              <nav class="land-nav dropdown-menu">
                <button class="dd-btn mobile-menu-exit" data-dropdown-button>
                  <i
                    id="mobile-exit"
                    class="fi-rr-cross"
                    alt="close navigation"
                    data-dropdown-button
                  ></i>
                </button>
                <ul class="primary-nav">
                  <li class="active"><a href="#" class="nav-fx">Home</a></li>
                  <li><a href="plans.php" class="nav-fx">Plans</a></li>
                  <li>
                    <a href="./centers.php" class="nav-fx">Data Center</a>
                  </li>
                  <li><a href="./faqs.php" class="nav-fx">FAQs</a></li>
                  <li><a href="#" class="nav-fx">About Us</a></li>
                  <li class="get-started-form">
                    <a href="./login.php" class="login">Log in</a>
                    <a href="./signup.php" class="sign-up">Sign Up</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

        <section id="hero" class="hero">
          <div class="container">
            <div class="left-col card">
              <p class="subhead" id="demo">Welcome to Crypto Hub</p>

              <h1 class="my-1">
                Todays Investment,<br />
                Tomorrows Benefit<span>.</span>
              </h1>
              <p>
                Join over 2.000.000 people with the world’s leading hashpower
                provider, It’s super simple - Your mining rigs are already set
                up and running.
              </p>

              <a href="./signup.php" class="get-started fx txt-centered a-link">
                GET STARTED
              </a>
            </div>

            <img
              src="./images/illust/basic.png"
              alt="ilustration"
              class="hero-img illust-img card"
            />
          </div>
        </section>
      </div>

      <div class="rest">
        <section class="features-section">
          <h2 class="section-title">Our Amazing Features</h2>

          <div class="container">
            <ul class="features-list">
              <li class="card">
                <img src="./images/icons/service-icon-2.svg" alt="" />
                <div>
                  <h3>Cloud Mining</h3>
                  <p>
                    We have set up a remote mining rig for you, simply select a
                    plan that best fits your financial capabilities and mine
                    various crypto currencies on the go
                  </p>
                </div>
              </li>

              <li class="card">
                <img src="./images/icons/service-icon-3.svg" alt="" />
                <div>
                  <h3>Insured Trading</h3>
                  <p>
                    Our Trading program is insured with up to $89million. This
                    covers for 80% of your trading risk. Access your earnings
                    and request withdrawals without a hitch.
                  </p>
                </div>
              </li>

              <li class="card">
                <img src="./images/icons/service-icon-4.svg" alt="" />
                <div>
                  <h3>2-FA</h3>
                  <p>
                    Protect your assets with google two factor authenticator.
                    Trade stocks and mine crypto currencies with ease knowning
                    your account is super protected
                  </p>
                </div>
              </li>
              <li class="card">
                <img src="./images/icons/service-icon-1.svg" alt="" />
                <div>
                  <h3>Fast Support and Updates</h3>
                  <p>
                    24/7 on hand customer service to assist with trading
                    uncertainties, and guide you through your journey
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <section class="display-section">
          <div class="container">
            <div class="fx-aln-cent wrapper">
              <img
                src="./images/pctabmobile.png"
                class="img-illust card"
                alt=""
              />
              <div>
                <h1 class="sect-title">CONTROL FROM ANY DEVICE</h1>
                <div class="sect-msg">
                    <p>Invest Online from anywhere</P>
                    <p>Control your miners from any device, whether mobile, tab or desktop</P>
                    <p>Withdraw your money Safe and Instant</P>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="instruct-section">
          <div class="container card-container">
            <h2 class="section-title">How It Works</h2>
            <div class="txt-centered">
              <h2>We are making MINING accessible to everyone.</h2>
              <p>We are uniting all key aspects of running an efficient cryptocurrency mining operation.
                From building highly efficient data centers to providing a streamlined mining system for our users.</p>
            </div>
        <ul>
              <li class="txt-centered card">
                <img src="./images/icons/bullet1.svg" alt="" />
                <h1>Register Your Account</h1>
                <p>Create an account and verify your identity</p>
              </li>
              <li class="txt-centered card">
                <img src="./images/icons/bullet2.svg" alt="" />
                <h1>Choose a Mining Plan</h1>
                <p>Make an investment - rent a miner</p>
              </li>
              <li class="txt-centered card">
                <img src="./images/icons/bullet3.svg" alt="" />
                <h1>Start Earning Profits</h1>
                <p>Get passive income and monitor statistics</p>
              </li>
            </ul>
          </div>
        </section>

        <section class="pride-section scroll-view">
          <div class="container">
            <ul class="pride-list">
              <li class="card">
                <div>
                  <h3 class="countup">63</h3>
                  <span>+</span>
                  <p>
                    Supported <br />
                    Contries
                  </p>
                </div>
              </li>

              <li class="card">
                <div>
                  <h3 class="countup">1500</h3>
                  <span>+</span>
                  <p>
                    TRANSACTIONS <br />
                    PER HOUR
                  </p>
                </div>
              </li>

              <li class="card">
                <div>
                  <h3 class="countup">2500</h3>
                  <span>+</span>
                  <p>
                    CLIENTS & <br />
                    SERVERS
                  </p>
                </div>
              </li>

              <li class="card">
                <div>
                  <h3 class="countup">12</h3>
                  <p>
                    YEARS <br />
                    OF EXPERIENCE
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <section class="market-section">
          <h2 class="section-title">Market Data</h2>
          <div class="container">
            <iframe
              src="https://widget.coinlib.io/widget?type=full_v2&amp;theme=dark&amp;cnt=12&amp;pref_coin_id=1505&amp;graph=yes"
              width="100%"
              height="790px"
              scrolling="auto"
              marginwidth="0"
              marginheight="0"
              frameborder="0"
              border="0"
              style="border: 0; margin: 0; padding: 0"
            ></iframe>
          </div>
        </section>

        <section class="testimonials-section">
          <h2 class="section-title">Client Testimonials</h2>
          <div class="container">
            <ul class="tt-list">
              <li class="card">
                <img src="./images/people/person.jpg" alt="Person" />
                <cite>Polski Damarcus</cite>
                <div>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias nisi veniam neque consequuntur quibusdam
                    perspiciatis voluptas quasi! Delectus, quae ut?
                  </p>
                  <div class="rate">
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                  </div>
                </div>
              </li>
              <li class="card">
                <img src="./images/people/1.jpg" alt="Person" />
                <cite>Hakeem Bashir</cite>
                <div>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias
                  </p>
                  <div class="rate">
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                  </div>
                </div>
              </li>
              <li class="card">
                <img src="./images/people/3.jpg" alt="Person" />
                <cite>Tom Richards</cite>
                <div>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestias nisi veniam neque consequuntur quibusdam
                    perspiciatis voluptas quasi! Delectus, quae ut?
                  </p>
                  <div class="rate">
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                    <i class="fi fi-rr-star"></i>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <section class="contact-section">
          <h2 class="section-title">Contact Us</h2>
          <div class="container">
            <div class="contact-left card">
              <form action="">
                <div>
                  <label for="name">Name</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter Your Name"
                  />
                </div>

                <div>
                  <label for="email">Email</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email Address"
                  />
                </div>

                <div>
                  <label for="message">Message</label>
                  <textarea
                    name="message"
                    id="message"
                    cols="30"
                    rows="10"
                    placeholder="Write Your Message..."
                  ></textarea>
                </div>

                <input
                  type="submit"
                  class="send-msg-cta"
                  value="SEND MESSAGE"
                />
              </form>
            </div>

            <div class="contact-right card">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52860.745033836225!2d-118.44956489731152!3d34.10035165531507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc35fbd217ef%3A0xcf1ef9352700d95c!2sBeverly%20Hills%2C%20CA%2090210%2C%20USA!5e0!3m2!1sen!2sng!4v1625763689316!5m2!1sen!2sng"
                width="600"
                height="450"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
        </section>
      </div>
    </main>
  </body>

  <!--Include Footer-->
  <?php

include_once "footer.php";

?>

  <script>
    document.body.onload = function () {
      typeWriter();
    };
  </script>

  <script src="./js/dropdown.js"></script>
  <script src="./js/type_effect.js"></script>
  <script src="./js/count.js"></script>
  <script src="./js/scroll_effect.js"></script>
  <script src="./js/inview.js"></script>
  <script src="./js/intersect.js" defer></script>
</html>
