<!--**********************************
    Sidebar start
***********************************-->
        <div class="dlabnav">
          <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
              <li><a href="admin" class="" aria-expanded="false">
                <i class="fas fa-home"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>
                  {{-- Category --}}
                  <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-list"></i>
                        <span class="nav-text">Category Option</span>
                      </a>
                        <ul aria-expanded="false">
                          <li><a href="category">Category</a></li>
                          <li><a href="category.create">Add Category</a></li>
                        </ul>
                  </li>
                   {{-- Product --}}
                   <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-tag"></i>
                        <span class="nav-text">Product Option</span>
                      </a>
                        <ul aria-expanded="false">
                          <li><a href="productad">Product</a></li>
                          <li><a href="product.create">Add Product</a></li>
                        </ul>
                  </li>
                  {{-- Shipping  --}}
                  <li><a href="{{ route('admin.shipping') }}" class="" aria-expanded="false">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span class="nav-text">Shipping</span>
                  </a>
                </li>
                  {{-- Order --}}
                  <li><a href="{{ route('order_index') }}" class="" aria-expanded="false">
                    <i class="fa-solid fa-square-check"></i>
                    <span class="nav-text">Order</span>
                  </a>
                </li>
                  {{-- Blog --}}
                  <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-pen-to-square"></i>
                        <span class="nav-text">Blog Option</span>
                      </a>
                        <ul aria-expanded="false">
                          <li><a href="blogad">Blog</a></li>
                          <li><a href="blog.create">Add Blog</a></li>
                        </ul>
                  </li>
                  {{-- User --}}
                  <li><a href="{{ route('admin.accounts') }}" class="" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">User</span>
                  </a>
                </li>

      <div class="side-bar-profile">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="side-bar-profile-img">
            <img src="images/user.jpg" alt="">
          </div>
          <div class="profile-info1">
            <h4 class="fs-18 font-w500">Soeng Souy</h4>
            <span>example@mail.com</span>
          </div>
          <div class="profile-button">
            <i class="fas fa-caret-down scale5 text-light"></i>
          </div>
        </div>	
        <div class="d-flex justify-content-between mb-2 progress-info">
          <span class="fs-12"><i class="fas fa-star text-orange me-2"></i>Task Progress</span>
          <span class="fs-12">20/45</span>
        </div>
        <div class="progress default-progress">
          <div class="progress-bar bg-gradientf progress-animated" style="width: 45%; height:10px;" role="progressbar">
            <span class="sr-only">45% Complete</span>
          </div>
        </div>
      </div>
      
      <div class="copyright">
        <p><strong>Fillow Saas Admin</strong> © 2021 All Rights Reserved</p>
        <p class="fs-12">Made with <span class="heart"></span> by DexignLabs</p>
      </div>
    </div>
      </div>
      <!--**********************************
          Sidebar end
      ***********************************-->