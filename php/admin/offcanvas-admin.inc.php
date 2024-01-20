<?php
echo"<!-- offcanvas -->
<div class='offcanvas offcanvas-start w-50' tabindex='-1' id='offcanvasExample'
    aria-labelledby='offcanvasExampleLabel'>
    <div class='offcanvas-header pt-4'>
        <h5 class='offcanvas-title' id='offcanvasExampleLabel'>
            <div class='d-flex ms-2 justify-content-center align-items-center'>
                <img src='../../asset/img/icon/tokaku_logo.svg' alt='TOKAKU' width='32' height='32' />
                <span class='fs-4 ms-2 align-bottom'> Tokaku </span>
            </div>
        </h5>
        <button type='button' class='btn-close' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <ul class='nav nav-pills flex-column justify-content-center mt-3'>
            <li class='nav-item py-3 py-sm-0'>
                <a href='dashboard.php' class='nav-link'>
                    <i class='bi bi-house'></i>
                    <span class='fs-6 ms-2'> Dashboard </span>
                </a>
            </li>
            <li class='nav-item py-3 py-sm-0 align-items-center'>
                <a href='#' class='nav-link animate collapsed' id='transactions' data-bs-toggle='collapse'
                    data-bs-target='#transaction-collapse'>
                    <i class='bi bi-table'></i>
                    <span class='fs-6 ms-2'> Transactions </span>
                </a>
                <div class='collapse' id='transaction-collapse'>
                    <ul class='btn-toggle-nav list-unstyled'>
                        <li class=''>
                            <a href='transactions.php' class='nav-link'>
                                <i class='bi bi-dot icon'></i>
                                <span>Transactions</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='transaction-details.php' class='nav-link'>
                                <i class='bi bi-dot icon'></i>
                                <span>Transactions Details</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='cart.php' class='nav-link'>
                                <i class='bi bi-dot icon'></i>
                                <span>Cart</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item py-3 py-sm-0 align-items-center'>
                <a href='#' class='nav-link animate collapsed' id='products' data-bs-toggle='collapse'
                    data-bs-target='#product-collapse'>
                    <i class='bi bi-grid'></i>
                    <span class='fs-6 ms-2'> Products </span>
                </a>
                <div class='collapse' id='product-collapse'>
                    <ul class='btn-toggle-nav list-unstyled align-items-center'>
                        <li class=''>
                            <a href='products.php' class='nav-link'>
                                <i class='bi bi-dot icon'></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='products-category.php' class='nav-link'>
                                <i class='bi bi-dot icon'></i>
                                <span>Categories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item py-3 py-sm-0'>
                <a href='users.php' class='nav-link'>
                    <i class='bi bi-person-circle'></i>
                    <span class='fs-6 ms-2'> Users </span>
                </a>
            </li>
        </ul>
    </div>
</div>";
?>