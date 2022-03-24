<?php
include_once "main-header.php";
?>

        <section class="more-section">
            <p class="subhead" id="demo">DO YOU HAVE QUESTIONS?</p>
            <h2>
              OUR MOST<br />
              FREQUENTLY ASKED QUESTIONS.
            </h2>
            
            
            <div class="faq-div my-4">
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                    What will I get in the Investool ? </h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    The INVESTOOL is engaged in cloud mining provision while using the technology, developed by the experts in IT and cryptocurrencies field. The main product idea is effective disparate computing resources appliance. We tend to unite investors, including newcomers, on a single platform together. Our customers’ trust is based on obvious evidence: they honestly get their income every day. 
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                      How does corperation with the Investool work ?</h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    Go through a simple registration and payment procedure to become our investor. Then pay the miner rent. You are not required to buy or install any additional equipment.
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                      How do miners differ from each other ?</h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    Miners differ from each other in terms of GH/s. The more GH/s the miner has, the more income they will bring to the investor.
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                    What is GH/s ?  
                  </h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    All is clear. The investor should determine the optimum capacity for himself (the hash amount), buy a cloud mining contract (or even several contracts), and earn income every day depending on the parameters of the chosen contract.
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                    How does the cloud mining earning scheme work ?  
                  </h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    All is clear. The investor should determine the optimum capacity for himself (the hash amount), buy a cloud mining contract (or even several contracts), and earn income every day depending on the parameters of the chosen contract.
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                    How do I withdraw my mining income ?  
                  </h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    Select the Withdraw tab, then make a money withdrawal request in the Wallet section. Once the request is processed, the declared amount is transferred to your wallet within 24 hours.
                  </p>
                </div>
              </div>
              <div class="accordion" data-accordion>
                <div class="head" >
                  <h3 class="title">
                    Why does it make sense to reinvest my mining profits ? 
                  </h3>
                  <i class="fi fi-rr-plus icn" data-accordion-button></i>
                </div>
                <div class="body">
                  <p class="text">
                    Money should work for you! This is every successful investor’s slogan. The profits should be reinvested in order to increase your capital. Reinvestment may increase the power as well; it will result in an increase in mining hash rate. Therefore, it will maximize your profits without additional costs for the miner’s power purchase.
                  </p>
                </div>
              </div>

            </div>

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
      activepage("faqs");
    };
  </script>

<script src="./js/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    $("[data-accordion-button]").click(function(e){

      currentAccordion = e.target;
      //$(currentAccordion).closest('.head').siblings('.body').slideToggle();
      
      document.querySelectorAll("[data-accordion-button]").forEach(accordion => {
        if(accordion === currentAccordion){
          
          $(accordion).closest('.head').siblings('.body').slideToggle();
          accordion.classList.toggle('fi-rr-plus');
          accordion.classList.toggle('fi-rr-minus');
          return;
        }
        else{
          $(accordion).closest('.head').siblings('.body').slideUp();
          accordion.classList.add('fi-rr-plus');
          accordion.classList.remove('fi-rr-minus');
        }
    })

      
    })
  })
</script>

  <script src="./js/active-page.js"></script>
  <script src="./js/dropdown.js"></script>
  <script src="./js/type_effect.js"></script>
</html>
