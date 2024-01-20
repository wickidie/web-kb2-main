<?php
    include_once 'db-connect.inc.php';
    $admin_id = $_SESSION['admin_id'];

    $getUsername = "SELECT username FROM admin WHERE admin_id = '$admin_id'";
    $username = mysqli_query($conn, $getUsername);
    $row = mysqli_fetch_assoc($username);

    echo "<header class='container-fluid pt-3'>
        <nav class='navbar navbar-expand-lg bg-light-subtle justify-content-between px-md-3 px-2 rounded-3'>
            <div>
                <span class='d-xl-none navbar-brand ms-2 pe-auto' type='button' data-bs-toggle='offcanvas'
                    data-bs-target='#offcanvasExample' aria-controls='offcanvasExample'>
                    <i class='bi bi-list' id='icon-toggle'></i>
                </span>
            </div>
            <div>
                <ul class='nav align-items-center'>
                    <li class='nav-item mx-2'>
                    <a href='#' class='pe-auto'>
                    <div class='form-check form-check-reverse form-switch'>
                      <input class='form-check-input' type='checkbox' id='themeToggle' checked />
                    </div>
                  </a>
                    </li>
                    <li class='nav-item dropdown mx-2'>
                        <a href='#' class='' data-bs-toggle='dropdown' aria-expanded='false'>
                            <img src='https://github.com/mdo.png' alt='' width='35' height='35'
                                class='rounded-circle' />
                        </a>
                        <ul class='dropdown-menu dropdown-menu-end text-small shadow'>
                            <li>
                                <div class='d-flex align-items-center px-3'>
                                    <div class=''>
                                        <img class='rounded-circle' src='https://github.com/mdo.png'
                                            width='35' height='35' alt='Image Description' />
                                    </div>
                                    <div class='flex-grow-1 ms-3'>
                                        <p class='mb-0 fw-bold'>
                                            <small>
                                                <strong>" .  $row["username"] . "</strong>
                                            </small>
                                        </p>
                                        <p class='card-text text-body'>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class='dropdown-divider' />
                            </li>
                            <li>
                                <hr class='dropdown-divider' />
                            </li>
                            <li>
                                <a class='dropdown-item' href='logout.php'><small>Sign out</small></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>";
?>