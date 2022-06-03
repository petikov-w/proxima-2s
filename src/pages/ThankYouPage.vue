<template lang="pug">
.wrapper-thank
  .thenk
      .title Спасибо за обращение
      .subtitle  наш специалист свяжется с вами в ближайшее время
      img(src="@/assets/images/btn_back_to_the_site.png" @click="back_to_main")

</template>

<script>
import $router from "@/routes";

export default {
  name: "ThankYouPage",
  setup() {
    const back_to_main = () => {$router.push('/')};
    return {back_to_main}
  }
}
</script>

<style lang="scss" scoped>
.wrapper-thank {
  width: 1100px;
  margin: 0 auto;
  min-height: 80vh;
  font-family: $font-RussoOne;
  text-transform: uppercase;
  .thenk {
    display: flex;
    flex-direction: column;
    align-items: center;
    .title {
      margin-top: 20vh;
      @include font(48px, 400, 58px, #EF5221);
    }
    .subtitle {
      @include font(24px, 400, 28px, #FFFFFF);
      letter-spacing: 1.1px;
      max-width: 415px;
      margin: 25px 0 50px;
      text-align: center;
    }
    img {
      width: 38%;
    }
  }
  //display: flex;
  //justify-content: space-between;
}
  //@media screen and (max-width: $phoneWidth) {
  //  flex-direction: column;
  //  width: 380px;
  //}
</style>