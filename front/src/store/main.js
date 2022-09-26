import {defineStore} from "pinia";
 import axios from "axios"
export const useMainStore= defineStore('main',{
    state: ()=>({
        planData:{}
    }),
    getters: {
        getCards: state => {
          return   state.planData?.cards
        },
        getTables: state => {
            return   state.planData?.table
        }
    },
    actions: {
        async fetchPlans() {

            try {
                const data = await axios.get(`${process.env.VUE_APP_API}/price`)
                this.planData = data.data
                // Mock Data
                // let str ='{"cards":[{"id":1,"type":"Lite","description":"Perfect to get started","price":{"month":11,"year":105.6}},{"id":2,"type":"Pro","description":"Best for professionals","price":{"month":19,"year":182.4}},{"id":3,"type":"Ultimate","description":"Toolset for hard playes","price":{"month":35,"year":336}}],"table":[{"name":"CMS Integration","beta":false,"includes":{"Lite":true,"Pro":true,"Ultimate":true},"show":"Lite"},{"name":"Email & SMS Reminder","beta":false,"includes":{"Lite":true,"Pro":true,"Ultimate":true},"show":"Lite"},{"name":"Custom Support 24\\/7","beta":false,"includes":{"Lite":true,"Pro":true,"Ultimate":true},"show":"Lite"},{"name":"Advanced analytics","beta":false,"includes":{"Lite":false,"Pro":true,"Ultimate":true},"show":"Pro"},{"name":"100+ integration","beta":false,"includes":{"Lite":false,"Pro":true,"Ultimate":true},"show":"Pro"},{"name":"Chat widget","beta":false,"includes":{"Lite":false,"Pro":true,"Ultimate":true},"show":"Pro"},{"name":"Templates library","beta":false,"includes":{"Lite":false,"Pro":true,"Ultimate":true},"show":"Pro"},{"name":"Daily performance report","beta":false,"includes":{"Lite":false,"Pro":false,"Ultimate":true},"show":"Ultimate"},{"name":"Dedicated assistant","beta":false,"includes":{"Lite":false,"Pro":false,"Ultimate":true},"show":"Ultimate"},{"name":"Artificial Intelligence","beta":true,"includes":{"Lite":false,"Pro":false,"Ultimate":true},"show":"Ultimate"},{"name":"Marketing tools and automations","beta":false,"includes":{"Lite":false,"Pro":false,"Ultimate":true},"show":"Ultimate"}]}'
                // this.planData=JSON.parse(str)
                console.log(this.planData)
            }
            catch (error) {
                console.log(error)
            }
        }
    },

})
