
<template>
    <div style="overflow-x:auto;">
      <table>
        <tr>
          <th>Overview</th>
          <th>Lite</th>
          <th>Pro</th>
          <th>Ultimate</th>
        </tr>
        <tr v-for="row in rows" :key="row.id">
          <td>{{row.name}}</td>
          <td v-html="isIncluded(row.includes.Lite, 'Lite')"></td>
          <td v-html="isIncluded(row.includes.Pro, 'Pro')"></td>
          <td v-html="isIncluded(row.includes.Ultimate, 'Ultimate')"></td>
        </tr>
      </table>
    </div>
</template>

<script >
export default {

  name: "TableComponent",
  data() {
    return {}
  },
  props: {
    rows:Array
  },
  methods: {
    isIncluded(value, type) {
      if(value===true){
        if(type==='Ultimate'){
          return  `<svg fill="#0e8178" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>`
        }else{
          return  `<svg fill="blue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>`
        }
      }
      else {
        return ''
      }
    }
  }
}
</script>

<script setup >

</script>
<style scoped>

table {
  margin-left: auto;
  margin-right: auto;
  border-collapse: collapse;
  border-spacing: 0;
  width: 46%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>
