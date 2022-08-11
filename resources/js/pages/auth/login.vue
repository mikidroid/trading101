<template>
 <guest-layout v-bind="{hideBottomNav:true,hideAppBar:true}" >

 <v-container>
  
               <v-card-title class="mb-5 d-flex display-3 align-center justify-center">
                <Link as="button" >
                  Sign in!
                </Link>
              </v-card-title>
              
              <v-card-text>
                <p class="font-weight-semibold mb-2">
                  Welcome to Super4trade! 👋🏻
                </p>
                <p class="mb-2">
                  Please sign-in to your account and start the adventure
                </p>
              </v-card-text>
              <v-card-text>
                <v-form @submit.prevent="login">
                  <v-text-field
                    v-model="form.email"
                    prepend-inner-icon="mdi-email"
                    label="Email"
                    rounded
                    dark
                    type="email"
                    outlined
                    dense
                    :error-messages="form.errors.email"
                  />
                  <v-text-field
                    v-model="form.password"
                    prepend-inner-icon="mdi-lock"
                    label="Password"
                    rounded
                    dark
                    outlined
                    dense
                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="showPassword ? 'text' : 'password'"
                    :error-messages="form.errors.password"
                    @click:append="showPassword = !showPassword"
                  />
                  <div
                    class="d-flex align-center justify-space-between flex-wrap"
                  >
                    <v-checkbox
                      v-model="form.remember_me"
                      label="Remember me"
                      dark
                    />
                    <Link :href="route('password.request')">
                      Forgot Password?
                    </Link>
                  </div>
                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >Login</v-btn
                  >
                </v-form>
              </v-card-text>
              <v-card-text
                class="d-flex align-center justify-center flex-wrap mt-2"
              >
                <span class="me-2"> New on our platform? </span>
                <Link :href="route('register')"> Create an account </Link>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>

</v-container>
</guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js'
export default {
  
  data() {
    return {
      showPassword: false,
      color:colors,
      isLoading: false,
      form: this.$inertia.form({
        email: null,
        password: null,
        remember_me: false,
      }),
    };
  },
  methods: {
    login() {
      this.form.post("/login");
    },
  },
};
</script>
