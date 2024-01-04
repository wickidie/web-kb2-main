<?php
    echo "<div class='offcanvas offcanvas-start w-50' tabindex='-1' id='offcanvasExample'
        aria-labelledby='offcanvasExampleLabel'>
        <div class='offcanvas-header pt-4'>
            <h5 class='offcanvas-title' id='offcanvasExampleLabel'>
                <div class='d-flex ms-2 justify-content-center align-items-center'>
                    <img src='../asset/icon/tokaku_logo.svg' alt='TOKAKU' width='32' height='32' />
                    <span class='fs-4 ms-2 align-bottom'> Tokaku </span>
                </div>
            </h5>
            <button type='button' class='btn-close' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>
            <ul class='nav flex-column justify-content-center'>
                <li class='nav-item py-2 py-sm-0'>
                    <a href='#' class='nav-link'>
                        <i class='bi bi-house'></i>
                        <span class='fs-6 ms-2'> Dashboard </span>
                    </a>
                </li>
                <li class='nav-item py-2 py-sm-0 align-items-center'>
                    <a href='#' class='nav-link'>
                        <i class='bi bi-table'></i>
                        <span class='fs-6 ms-2 collapsed' id='transactions' data-bs-toggle='collapse'
                            data-bs-target='#dashboard-collapse'> Transactions </span>
                    </a>
                    <div class='collapse' id='dashboard-collapse'>
                        <ul class='btn-toggle-nav list-unstyled align-items-center'>
                            <li class='py-2 ms-3'>
                                <a href='transactions.php'>
                                    <i class='bi bi-card-text'></i>
                                    <small>Transactions</small>
                                </a>
                            </li>
                            <li class='py-2 ms-3'>
                                <a href='transaction-details.php'>
                                    <i class='bi bi-card-list'></i>
                                    <small>Transactions details</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class='nav-item py-2 py-sm-0'>
                    <a href='products.php' class='nav-link'>
                        <i class='bi bi-grid'></i>
                        <span class='fs-6 ms-2'> Products </span>
                    </a>
                </li>
                <li class='nav-item py-2 py-sm-0'>
                    <a href='users.php' class='nav-link'>
                        <i class='bi bi-person-circle'></i>
                        <span class='fs-6 ms-2'> Users </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>";
?>