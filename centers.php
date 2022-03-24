<?php
include_once "main-header.php";
?>

        <section class="more-section">
            <p class="subhead" id="demo">WHERE IT HAPPENS</p>
            <h2>
              OUR<br />
              DATA CENTERS.
            </h2>
            
            <div class="fx fx-center">
              <div class="centers-grid my-5">
                <div class="loc-tag">
                  <div class="fx fx-col map-loc">
                      <i class="fi fi-rr-marker"></i>
                      <h3>London</h3>
                  </div>
                  <div class="fx fx-col map-loc">
                      <i class="fi fi-rr-marker"></i>
                      <h3>San Jose</h3>
                  </div>
                  <div class="fx fx-col map-loc">
                      <i class="fi fi-rr-marker"></i>
                      <h3>Cape Town</h3>
                  </div>
                </div>
                <div class="map-grid">
                    <img src="./images/datacenter_map.webp" alt="" class="center-map">
                    <div class="san-jose-loc loc-marker">
                      <small>San Jose</small>
                    </div>
                    <div class="london-loc loc-marker">
                      <small>London</small>
                    </div>
                    <div class="cape-town-loc loc-marker">
                      <small>Cape Town</small>
                    </div>
                </div>
              </div>
            </div>
            <h2>Did You Know?</h3>
            <p>Our mining farms are located only in the sunniest regions and mostly use green energy from wind and solar power plants.
            </p>
            <p>Regardless of which SHAMINING miner contract you choose, you can rely on our state-of-the-art and environmentally friendly infrastructure. Our three data center parks in San Jose (California, United States), London (United Kingdom), and Cape Town (Western Cape, South Africa) provide you with safe and stable services.</p>

          </section>
      </div>

      <!--close main-->
    </div>
  </body>

<?php

include_once "footer.php";

?>

  <script>
    document.body.onload = function () {
      typeWriter();
      activepage("centers");
    };
  </script>

  <script src="./js/active-page.js"></script>/
  <script src="./js/dropdown.js"></script>
  <script src="./js/type_effect.js"></script>
</html>
