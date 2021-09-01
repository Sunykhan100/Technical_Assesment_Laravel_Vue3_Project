<template>
    <form @submit.prevent="handleSubmit()">
        <div class="auth-wrapper">
            <div class="auth-inner">
                    <h3>Developer</h3>
                    <input type="hidden" >
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
                        <input type="email" required  class="form-control" v-model="email" placeholder="Please Enter Your Email"/>
                    </div>
                    <div class="form-group">
                        <label >Phone Number</label>
                        <input type="text" required class="form-control" v-model="phone_number" placeholder="Please Enter Your Phone Number"/>
                    </div>
                    <div class="form-group">
                        <label >Address</label>
                        <input type="text" required class="form-control" v-model="address" placeholder="Please Enter You Address"/>
                    </div>
                     <div class="form-group">
                        <label >Upload Image</label>
                        <input type="file" @change="handleOnChange" required class="form-control" />
                    </div>
                    <button class="btn btn-primary btn-block">Save</button>
            </div>
        </div>
    </form>
    
</template>
<script>
"use strict";
import axios from 'axios';
export default 
{
    name : 'Developer',
    data(){
        return{
            first_name : '',
            last_name :'',
            email : '',
            phone_number : '',
            address : '',
            image : null
        }
    },
    created(){
        this.LoadDevelopers(this.$route.query.id)
    },
    methods :{
        handleSubmit(){
            const data ={
                id : this.$route.query.id,
                first_name : this.first_name,
                last_name: this.last_name,
                email : this.email,
                phone_number: this.phone_number,
                address: this.address,
                image : this.image
            };
           if(this.$route.query.id >0){
                axios.put("http://127.0.0.1:8000/api/updateDev",data)
                .then((response) => {
                    console.log(response.data);
                    this.network = true;
                    if(response.data.Result == "Record Updated"){
                        this.$router.push('list')
                    }
                    else{
                        alert(response.data.error);
                    }
                })
                .catch((error) => {
                    console.log(error + "Problem in saving records"), (this.network = false);
            });
           }
           else{
            console.log(this.imageBytes);
            console.log(data);
             axios.post("http://127.0.0.1:8000/api/add",data)
                .then((response) => {
                    console.log(response.data);
                    this.network = true;
                    if(response.data.Result == "Record Added"){
                        this.$router.push('list')
                    }
                    else{
                        alert(response.data.error);
                    }
                })
                .catch((error) => {
                    console.log(error + "Problem in saving records"), (this.network = false);
            });   
           }
        },
        handleOnChange(){
            var _this = this;
            var file = document
                .querySelector('input[type=file]')
                .files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                _this.image = e.target.result          
            };
            reader.onerror = function(error) {
                alert(error);
            };
            reader.readAsDataURL(file);
            console.log( this.image); 
            console.log('this.image'); 
        },
        LoadDevelopers(id){
            axios.get("http://127.0.0.1:8000/api/list/"+id+"")
                .then((response) => {
                    console.log(response.data);
                    this.network = true;
                   var $dev = response.data;
                    this.first_name = $dev.first_name;
                    this.last_name = $dev.last_name;
                    this.phone_number = $dev.phone_number;
                    this.address = $dev.address;
                    this.email = $dev.email;
                })
                .catch((error) => {
                    console.log(error + "Developer loading error"), (this.network = false);
                });
        },
    }
}

</script>
