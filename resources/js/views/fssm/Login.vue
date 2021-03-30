<template>
  <div class="app-container">
      <header id="header">
  <nav class="header-nav container flex-container">
    <h1 class="logo"><a class="logo-link" href="#">FSSM SOCIAL</a></h1>
    <ul class="header-menu flex-container">
      <li><a class="header-menu-link" @click="toAutour()">FSSM</a></li>
      <li><a class="header-menu-link" @click="toAutour()">UCA</a></li>
    </ul>
  </nav>
</header>
	<section style="margin-top:-35%;" id="section">
  <span id="span"></span>
  <h1 id="h1">Member Login</h1>
  <form @submit.prevent="Login()">
    <input v-model="fields.email" class="inputt" placeholder="Email" type="text"/>
    <input v-model="fields.password" class="inputt" placeholder="Mot de passe" type="password"/>
    <button type="submit" id="button">LOGIN</button>
  </form>
  <h2>
    <a id="a" href="#">Forgot Password?</a>
  </h2>
</section>
  </div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import axios from 'axios'
/* eslint-disable */
export default {
  data(){
    return {
        user:null,
        detector:0,
        isLoaded:false,
        fields:{
            email:'',
            password:'',
        }
    }
  },
  methods: {
      Login()
      {
          this.$store.dispatch('user/login', this.fields)
            .then(() => {
              this.$router.push({ name: 'feed' });
              this.loading = false;
            })
            .catch(() => {
              this.loading = false;
            });
  },
  toUca() {
              this.$router.push({ path: 'uca' });
    },
}
}
</script>
<style>
#section {
  width: 275px;
  background: #ecf0f1;
  padding: 0 30px 30px 30px;
  margin: 60px auto;
  text-align: center;
  border-radius: 5px;
}

#span {
  display: block;
  position: relative;
  margin: 0 auto;
  top: -40px;
  height: 80px;
  width: 80px;
  background: url('https://www.linkpicture.com/q/lets_encrypt_logo_icon_145110_2.png') center center no-repeat, #f39c12;
  border-radius: 50%;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);
}

#h1 {
  font-size: 24px;
  font-weight: 100;
  margin-bottom: 30px;
}

.inputt {
  width: 100%;
  background: #bdc3c7;
  border: none;
  height: 30px;
  margin-bottom: 15px;
  border-radius: 5px;
  text-align: center;
  font-size: 14px;
  color: #7f8c8d;
}

.inputt:focus {
  outline: none;
}

#button {
  width: 100%;
  height: 30px;
  border: none;
  background: #3498db;
  color: #ecf0f1;
  font-weight: 100;
  margin-bottom: 15px;
  border-radius: 5px;
  transition: all ease-in-out .2s;
  border-bottom: 3px solid #2980b9;
}

#button:focus {
  outline: none;
}

#button:hover {
  background: #2980b9;
}

h2 {
  font-size: .75em;
}

#a {
  color: #e74c3c;
  text-decoration: none;
  transition: all ease-in-out .2s;
}

#a:hover {
  color: #c0392b;
}
</style>
<style>
#a{
  text-decoration: none;
  transition: .25s;
}
#btnLog{
  background: transparent;
  border: none;
  border-radius: 2em;
  cursor: pointer;
  font-size: .875em;
  font-weight: 600;
  height: 2em;
  letter-spacing: -.025em;
  text-transform: uppercase;
  transition: .25s;
}
#btnLog:hover{
  color: var(--gray-color);
}
#header{
  min-height: 100vh;
}
#img{
  height: 100%;
  object-fit: cover;
  object-position: 50% 80%;
  width: 100%;
}
p{
  color: var(--gray-color);
  font-size: .875em;
  hyphens: auto;
  line-height: 1.5;
  margin: 1em 0;
}

/* CONTAINERS STYLES */
.container{
  padding: 1em;
}
.flex-container{
  display:flex;
}

/* HEADER NAV */
.logo-link{
  color: var(--dark-color);
  font-weight: 600;
  letter-spacing: .125em;
  text-transform: uppercase;
}
.header-nav{
  align-items: center;
  flex-direction: column;
}
.header-menu{
  flex-wrap: wrap;
  justify-content: center;
  padding: .75em 0;
}
.header-menu-link{
  color: var(--gray-color);
  display: block;
  font-size: .75em;
  font-weight: 500;
  padding: .5em .75em;
  text-transform: uppercase;
}
.header-menu-link:hover{
  color: var(--dark-color);
  text-decoration: underline;
}
.ghost-button{
  border: .125em solid var(--gray-color);
  min-width: 9em;
  padding: 0 1em;
}
.ghost-button:hover{
  background: var(--gray-color);
  color: var(--light-color);
}

/* HEADER CONTENT */
.header-img{
  border-radius: 50%;
  box-shadow: 0 0 0 .5em var(--border-color-dark),
              0 0 0 1em var(--border-color-normal),
              0 0 0 1.5em var(--border-color-light);
  height: 15em;
  margin: 2em auto;
  overflow: hidden;
  width: 15em;
}
.header-description{
  margin: auto;
  max-width: 30em
}
.header-title{
  font-size: 2.5em;
  letter-spacing: -.025em;
  line-height: 1.25;
  margin-left: -.0625em;
}
.type-button{
  margin-top: 1.5em;
}
.type-button:after{
  content: " ▬";
  margin-left: .5em;
  vertical-align: .0715em;
}

@media only screen and (min-width: 1024px){
  /* GLOBAL STYLES */
  header{
    overflow: hidden;
  }
  img{
    object-position: 50% 100%;
  }
  /* CONTAINERS STYLES */
  .container{
    padding: 2em;
  }
  /* HEADER NAV */
  .header-nav{
    flex-direction: row;
    justify-content: space-between;
  }
  .header-menu-link{
    padding: 0 1.5em;
  }
  .ghost-button{
    font-size: .75em;
  }
  /* HEADER CONTENT */
  .header-content{
    position: relative;
  }
  .header-img{
    box-shadow: 0 0 0 2em var(--border-color-dark),
              0 0 0 4em var(--border-color-normal),
              0 0 0 6em var(--border-color-light);
    height: 55vw;
    margin: 0;
    position: absolute;
    right: -16vw;
    top: 0vw;
    width: 55vw;
  }
  .header-description{
    margin: 6em 3em 0;
    max-width: 50vw;
  }
  .header-title{
    font-size: calc(1vw + 2.5em);
  }
}

@media only screen and (orientation: portrait) and (min-height: 1024px){
  .header-content{
    margin-top: 15vh;
  }
}
</style>
