<template lang="pug">
.wrapper-home
  .left-col
    .title Заправка баллонов техническим газом
    .subtitle Бесплатная доставка по Москве <br> и Московской области
    img(src="@/assets/images/btn_zakaz_gaz.png")
    .services-box
      div(v-for="(serv, index) in listServices" :key="index")
        services(:services="serv" v-if="isEven(index)" style="margin-right: 57px" )
        services(:services="serv" v-if="!isEven(index)")
  .middle-col
    .box-title
      .title Все виды технических газов
      img(src="@/assets/images/arc_arrow.png")
    .box-gaz
      img(src="@/assets/images/baloon_gaz.png")
      .info-gaz
       .formula-gaz Ar
       .title-gaz Аргон



</template>

<script>
import Services from "@/components/UI/Services";
import {contentServices} from "@/_config";

export default {
  name: "HomePage",
  components: {Services},
  setup() {
    const listServices = contentServices
    const isEven = number => number % 2 === 0 ? true : false
    return {listServices, isEven}
  }
}
</script>

<style lang="scss" scoped>

.wrapper-home {
  width: 1100px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  margin-top: -70px;
  //margin-bottom: -100px;
  .left-col {
    //max-width: 617px;
    max-width: 40vw;
    font-family: $font-RussoOne;
    font-weight: 400;
    text-align: left;
    margin-top: 15px;
    .title {
      @include font(48px, 400, 58px, #EF5221);
    }
    .subtitle {
      @include font(24px, 400, 29px, #ffffff);
      margin: 15px 0 27px;
    }
    img:hover {
      opacity: 0.8;
    }
    .services-box {
      display: flex;
      flex-wrap: wrap;
    }
  }

  .middle-col {
    //max-width: 558px;
    max-width: 60vw;
    font-family: $font-RussoOne;
    font-weight: 400;
    margin-top: 15px;
    //margin-left: -90px;


    .box-title {
      display: flex;
      justify-content: flex-start;
      margin-left: -120px;

      .title {
        //margin-left: -20px;
        @include font(24px, 400, 29px, #ffffff);
        //letter-spacing: 1.1px;
        //text-align: left;
      }
      img {
        position: absolute;
        right: 155px;
        margin-top: 5px;
        //width: 52px;
        //height: 65px;
        //margin-left: 20px;
      }
    }
    .box-gaz {
      display: flex;
      margin-top: 50px;
      img {
        //text-align: left;
        margin-left: -120px;
        height: 650px;
        width: 350px;
        //height: 696px;
        //width: 445px;
        object-fit: cover;
      }
      .info-gaz {
        display: flex;
        flex-direction: column;
        margin-left: 35px;

        .formula-gaz {
          font-family: $font-RussoOne;
          @include font(24px, 400, 29px, #2194FF);
          text-align: center;
        }

        .title-gaz {
          font-family: $font-OpenSans;
          @include font(13px, 400, 18px, #f1f1f1);
          text-align: center;
          text-transform: uppercase;
        }
      }
    }
  }
}
</style>