<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-6 mx-4">
        <!-- Login -->
        <div class="card p-7">
          <!-- Logo -->
          <div class="app-brand justify-content-center mt-5">
            <a href="#" class="app-brand-link gap-3">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/books.png') }}" width="30" alt="">
              </span>
              <span class="app-brand-text demo text-heading fw-semibold">Buku Tanahku</span>
            </a>
          </div>
          <!-- /Logo -->

          <div class="card-body mt-1">
            <h4 class="mb-1">Selamat Datang Kembali 👋🏻</h4>
            <p class="mb-5">Silahkan masuk untuk mengelola data peminjaman dan pengembalian buku tanah</p>

            <form id="formAuthentication" class="mb-5" wire:submit.prevent="authentication" method="POST">
              <div class="form-floating form-floating-outline mb-5">
                <input
                  wire:model ="username"
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Masukkan username"
                  autofocus />
                <label for="username">Username</label>
              </div>
              <div class="mb-5">
                <div class="form-password-toggle">
                  <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                      <input
                        wire:model ="password"
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                      <label for="password">Password</label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
                  </div>
                </div>
              </div>
              {{-- <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
                <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                  <span>Forgot Password?</span>
                </a>
              </div> --}}
              <div class="mb-5">
                <button class="btn btn-primary d-grid w-100" type="submit">login</button>
              </div>
            </form>

            {{-- <p class="text-center mb-5">
              <span>New on our platform?</span>
              <a href="auth-register-basic.html">
                <span>Create an account</span>
              </a>
            </p> --}}
          </div>
        </div>
        <!-- /Login -->
        <img
        width="32%"
          src="{{ asset('assets/img/illustrations/4.png') }}"
          alt="auth-tree"
          class="authentication-image-object-left d-none d-lg-block" />
        <img
          src="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}"
          class="authentication-image d-none d-lg-block"
          height="172"
          alt="triangle-bg"
          data-app-light-img="illustrations/auth-basic-mask-light.png"
          data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
        <img
        width="33%"
          src="{{ asset('assets/img/illustrations/8.png') }}"
          alt="auth-tree"
          class="authentication-image-object-right d-none d-lg-block" />
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('swal', (event) => {
                const data = event;
                Swal.fire({
                    icon    : data[0]['icon'],
                    title   : data[0]['title'],
                    text    : data[0]['text']
                });
            });
        });
    </script>
