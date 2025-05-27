<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo me-1">
          <span style="color: var(--bs-primary)">
            <img src="{{ asset('assets/img/books.png') }}" width="30" alt="">
          </span>
        </span>
        <span class="app-brand-text demo menu-text fw-semibold ms-2">Buku Tanahku</span>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->

      <li class="menu-item">
        <a
          href="{{ route('home') }}"
          class="menu-link">
          <i class="menu-icon tf-icons ri-home-smile-line"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>

      <!-- Buku Tanah Pages -->
      @if(auth()->user()->can('Create Peminjaman')||auth()->user()->can('Read Peminjaman')||auth()->user()->can('Update Peminjaman')||auth()->user()->can('Delete Peminjaman')||auth()->user()->can('Approval Peminjaman'))
      <li class="menu-item {{ (request()->is('peminjaman*') || request()->is('pengembalian*') ? 'open' : '')}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ri-book-shelf-fill"></i>
          <div data-i18n="Front Pages">Buku Tanah</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ (request()->is('peminjaman*')) ? 'active' : '' }}">
            <a
              href="{{ route('peminjaman_buku_tanah') }}" wire:navigate
              class="menu-link">
              <div data-i18n="Landing">Peminjaman</div>
            </a>
          </li>
          <li class="menu-item">
            <a
              href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/html/front-pages/pricing-page.html"
              class="menu-link">
              <div data-i18n="Pricing">Pengembalian</div>
            </a>
          </li>
        </ul>
      </li>
      @endcan
      @if(auth()->user()->can('Create User')||auth()->user()->can('Read User')||auth()->user()->can('Update User')||auth()->user()->can('Delete User')||auth()->user()->can('Create Role')||auth()->user()->can('Read Role')||auth()->user()->can('Update Role')||auth()->user()->can('Delete Role')||auth()->user()->can('Create Permission')||auth()->user()->can('Read Permission')||auth()->user()->can('Update Permission')||auth()->user()->can('Delete Permission'))
      <li class="menu-item {{ (request()->is('user*') || request()->is('role*') ? 'open' : '')}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ri-file-copy-line"></i>
          <div data-i18n="Front Pages">Data Master</div>
        </a>
        <ul class="menu-sub">
            @if(auth()->user()->can('Create User')||auth()->user()->can('Read User')||auth()->user()->can('Update User')||auth()->user()->can('Delete User'))
                <li class="menu-item {{ (request()->is('user*')) ? 'active' : '' }}">
                    <a
                    href="{{ route('user') }}" wire:navigate
                    class="menu-link">
                    <div data-i18n="Landing">User</div>
                    </a>
                </li>
            @endif
            @if (auth()->user()->can('Create Permission')||auth()->user()->can('Read Permission')||auth()->user()->can('Update Permission')||auth()->user()->can('Delete Permission'))

                <li class="menu-item {{ (request()->is('permission*')) ? 'active' : '' }}">
                    <a
                    href="{{ route('permission') }}" wire:navigate
                    class="menu-link">
                    <div data-i18n="Pricing">Permission</div>
                    </a>
                </li>
            @endif
            <li class="menu-item {{ (request()->is('hari_libur*')) ? 'active' : '' }}">
                <a
                href="{{ route('hari_libur') }}" wire:navigate
                class="menu-link">
                <div data-i18n="Landing">Hari Libur</div>
                </a>
            </li>
            @if(auth()->user()->can('Create Role')||auth()->user()->can('Read Role')||auth()->user()->can('Update Role')||auth()->user()->can('Delete Role'))
                <li class="menu-item {{ (request()->is('role*')) ? 'active' : '' }}">
                    <a
                    href="{{ route('role') }}" wire:navigate
                    class="menu-link">
                    <div data-i18n="Pricing">Role</div>
                    </a>
                </li>
            @endif
        </ul>
      </li>
      @endcan
    </ul>
</aside>
