
<?php
include_once "main-header.php";
?>

        <section class="login-section">
          <div class="illust">
            <img src="./images/illust/corporate.png" alt="" class="illust-img" />
          </div>
          <div class="login-div">
            <p class="subhead" id="demo">Welcome Back</p>
            <h2>
              LOGIN TO<br />
              YOUR ACCOUNT.
            </h2>

            <form id="login_form" action="./includes/login-inc.php" method="post">
              <div class="input-div required-input">
                <label for="login_user">Username</label>
                <div>
                  <i class="fi fi-rr-user" for="login_user"></i>
                  <input
                    type="text"
                    id="login_user"
                    placeholder="Username or Email Address"
                    id=""
                    name="uid"
                    required
                  />
                </div>

                <span class="error-info fx">

<!--error handling-->
<?php

if (isset($_GET["error"])) {
  if ($_GET["error"] == "wrongUser") {
    echo "<span>Incorrect Login info</span><i class='fi fi-rr-cross-circle'></i>";
  }
}

?>
<!--closing-->

            </span>
              </div>
              <div class="input-div required-input">
                <label for="login_pass">Password</label>
                <div>
                  <i class="fi fi-rr-lock" for="login_pass"></i>
                  <input
                    type="password"
                    id="login_pass"
                    placeholder="Password"
                    id=""
                    name="pwd"
                    required
                  />
                </div>
                <span class="error-info fx">

<!--error handling-->
<?php

if (isset($_GET["error"])) {
  if ($_GET["error"] == "wrongPass") {
    echo "<span>Password don't match User</span><i class='fi fi-rr-cross-circle'></i>";
  }
}

?>
<!--closing-->

            </span>
              </div>

              <input id="submit" type="submit" value="LOGIN" name="submit" />

              <a href="">Forgot Password??</a>

              <a href="./signup.php" class="txt-centered a-link hyper-signup">
                CREATE NEW ACCOUNT <i class="fi fi-rr-arrow-right mx-1"></i
              ></a>
            </form>
          </div>
        </section>
      </div>

      <!--close main-->
    </div>
  </body>

<?php

include_once "footer.php";

?>

<script src="./js/jquery-3.6.0.min.js"></script>

<script>
  document.body.onload = function () {
    typeWriter();
  };

</script>




  <script src="./js/dropdown.js"></script>
  <script src="./js/type_effect.js"></script>
</html>
