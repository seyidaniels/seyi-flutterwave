<template>
  <slide-x-right-transition :duration="1200">
    <div class="lock-container full-height">
      <div class="full-height sm-p-t-50 align-items-center d-md-flex">
        <div class="row justify-content-center full-width fw-banner mt-4">
          <h4 class="text-bold" style="    font-weight: 500;
">Flutterwave Technical Test 2019</h4>
          <div class>
            <div class="d-flex justify-content-start align-items-center">
              <div class>
                <div class="thumbnail-wrapper circular d48 m-r-10">
                  <img
                    width="43"
                    height="43"
                    data-src-retina="assets/img/profiles/avatar_small2x.jpg"
                    data-src="assets/img/profiles/avatar.jpg"
                    alt
                    src="assets\img\seyi.jpg"
                  >
                </div>
              </div>
              <div class>
                <h2 class="name no-margin text-white">Seyi Daniels</h2>
                <h5
                  class="logged hint-text no-margin text-white"
                >Intending Software Dev at Flutterwave</h5>
              </div>
            </div>
          </div>

          <div class="row mt-4 full-width">
            <question v-for="(question, index) in questions" :key="index" :question="question"></question>
          </div>
        </div>
      </div>
    </div>
  </slide-x-right-transition>
</template>

  <style>
.padding-0 {
  padding-right: 0;
  padding-left: 0;
}

.fw-banner {
  border: 5px;
  height: 500px;
  width: 600px;
  background: #eca644;
  padding: 80px 45px 80px 45px;
  border-radius: 10px;
  color: white;
}

.logo {
  height: 25px;
}

body {
  background: #151128;
}
</style>

<script>
import { questions } from "./../utils/questions";
import Question from "./../components/Question";
export default {
  name: "Index",
  components: {
    question: Question
  },
  data: function() {
    return {
      questions: []
    };
  },
  mounted() {
    this.questions = questions;
  },
  methods: {}
};
</script>

