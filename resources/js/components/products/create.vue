<template>
  <div class="my-3  col-6  border border-dark rounded mx-auto p-2 bg-white">
    <h3 class="text-center text-dark my-4 col-4 mx-auto border-bottom border-primary">Create a product</h3>
    <form
      v-on:submit.prevent="createProduct()"
      method="POST"
      class="d-block col-md-10 col-10 mx-auto"
    >
  
      <div class="d-flex flex-column form-group gap-3">
        <input
          type="text"
          name="name"
          v-model="product"
          placeholder="Name of product"
          class="col-10 mx-auto form-control-lg"
          required
          oldvalue
        />

        <input
          type="text"
          name="name"
          v-model="description"
          placeholder="Description of product"
          class="col-10 mx-auto form-control-lg"
          required
          oldValue
        />

        <input
          type="text"
          name="name"
          v-model="type"
          placeholder="Type of product"
          class="col-10 mx-auto form-control-lg"
          required
          oldValue
        />

        <button class="btn btn-primary border border-dark col-5 mx-auto my-4 p2">CREATE</button>
      </div>
    </form>
  </div>
  <router-view></router-view>
</template>
<script>

import axios from "axios";

export default {
  data() {
    return {
      product: "",
      description: "",
      type: "",
      qty: 0,
    };
  },
  methods: {
    cleanAssets() {
      this.product = "";
      this.description = "";
      this.type = "";
    },
    createProduct() {
      axios
        .post("/products", {
          name: this.product,
          description: this.description,
          type: this.type,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
  },
};
</script>
