<template>
    <form @submit.prevent="handleSubmit()" oninput='up2.setCustomValidity(up2.value != up.value ? "Passwords do not match." : "")'>
        <div class="auth-wrapper">
            <div class="auth-inner">
                <h3>Reset Password</h3>
                <div class="form-group">
                    <label >Password</label>
                    <input name="up" type="password" v-model="password" class="form-control" placeholder="Please Enter Your Password"/>
                </div>
                <div class="form-group">
                    <label >Re-enter Password</label>
                    <input name="up2" type="password" v-model="confirm_password" class="form-control" placeholder="Please Re-Enter Your Password"/>
                </div>
                <button class="btn btn-primary btn-block">Reset</button>
            </div>
        </div>
    </form>
</template>
<script>
import axios from 'axios';
export default {
    name :"ResetPassword",
    data(){
        return{
            email:'',
            password :'',
            confirm_password:''
        }
    },
    methods:{
        handleSubmit(){
            const data ={
                email : this.$route.query.email,
                password : this.password
            };
            if(this.$route.query.email != ""){
                axios.put("http://127.0.0.1:8000/api/reset",data)
                .then((response) => {
                    console.log(response.data);
                    this.network = true;
                    if(response.data.Result == "Password Reset"){
                        this.$router.push('login')
                    }
                    else{
                        alert("Invalid Email");
                    }
                })
                .catch((error) => {
                    console.log(error + "Problem in saving records"), (this.network = false);
            });
           }
        }
    }
}
</script>
