<template>
  <div
    class="my-3 d-flex justify-content-center align-items-center flex-column"
  >
    <div
      class="mx-auto col-7 p-1 d-flex justify-content-center mb-0"
      v-for="product in products.data"
      :key="product.id"
    >
      <div
        class="
          d-flex
          justify-content-around
          gap-1
          align-items-end
          bg-success
          col-6
        "
      >
        <input
          v-if="product.select == 1"
          checked="checked"
          type="checkbox"
          class="my-auto"
          @click="completeProduct(product)"
        />
        <input
          v-if="product.select == 0"
          type="checkbox"
          class="my-auto"
          @click="completeProduct(product)"
        />

        <p class="col-10 text-dark fs-5 my-auto">
          {{ product.name }}
        </p>
      </div>

      <div
        style="color: blue"
        class="d-flex justify-content-end col-2 align-items-center"
      >
        <!----Pen Icon-->
        <router-link :to="'/edit/' + product.id">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            fill="currentColor"
            class="bi bi-pen d-block mx-2 my-auto"
          >
            <path
              d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"
            />
          </svg>
        </router-link>
        <!--- Trash Icon-->
        <form v-on:submit.prevent="deleteProduct(product.id)">
          <button type="submit" class="btn btn-light text-danger">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              fill="currentColor"
              class="bi bi-trash3-fill d-block my-auto"
            >
              <path
                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"
              />
            </svg>
          </button>
        </form>
      </div>
    </div>
    <Pagination :data="products" @pagination-change-page="getProducts" class='d-flex mx-auto fle-row my-4 gap-2'/>
  </div>
</template>
<script>
import axios from "axios";
import LaravelVuePagination from "laravel-vue-pagination";

export default {
  components: {
    Pagination: LaravelVuePagination,
  },
  data() {
    return {
      products: [],
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    getProducts(page = 1) {
      axios
        .get("/products?page=" + page)
        .then((response) => (this.products = response.data))
        .catch((error) => console.log(error.response));
    },
    deleteProduct(id) {
      axios
        .delete("/products/" + id)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
      this.getProducts();
    },
    completeProduct(product) {
      console.log(product.select);

      if (product.select === 1) {
        var completed = 0;
      } else {
        var completed = 1;
      }
      product.select = !product.select;

      axios
        .put("/products/" + product.id, {
          name: product.name,
          description: product.description,
          type: product.type,
          select: completed,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error.response);
        });
      //----> Refresh all products
      this.getProducts();
    },
  },
};
</script>

 