<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Language Flags -->
            <!-- <li class="nav-item lh-1 me-3 d-flex align-items-center">
                <a href="?lang=kh" style="color: black" class="d-flex align-items-center">
                    <img class="rounded" width="40px" src="<?php echo BASE_URL; ?>public/assets/img/icons/kh.png" alt="Khmer Flag">
                    <p class="mb-0 ms-2">ភាសាខ្មែរ</p>
                </a>
            </li>
            <li class="nav-item lh-1 me-3 d-flex align-items-center">
                <a href="?lang=en" style="color: black" class="d-flex align-items-center">
                    <img class="rounded" width="40px" src="<?php echo BASE_URL; ?>public/assets/img/icons/en.png" alt="English Flag">
                    <p class="mb-0 ms-2">English</p>
                </a>
            </li> -->
            <!-- Language Feature -->
            <li class="nav-item lh-1 me-3 d-flex align-items-center">
                <?php if ($lang_df === 'en'): ?>
                    <a href="?lang=kh" style="color: black" class="d-flex align-items-center">
                        <img class="rounded" width="40px" src="<?php echo BASE_URL; ?>public/assets/img/icons/kh.png" alt="Khmer Flag">
                        <p class="mb-0 ms-2">ភាសាខ្មែរ</p>
                    </a>
                <?php elseif ($lang_df === 'kh'): ?>
                    <a href="?lang=en" style="color: black" class="d-flex align-items-center">
                        <img class="rounded" width="40px" src="<?php echo BASE_URL; ?>public/assets/img/icons/en.png" alt="English Flag">
                        <p class="mb-0 ms-2">English</p>
                    </a>
                <?php endif; ?>
            </li>
            <!-- Notifications -->
            <li class="nav-item lh-1 me-3">
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-message-dots'></i>
                    </button>
                    <ul class="dropdown-menu">
                        <p class="title dropdown-item" >Notifications</p>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <?php
                            if(isset($_SESSION['ImageName'])){
                                ?>
                                    <img src="<?php echo BASE_URL; ?>public/uploads/img/<?php echo $_SESSION['ImageName']; ?>" alt class="w-px-30 h-auto rounded" />
                                <?php
                            }else{
                                ?>
                                <img src="<?php echo BASE_URL; ?>public/assets/img/logo/logo-3.png" alt class="w-px-40 h-auto rounded-circle" />
                                <?php
                            }
                        ?>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="avatar">
                                    <?php
                                        if(isset($_SESSION['ImageName'])){
                                            ?>
                                                <img src="<?php echo BASE_URL; ?>public/uploads/img/<?php echo $_SESSION['ImageName']; ?>" alt class="w-px-30 h-auto rounded" />
                                            <?php
                                        }else{
                                            ?>
                                            <img src="<?php echo BASE_URL; ?>public/assets/img/logo/logo-3.png" alt class="w-px-40 h-auto rounded-circle" />
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="fw-semibold d-block"><?php echo $_SESSION['Username'] ?></span>
                                    <small class="text-muted"><?php echo  $_SESSION['UserTypeName']  ?></small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                <span class="flex-grow-1 align-middle">Billing</span>
                                <span
                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal"
                            href="javascript:void(0);">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal"
                            href="javascript:void(0);">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a> -->
            <!--/ User -->
        </ul>
    </div>
</nav>
<div class="mt-3">
    <div class="modal fade" id="logoutModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Ready to Leave?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr />
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <hr />
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a class="btn btn-sm btn-danger" href="<?php echo BASE_URL; ?>views/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>