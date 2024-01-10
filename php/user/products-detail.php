<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
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
    <link rel="stylesheet" href="../../css/user/product.css" />
    <!-- Javascript -->
    <script defer type="text/javascript" src="../../js/theme.js"></script>
    <script defer type="text/javascript" src="../../js/page.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="background">
    <header class="container-fluid pt-3 px-3">
        <nav class="navbar navbar-expand-lg bg-transparent justify-content-between px-md-3 px-2 rounded-3">
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
                        <a href="landing_page.html" class="nav-link">Home</a>
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
                        <a href="#" class="nav-link pe-auto">
                            <i class="bi bi-search"></i>
                            <div class="input-group d-none">
                                <form action="">
                                    <input class="form-control form-control-sm" type="search" placeholder="Search"
                                        id="search_input" />
                                </form>
                            </div>
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
                                <a class="dropdown-item" href="#" id="themeToggle"><small>Change Theme</small></a>
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
                        <a href="cart.html" class="nav-link active pe-auto">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container p-3">
        <article class="rounded-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-chevron p-3">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis" href="landing_page.html">
                            <i class="bi bi-house-door-fill" width="16" height="16"></i>
                            <span class="visually-hidden">Home</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Product</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product name</li>
                </ol>
            </nav>

            <section class="pb-3">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                src="../../asset/img/product/prod01.jpg" alt="..." /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: BST-498</div>
                            <h1 class="display-5 fw-bolder">Shop item template</h1>
                            <div class="fs-5 mb-5">
                                <span class="text-decoration-line-through">$45.00</span>
                                <span>$40.00</span>
                            </div>
                            <p class="lead">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem
                                modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis
                                delectus ipsam minima ea iste laborum vero?
                            </p>
                            <div class="d-flex">
                                <input class="form-control form-control-sm text-center me-3" id="inputQuantity"
                                    type="number" value="1" style="max-width: 5rem" />
                                <button class="btn btn-outline-secondary flex-shrink-0" type="button">
                                    <i class="bi-cart me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Related items section-->
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <h2 class="fw-bolder mb-4">Related products</h2>
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">Fancy Product</h5>
                                        <!-- Product price-->
                                        $40.00 - $80.00
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                            options</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">Sale</div>
                                <!-- Product image-->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">Special Item</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">$20.00</span>
                                        $18.00
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                            cart</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">Sale</div>
                                <!-- Product image-->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">Sale Item</h5>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">$50.00</span>
                                        $25.00
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                            cart</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">Popular Item</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        $40.00
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                            cart</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <a href="landing_page.html" class="nav-link">Home</a>
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