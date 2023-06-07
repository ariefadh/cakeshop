<nav class="navbar navbar-expand-md">
  <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="container-xl">
        <ul class="navbar-nav nav-fill">

          <li class="nav-item <?php if ($page === 'home') echo 'active'; ?>">
            <a class="nav-link" href="../home/" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
              </span>
              <span class="nav-link-title">
                Home
              </span>
            </a>
          </li>

          <li class="nav-item <?php if ($page === 'produk') echo 'active'; ?>">
            <a class="nav-link " href="../produk/" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                  <path d="M2 13.5v5.5l5 3"></path>
                  <path d="M7 16.545l5 -3.03"></path>
                  <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"></path>
                  <path d="M12 19l5 3"></path>
                  <path d="M17 16.5l5 -3"></path>
                  <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5"></path>
                  <path d="M7 5.03v5.455"></path>
                  <path d="M12 8l5 -3"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Produk
              </span>
            </a>
          </li>

          <li class="nav-item <?php if ($page === 'transaksi') echo 'active'; ?>">
            <a class="nav-link" href="../transaksi/" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                  <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                  <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                Transaksi
              </span>
            </a>
          </li>

          <li class="nav-item <?php if ($page === 'akun') echo 'active'; ?>">
            <a class="nav-link" href="../akun/" >
              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
              </span>
              <span class="nav-link-title">
                User
              </span>
            </a>
          </li>

        </ul>
      </div>
  </div>
</nav>