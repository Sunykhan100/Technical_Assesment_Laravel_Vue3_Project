<template>
<div style="margin:20px;">
    
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Profile</th>
            
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th><input type="checkbox" @click="select_all_via_check_box" v-model="all_select"> 
                <span> {{ all_select == true ? 'Uncheck All' : "Select All" }} </span>
            </th>
            <th>Edit</th>
            <th><button @click="deleteUser()" class="btn btn-danger" type="button" >Delete All</button></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="developer in developers" v-bind:key="developer.id">
                <td><img :src="developer.image" style="height: 40px;width: 40px;border-radius: 20px;" class="circle" /></td>
                
                <td>{{developer.first_name}}</td>
                <td>{{developer.last_name}}</td>
                <td>{{developer.email}}</td>
                <td>{{developer.phone_number}}</td>
                <td>{{developer.address}}</td>
                
                <td><input type="checkbox" v-model="deleteItems" :value="developer.id" /></td>
                <td><button class="btn btn-success" @click="editDeveloper(developer.id)" type="button" >Edit</button></td>
                <td><button @click="deleteDeveloper(developer.id)" class="btn btn-danger" type="button" >Delete</button></td>
                
            </tr>
        </tbody>
    </table>
    <Nav />
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:"DeveloperPage",
     data: function(){
        return{
            developers : [],
            id : 0,
            first_name :'',
            last_name :'',
            email :'',
            phone : '',
            address: '',
            image : null,
            deleteItems: [],
            select: '',
            all_select: false
        }
    },
     created() {
            this.LoadDevelopers();
        },
    methods :{
        LoadDevelopers(){
            axios.get("http://127.0.0.1:8000/api/list")
                .then((response) => {
                    console.log(response);
                    this.network = true;
                    this.developers = response.data;
                })
                .catch((error) => {
                    console.log(error), (this.network = false);
                });
        },
        deleteUser() {
                axios.delete('http://127.0.0.1:8000/api/deleteAll/'+this.deleteItems)
                     .then((response) => {
                        console.log(response);
                        this.LoadDevelopers();
                        this.deleteItems = []
                        this.all_select == true ? 
                        this.all_select = false : this.all_select = true;
                     })
        },
        select_all_via_check_box(){
                if(this.all_select == false){
                    this.all_select = true
                    this.developers.forEach(dev => {
                      this.deleteItems.push(dev.id)
                    });
                    console.log('add to list');
                }else{
                    this.all_select = false
                    this.deleteItems = []
                    console.log('remove from list');
                }
         },
        deleteDeveloper(devId){
            if(confirm("Do you really want to delete?")){
                axios.delete("http://127.0.0.1:8000/api/delete/"+devId+"")
                .then((response) => {
                    console.log(response);
                    this.network = true;
                    this.LoadDevelopers();
                })
                .catch((error) => {
                    console.log(error), (this.network = false);
                });
            }
        },
        editDeveloper(devId){
            this.$router.push({ path: 'developer', query: { id: devId }})
        }
    }
}
</script>
