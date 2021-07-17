<template>
  <div>
    <v-container>
      <v-card
        max-width="1000px"
        style="
          margin-top: 3%;
          margin-left: auto;
          margin-right: auto;
          opacity: 0.9;
        "
      >
        <v-card-title v-bind:style="styleCard">
          <span>e-Marathon Registration Form</span>
          <v-spacer></v-spacer>
          <v-btn icon dark>
            <v-icon>mdi-users</v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text height="600px">
          <br />
          <v-form
            v-on:submit.prevent="submitData"
            @keydown="form.onKeydown($event)"
            ref="form"
          >
            <v-row>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="FirstName *"
                  outlined
                  name="fname"
                  class="nt v-input__control2"
                  v-model="form.fname"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="Surname *"
                  outlined
                  name="sname"
                  class="nt v-input__control2"
                  v-model="form.sname"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select
                  :items="gen"
                  label="Gender *"
                  outlined
                  name="gender"
                  class="nt v-input__control2"
                  v-model="form.gender"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-select>
              </v-col>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="Age *"
                  outlined
                  name="tname"
                  class="nt v-input__control2"
                  v-model="form.age"
                  color="#107269"
                  :rules="[GRules.required]"
                  v-mask="'###'"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-autocomplete
                  :items="getregions"
                  cache-items
                  item-text="region"
                  item-value="region"
                  label="Region"
                  outlined
                  name="region"
                  class="nt v-input__control2"
                  v-model="form.region"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-autocomplete>
              </v-col>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="Email"
                  outlined
                  name="email"
                  class="nt v-input__control2"
                  v-model="form.email"
                  color="#107269"
                  :error-messages="errors.email"
                  :rules="[GRules.email]"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="Phone No *"
                  outlined
                  name="phoneno"
                  class="nt v-input__control2"
                  v-model="form.phoneno"
                  color="#107269"
                  :rules="[GRules.required]"
                  v-mask="'255#########'"
                  hint="255713000000"
                  persistent-hint
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-autocomplete
                  v-model="form.nationality"
                  :items="getcountries"
                  item-text="name"
                  item-value="name"
                  cache-items
                  label="Nationality *"
                  name="nationality"
                  class="nt v-input__control2"
                  outlined
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-autocomplete>
              </v-col>
              <v-col cols="12" sm="4">
                <v-text-field
                  label="Team Name *"
                  outlined
                  name="tname"
                  class="nt v-input__control2"
                  v-model="form.tname"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select
                  :items="rcats"
                  label="Race Category *"
                  outlined
                  name="race_category"
                  class="nt v-input__control2"
                  v-model="form.rcat"
                  color="#107269"
                ></v-select>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select
                  :items="tshirts"
                  item-color="teal"
                  label="T-Shirt Size *"
                  outlined
                  name="tsize"
                  class="nt v-input__control2"
                  v-model="form.tsize"
                  color="#107269"
                  :rules="[GRules.required]"
                ></v-select>
              </v-col>
            </v-row>
            <br />
            <hr />
            <v-row>
              <v-col cols="12" sm="4"></v-col>
              <v-col cols="12" sm="4"></v-col>
              <v-col cols="12" sm="4">
                <v-btn
                  type="submit"
                  block
                  large
                  elevation="2"
                  color="#107269"
                  class="login-btn"
                  style="color: white"
                  >REGISTER
                  <v-icon color="white">mdi-check-circle</v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-form>
          <v-snackbar v-model="successSnackbar" top absolute class="title-3">
            Registration Complete. We have sent you a message with your running
            No!
            <template v-slot:action="{ attrs }">
              <v-btn
                color="white"
                outlined
                v-bind="attrs"
                @click="successSnackbar = false"
                :timeout="timeout"
              >
                Close
              </v-btn>
            </template>
          </v-snackbar>
        </v-card-text>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import { BASE_URL } from "../../config/MainURL";
import axios from "axios";
import { mapState } from "vuex";

export default {
  data() {
    return {
      successSnackbar: false,
      timeout: 6000,
      form: new Form({
        fname: "",
        sname: "",
        gender: "",
        age: "",
        region: "",
        email: "",
        phoneno: "",
        nationality: "",
        tname: "",
        rcat: "",
        tsize: "",
      }),
      tshirts: ["Small", "Medium", "Large", "XL", "XXL", "XXXL"],
      gen: ["Male", "Female"],
      rcats: ["Half Marathon - 10km", "Full Marathon - 20km"],
      errorMessages: "",
      errors: "",
      formHasErrors: false,
      GRules: {
        required: (value) => !!value || "Field is required",
        email: (value) => {
          const pattern =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value) || "Invalid e-mail";
        },
      },
      styleCard: {
        backgroundColor: "#107269",
        color: "white",
        fontSize: 35,
        fontFamily: "Trebuchet MS",
        textTransform: "Capitalize",
      },
    };
  },
  computed: {
    ...mapState("locations", ["getregions"]),
    ...mapState("locations", ["getcountries"]),
  },
  methods: {
    submitData() {
      this.GRules;
      this.errors = "";
      let app = this;
      //wait for DOM update
      this.$nextTick(() => {
        //NOW trigger validation
        if (this.$refs.form.validate()) {
          this.$Progress.start();
          let loader = Vue.$loading.show({
            opacity: 0.1,
            canCancel: false,
          });
          axios
            .post(BASE_URL + "/pub/v1/runner", app.form)
            .then((response) => {
              setTimeout(() => {
                this.$Progress.finish();
                this.errors = "";
                this.$nextTick(() => {
                  this.$refs.form.reset();
                });
                this.successSnackbar = true;
                loader.hide();
              }, 2000);
            })
            .catch((e) => {
              setTimeout(() => {
                this.$Progress.fail();
                this.$vToastify.error("Something went wrong", "Error");
                this.errors = e.response.data.errors;
                loader.hide();
              }, 200);
            });
        }
      });
    },
  },
  mounted() {
  },

  created() {
    this.$store.dispatch("locations/LOAD_REGIONS");
    this.$store.dispatch("locations/LOAD_COUNTRIES");
  },
};
</script>