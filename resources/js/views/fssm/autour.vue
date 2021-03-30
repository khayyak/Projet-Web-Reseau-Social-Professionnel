<template>
  <div class="app-container">
    <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
<header>
  <nav class="header-nav container flex-container">
    <h1 class="logo"><a class="logo-link" href="#">FSSM SOCIAL</a></h1>
    <ul class="header-menu flex-container">
      <li><a class="header-menu-link" @click="toUca()">UCA</a></li>
    </ul>
    <button @click="toLogin()" class="ghost-button">S'authentifier</button>
  </nav>
</header>
<section class="section about-section gray-bg" id="about" style="margin-top:-45%;">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Faculté des scieneces Semlalia</h3>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Créé en</label>
                                        <p>1978</p>
                                    </div>
                                    <div class="media">
                                        <label>Flières</label>
                                        <p>7</p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p>Boulevard Prince My Abdellah, Marrakech</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>fssm@uca.ma</p>
                                    </div>
                                    <div class="media">
                                        <label>Telephone</label>
                                        <p>+212 (0)5 24 43 46 49 </p>
                                    </div>
                                    <div class="media">
                                        <label>Fax</label>
                                        <p>+212 (0)5 24 43 67 69</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://www.linkpicture.com/q/semlalia_1.jpg" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">3500</h6>
                                <p class="m-0px font-w-600">étudiants</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">5</h6>
                                <p class="m-0px font-w-600">Départements</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">25</h6>
                                <p class="m-0px font-w-600">amphis</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">40</h6>
                                <p class="m-0px font-w-600">salles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  </div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
/* eslint-disable */
import axios from 'axios'
import appHeader from '@/components/Header/index.vue';
export default {
  data(){
    return {
      fields:{
        email:'',
        nom:'',
        prenom:'',
        mdp:'',
        sexe:''
      },
      anneeL:0,
      question:{
        first:'',
        second:'',
        third:''
      },
      reponses:{
        first:'',
        second:'',
        third:''
      },
      shower : false
    }
  },
  methods: {
      toLogin(){
          this.$router.push({path: 'auth'})
      },
      showModal()
      {
        axios.get('api/questions/'+this.anneeL).then(response=>{
            this.question.first = response.data.questions[0]['question']
            this.question.second = response.data.questions[1]['question']
            this.question.third = response.data.questions[2]['question']
            $('#exampleModal').modal('show');
        })
        .catch(e=>{
            console.log(e);
        })
      },
      closeModal()
      {
        $('#exampleModal').modal('hide');
      },
      onChange(event) {
              var data = event.target.value;
              this.fields.sexe = data;
          },
          addUser()
          {
            axios.post('api/addUser/'+this.anneeL+'/'+this.reponses.first+'/'+this.reponses.second+'/'+this.reponses.third,this.fields).then(response=>{
                                if(response.data.success == 0)
                                {
                                  toast.fire({
                      type: 'warning',
                      title: 'Votre réponses ne sont pas correctes, s\'il vous plait contactez l\'administration de FSSM',
                      icon: 'warning',
                      timerProgressBar : true,
                      timer: 6000,
                    })
                    this.getEnseignant()
                    $('#exampleModal').modal('hide');
                $('#success').html(response.data.message)
                                }

                                }).catch(()=> {
                                });
          }
  },
  components: {
    'app-Header': appHeader,
  },
};
</script>
<style>
/* Import Pretty Checkboxes*/
@import "https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css";
/* Import Varela Round from Google Fonts*/
@import url('https://fonts.googleapis.com/css?family=Varela+Round');

/*Variables defined*/
:root {
  --main-color: coral;
  --text-color: #444;
  --formcolor: white;
  --button-color: hsl(356, 90%, 64%);
}

#body {
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-color);
  font-family: 'Varela Round', sans-serif; /* Very similar font to Helvetica Round.*/
  font-size: 1.1rem;
  font-weight: bold;
  background-repeat: no-repeat; /* Don't repeat gradient in landscape mode on mobile phones*/
  background-attachment: fixed;
}

#form {
  display: block;
  border-radius: 12px;
  padding: 10vh 10vw;
  background: var(--formcolor);
  text-align: center;
  box-shadow: 0px 0px 5px hsl(195, 50%, 98%);
}

.title {
  padding: 10px 0px;
  border-bottom: 4px solid;
  font-size: 3rem;
  margin-bottom: 15px;
}

.signup-field {
  padding-left: 18%;
  text-align: left;
}

fieldset {
  display: inline;
  text-align: left;
  padding: 10px;
}

#btn {
  font-family: inherit;
  font-size: 1.3rem;
  font-weight: 600;
  margin-top: 1.2rem;
  padding: 0.8rem 1.2rem;
  border: 2px outset var(--button-color);
  border-radius: 10px;
  cursor: pointer;
  color: var(--text-color);
  background-color: transparent;
  transition: all 0.2s ease-out;
}

#btn:hover {
  cursor: pointer;
  background-color: var(--button-color, black);
  color: var(--formcolor);
  transition-duration: 0.4s;
}

.input-field {
  border: 0;
  border-radius: 5px;
  height: 40px;
  padding: 0.8rem 1.2rem;
  margin: 0.3rem 0;
  background-color: #f0f0f0;
}

label {
  display: block;
}
</style>
<style>
body{
    color: #6F8BA4;
    margin-top:20px;
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}


</style>
