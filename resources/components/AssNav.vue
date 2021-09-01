<template>
<div  style="  height: 20% !important;">
  <nav class="navbar navbar-expand navbar-light fixed-top">
    <div class="container">
      <router-link to="/list" class="navbar-brand">Technical Assessment Project</router-link>
   
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <router-link to="/login" class="nav-link">SIGN IN</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/register" class="nav-link">SIGN UP</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/developer" class="nav-link">ADD DEVELOPER</router-link>
          </li> 
          <li class="nav-item">
            <router-link to="/list" class="nav-link">MANAGE DEVELOPER</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
</template>

<script>

export default {
    name: 'Nav'
}
</script>
