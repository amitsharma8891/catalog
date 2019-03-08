import Vue from 'vue'
import Vuex from 'vuex'
import contract from './modules/catalog'
Vue.use(Vuex)
export default new Vuex.Store({
  modules: {
    contract: contract
  },
  state: {
    loading: false
  },
  getters: {
    loading: state => state.loading
  },
  actions: {
    LOADING: (state, flag) => {
      state.commit('LOADING', flag)
    }
  },
  mutations: {
    LOADING: (state, flag) => {
      state.loading = flag
    }
  }
})
