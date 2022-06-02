<template>
  <div class="my-3 col-10 border border-dark rounded mx-auto p-2 bg-white">
    <h3
      class="
        text-center text-dark
        my-4
        col-4
        mx-auto
        border-bottom border-primary
      "
    >
      Edit a product #{{ product.id }}
    </h3>
    <form
      v-on:submit.prevent="updateProduct()"
      method="POST"
      class="d-block col-md-10 col-10 mx-auto"
    >
      <div class="d-flex flex-column form-group gap-3">
        <input
          type="text"
          name="name"
          v-model="product.name"
          placeholder="Name of product"
          class="col-10 mx-auto form-control-lg"
          required
        />

        <input
          type="text"
          name="name"
          v-model="product.description"
          placeholder="Description of product"
          class="col-10 mx-auto form-control-lg"
          required
        />

        <input
          type="text"
          name="name"
          v-model="product.type"
          placeholder="Type of product"
          class="col-10 mx-auto form-control-lg"
          required
        />

        <button
          class="btn btn-primary border border-dark col-5 mx-auto my-4 p2"
        >
          SAVE
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      product: [],
      id: this.$route.params.id,
      name: "",
      description: "",
      type: "",
    };
  },
  created() {
    axios
      .get("/products/" + this.id + "/edit")
      .then((response) => (this.product = response.data))
      .catch((error) => console.log(error.response));
  },
  methods: {
    cleanAssets() {
      this.product = [];
    },
    updateProduct() {
      // console.log(this.product);
      axios
        .put("/products/" + this.id, {
          name: this.product.name,
          description: this.product.description,
          type: this.product.type,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
      //---> Back to the main view
      this.$router.push("/");
    },
  },
};
</script>