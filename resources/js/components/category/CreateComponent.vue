<!-- eslint-disable -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form class="col s12" method="POST" action="" @submit.prevent="createCategory" autocomplete="off">
              <div class = "row">
                <div class="form-group m-t-20 col-md-6">
                  <label>Name</label>
                    <input id="first_name" v-model="fields.name" placeholder="Category Name" required type="text" class="form-control phone-inputmask validate">
                  </div>
              </div>
              <div class = "row">
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
      fields: { 'name': '', status: 1 },
      errors: {},
      name: '',
      status: 1
    }
  },
  computed: {
  },
  mounted () {
    console.log(this.user)
  },
  methods: {
    createCategory () {
      this.$store.dispatch('CREATE_CATEGORY', this.fields).then(response => {
        alert(response.data)
        this.$router.push({ name: 'category-list' })
      }, error => {
        if (!error.status === 200) {
          alert(error.data.message)
        }
      })
    },
    register () {
      console.log(this.fields)
    }
  }
}
</script>
