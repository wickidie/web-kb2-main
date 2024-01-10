<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing_page</title>
    <link rel="icon" href="../../asset/img/logo/tokaku_logo.svg" type="image/x-icon" />
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,600;0,700;1,300&family=Kalnia:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/user/style.css" />
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="background">
    <header class="container-fluid pt-3 px-3">
        <nav class="navbar navbar-expand-lg bg-transparant justify-content-between px-md-3 px-2 rounded-3">
            <!-- <div>
          <span class="d-xl-none navbar-brand ms-2 pe-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list" id="icon-toggle"></i>
          </span>
        </div> -->
            <div class="d-md-none">
                <span class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </span>
            </div>
            <div class="d-flex py-1 px-2 align-items-center">
                <img src="../../asset/img/logo/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                <span class="fs-4 ms-2 align-bottom logo d-none d-md-inline-block"> Tokaku </span>
            </div>
            <div class="d-none d-md-inline-block">
                <ul class="nav align-items-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.html" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="nav align-items-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-auto" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown mx-2 d-none d-md-inline-block">
                        <a href="#" class="pe-auto" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                            <li>
                                <div class="d-flex align-items-center px-3">
                                    <div class="">
                                        <img class="rounded-circle" src="https://github.com/mdo.png" width="35"
                                            height="35" alt="Image Description" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-0 fw-bold"><small> @user </small></p>
                                        <small class="card-text text-body"> @email </small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" id="themeToggle">
                                    <small>Change Theme</small>
                                    <div class="form-check form-check-reverse form-switch d-none">
                                        <input class="form-check-input" type="checkbox" id="themeToggle" checked />
                                        <label class="form-check-label" for="themeToggle">Change Theme</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="login-form.html"><small>Profile</small> </a>
                            </li>
                            <!-- <li>
                  <a class="dropdown-item" href="#">
                    <small>Settings</small>
                  </a>
                </li> -->
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.html"><small>Sign out</small></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="cart.html" class="nav-link pe-auto">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="modal modal-fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="margin-top: 0px">
                <div class="modal-content">
                    <div class="modal-body" id="exampleModalLabel">
                        <form class="d-flex form-floating align-items-center" role="search">
                            <input class="form-control me-2" type="search" id="search" placeholder="Search"
                                aria-label="Search" />
                            <a href="coming_soon.html">
                                <i class="bi bi-search"></i>
                            </a>
                            <label for="search">Search</label>
                            <button class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                                type="submit"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="container-fluid p-3">
        <article class="rounded-3">
            <!-- carousel -->
            <section class="container-fluid px-5">
                <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1"
                            class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                            class=""></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                            class=""></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <!-- https://picsum.photos/id/250/1850/890 -->
                            <img src="../../asset/img/product/prod11-2.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="carousel-item">
                            <!-- https://picsum.photos/id/454/1850/890 -->
                            <img src="../../asset/img/product/prod12-2.jpg" alt="" class="img-fluid" />
                        </div>
                        <div class="carousel-item">
                            <!-- https://picsum.photos/id/531/1850/890 -->
                            <img src="../../asset/img/product/prod13-2.jpg" alt="" class="img-fluid" />
                        </div>
                        <!-- <div class="carousel-item">
                <img src="../../asset/img/product/2000.jpeg" alt="" class="img-fluid rounded-4" />
                <div class="container">
                  <div class="carousel-caption text-end">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                  </div>
                </div>
              </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <!-- fav item -->
            <section class="container p-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col col-equal-height-e col-lg-3 p-1">
                        <h1>Check Out <br />Latest Product</h1>
                        <div>
                            <a class="btn btn-lg btn-outline-secondary" href="product.html">View All</a>
                        </div>
                    </div>
                    <div class="col col-equal-height-e col-lg-3 p-1">
                        <div class="card pointer">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                New</div>
                            <figure class="card-img m-0">
                                <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                    class="figure-img img-fluid rounded-2" />
                            </figure>
                            <div class="card-body text-center">
                                <div class="card-title">
                                    <h4 class="card-title fw-semibold">Product 2</h4>
                                </div>
                                <div class="card-text">
                                    <small>
                                        <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                        Rp20.000
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">View details</span></a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">Add to cart</span></a>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col col-equal-height-e col-lg-3 p-1">
                        <div class="card pointer">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                New</div>
                            <figure class="card-img m-0">
                                <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                    class="figure-img img-fluid rounded-2" />
                            </figure>
                            <div class="card-body text-center">
                                <div class="card-title">
                                    <h4 class="card-title fw-semibold">Product 2</h4>
                                </div>
                                <div class="card-text">
                                    <small>
                                        <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                        Rp20.000
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">View details</span></a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">Add to cart</span></a>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col col-equal-height-e col-lg-3 p-1">
                        <div class="card pointer">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                New</div>
                            <figure class="card-img m-0">
                                <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                    class="figure-img img-fluid rounded-2" />
                            </figure>
                            <div class="card-body text-center">
                                <div class="card-title">
                                    <h4 class="card-title fw-semibold">Product 2</h4>
                                </div>
                                <div class="card-text">
                                    <small>
                                        <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                        Rp20.000
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">View details</span></a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                            class="d-none d-md-inline-block">Add to cart</span></a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- best seller  -->
            <section class="container p-5">
                <div class="text-center">
                    <h1>Best Seller</h1>
                </div>
                <div class="album py-3">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <!-- product1 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <!-- product2 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- product3 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <!-- product4 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <!-- product5 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <!-- product6 -->
                            <div class="col col-equal-height p-1">
                                <div class="card pointer">
                                    <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                                    <figure class="card-img m-0">
                                        <img src="../../asset/img/product/prod01.jpg" alt="product01"
                                            class="figure-img img-fluid rounded-2" />
                                    </figure>
                                    <div class="card-body text-center">
                                        <div class="card-title">
                                            <h4 class="card-title fw-semibold">Product 2</h4>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                <span class="text-muted text-decoration-line-through">Rp15.000</span>
                                                Rp20.000
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="#"><i class="bi bi-eye me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">View details</span></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="#"><i class="bi bi-cart me-0 me-md-2"></i><span
                                                    class="d-none d-md-inline-block">Add to cart</span></a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="product.html" class="btn btn-outline-secondary w-50" type="submit">View All</a>
                </div>
            </section>
        </article>
    </main>

    <!-- offcanvas menu -->
    <div class="offcanvas offcanvas-start w-50" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header pt-4">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <div class="d-flex ms-2 justify-content-center align-items-center">
                    <img src="../../asset/img/logo/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
                    <span class="fs-4 ms-2 align-bottom"> Tokaku </span>
                </div>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.html" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row align-items-center g-0 border-top py-2">
                <!-- Desc -->
                <div class="col-md-6 col-12 text-center text-md-start">
                    <span>©
                        <span id="copyright">
                            <script>
                            document.getElementById("copyright").appendChild(document.createTextNode(new Date()
                                .getFullYear()));
                            </script>
                        </span>Tokaku. All Rights Reserved.</span>
                </div>
                <!-- Links -->
                <div class="col-12 col-md-6">
                    <nav class="nav nav-footer justify-content-center justify-content-md-end">
                        <a class="nav-link" href="#">Privacy</a>
                        <a class="nav-link" href="#">Terms </a>
                        <a class="nav-link" href="#">Feedback</a>
                        <a class="nav-link" href="#">Support</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>