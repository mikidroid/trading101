<template>
  <guest-layout v-bind="{title:'Edit profile'}">
   <v-container>
    
              <v-card-text dark>
                <v-form @submit.prevent="submit(data.id)">
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
                    v-model="form.country"
                    prepend-inner-icon="mdi-flag"
                    label="Country"
                    type="text"
                    outlined
                    rounded
                    dark
                    dense
                    :error-messages="form.errors.country"
                  />
                  
        <v-select
          :items="selectGender"
          :label="form.gender?form.gender:'Gender'"
          v-model="form.gender"
          dense
          rounded
          dark
          outlined
        ></v-select>
                  
     <v-col
      cols="12"
      sm="6"
      md="4"
    >
      <v-menu
        ref="menu"
        v-model="menu"
        :close-on-content-click="false"
        :return-value.sync="date"
        transition="scale-transition"
        offset-y
        min-width="auto"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="form.dob"
            label="date of birth"
            dark
            prepend-icon="mdi-calendar"
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="form.dob"
          no-title
          light
          scrollable
        >
          <v-spacer></v-spacer>
          <v-btn
            text
            color="primary"
            @click="menu = false"
          >
            Cancel
          </v-btn>
          <v-btn
            text
            color="primary"
            @click="$refs.menu.save(date)"
          >
            OK
          </v-btn>
        </v-date-picker>
      </v-menu>
    </v-col>
    <v-spacer></v-spacer>

                  <v-btn :loading="form.processing" type="submit" block rounded :color="color.accent" class="mt-3"
                    >Update Profile</v-btn
                  >
                </v-form>
              </v-card-text>

   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import VueTelInputVuetify from 'vue-tel-input-vuetify/lib';
export default {
 props:['data'],
 methods:{
   submit(id){
     this.form.put("/profile/"+id)
   }
   
 },
 data(){
    return{
      selectGender:['Male','Female'],
      color:colors,
      isLoading: false,
      menu: false,
      modal: false,
      menu2: false,
      form: this.$inertia.form({
        name: this.data.name,
        email: this.data.email,
        gender: this.data.gender,
        country:this.data.country,
        phone: this.data.phone,
        dob: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
      }),
    }
 },
  
 computed: {
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
