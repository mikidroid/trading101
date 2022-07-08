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
              <v-card-text>
                <p style="lineHeight:2.5" class="font-weight-semibold text-title mb-2">
                  Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>
              </v-card-text>
              <v-card-text>
                <v-form @submit.prevent="submit">
                  <v-btn type="submit" rounded block :color="color.accent" class="mt-3"
                    >Send Verification Email</v-btn
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
  components: { ApplicationLogo, GuestLayout },
  data() {
    return {
      showPassword: false,
      isLoading: false,
      form: this.$inertia.form(),
      color:colors
    };
  },
  methods: {
    submit() {
      this.form.post(this.route('verification.send'));
    },
  },
};
</script>
