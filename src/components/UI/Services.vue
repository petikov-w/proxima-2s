<template lang="pug">
.serv-box
    img(:src="services.img")
    .descr
      p {{ services.descr }}

</template>

<script>
export default {
  name: "uiServices",
  props: {
    services: {
      type: Object,
      required: true,
      // default: []
    },
  },
}
</script>

<style lang="scss" scoped>
  .serv-box {
    display: flex;
    align-items: center;
    margin-top: 50px;
    .descr {
      font-family: $font-OpenSans;
      @include font(16px, 600, 22px, #ffffff);
      margin-left: 10px;
      max-width: 189px;
      @media screen and (max-width: $phoneWidth) {
        width: 350px;
      }
    }
    img {
      height: 50px;
      width: 50px;
      margin-top: 10px;
    }
  }
</style>