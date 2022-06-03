<template lang="pug">
mixin formula_1e(elm,number)
 div(class= "formula-gaz")= elm
  span(class= "under")= number

mixin formula_2e(elm1,number1,elm2,number2)
  div(class= "formula-gaz")= elm1
    if number1
      span(class= "under")= number1
    else
      span(class= "under-n")= number1
    span(class= "formula-gaz")= elm2
    if number2
      span(class= "under")= number2

Dialog(v-model:show="dialogVisible")
  form(class="note-form" @submit.prevent="onSubmit")
    .header-title
      .form-title Получите расчет стоимости доставки
      .close-form(@click="hiddenDialogCloseBtn") &#10005
    input(
      required
      v-model="in_name"
      placeholder="Имя")
    input(
      required
      v-model="in_telefon"
      placeholder="Телефон")
    //button(class="btn btn-primary btnm" type="submit") Отправить
    img(src="@/assets/images/btn_zakaz_gaz.png" @click="hiddenDialog")

.wrapper-home
  .left-col
    .title Заправка баллонов техническим газом
    .subtitle
      p Бесплатная доставка по Москве <br> и Московской области
    img(src="@/assets/images/btn_zakaz_gaz.png" @click="showDialog")
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
       .formula-gaz(style="margin-top: 10px;") Ar
       .title-gaz Аргон
       +formula_1e('N','2')
       .title-gaz Азот
       +formula_1e('O','2')
       .title-gaz Кислород
       +formula_2e('CF','3','CFH','2')
       .title-gaz Фреон
       +formula_2e('C','3','H','8')
       .title-gaz Пропан
       +formula_2e('C','','O','2')
       .title-gaz Углекислота
       +formula_2e('Ar+ ','','CO','2')
       .title-gaz Сварочные смеси


// - var s2 = "<span style='font-size: 16px; vertical-align: sub; margin: 0 3px;'>2</span>";
// - var s2 = "<span class='under'>2</span>";
//.formula-gaz CF!{s3}CFH!{s2}
//.formula-gaz O!{s2}
</template>

<script>
import Services from "@/components/UI/Services";
import Dialog from "@/components/UI/Dialog";
import {contentServices} from "@/_config";
import {ref} from "vue"
import $router from "@/routes";

export default {
  name: "HomePage",
  components: {Services, Dialog},
  setup() {
    const listServices = contentServices
    const isEven = number => number % 2 === 0 ? true : false
    let in_name = ref("")
    let in_telefon = ref("")
    // let close = ref(false)
    const dialogVisible = ref(false)
    const showDialog = () => {dialogVisible.value=true}
    const hiddenDialogCloseBtn = () => {dialogVisible.value=false;}
    const hiddenDialog = () => {dialogVisible.value=false;
                                $router.push('/thankyou')
    }

    return {listServices,
            isEven,
            in_name,
            in_telefon,
            dialogVisible,
            showDialog,
            hiddenDialog,
            hiddenDialogCloseBtn}

  }
}
</script>

<style lang="scss" scoped>

::placeholder {
  text-transform: uppercase;
  font-family: $font-OpenSans;
  @include font(12px, 400, 16px, #2D2D2D80);
}
.header-title {
  display: flex;
  justify-content: space-between;
  //align-items: center;
  width: 380px;
  //text-align: center;
  .form-title {
    font-family: $font-RussoOne;
    @include font(20px, 400, 24px, #EF5221);
    letter-spacing: 1.1px;
    text-transform: uppercase;
    max-width: 280px;
    margin: 10px 0 25px 0;
    //text-align: center;
  }
  .close-form {
    @include font(34px, 500, 42px, #EF5221);
    cursor: pointer;
  }
}

.note-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 15px;
  img {
    width: 85%;
    margin-bottom: 25px;
    margin-top: 15px;
  }
  input {
    width: 400px;
    height: 50px;
    border-radius: 10px;
    padding: 10px 10px;
    margin: 5px 17px 25px;
    color: #EF5221;

  }
}
.under {
  font-size: 16px;
  vertical-align: sub;
  margin: 0 3px;
}
.under-n {
  margin: 0!important;
}

.wrapper-home {
  width: 1100px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  //margin-top: -70px;
  //margin-bottom: -100px;
  @media screen and (max-width: $phoneWidth) {
   flex-direction: column;
    width: 380px;
  }
  .left-col {
    //max-width: 617px;
    max-width: 40vw;
    font-family: $font-RussoOne;
    font-weight: 400;
    text-align: left;
    margin-top: 15px;
    .title {
      @include font(48px, 400, 58px, #EF5221);
      width: 500px;
      @media screen and (max-width: $phoneWidth) {
        @include font(36px, 400, 44px, #EF5221);
        max-width: 360px;
        text-align: center;
        margin-left: -10px;
      }
    }
    .subtitle {
      @include font(24px, 400, 29px, #ffffff);
      margin: 15px 0 27px;
      p{
        @media screen and (max-width: $phoneWidth) {
          @include font(20px, 400, 24px, #ffffff);
          max-width: 390px;
          text-align: center;
      }
      }
    }
    img {
      z-index: 1;
      @media screen and (max-width: $phoneWidth) {
        max-width: 190%;
        margin-left: 20px;
      }
    }
    img:hover {
      opacity: 0.8;
    }
    .services-box {
      display: flex;
      flex-wrap: wrap;
      @media screen and (max-width: $phoneWidth) {
        margin-left: 30px;
        //text-align: center;
      }
    }
  }

  .middle-col {
    //max-width: 558px;
    max-width: 60vw;
    font-family: $font-RussoOne;
    font-weight: 400;
    margin-top: 15px;
    margin-left: -150px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    @media screen and (max-width: $phoneWidth) {
      margin-left: 0;
    }


    .box-title {
      display: flex;
      justify-content: flex-start;
      margin-left: 20px;
      //position: relative;
      max-width: 600px;

      .title {
        @include font(24px, 400, 29px, #ffffff);
        @media screen and (max-width: $phoneWidth) {
          text-align: center;
          margin-bottom: -20px;
          margin-top: 20px;
        }
      }
      img {
        position: absolute;
        right: 165px;
        margin-top: 5px;
        //width: 52px;
        //height: 65px;
        //margin-left: 20px;
        @media screen and (max-width: $phoneWidth) {
          display: none;
        }

      }
    }
    .box-gaz {
      display: flex;
      margin-top: 50px;

      img {
        text-align: left;
        margin-left: -40px;
        height: 600px;
        width: 300px;
        //height: 650px;
        //width: 350px;
        //height: 696px;
        //width: 445px;
        object-fit: cover;
      }
      .info-gaz {
        display: flex;
        flex-direction: column;
        margin-left: 10px;

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
          margin-bottom: 33px;
        }
      }
    }
  }
}
</style>