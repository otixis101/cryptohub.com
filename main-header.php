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

    <title>Investool</title>
  </head>
  <body>
    <!---main header-->
    <div class="main-header">
      <div class="main">
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

        <!--Header Nav-->
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
                  <li name="landing" data-page >
                    <a href="./index.php" class="nav-fx">Home</a>
                  </li>
                  <li name="plans" data-page ><a href="./plans.php" class="nav-fx">Plans</a></li>
                  <li name="centers" data-page ><a href="./centers.php" class="nav-fx">Data Center</a></li>
                  <li name="faqs" data-page ><a href="./faqs.php" class="nav-fx">FAQs</a></li>
                  <li name="about" ><a href="./about.php" class="nav-fx">About Us</a></li>
                  <li class="get-started-form">
                    <a href="./login.php" class="login">Log in</a>
                    <a href="./signup.php" class="sign-up">Sign Up</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!---close main header-->
      </div>

      
      <!--Main Page-->
      <div class="main-page">