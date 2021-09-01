<template>
    <form @submit.prevent="handleSubmit()">
        <div class="auth-wrapper">
            <div class="auth-inner">
                    <h3>Login Form</h3>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" v-model="email" class="form-control" placeholder="Please Enter Your Email"/>
                    </div>
                    <div class="form-group">
                        <label >password</label>
                        <input type="password" v-model="password" class="form-control" placeholder="Please Enter Your Password"/>
                    </div>
                    <button class="btn btn-primary btn-block">Login</button>
                    <p class="forgot-password text-right">
                        <router-link to="forgot">Forgot Password</router-link>
                    </p>
            </div>
        </div>
    </form>
</template>



<script>

import axios from 'axios';

export default {
    name:'Login',
     data(){
        return{
            email : '',
            password : ''
        }
    },
    methods :{
        handleSubmit(){
             const data ={
                email: this.email,
                password: this.password
             };

            axios.post("http://127.0.0.1:8000/api/login",data)
                .then((response) => {
                    console.log(response.data);
                    this.network = true;
                    if(response.data.Success == "User is Authenticated"){
                        this.$router.push('list')
                    }
                    else{
                        alert(response.data.error);
                    }
                })
                .catch((error) => {
                    console.log(error + "Invalid Email and Password"), (this.network = false);
                });
        }
    }
}
</script>