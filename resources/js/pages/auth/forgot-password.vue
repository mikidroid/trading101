<template>
  <guest-layout v-bind={hideAppBar:true,hideBottomNav:true}>
      <v-container fluid>
         <v-row align="center" justify="center" >
          <v-col cols="12" sm="12" md="10" lg="4">

              <v-card-title class="my-5 d-flex align-center justify-center">
                <Link :href="route('/')">
                  <application-logo style="height: 75" />
                </Link>
              </v-card-title>
              <v-card-text v-if="status">
                <v-alert type="success">{{ status }}</v-alert>
              </v-card-text>
              <v-card-text>
                <p class="mb-2">You forgot your password? Here you can easily retrieve a new password.</p>
              </v-card-text>
              <v-card-text>
                <v-form @submit.prevent="submit">
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
                  <v-btn type="submit" rounded block :color="color.accent" class="mt-3"
                    >Request New Password</v-btn
                  >
                </v-form>
              </v-card-text>
         
          </v-col>
        </v-row>
      </v-container>
  </guest-layout>
</template>

<script>
import ApplicationLogo from "../../components/ApplicationLogo.vue";
import GuestLayout from '../../layouts/GuestLayout.vue';
import {colors} from '../../components/config/config.js'


export default {
  props: {
    status: String,
  },
  components: { ApplicationLogo },
  data() {
    return {
     color:colors,
      showPassword: false,
      isLoading: false,
      form: this.$inertia.form({
        email: null,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post("/forgot-password");
    },
  },
};
</script>
