import axios from 'axios'
import store from './store'
const axiosObj = axios.create({
  baseURL: 'http://localhost:8000/api/',
  headers: {
    // 'mactoken': Vue.ls.get('tss_mac_token'),
    'X-DOMAIN': 'catalog',
    'Content-Type': 'application/json'
  }
})
axiosObj.interceptors.request.use((config) => {
  store.dispatch('LOADING', true)
  return config
})
axiosObj.interceptors.response.use((response) => {
  store.dispatch('LOADING', false)
  return response
}, function (error) {
  store.dispatch('LOADING', false)
  return Promise.reject(error.response)
})
export default axiosObj
