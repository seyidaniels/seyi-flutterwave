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
              <div
                id="tab1"
                v-if="!bvn_details"
                class="tab-pane padding-20 sm-no-padding slide-left active show"
              >
                <div class="row row-same-height">
                  <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                      <i class="fa fa-shopping-cart fa-2x hint-text"></i>
                      <h2>{{question.name}}</h2>
                      <p class="text-justify">{{question.about}}</p>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="padding-30 sm-padding-5">
                      <div class="row">
                        <div class="col-lg-7 col-md-6">
                          <div class="form-group">
                            <label for="bvn_number">Enter your BVN Number</label>
                            <input
                              type="number"
                              v-model="bvn_number"
                              class="form-control big-input"
                            >
                          </div>

                          <div class="form-group">
                            <label for="bvn_surname">Enter your Surname</label>
                            <input type="text" v-model="bvn_surname" class="form-control big-input">
                          </div>

                          <div class="form-group">
                            <button
                              @click="checkBvn"
                              :disabled="disable"
                              class="btn btn-primary btn-lg"
                            >Check</button>
                            <button
                              @click="bvn_number = ''"
                              :disabled="disable"
                              class="btn float-right btn-default btn-lg"
                            >Clear</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </div>

            <transition name="fade">
              <div
                v-if="bvn_details"
                id="tab2"
                class="tab-pane padding-20 sm-no-padding slide-left active show"
                style="background: white;"
              >
                <div class="row row-same-height">
                  <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                      <i class="fa fa-shopping-cart fa-2x hint-text"></i>
                      <h2>{{question.name}}</h2>
                      <p>{{question.about}}</p>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class>
                      <div class="row justify-content-center">
                        <div
                          id="form-register"
                          role="form"
                          novalidate="novalidate"
                          style="width: 90%"
                        >
                          <div class="row justify-content-center">
                            <p class="lead">Bvn Number: {{bvn_details.bvn}}</p>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group form-group-default has-error">
                                <label>First Name</label>
                                <input
                                  type="text"
                                  name="fname"
                                  placeholder="John"
                                  class="form-control error"
                                  v-model="bvn_details.first_name"
                                  required
                                  readonly
                                >
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group form-group-default has-error">
                                <label>Last Name</label>
                                <input
                                  type="text"
                                  name="lname"
                                  placeholder="Smith"
                                  class="form-control error"
                                  v-model="bvn_details.last_name"
                                  required
                                  readonly
                                >
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group form-group-default has-error">
                                <label>Middle Name</label>
                                <input
                                  type="text"
                                  name="lname"
                                  placeholder="Smith"
                                  class="form-control error"
                                  v-model="bvn_details.middle_name"
                                  required
                                  readonly
                                >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Bank Name</label>
                                <input
                                  type="text"
                                  name="uname"
                                  class="form-control"
                                  required
                                  v-model="bvn_details.bank.name"
                                  readonly
                                  aria-required="true"
                                >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Bank Branch</label>
                                <input
                                  type="text"
                                  name="uname"
                                  class="form-control"
                                  required
                                  v-model="bvn_details.enrollment_branch"
                                  readonly
                                  aria-required="true"
                                >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default">
                                <label>Date of Birth</label>
                                <input
                                  type="text"
                                  placeholder="Minimum of 4 Charactors"
                                  class="form-control"
                                  required
                                  v-model="bvn_details.date_of_birth"
                                  aria-required="true"
                                  readonly
                                >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default">
                                <label>Phone Number</label>
                                <input
                                  type="phone"
                                  name="phone"
                                  class="form-control"
                                  required
                                  v-model="bvn_details.phone_number"
                                  readonly
                                  aria-required="true"
                                >
                              </div>
                            </div>
                          </div>
                          <button @click="proceed()" class="btn btn-primary btn-cons m-t-10">Proceed</button>
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </transition>
            <div class="wizard-footer padding-20 bg-master-light">
              <p class="small hint-text pull-left no-margin">
                The Top Content Is Soley Created using pages UI Elements such as Invoice, Tabs, Form
                Layouts etc. and are prior for representation Purpose Only.
              </p>
              <div class="pull-right">
                <img
                  src="assets/img/FLW-logo.svg"
                  alt="logo"
                  data-src="assets/img/logo.png"
                  data-src-retina="assets/img/FLW-logo.svg"
                  width="78"
                  height="22"
                >
              </div>
              <div class="clearfix"></div>
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

<style>
</style>



<script>
import { questions } from "../utils/questions";
import { banks } from "../utils/banks";
import handleError from "../utils/error";
import LoadingVue from "../components/Loading.vue";
export default {
  name: "BvnValidation",
  data: function() {
    return {
      question: "",
      bvn_number: "",
      bvn_surname: "",
      showLoading: false,
      disable: false,
      bvn_details: false
    };
  },
  components: {
    loading: LoadingVue
  },
  mounted() {
    this.question = questions[0];
  },
  methods: {
    checkBvn() {
      this.disable = true;
      NProgress.start();
      axios
        .post("/api/get-bvn", {
          bvn_number: this.bvn_number,
          bvn_surname: this.bvn_surname
        })
        .then(response => {
          if (response.status == 200) {
            if (response.data.success) {
              this.bvn_details = response.data.bvn_details;
              toastr.success(response.data.message);
              this.bvn_details.bank = this.getBank(
                this.bvn_details.enrollment_bank
              );
            } else {
              toastr.warning(response.data.message);
            }
          }
          NProgress.done();
          this.disable = false;
        })
        .catch(error => {
          NProgress.done();
          this.disable = false;
          handleError(error);
        });
    },
    getBank(bank_code) {
      return banks.find(bank => bank.code == bank_code);
    },
    proceed() {
      $("#modalSlideUpSmall").modal();
    },
    back() {
      this.$router.push("/");
    }
  }
};
</script>

