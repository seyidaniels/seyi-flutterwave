<template>
  <div class="page-container">
    <loading :showLoading="showLoading"></loading>
    <div class="page-content-wrapper">
      <div class="content">
        <div class="container container-fixed-lg">
          <div id="rootwizard" class="m-t-50">
            <ul
              role="tablist"
              data-init-reponsive-tabs="dropdownfx"
              class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm d-none d-md-flex d-lg-flex d-xl-flex"
            ></ul>
            <div class="tab-content">
              <div class="pull-left">
                <img
                  src="assets/img/FLW-logo.svg"
                  alt="logo"
                  data-src="assets/img/logo.png"
                  data-src-retina="assets/img/FLW-logo.svg"
                  width="78"
                  height="22"
                >
              </div>
            </div>

            <transition name="fade">
              <div
                id="tab2"
                class="tab-pane padding-20 sm-no-padding slide-left active show"
                style="background: white;"
              >
                <div class="row row-same-height">
                  <div class="col-md-7 b-r b-dashed b-grey sm-b-b">
                    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                      <i class="fa fa-shopping-cart fa-2x hint-text"></i>
                      <h2>{{question.name}}</h2>
                      <p>{{question.about}}</p>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <br>
                    <div class="card card-transparent">
                      <div class="card-body no-padding">
                        <div class="view bg-white">
                          <div class="list-view boreded no-top-border" v-if="subaccounts">
                            <slide-y-up-transition :duration="600" :delay="300">
                              <div class="list-view-group-container">
                                <h5>Registered UBER Drivers</h5>
                                <ul class="drivers-slide">
                                  <driver
                                    @driver="onClickDriver"
                                    v-for="(driver, index) in subaccounts"
                                    :key="index"
                                    :driver="driver"
                                  ></driver>
                                </ul>
                              </div>
                            </slide-y-up-transition>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </transition>

            <foot></foot>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade fill-in" id="modalFillIn" tabindex="-1" role="dialog" aria-hidden="true">
      <button type="button" class="close" @click="closeModal" aria-hidden="true">
        <i class="pg-close"></i>
      </button>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-left p-b-5">
              <span class="semi-bold">Pay</span>
              {{driver.fullname}} ?
            </h5>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-lg-12 form-group">
                <input
                  type="email"
                  placeholder="enter email"
                  class="form-control input-lg"
                  id="icon-filter"
                  name="icon-filter"
                  v-model="email"
                >
              </div>
              <div class="col-lg-12 form-group">
                <input
                  type="number"
                  placeholder="enter amount"
                  class="form-control input-lg"
                  id="icon-filter"
                  name="icon-filter"
                  v-model="amount"
                >
              </div>
              <div class="col-lg-12 form-group">
                <div class="row justify-content-center">
                  <div class="float-right">
                    <button
                      type="button"
                      @click="payWithRave"
                      class="btn btn-primary btn-lg btn-large fs-15"
                    >Proceed</button>
                  </div>
                </div>
              </div>
            </div>
            <slide-y-down-transition :duration="1000">
              <div class="row justify-content-center" v-if="amount">
                <h5
                  class="lead mt-4"
                >You are paying {{Number(amount).toFixed(2)}}, Uber gets {{Number(driver.split_value * amount).toFixed(2)}}, and {{driver.fullname}} gets {{Number((1 - driver.split_value) * amount).toFixed(2) }}</h5>
              </div>
            </slide-y-down-transition>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { questions } from "../utils/questions";
import { banks } from "../utils/banks";
import handleError from "../utils/error";
import LoadingVue from "../components/Loading.vue";
import Footer from "../components/Footer";
import Driver from "../components/Driver";
export default {
  name: "BvnValidation",
  data: function() {
    return {
      question: "",
      drivers: "",
      showLoading: false,
      subaccounts: false,
      driver: "",
      amount: false,
      email: "",
      API_publicKey: "FLWPUBK-d54375291004a7e8669be8134aa5f71e-X",
      date: new Date().getTime()
    };
  },
  components: {
    loading: LoadingVue,
    driver: Driver,
    foot: Footer
  },
  created() {
    this.loadRaveScript();
  },
  mounted() {
    this.question = questions[1];
    // It gets the List of Drivers
    this.getDrivers();
  },
  methods: {
    loadRaveScript() {
      let rave = document.createElement("script");
      rave.setAttribute(
        "src",
        "https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"
      );
      document.head.appendChild(rave);
    },
    getDrivers() {
      this.showLoading = !this.showLoading;
      NProgress.start();

      axios
        .get("/api/get-subaccounts")
        .then(response => {
          if (response.status == 200) {
            let data = response.data;
            this.subaccounts = data.data.subaccounts;
            this.showLoading = !this.showLoading;
            NProgress.done();
          }
        })
        .catch(error => {
          toastr.error("Ooops! An Error occured");
          // Show Error Page as a Component
        });
    },
    getBank(bank_code) {
      return banks.find(bank => bank.code == bank_code);
    },
    onClickDriver(driver) {
      this.driver = driver;
    },
    closeModal() {
      this.amount = false;
      this.email = false;
      $("#modalFillIn").modal("hide");
    },
    payWithRave() {
      let amount = this.amount;
      let email = this.email;
      this.closeModal();
      var x = getpaidSetup({
        PBFPubKey: this.API_publicKey,
        customer_email: email,
        amount: amount,
        currency: "NGN",
        txref: `rave-${this.date}`,
        subaccounts: [
          {
            id: this.driver.subaccount_id
          }
        ],
        meta: [
          {
            metaname: "flightID",
            metavalue: "AP1234"
          }
        ],
        onclose: function() {},
        callback: function(response) {
          var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
          console.log("This is the response returned after a charge", response);
          if (
            response.tx.chargeResponseCode == "00" ||
            response.tx.chargeResponseCode == "0"
          ) {
            // redirect to a success page
            toastr.success("Transaction Successful");
            this.closeModal();
          } else {
            // redirect to a failure page.
            toastr.error("Transaction Failed");
          }

          x.close(); // use this to close the modal immediately after payment.
        }
      });
    }
  }
};
</script>

