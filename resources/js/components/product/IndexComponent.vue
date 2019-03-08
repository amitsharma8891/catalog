<!-- eslint-disable -->
<template>
  <div class="container">

    <div class="card">
         <div class="p-20">
                                      <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title m-b-0">Product List</h5>
                                          <router-link :to="'/product/create'" class="btn btn-success">
                                                    Add Product
                                            </router-link>
                                        </div>
                                      </div>
                                      <div class="table-responsive">
                                        <table class="table">
                                          <thead class="thead-light">
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Category</th>
                                              <th scope="col">Price</th>
                                              <th scope="col">Discount Price</th>
                                              <th scope="col">In Stock?</th>
                                              <th scope="col">Status</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                            <tbody class="customtable">
                                                <tr
                                                v-for="(prod, index) in products"
                                                :key="index"
                                              >
                                                <td>
                                                    {{ prod.title }}
                                                </td>
                                                <td>
                                                    {{prod.category.name}}
                                                </td>
                                                <td>
                                                    {{prod.original_price}}
                                                </td>
                                                <td>
                                                    {{prod.discount_price}}
                                                </td>
                                                <td>
                                                    <span v-if="prod.in_stock">Yes</span>
                                                    <span v-else>No</span>
                                                </td>
                                                <td>
                                                    <span v-if="prod.status">Active</span>
                                                    <span v-else>Inactive</span>
                                                </td>
                                                <td>
                                                  <router-link :to="'/product/edit/' + prod.id">
                                                    Edit
                                                  </router-link>
                                                </td>
                                              </tr>
                                            </tbody>
                                        </table>
                                      </div>
                                </div>
    </div>
  </div>
</template>
<!-- eslint-enable -->
<script>
export default {
  components: {
  },
  data () {
    return {
      products: [],
      page: 1,
      limit: 5
    }
  },
  computed: {
  },
  mounted () {
    var _this = this
    this.$store.dispatch('GET_PRODUCTS').then(response => {
      _this.products = response.data
    }, error => {
      if (!error.status === 200) {
        alert(error.data)
      }
    })
  },
  methods: {
  }
}
</script>
