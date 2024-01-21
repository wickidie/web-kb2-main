<?php
    require 'session-users.inc.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-target="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
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

<body class="h-100">
    <?php 
      include_once 'header.inc.php';
    ?>
    <main class="container p-3 h-100 mt-4">
        <article class="h-100">
            <section class="py-3 py-md-5 py-xl-8">
                <div class="container mt-3 mb-2">
                    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                        <div class="col-12 col-lg-6 col-xl-5">
                            <img class="img-fluid rounded" loading="lazy"
                                src="../../asset/img/avatar/The_Three_Bears.webp" alt="" />
                        </div>
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="row justify-content-xl-center">
                                <div class="col-12 col-xl-11">
                                    <!-- <h2 class="h1 mb-3">Who We Are?</h2> -->
                                    <p class="lead fs-4 mb-3">Welcome to Tokaku, where passion meets expertise.</p>
                                    <p class="mb-5 text-secondary">Founded by three friends with a shared love for
                                        photography, our mission is to provide you with the finest photography needs,
                                        ensuring every shot is a masterpiece.</p>
                                    <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                        <div class="col-12 col-md-6">
                                            <div class="d-flex">
                                                <div class="me-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        fill="currentColor" class="bi bi-bag-check-fill"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="mb-3">Spectrum of Options</h4>
                                                    <p class="text-secondary mb-0">We offer everything you need from
                                                        cutting-edge cameras and lenses to artistic accessories.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="d-flex">
                                                <div class="me-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        fill="currentColor" class="bi bi-camera-fill"
                                                        viewBox="0 0 16 16">
                                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                        <path
                                                            d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="mb-3">Quality Lens</h4>
                                                    <p class="text-secondary mb-0">Every product in our inventory is
                                                        chosen with a discerning eye for quality, innovation, and
                                                        functionality.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php 
    include_once 'offcanvas.inc.php';
    ?>

    <?php 
    include_once 'footer.inc.php';
    ?>
</body>

</html>