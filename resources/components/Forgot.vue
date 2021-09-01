<template>
    <form @submit.prevent="sendEmail">
        <div class="auth-wrapper">
            <div class="auth-inner">
                <h3>Password Reset</h3>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" v-model="user_email" class="form-control" placeholder="Please Enter Your Email"/>
                </div>
                <button class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </form>
</template>
<script>
// import emailjs from 'emailjs-com';
import axios from 'axios';
export default{
    name: "Forgot",
    data(){
        return{
            user_email :''
        }
    },
    methods :{

            sendEmail() {
                const data={
                            email : this.user_email
                        }
                    axios.post("http://127.0.0.1:8000/api/validate",data)
                    .then((response) => {
                        console.log(response.data);
                        this.network = true;
                        if(response.data.Success == "User is existed"){
                            emailjs.send('service_xqx2irg', 'template_hg33718', 
                            {
                                from_name: "Technical Assessment App",
                                to_name: "Random User",
                                message: window.location.origin + "/#/reset?email="+data.email  ,
                                reply_to: data.email,
                            }, 'user_j9861YpNXEpjntH1L2iPO')
                            .then((result) => {
                                console.log(result.error);
                                alert("Email has been sent");
                            }, (error) => {
                                console.log(error);
                                alert("Problem in sending email");
                            });
                        }
                        else{
                              alert("User email does not exist");
                        }
                    })
                    .catch(() => {
                        alert("Please provide valid email"), 
                        (this.network = false);
                    });
            },
    }
}
</script>
