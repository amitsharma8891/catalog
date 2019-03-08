import api from '../../api'

const catalog = {
  state: {
    categories: []
  },
  getters: {
  },
  actions: {
    GET_CATEGORIES: function (state, formData) {
      // console.log(formData);
      return new Promise((resolve, reject) => {
        api.get('category').then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    GET_CATEGORY: function (state, categoryId) {
      return new Promise((resolve, reject) => {
        api.get('category/' + categoryId).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    CREATE_CATEGORY: function (state, formData) {
      return new Promise((resolve, reject) => {
        api.post('category', formData, { headers: { Accept: 'application/json' } }).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    UPDATE_CATEGORY: function (state, formData) {
      return new Promise((resolve, reject) => {
        api.put('category/' + formData.id, formData, { headers: { Accept: 'application/json' } }).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    GET_PRODUCTS: function (state, formData) {
      // console.log(formData);
      return new Promise((resolve, reject) => {
        api.get('product').then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    GET_PRODUCT: function (state, productId) {
      return new Promise((resolve, reject) => {
        api.get('product/' + productId).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    CREATE_PRODUCT: function (state, formData) {
      return new Promise((resolve, reject) => {
        api.post('product', formData, { headers: { Accept: 'application/json' } }).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },
    UPDATE_PRODUCT: function (state, formData) {
      console.log(formData)
      return new Promise((resolve, reject) => {
        api.put('product/' + formData.id, formData, { headers: { Accept: 'application/json' } }).then((response) => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    }
  },
  mutations: {

  }
}

export default catalog
