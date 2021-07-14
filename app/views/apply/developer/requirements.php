<!DOCTYPE html>
<html lang="de">
<head>
    <?php include(ROOT_PATH."/app/views/forms/html.phtml")?>
</head>
<body class="page-body">
    <!-- navbar -->
    <?php include(ROOT_PATH."/app/views/forms/nav.phtml")?>
    <!-- /.navbar -->

    <!-- main content -->
    <main class="checkout-order-body main-content gradient-lg position-relative">

      <!-- overlay -->
      <div class="overlay pe-n br-n bp-c bs-c o-30" style="background-image: url(./../../assets/img/bg/bg_shape.png);"></div>
      <!-- /.overlay -->

      <!-- content area -->
      <div class="content-section text-light">
        <div class="container">
          <header class="header text-center mb-6">
            <div class="row gutters-y">
              <div class="col-12 pt-8">
                <div class="timeline-horizontal">
                    <div class="timeline-item flex-1 p-0" data-step="✔">
                        <div class="pt-8 pb-7 px-2 px-sm-4 border-left border-bottom border-secondary">
                            <span class="text-uppercase small-3 fw-600">Requirements</span>
                        </div>
                    </div>
                    <div class="timeline-item flex-1 border-secondary p-0" data-step="✉">
                        <div class="pt-8 pb-7 px-2 px-sm-4 border-bottom border-secondary">
                            <span class="text-uppercase small-3 fw-600">Application</span>
                        </div>
                    </div>
                    <div class="timeline-item flex-1 border-secondary p-0" data-step="✎">
                        <div class="pt-8 pb-7 px-2 px-sm-4 border-bottom border-secondary border-right">
                            <span class="text-uppercase small-3 fw-600">Contact options</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </header>
          <div class="position-relative">
            <div class="row">
              <div class="col-lg-8 mb-8 mb-lg-0">
                <div>
                  <div>
                    <h4>Requirements</h4>
                    <hr class="border-secondary my-4">
                    <div>
                      <div id="accordion-5" class="accordion accordion-connected accordion-no-header">
                        <div class="card">
                          <div class="card-header" id="Paypal">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-5-1" class="collapsed d-flex align-items-center">
                                <span class="icon"><i class="fas fa-book text-warning lead-5"></i></span>
                                Informations
                              </a>
                            </h5>
                          </div>
                          <div id="collapse-5-1" class="collapse show" aria-labelledby="Paypal" data-parent="#accordion-5">
                            <div class="card-body">
                              <span class="d-block mb-3">As a builder, you actively build new maps for our game modes as well as maps for internal projects and work with the other builders to improve and optimize the existing maps.</span>          
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="Card">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-5-2" class="d-flex align-items-center">
                                <span class="icon"><i class="fas fa-paste text-warning lead-5"></i></span>
                                Requirements
                              </a>
                            </h5>
                          </div>
                          <div id="collapse-5-2" class="collapse" aria-labelledby="Card" data-parent="#accordion-5">
                            <div class="card-body">
                              <span class="d-block mb-3">In order to be able to meet our experience, here is a list of the requirements we have set:</span>
                              <ul>
                                <li>You should be able to work on projects independently but also in large teams</li>
                                <li>You are able to take the time you need for our project</li>
                                <li>You already have experience with known plugins for building and are interested in getting to know others that we have written</li>
                                <li>Not only should you enjoy building, you should also have an interest in developing yourself. </li>
                              </ul>
                              <br>
                              <span class="d-block mb-3">Additionally adventageous:</span>
                              <ul>
                                <li>Experience with the latest Minecraft versions (especially the newest blocks and their ids)</li>
                                <li>Experience with plugins like <a href="https://github.com/Brennian/Arceon/wiki">Arceon</a>, and <a href="https://www.spigotmc.org/resources/head-database.14280/">HeadDatabase</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="ApplePay">
                            <h5 class="mb-0">
                              <a data-toggle="collapse" href="#collapse-5-3" class="collapsed d-flex align-items-center">
                                <span class="icon"><i class="fas fa-plus text-warning lead-5"></i></span>
                                Benefits
                              </a>
                            </h5>
                          </div>
                          <div id="collapse-5-3" class="collapse" aria-labelledby="ApplePay" data-parent="#accordion-5">
                            <div class="card-body">
                              <span class="d-block mb-3">We offer you:</span>
                              <ul>
                                <li>A wide range of popular (and premium) plugins to make your work easier</li>
                                <li>Exciting work assignments</li>
                                <li>The opportunity to grow through our team and through our orders</li>
                                <li>A working (1.16.4) build server</li>
                                <li>More possibilities than other servers because we are running on the latest versions of Minecraft</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="archive border border-secondary rounded">
                  <div class="bg-secondary px-4 py-1"><span class="fw-600 ls-1 text-uppercase lead-1">Application Overview</span></div>
                  <div class="p-4">
                    <ul class="list-unstyled small mb-0">
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-plus text-light"></i></div>
                          <div class="ml-auto">Professional building server</div>
                        </div>
                      </li>
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-plus text-light"></i></div>
                          <div class="ml-auto">Training by your personal mentor</div>
                        </div>
                      </li>
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-plus text-light"></i></div>
                          <div class="ml-auto">The builder rank with many advantages</div>
                        </div>
                      </li>
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-plus text-light"></i></div>
                          <div class="ml-auto">A hobby pastime in a competent team</div>
                        </div>
                      </li>
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-minus text-light"></i></div>
                          <div class="ml-auto">Considerable amount of time to build</div>
                        </div>
                      </li>
                      <li class="my-1">
                        <div class="d-flex small-2 fw-600">
                          <div><i class="fas fa-minus text-light"></i></div>
                          <div class="ml-auto">No payment</div>
                        </div>
                      </li>
                      <li><hr class="my-3 border-secondary"></li>
                      <li>
                        <a href="#" class="btn btn-lg btn-block btn-light mt-4">NEXT</a>
                      </li>
                      <li class="lh-1">
                        <span class="small-4 text-lt w-100 mt-4 pb-1 d-inline-block">By clicking Apply, you accept our <a href="#" target="_blank" class="text-rp text-primary text-underline">refund policy</a>.</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
      <!-- /.content area -->

    </main>


    <!-- footer -->
    <?php include(ROOT_PATH."/app/views/forms/footer.phtml")?>
    <!-- /.footer -->

    <!-- sign in -->
    <div style="overflox-y: hidden" class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="userLoginTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="userLoginTitle">Sign in</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="input-transparent" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control border-secondary" name="log_username" autocomplete="off" placeholder="Minecraft Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control border-secondary" name="log_password" autocomplete="off" placeholder="Password">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked="" id="rememberMeCheck">
                                <label class="custom-control-label" for="rememberMeCheck">Remember me</label>
                            </div>
                            <a class="small-3" href="#">Forgot password?</a>
                        </div>
                        <div class="form-group mt-6">
                            <button class="btn btn-block btn-light" type="submit">Sign in</button>
                        </div>
                    </form>
                    <span class="small">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#userSignUp">Create an account</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.sign in -->
    <!-- sign up -->
    <div class="modal fade" id="userSignUp" tabindex="-1" role="dialog" aria-labelledby="userSignUpTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="userSignUp">Sign up</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="input-transparent">
                        <div class="form-group">
                            <input type="email" class="form-control border-secondary" name="reg_email" autocomplete="off" placeholder="E-Mail Adresse" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control border-secondary" name="reg_password" autocomplete="off" placeholder="Password" required>
                        </div>
                        <div class="form-group mb-0">
                            <input type="text" class="form-control border-secondary" name="reg_key" autocomplete="off" placeholder="Enter Your Code" required>
                            <div class="input-group-append ml-3"></div>
                        </div>
                        <div class="form-group mt-6">
                            <button class="btn btn-block btn-light" type="submit">Sign up</button>
                        </div>
                    </form>
                    <span class="small">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#userSignIn" >Log in</a></span>
                </div>
            </div>
        </div>
    </div>
    <?php if(false) {
        ?>
        <!-- offcanvas-cart -->
        <div id="offcanvas-cart" class="offcanvas-cart offcanvas text-light h-100 r-0 l-auto d-flex flex-column" data-animation="slideRight">
            <div>
                <button type="button" data-toggle="offcanvas-close" class="close float-right ml-4 text-light o-1 fw-100" data-dismiss="offcanvas" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <hr class="border-light o-20 mt-8 mb-4">
            </div>
            <div class="offcanvas-cart-body flex-1">
                <div class="offcanvas-cart-list row align-items-center no-gutters">
                    <div class="ocs-cart-item col-12">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 item_img d-none d-sm-block">
                                <a href="store-product.html"><img class="img bl-3 text-primary" src="./../assets/img/content/cont/cg-h_01.jpg" alt="Product"></a>
                            </div>
                            <div class="col-7 flex-1 flex-grow pl-0 pl-sm-4 pr-4">
                                <a href="store-product.html"><span class="d-block item_title text-lt ls-1 lh-1 small-1 fw-600 text-uppercase mb-2">VIP (Lifetime)</span></a>
                                <div class="position-relative lh-1">
                                    <div class="number-input">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ><i class="ti-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="ti-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row align-items-center h-100 no-gutters">
                                    <div class="ml-auto text-center">
                                        <a href="#"><i class="far fa-trash-alt"></i></a><br>
                                        <span class="fw-500 text-warning">30,00 €</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ocs-cart-item col-12">
                        <div class="row align-items-center no-gutters">
                            <div class="col-3 item_img d-none d-sm-block">
                                <a href="store-product.html"><img class="img bl-3 text-primary" src="./../assets/img/content/cont/cg-h_01.jpg" alt="Product"></a>
                            </div>
                            <div class="col-7 flex-1 flex-grow pl-0 pl-sm-4 pr-4">
                                <a href="store-product.html"><span class="d-block item_title text-lt ls-1 lh-1 small-1 fw-600 text-uppercase mb-2">JoinMe Tokens</span></a>
                                <div class="position-relative lh-1">
                                    <div class="number-input">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ><i class="ti-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="10" type="number">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="ti-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row align-items-center h-100 no-gutters">
                                    <div class="ml-auto text-center">
                                        <a href="#"><i class="far fa-trash-alt"></i></a><br>
                                        <span class="fw-500 text-warning">3,75 €</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="checkout-order.html" class="btn btn-lg btn-block btn-outline-light">View cart</a>
            </div>
        </div>
        <!-- /.offcanvas-cart -->
    <?php } ?>

    <?php include(ROOT_PATH."/app/views/forms/script.phtml")?>

    <?php
    if($this->SignUp) { ?>
        <script>
            $( document ).ready(function() {
                $("#SignUp").trigger( "click" );
            });
        </script>
    <?php }
    if($this->SignIn) { ?>
        <script>
            $( document ).ready(function() {
                $("#SignIn").trigger( "click" );
            });
        </script>
    <?php } ?>


</body>
</html>
