<template>
    <form @submit.prevent="handleSubmit()" oninput='up2.setCustomValidity(up2.value != up.value ? "Passwords do not match." : "")'>
        <div class="auth-wrapper">
            <div class="auth-inner">
                <h3>Sign Up</h3>
                
                <div class="form-group">
                    <label >First Name</label>
                    <input type="text" required class="form-control" v-model="first_name" placeholder="Please Enter Your Last Name"/>
                </div>
                <div class="form-group">
                    <label >Last Name</label>
                    <input type="text" required class="form-control" v-model="last_name" placeholder="Please Enter Your Last Name"/>
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" required class="form-control" v-model="email" placeholder="Please Enter Your Email"/>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input name="up" type="password" required class="form-control" v-model="password" placeholder="Please Enter Your Password"/>
                </div>
                <div class="form-group">
                    <label >Confirm Password</label>
                    <input name="up2" type="password" class="form-control " v-model="password_confirm" placeholder="Please Confirm Password"/>
                </div>
                <button class="btn btn-primary btn-block">Sign Up</button>
            </div>
        </div>
    </form>
    
</template>
<script>
import axios from 'axios';

export default 
{
    name : 'Registration',
    data(){
        return{
            first_name : '',
            last_name :'',
            email : '',
            password : '',
            password_confirm : ''
        }
    },
    methods :{
        handleSubmit(){
             const data ={
                first_name : this.first_name,
                last_name : this.last_name,
                email: this.email,
                password: this.password
             };

            axios.post("http://127.0.0.1:8000/api/addUser",data)
                .then((response) => {
                    console.log(response);
                    this.network = true;
                    this.$router.push('login')
                })
                .catch((error) => {
                    console.log(error), (this.network = false);
                });
        }
    }
}

</script>
