<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Product - Shop Minimalist</title>
    <link rel="icon" type="image/png" sizes="1946x1946"
        href="assets/img/imported_images/logo-circle.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            id="sidebar-left">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="index.php"><img id="logo" class="border rounded-circle"
                        src="assets/img/imported_images/logo-circle.png" />
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span class="fs-6 brand-name icon-color brand-name-text">Shop
                            Minimalist <br />Admin</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link icon-color" href="index.php"><i
                                class="fas fa-tachometer-alt icon-color"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link active icon-color" href="product.php"><svg
                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="1em"
                                viewBox="0 0 24 24" width="1em" fill="currentColor" class="icon-color">
                                <rect fill="none" height="24" width="24"></rect>
                                <path
                                    d="M13,10h-2V8h2V10z M13,6h-2V1h2V6z M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18z M17,18 c-1.1,0-1.99,0.9-1.99,2s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z M8.1,13h7.45c0.75,0,1.41-0.41,1.75-1.03L21,4.96L19.25,4l-3.7,7 H8.53L4.27,2H1v2h2l3.6,7.59l-1.35,2.44C4.52,15.37,5.48,17,7,17h12v-2H7L8.1,13z">
                                </path>
                            </svg><span>Product</span></a><a class="nav-link icon-color" href="inventory.php"><i
                                class="far fa-list-alt icon-color"></i><span>Inventory List</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                    id="search-bar" placeholder="Search for ..."><button
                                    class="btn btn-primary py-0 icon-color" id="btn-search" type="button"><i
                                        class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="badge bg-danger badge-counter">3+</span><i
                                            class="fas fa-bell fa-fw icon-color"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header card-text" id="alert-bg">alerts center</h6><a
                                            class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i
                                                        class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i
                                                        class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i
                                                        class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your
                                                    account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="badge bg-danger badge-counter">7</span><i
                                            class="fas fa-envelope fa-fw icon-color card-text"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header card-text">alerts center</h6><a
                                            class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                        help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last
                                                        month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am
                                                        very happy with the progress so far, keep up the good
                                                        work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is
                                                        because someone told me that people say this to all dogs, even
                                                        if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                    aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small title-text"
                                            id="name">Andrea Canaliza Navarro</span><img
                                            class="border rounded-circle img-profile"
                                            src="assets/img/imported_images/female_profile.svg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="profile.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile</a><a
                                            class="dropdown-item" href="inventory.php"><i
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i> Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="login.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 title-page-text">Product</h3>
                </div>
                <form><!-- Start: 1 Row 3 Columns -->
                    <div class="container">
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-4"><select class="form-select">
                                    <optgroup label="Type">
                                        <option value="" selected="">-- Select Type --</option>
                                        <option value="side-table">Side Table</option>
                                        <option value="wooden-chair">Wooden Chair</option>
                                        <option value="bed-frame">Bed Frame</option>
                                        <option value="cabinet-wardrobe">Cabinets / Wardrobe</option>
                                        <option value="study-table">Study Table</option>
                                        <option value="dining-table">Dining Table</option>
                                    </optgroup>
                                </select></div>
                            <div class="col-md-4"><select class="form-select">
                                    <optgroup label="Model">
                                        <option value="" selected="">-- Select Year Model --</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </optgroup>
                                </select></div>
                            <div class="col-md-4"><select class="form-select">
                                    <optgroup label="Color">
                                        <option value="" selected="">-- Select Color -- </option>
                                        <option value="brown">Brown</option>
                                        <option value="white">White</option>
                                        <option value="black">Black</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div><!-- End: 1 Row 3 Columns --><!-- Start: 1 Row 3 Columns -->
                    <div class="container">
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-4"><input class="form-control" type="number" name="quantity" min="0"
                                    max="100" placeholder="-- Quantity --"></div>
                            <div class="col-md-4"><select class="form-select">
                                    <optgroup label="Status">
                                        <option value="" selected="">-- Select Status</option>
                                        <option value="new-arrival">New Arrival</option>
                                        <option value="restock">Restock</option>
                                        <option value="out-of-stock">Out of Stock</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div><!-- End: 1 Row 3 Columns -->
                    <div class="justify-content-xxl-start align-items-xxl-end"
                        style="display: flex;flex-direction: row-reverse;margin: 0px;margin-right: 25px;margin-top: 200px;margin-bottom: 25px;">
                        <input class="btn btn-primary btn-save title-page-text" type="submit"
                            style="position: relative;display: flex;"></div>
                </form>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="text-center my-auto copyright"><span class="copyright-text"><a
                            href="https://www.instagram.com/_shopminimalist/" target="_blank"><svg
                                class="bi bi-instagram socmed-icon" xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a><a href="https://www.facebook.com/shopminimalist" target="_blank"><svg
                                class="bi bi-facebook socmed-icon" xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                </path>
                            </svg>
                        </a>
                    </span></div>
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span class="copyright-text">Copyright © Shop Minimalist
                            2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>