<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header text-center" style="font-size: 1.2em;">सहयोग गर्नको लागि शहिद लखन गाउँपालिकाका आधिकारिक व्यक्तिलाइ सम्पर्क गर्नुहोला। , अथवा तलको फर्म भर्नुहोला , आधिकारिक व्यक्तिले तपाईलाई सम्पर्क गर्नेछ।</div>
          <div class="card-body">
            <ValidationObserver v-slot="{invalid}">
              <form @submit.prevent="formSubmit">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label>पुरा नाम</label>
                      <ValidationProvider rules="required" v-slot="{ errors }">
                        <input class="form-control" name="name" v-model="name_m" placeholder="हरिहर यादब">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                    <div class="form-group">
                      <label>स्थाई ठेगाना </label>
                      <ValidationProvider rules="required" v-slot="{ errors }">
                        <input class="form-control" name="p_address" v-model="p_address_m" placeholder="घैरुङ्ग, गोरखा, गण्डकी प्रदेश , नेपाल">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                    <div class="form-group">
                      <label>अस्थाई ठेगाना</label>
                      <ValidationProvider rules="" v-slot="{ errors }">
                        <input class="form-control" name="c_address" v-model="c_address_m" placeholder="घैरुङ्ग, गोरखा, गण्डकी प्रदेश , नेपाल">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                    <div class="form-group">
                      <label>इमेल</label>
                      <ValidationProvider rules="email" v-slot="{ errors }">
                        <input class="form-control" name="email" v-model="email_m" placeholder="shahidlakhan@gmail.com">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                    <div class="form-group">
                      <label>सम्पर्क/फोन  न.</label>
                      <ValidationProvider rules="required" v-slot="{ errors }">
                        <input class="form-control" name="contact" v-model="contact_m" placeholder="+977 9812000000">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label>सहयोग गर्न  चाहेको रकम</label>
                      <ValidationProvider rules="positive" v-slot="{ errors }">
                        <input class="form-control" name="amount" v-model="amount_m" placeholder="120000">
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                    <div class="form-group">
                      <label>अन्य सहयोग भयमा</label>
                      <ValidationProvider rules="" v-slot="{ errors }">
                        <textarea class="form-control" name="other_help" v-model="other_help_m" rows="6">
                          
                        </textarea>
                        <span class="validation-alert">{{ errors[0] }}</span>
                      </ValidationProvider>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="box-footer">
                      <vue-recaptcha sitekey="6LfaE4wUAAAAAHkKJwcbtRiOTkznnPc4Ur4ACWlY">
                        <button type="submit" class="btn btn-primary btn-flat pull-right" :disabled="invalid">बुझाउनुहोस्/रेकर्ड गर्नुहोस्</button>
                      </vue-recaptcha>
                    </div>
                  </div>
                </div>
              </form>
            </ValidationObserver>
            <FlashMessage :position="'left top'"></FlashMessage>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {ValidationProvider, ValidationObserver} from 'vee-validate';
  import { required,email, } from 'vee-validate/dist/rules';
  import {extend} from 'vee-validate';
  import VueRecaptcha from 'vue-recaptcha';
  extend('positive', value => {
    if (value >= 0) {
      return true;
    }
    return 'यो नंबर ० भन्दा ठुलो हुनु पर्छ।';
  });
  extend('required', {
  ...required,
    message : 'यो खालि हुनु हुदैन।'
  });
  extend('email', {
  ...email,
    message : 'तपाइको इमेल अमान्य देखिन्छ।'
  });
  export default{
    data(){
      return {
        name_m : '',
        p_address_m : '',
        c_address_m : '',
        email_m: '',
        contact_m : '',
        amount_m : null,
        other_help_m : '',
      }
    },
    created(){

    },
    methods:{
      formSubmit(){
        var base_url = window.location.origin;
        axios.post(base_url + '/my_api/data_store/donate_request_data', {
          name: this.name_m,
          p_address: this.p_address_m,
          c_address: this.c_address_m,
          email: this.email_m,
          contact: this.contact_m,
          amount: this.amount_m,
          other_help: this.other_help_m,
        }).then((res) => {
          if (res.data.response == true) {
            this.flashMessage.success({
              icon: base_url + '/assets/images/icons/correct.png',
              title: 'तपाईको  फर्म रेकर्ड भयो।',
              message: 'आधिकारिक व्यक्तिले तपाईलाई सम्पर्क गर्नेछ।'
            });
            setTimeout(function(){
              window.location.href = window.location.href;
            }, 8000);    
          }else{
            this.flashMessage.error({
              icon: base_url + '/assets/images/icons/wrong.png',
              title: 'फर्म रेकर्ड भयन।',
              message: 'कृपया फर्म पुन. चेक गरेर भर्नु होला।'
            });
            setTimeout(function(){
              window.location.href = window.location.href;
            }, 8000);
          }
        }).catch((err) => console.error(err));
      }
    },
    components: {
        ValidationProvider,
        ValidationObserver,
        VueRecaptcha
    },
    mounted(){
                    
    }
  }
</script>
