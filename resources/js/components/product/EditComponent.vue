<!-- eslint-disable -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form class="col s12" method="POST" action="" @submit.prevent="editProduct" autocomplete="off">
              <div class = "row">
                <div class="form-group m-t-20 col-md-6">
                  <label>Title</label>
                    <input id="first_name" v-model="fields.title" placeholder="First Name" type="text" class="form-control phone-inputmask validate">
                  </div>
                  <div class="form-group m-t-20 col-md-6">
                  <label>Category</label>
                    <select class="form-control phone-inputmask validate" placeholder="Status"  v-model="fields.category_id" required>
                        <option value="">Select Category</option>
                        <option :value="cat.id" v-for="cat in categories" :key="cat.id">{{cat.name}}</option>
                    </select>
                  </div>
              </div>
              <div class = "row">
                <div class="form-group m-t-20 col-md-6">
                  <label>Original Price</label>
                    <input  v-model="fields.original_price" placeholder="Original Price" type="text" class="form-control validate">
                </div>
                <div class="form-group m-t-20 col-md-6">
                  <label>Discount Price</label>
                    <input v-model="fields.discount_price" placeholder="Discount Price" type="text" class="form-control validate">
                </div>
              </div>
              <div class = "row">
                <div class="form-group m-t-20 col-md-6">
                  <label>In Stock</label>
                    <select class="form-control phone-inputmask validate" placeholder="Status"  v-model="fields.in_stock">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group m-t-20 col-md-6">
                  <label>Status</label>
                    <select class="form-control phone-inputmask validate" placeholder="Status"  v-model="fields.status">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
              </div>
              <div class = "row">
                <div class="form-group col-md-6">
                  <div class="card-body">
                    <button class="btn btn-success" type="submit" name="action">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<!-- eslint-enable -->
<script>
export default {
  data () {
    return {
      categories: [],
      fields: { title: '', category_id: '', original_price: 0.00, discount_price: 0.00, in_stock: 1, status: 1, productId: '' },
      errors: {},
      productId: ''
    }
  },

  computed: {
  },
  mounted () {
    this.productId = this.$route.params.product_id
    this.fields.productId = this.$route.params.product_id
    var _this = this
    this.$store.dispatch('GET_CATEGORIES').then(response => {
      _this.categories = response.data
    }, error => {
      if (error.status === 400) {
        alert(error.data.message)
      }
    })
    this.$store.dispatch('GET_PRODUCT', this.productId).then(response => {
      _this.fields = response.data
    }, error => {
      if (!error.status === 200) {
        alert(error.data.message)
      }
    })
  },
  methods: {
    editProduct () {
      this.$store.dispatch('UPDATE_PRODUCT', this.fields).then(response => {
        alert(response.data)
        this.$router.push({ name: 'product-list' })
      }, error => {
        if (!error.status === 200) {
          alert(error.data)
        }
      })
    },
    register () {
      console.log(this.fields)
    }
  }
}
</script>
