
<?php
session_start();
    $errors = array();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css" />
    
    <link
      rel="stylesheet"
      type="text/css"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap"
      rel="stylesheet"
      type="text/css"
    />
    <title>Food Delivery</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="row">
          <img src="resources/img/logo transparent.png" alt="food logo" class="logo" />
          <ul class="main-nav">
            
            
            <script>
              function func1(){
                document.getElementById('id01').style.display='block'
              }
              function func2(){

              }

            </script>
            
            <?php
            if (isset($_SESSION['login']) == false){
              echo "<li><a href='#test1'>Sign up </a></li>",
              "<li><a onclick='func1()' href='#'>Login </a></li>";
            }
            else {
              echo "<li><h6>".$_SESSION['email']."</h6></li>",
              "<li><a href='simple-php-shopping-cart/index.php?action=empty'>Order Food </a></li>",
              "<li><a name='logout' type='submit' href='login-system/logout.php'>Logout </a></li>";
            }
            ?>
          </ul>
        </div>
      </nav>

      <div class="hero-text-box">
        <h1>
          Healthy Food</br>
          Healthy Life
        </h1>

        <a class="btn btn-full js--scroll-to-clean" href="#">Let's clean </a>
        <a class="btn btn-ghost js--scroll-to-fat " href="#">Healthy fat </a>
      </div>
      <form method="post" action="./login-system/login_db.php" >
      <div id="id01" class="modal">
         <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="text">SIGN IN</div>
        <div class="guess"><i class="fas fa-user"></i></div>
  
        <div class="container">
          <label for="email">Email</label>
          <input
            type="email"
            name="email"
            id="email1"
            placeholder="Email"
            required
          />
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            id="password1"
            placeholder="Password"
            required
          />
          <button type="submit" name="login">Login</button>
        </div>
      </div>
    </form>
    </header>
    <section class="section-features js--section-features">
      <div class="row">
        <h2>It's time to make a change &mdash; login to order</h2>
      </div>
    </section>
    <div class="Clean">
      <i class="fas fa-seedling icon-big"></i>
      <h3>Clean Food</h3>
      <section class="section-meals">
        <ul class="meals-showcase clearfix">
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Baked-Chicken-Breast-820-1.jpg"
                alt="Chicken"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/salmon.webp" alt="Salmon" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/Chunn--8.jpg" alt="Beef" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/wrap.jpg" alt="wrap" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/seared tuna.webp" alt="tuna" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/shrimpp.jpg" alt="shrimp" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/6.jpg"
                alt="Healthy baguette with egg and vegetables"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/acai2.jpg" alt="acai" />
            </figure>
          </li>
        </ul>
      </section>
    </div>
    <section class="js--section-fat">
    <div class="Fat">
      <i class="fas fa-hamburger icon-big"></i>
      <h3>Fat Food</h3>
    </section>
      <section class="section-meals">
        <ul class="meals-showcase clearfix">
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/pizza.jpg"
                alt="Pizza"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/Pic/Posh Mushroom.jpg" alt="Mushroom" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/Egg_Avocado.jpg"
                alt="Egg_Avocado"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img src="./resources/img/Pic/Potato.jpg" alt="Potato" />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/low fat salmon steak.jpg"
                alt="low fat salmon"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/spaghetti_carbonara.jpg"
                alt="spaghetti"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/beef steak.jpg"
                alt="beef steak"
              />
            </figure>
          </li>
          <li>
            <figure class="meal-photo">
              <img
                src="./resources/img/Pic/Spaghetti with chicken.jpg"
                alt="spaghetti chicken"
              />
            </figure>
          </li>
        </ul>
      </section>
      <section class="section-form">
        <div class="row">
          <h4>Start Eating</h4>
        </div>
        <div class="sign-up">
          <div class="row">
            <form method="post" action="./login-system/register_db.php" class="contact-form">
              <div class="row">
                <div class="col span-1-of-3">
                  <label for="name">First Name</label>
                </div>
                <div class="col span-2-of-3">
                  <input
                    type="text"
                    name="first_name"
                    placeholder="Your first name"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col span-1-of-3">
                  <label for="name">Last Name</label>
                </div>
                <div class="col span-2-of-3">
                  <input
                    type="text"
                    name="lastname"
                    id="lastname"
                    placeholder="Your last name"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col span-1-of-3">
                  <label for="email">Email</label>
                </div>
                <div class="col span-2-of-3">
                  <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Your email"
                    required
                  />
                </div>
                <div class="row">
                  <div class="col span-1-of-3">
                    <label for="email">Password</label>
                  </div>
                  <div class="col span-2-of-3">
                    <input
                      type="password"
                      name="password"
                      id="password"
                      placeholder="Create Your Password"
                      required
                    />
                  </div>
              <div id="test1" class="row">
                <div class="col span-1-of-3">
                  <label>&nbsp;</label>
                </div>
                <div class="col span-2-of-3">
                  <input type="submit" name="submit" value="Submit" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="resources/js/script.js"></script>
  </body>
</html>


