<template>
  <Cards msg="Ready to get started?" :cards="cards" :descriptions="rows"/>
<Table :rows="rows"/>
</template>

<script>
import Cards from "@/components/CardsComponent";
import Table from "@/components/TableComponent";

export default {
  name: 'App',
  components: {
Cards,
    Table
  }
}
</script>
<script setup >
import {computed, onMounted} from "vue";
import {useMainStore} from "@/store/main";
const userStore = useMainStore()
// import {useMainStore} from "@/store/mainStore";
// const store = useMainStore()
onMounted(()=>{
  userStore.fetchPlans()
})
const cards = computed(() => {
  return userStore.getCards
})
const rows = computed(() => {
  return userStore.getTables
})
</script>
<style>
body{
  background: rgb(247,247,247);
  background: linear-gradient(0deg, rgba(247,247,247,1) 34%, rgba(143,169,195,1) 92%);
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
}
</style>
