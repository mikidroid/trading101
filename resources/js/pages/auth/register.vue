<template>
  <guest-layout v-bind={hideBottomNav:true,hideAppBar:true}>

      <v-container fluid>

              <v-card-title class="mb-5 d-flex display-3 align-center justify-center">
                <Link as="button" >
                  Sign up!
                </Link>
              </v-card-title>
              <v-card-text class="">
                <p class=" text-2xl font-weight-semibold text--dark mb-2">
                  Adventure starts here 🚀
                </p>
                <p class="mb-2">Make your app management easy and fun!</p>
              </v-card-text>
              <v-card-text dark>
                <v-form @submit.prevent="register">
                  <v-text-field
                    v-model="form.name"
                    prepend-inner-icon="mdi-account"
                    label="FullName"
                    outlined
                    rounded
                    dark
                    dense
                    type="text"
                    :error-messages="form.errors.name"
                  />
                  <v-text-field
                    v-model="form.email"
                    prepend-inner-icon="mdi-email"
                    label="Email"
                    type="email"
                    outlined
                    rounded
                    dark
                    dense
                    :error-messages="form.errors.email"
                  />

                   <vue-tel-input-vuetify
                   :error-messages="form.errors.phone"
                   dark v-model="form.phone"></vue-tel-input-vuetify>

                  <v-text-field
                    v-model="form.password"
                    prepend-inner-icon="mdi-lock"
                    label="Password"
                    outlined
                    dense
                    rounded
                    dark
                    :error-messages="form.errors.password"
                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="showPassword ? 'text' : 'password'"
                    @click:append="showPassword = !showPassword"
                  />

                  <v-text-field
                    v-model="form.password_confirmation"
                    prepend-inner-icon="mdi-lock"
                    label="Password Confirmation"
                    :error-messages="form.errors.password_confirmation"
                    outlined
                    dense
                    rounded
                    dark
                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="showPassword ? 'text' : 'password'"
                    @click:append="showPassword = !showPassword"
                  />
                  <v-btn :loading="form.processing" type="submit" block rounded :color="color.accent" class="mt-3"
                    >Register</v-btn
                  >
                </v-form>
              </v-card-text>
              <v-card-text
                class="d-flex align-center justify-center flex-wrap mt-2"
              >
                <span class="me-2"> Already have an account? </span>
                <Link :href="route('login')"> Sign in instead </Link>
              </v-card-text>


      </v-container>

  </guest-layout>
</template>

<script>
import ApplicationLogo from "../../components/ApplicationLogo.vue";
import VueTelInputVuetify from 'vue-tel-input-vuetify/lib';
import {colors} from '../../components/config/config.js'
import GuestLayout from '../../layouts/GuestLayout.vue';
export default {
  components: { ApplicationLogo, GuestLayout },
  data() {
    return {
      showPassword: false,
      color:colors,
      isLoading: false,
      form: this.$inertia.form({
        name: null,
        email: null,
        password: null,
        phone:null,
        password_confirmation: null,
      }),
    };
  },
  methods: {
    register() {
      this.form.post("/register");
    },
  },
};
</script>
