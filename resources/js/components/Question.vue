<template>
  <div class="col-md-6 padding-0">
    <div class="card card-transparent" @click="navigate(question)">
      <div class="card-body hvr-grow-shadow no-padding" style="cursor:pointer">
        <div id="card-advance" class="card card-default">
          <div class="card-body">
            <h3>
              <span class="semi-bold">{{question.name}}</span>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Question",
  props: ["question"],
  methods: {
    navigate(question) {
      this.$root.$emit("question", question);
      this.$router.push(question.url);
    }
  }
};
</script>
