<template>
  <li class="chat-user-list clearfix">
    <a href="#">
      <p
        class="p-l-10 col-xs-height col-middle col-xs-12 text-master float-left"
      >{{driver.fullname}}</p>
      <p class="ml-4 pay">
        <button class="btn btn-primary" @click.prevent="clickPay(driver)">Pay</button>
      </p>
    </a>
  </li>
</template>

<style>
.pay {
  position: relative;
  left: 52%;
}
</style>

<script>
export default {
  name: "Driver",
  props: ["driver"],
  methods: {
    clickPay(driver) {
      $("#modalFillIn").modal();
      this.$emit("driver", driver);
    }
  }
};
</script>

