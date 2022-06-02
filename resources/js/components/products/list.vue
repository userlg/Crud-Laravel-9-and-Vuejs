<template>
  <div>
    <div
      class="mx-auto col-6 p-2 gap-1"
      v-for="product in products"
      :key="product.id"
    >
      <p
        class="
          col-4
          border-bottom border-primary border-2
          text-dark
          mx-auto
          text-center
          fs-5
        "
      >
        {{ product.name }}
      </p>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  created() {
    axios
      .get("/products")
      .then((response) => (this.products = response.data))
      .catch((error) => console.log(error.response));
  },
};
</script>
