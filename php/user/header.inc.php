<?php
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'] ?? null;
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);    
    $username = $row['username'] ?? 'please login';
    $email = $row['username'] ?? 'please login';
    echo '<header class="container-fluid p-3">
    <nav class="navbar navbar-expand-lg bg-transparant justify-content-between px-md-3 px-2 rounded-3">
      <!-- <div>
        <span class="d-xl-none navbar-brand ms-2 pe-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <i class="bi bi-list" id="icon-toggle"></i>
        </span>
      </div> -->
      <div class="d-md-none">
        <span class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <i class="bi bi-list"></i>
        </span>
      </div>
      <div class="d-flex py-1 px-2 align-items-center">
        <img src="../../asset/img/icon/tokaku_logo.svg" alt="TOKAKU" width="32" height="32" />
        <span class="fs-4 ms-2 align-bottom logo d-none d-md-inline-block"> Tokaku </span>
      </div>
      <div class="d-none d-md-inline-block">
        <ul class="nav align-items-center">
          <li class="nav-item">
            <a href="landing-page.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About</a>
          </li>
        </ul>
      </div>
      <div>
        <ul class="nav align-items-center">
          <li class="nav-item">
            <a href="products.php" class="nav-link pe-auto" data-bs-toggle="modal" data-bs-target="#searchModal">
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
                    <img class="rounded-circle" src="https://github.com/mdo.png" width="35" height="35" alt="Image Description" />
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-bold"><small>' .  $username  . '</small></p>
                    <small class="card-text text-body">' . $email  . '</small>
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
              <a class="dropdown-item" href="order-status.php"><small>Order Status</small> </a>
                <a class="dropdown-item" href="order-details.php"><small>Order Details</small> </a>
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
                <a class="dropdown-item" href="logout.php"><small>Sign out</small></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="cart.php" class="nav-link pe-auto">
              <i class="bi bi-cart"></i>
            </a>
          </li>
        </ul>
        <!-- search modal -->
        <div class="modal modal-fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="margin-top: 0px">
            <div class="modal-content">
              <div class="modal-body" id="exampleModalLabel">
                <form class="d-flex form-floating align-items-center" role="search" style="height: 3rem">
                  <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search" />
                  <a href="#">
                    <i class="bi bi-search"></i>
                  </a>
                  <label for="search">Search</label>
                  <button class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" type="submit"></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>';
?>