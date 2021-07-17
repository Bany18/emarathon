<template>
  <div>
    <v-app>
      <v-main
        style="background-color: #f3f3f3"
        :style="{
          'background-image': 'url(public/images/bgs/1624775.jpg)',
          'background-repeat': 'no-repeat',
          'background-position': 'center',
          'background-size': 'cover',
        }"
      >
        <vue-progress-bar></vue-progress-bar>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 1440 320"
          class="hellofooter"
        >
          <path
            fill="#107269"
            fill-opacity="0.8"
            d="M0,96L80,80C160,64,320,32,480,64C640,96,800,192,960,192C1120,192,1280,96,1360,48L1440,0L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
          ></path>
        </svg>
        <router-view></router-view>
      </v-main>
    </v-app>
  </div>
</template>

<script>
import Registration from "./main/registration";

export default {
  data() {
    return {
      drawer: true,
      group: null,
      image_src: "public/images/logo/tms_logo.png",
    };
  },
  components: {
    Registration,
  },
  computed: {
    buttonText() {
      return !this.$vuetify.theme.dark ? "Go Dark" : "Go Light";
    },
  },
  methods: {
    toggleTheme() {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
    },
  },
  mounted() {},

  created() {},
};
</script>