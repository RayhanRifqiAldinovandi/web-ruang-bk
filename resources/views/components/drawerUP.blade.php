<div class="drawer w-screen font-customFont">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="navbar w-full bg-orange-500">
        <div class="flex-none lg:hidden">
          <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              class="inline-block h-6 w-6 stroke-current">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </label>
        </div>
        <div class="mx-2 flex-1 px-2  text-base-100"><a href="/">Web Bimbingan Konseling SMAN 3 Tarakan</a></div>
        <div class="hidden flex-none lg:block">
          <ul class="menu menu-horizontal">
            <!-- Navbar menu content here -->
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn m-1">Database</div>
              <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li><a href="/siswa">Siswa</a></li>
                <li><a href="/kelas">Kelas</a></li>
              </ul>
            </div>
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn m-1">RPL</div>
              <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li><a href="/rpl-bulanan">RPL Bulanan</a></li>
                <li><a href="/rpl-konseling-individu">RPL Konseling Individu</a></li>
                <li><a href="/laporan-konseling-individu">Laporan Konseling Individu</a></li>
                <li><a href="/rpl-konseling-kelompok">RPL Konseling Kelompok</a></li>
              </ul>
            </div>
            @auth
            <div class=" ">
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 btn border-red-500 hover:border-red-600 z-[1] w-36 h-12 mt-1 mx-1 p-2 shadow text-white">Logout</button>
              </form>
            </div>
            @endauth
          </ul>
        </div>
      </div>