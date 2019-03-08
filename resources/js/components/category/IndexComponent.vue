<!-- eslint-disable -->
<template>
  <div class="container">

    <div class="card">
         <div class="p-20">
                                      <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title m-b-0">Category List</h5>
                                          <router-link :to="'/category/create'" class="btn btn-success">
                                                    Add Category
                                            </router-link>
                                        </div>
                                      </div>
                                      <div class="table-responsive">
                                        <table class="table">
                                          <thead class="thead-light">
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Status</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                            <tbody class="customtable">
                                                <tr
                                                v-for="(cat, index) in categories"
                                                :key="index"
                                              >
                                                <td>
                                                    {{ cat.name }}
                                                </td>
                                                <td>
                                                    <span v-if="cat.status">Active</span>
                                                    <span v-else>Inactive</span>
                                                </td>
                                                <td>
                                                  <router-link :to="'/category/edit/' + cat.id">
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
      categories: [],
      page: 1,
      limit: 5
    }
  },
  computed: {
  },
  mounted () {
    var _this = this
    this.$store.dispatch('GET_CATEGORIES').then(response => {
      _this.categories = response.data
    }, error => {
      if (error.status === 400) {
        alert(error.data.message)
      }
    })
  },
  methods: {
  }
}
</script>
