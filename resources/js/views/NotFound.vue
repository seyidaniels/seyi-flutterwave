<template>
  <div class="page-container">
    <div class="page-content-wrapper">
      <div class="content">
        <div class="container container-fixed-lg">
          <div class="row justify-content-center" style="    height: 50vh;
    background: white;">
            <div class="col-12 col-lg-10 col-xl-8">
              <!-- Image -->
              <div class="text-center">
                <img src="assets/img/lost.svg" alt="..." class="img-fluid">
              </div>
            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
              <div class="text-center">
                <!-- Preheading -->
                <h6 class="text-uppercase text-muted mb-4">404 error</h6>

                <!-- Heading -->
                <h1 class="display-4 mb-3">There’s no page here 😭</h1>

                <!-- Subheading -->
                <p class="text-muted mb-4">Looks like you ended up here by accident?</p>

                <!-- Button -->
                <a href="/" class="btn btn-lg btn-primary">Return Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade slide-up disable-scroll"
      id="modalSlideUpSmall"
      tabindex="-1"
      role="dialog"
      aria-hidden="false"
    >
      <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-body text-center m-t-20">
              <h4 class="no-margin p-b-10">You have subscribed</h4>
              <button type="button" class="btn btn-primary btn-cons" data-dismiss="modal">Continue</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
