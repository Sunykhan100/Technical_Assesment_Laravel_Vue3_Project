<template> 
     <div>
       <ass-nav />
        <router-view /> 
     </div>
</template>

<script>

import AssNav from './AssNav.vue'
export default {
  name: 'App',
  components:{
    AssNav,
  } 
  
}
</script>
<style>
@import url('http://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800');
*{
  box-sizing: border-box;
}
body {
  background-color: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));;
  min-height: 100vh;
  display: flex;
  font-weight: 400;
  font-family: 'Fira Sans', sans-serif;
}
h1, h2, h3, h4, h5, h6, label, span {
  font-weight: 500;
  font-family: 'Fira Sans', sans-serif;
} 
body, html, #app, #root, .auth-wrapper {
  width:100%;
  height: 100%;
}
#app {
  text-align: center;
}
.navbar-light {
  background: #167bff;
  box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
  padding: 20px 15px 20px 15px;
  border-radius: 0px;
  transition: all .3s;
  position: relative;
  color: #ffffff !important;
  
}
.navbar-light .navbar-nav .nav-link{
  color: #ffffff !important;
  font: 600;
}
.navbar-light .navbar-brand{
 color: #ffffff !important;
 font-weight: 400;
}
.auth-inner {
  width: 450px;
  margin: auto;
  background: #ffffff;
  box-shadow:0px 14px 80px rgba(34, 35, 58, 0.2) ;
  padding: 40px 55px 45px 55px;
  border-radius: 15px;
  transition: all .3s; 
  text-align: left;
}
.auth-wrapper .form-control:focus {
  border-color: #167bff;
  box-shadow: none;
}
.auth-wrapper h3 {
  text-align: center;
  margin:0;
  line-height: 1;
  padding-bottom: 20px;
  }
  .custom-control-label{
    font-weight: 400;
  }
  .forgot-password, .forgot-password a {
    text-align: right;
    font-size: 13px;
    padding-top:10px;
    color: #7f7d7d;
    margin: 0;
  }
  .forgot-password a {
    color: #167bff;
  }
  .a {
    text-decoration: none !important;
       }
</style>
