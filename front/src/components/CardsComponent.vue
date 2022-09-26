
<template>
  <header>
    <h1 class="card__title">{{msg}}</h1>
    <p class="card__description">Choose a plan tailored to your needs</p>
    <span class="toggle__tag">20% OFF</span>
    <div class="toggle">

      <label :class="toggle===false ? 'toggle-bold':''">Monthly</label>
      <div class="toggle-btn">
        <input  v-model="toggle" type="checkbox" class="checkbox" id="checkbox" />
        <label class="sub" id="sub" for="checkbox">
          <div class="circle"></div>
        </label>
      </div>

      <label :class="toggle===true ? 'toggle-bold':''">Yearly</label>
    </div>
  </header>
  <div class="cards">
    <div class="card" v-for="card of cards" :key="card.id">
      <div>

        <h1 class="card__label"> <img v-if="card.type==='Lite'" alt="settings" class="image" :src="settings"/>

          <img v-if="card.type==='Pro'" alt="home" class="image" :src="home"/>
          <img v-if="card.type==='Ultimate'" alt="instagram" class="image" :src="instagram"/>
          {{card.type}}      <span  :class="card.type==='Pro'?'card__tag':'card__tag hide-tag'">POPULAR</span> </h1>

        <p class="card__description">{{card.description}}</p>
        <div class="card__price">
          <template v-if="!toggle">
            <h1>{{card.price.month}}</h1>
            <p>per month</p>
          </template>
          <template v-else>
            <h1>{{card.price.year}}</h1>
            <p>per year</p>
          </template>

        </div>
        <button class="card__btn">{{buttonText(card.type)}}</button>
        <h1 class="card__description__label">{{descriptionText(card.type)}}</h1>
        <div class="card__details">
          <ul>
            <template v-for="description in descriptions" :key="description.id">
              <li style="display: flex; " v-if="description.show=== card.type">
                {{ description.name  }}
              <p v-if="description.beta===true" class="beta"> {{description.beta===true ? 'BETA':''}}</p>
              </li>
            </template>

          </ul>

        </div>

      </div>

      <h1 class="card__footer">See all feature</h1>
  </div>

  </div>
</template>

<script >
import settings from '../assets/settings.svg'
import home from '../assets/home.svg'
import instagram from '../assets/instagram.svg'
export default {
  name: 'CardsComponent',
  data() {
    return {
      settings,
      home,
      instagram,
      toggle:false
    }
  },
  methods: {
      buttonText(type){
        return type==='Lite' ? 'Try 7 days for free': 'Get started'
      },
    descriptionText(type){
      return type==='Lite' ? 'Lines includes:': type==='Pro' ? 'Everything in Lite, plus:': type==='Ultimate' ? 'Everything in Pro, plus:':""
    }
  },
  props: {
    msg: String,
    cards:Array,
    descriptions:Array
  }

}
</script>

<script setup >
</script>
<style scoped>


/*checkBox*/
label{
  font-family: inherit;
  color: #413f3f;
  font-weight: inherit;
  font-size: 1.2rem;
}
header {
margin: 3.3rem 0;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}
.toggle-bold{
  color: black;
  font-weight: bold;
}
.toggle {
margin-top: 0.6rem;
color: hsl(234, 14%, 74%);
display: flex;
align-items: center;
}
.toggle-btn {
margin: 0 1rem;
}
.checkbox {
display: none;
}

.sub {
background: #0e8178;
display: flex;
justify-content: flex-start;
align-items: center;
  height: 1.6rem;
  width: 3.3rem;
  border-radius: 1.6rem;
  padding: 0.3rem;
}
.circle {
  background-color: #fff;
  height: 1.4rem;
  width: 1.4rem;
  border-radius: 50%;
}
.checkbox:checked + .sub {
  justify-content: flex-end;
}
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
/*Cards*/
.beta{
  margin-left: 6px;
  margin-bottom: 12px;
  padding: 2px;
  font-weight: 600;
  color: #1ca49f;
  background-color: #b1c5c4;
}
.cards{
  font-family: Inter, sans-serif;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  margin: 2rem;
}
.image{
  padding-right: 8px;
}
.card {
  background: rgb(143,169,195,1);
  background: linear-gradient(0deg, rgba(143,169,195,1) 0%, rgba(255,255,255,1) 13%, rgba(255,255,255,1) 100%);
  padding-top:0.1rem ;
  padding-left: 3rem;
  padding-bottom: 1.5rem;
  padding-right: 3rem;
  border-radius: 1rem;
  width: 17.7rem;
  color: #2a324b;
  box-shadow: 0 0.2rem 0.5rem #e1e5ee;
  cursor: pointer;
  transition: box-shadow 300ms, transform 300ms;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.card__tag{
  margin-left: 89px;
  margin-bottom: 30px;
  margin-top: 10px;
  padding: 0.225rem;
  font-weight: 600;
  font-size: 12px;
  max-width: 130px;
  color: #1ca49f;
  background-color: #b1c5c4;
}
.hide-tag{
 visibility: hidden;
}
.toggle__tag{
  margin-left: 150px;
  margin-top:20px ;
  min-width: 54px;
  font-weight: 600;
  font-size: 12px;
  color: #1ca49f;
  background-color: #b1c5c4;
}
.card__footer {
  padding-top: 2rem;
  font-family: inherit;
  color: black;
  font-weight: bold;
  cursor: pointer;
  font-size: 1.2rem;
}
.card__title{
  padding-top: 1rem;
  font-family: inherit;
  color: black;
  font-weight: bold;
  cursor: pointer;
  font-size: 2rem;
}
.card__label {
  padding-bottom: 8px;
  display: flex;
  align-items: flex-end;
  font-size: 1.2rem;
}
.card__description {
  padding-top: 5px;
  display: flex;
  align-items: flex-end;
  font-size: 0.9rem;
  opacity: 0.8;
}
.card__description__label {
  display: flex;
  align-items: flex-end;

  font-size: 1rem
}
.card__price {
  display: flex;
  align-items: flex-end;
  gap: 0.5rem;
  margin: 2.5rem 0;
  font-size: 1.3rem;
  line-height: 1rem;
}
.card__details {
  padding-right: 1rem;
  margin-top: 1rem;
  margin-bottom: 2rem;
}
.card__price h1::before {
  content: "$";
  color: #ababab;
  font-size: 2.8rem;
  position: relative;

}
.card__price p {
  font-size: 0.8rem;
  margin-bottom: -10px;
  opacity: 0.8;
}

.card__list > * {
  margin-bottom: 0.2rem;
}

.card__btn {
  width: 110%;
  border: none;
  margin-bottom: 2rem;
  padding: 0.8rem 1rem;
  font-family: inherit;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  background-color: #1a45b9;
}

.card:hover {
  background: rgb(25,27,29);
  background: linear-gradient(0deg, rgba(25,27,29,1) 0%, rgba(0,114,199,1) 34%, rgba(39,181,255,1) 100%);
  color: #f9fbff;
}
.card:hover .card__footer {
  color: #ddd;
}
.card:hover .card__btn {
  background-color: #0bceba;
}
.card-accent button {
  background-color: #0e8178;
  color: #ffffff;
}
ul {
  list-style: none;
  font-size: 10px;

}

ul li:before {
  color: #2e4793;
  font-size: 18px;
  padding-bottom: 10px;
  margin-top: -6px;
  content: '✓';
}

.card:hover ul li:before  {
  color: #0bceba
}
</style>
