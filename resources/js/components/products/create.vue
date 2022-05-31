<template>
  <div>
      <h3>Create a Product</h3>
      <form action="" method="POST">
          <input type="text" placeholder="Name of product">
          <button>Create</button>
      </form>
  </div>
  <router-view></router-view>
</template>
<script>
export default {
  data () {

  },
  methods: {
    createProduct() {
       alert('Test successfull');
    }
  }
}
</script>
