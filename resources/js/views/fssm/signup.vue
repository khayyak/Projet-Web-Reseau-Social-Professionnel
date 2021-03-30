<template>
  <div class="app-container">
    <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
<header>
  <nav class="header-nav container flex-container">
    <h1 class="logo"><a class="logo-link" href="#">FSSM SOCIAL</a></h1>
    <ul class="header-menu flex-container">
      <li><a class="header-menu-link" @click="toAutour()">FSSM</a></li>
      <li><a class="header-menu-link" @click="toUca()">UCA</a></li>
    </ul>
    <button @click="toLogin()" class="ghost-button">S'authentifier</button>
  </nav>
</header>
<body style="margin-top:-46%;" id="body">
  <form id="form" style="margin-top:5%;"> <!-- name attribute bom rabil samo če dodam Javascript-->
    <h1 class="title">Créer une compte</h1>
    <div class="signup-field">
      <label for="name">Nom</label>
      <input type="text" v-model="fields.nom" name="name" class="input-field" placeholder="Type your name" required autofocus>
    </div>
    <div class="signup-field">
      <label for="last_name">Prénom</label>
      <input type="text" v-model="fields.prenom" name="last_name" class="input-field" placeholder="Type your last name" required>
    </div>
    <div class="signup-field">
      <label for="email">E-mail</label>
      <input type="email" v-model="fields.email" name="email" class="input-field" placeholder="example@domain.com" required>
    </div>
        <div class="signup-field">
    <label>ُ* Pour les lauréats</label>
      <select style="width:60%;margin-left:0%;margin-top:5%;" v-model="anneeL" @change="showModal" class="browser-default custom-select mb-4" required>
                          <option value="0" selected disabled>L'année de lauréat</option>
                          <option value="2007">2007</option>
                          <option value="2008">2008</option>
                          <option value="2009">2009</option>
                        </select>
        </div>
    <div class="signup-field">
      <label for="password">Mot de passe</label>
      <input type="password" name="password" class="input-field" placeholder="Mot de passe" required>
    </div>
    <fieldset>
      <legend class="gender">Sexe</legend>
      <div class="pretty p-icon p-round p-plain p-smooth p-bigger">
        <input type="radio" @change="onChange($event)" value="male" name="gender">
        <div class="state p-primary-o">
          <i class="fas fa-male icon"></i>
          <label for="male">Male</label>
        </div>
      </div>

      <div class="pretty p-icon p-round p-plain p-smooth p-bigger">
        <input @change="onChange($event)" type="radio" value="female" name="gender">
        <div class="state p-primary-o">
          <i class="fas fa-female icon"></i>
          <label for="female">Female</label>
        </div>
      </div>
    </fieldset>

  <div>
    <input id="btn" @click="addUser()" type="button" value="Enregistrer">
  </div>
  </form> <!-- End of class="Form" container. -->
  <label v-show="shower">Les reponses ne sont pas correctes , s'il vous plait Contacter l'administration pour plusieurs d'informations </label>
</body>
<!-- Modal for reactions -->
<div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="exampleModalLabel" class="modal-title">Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" role="form">
    <input id='step2' type='checkbox'>
    <input id='step3' type='checkbox'>
    <div id="part1" class="form-group">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">{{question.first}}</h3>
        </div>
        <input type="text" id="name" v-model="reponses.first" class="form-control" placeholder="Full Name" aria-describedby="sizing-addon1">
        <div style="margin-top:10%;float:right;padding-left:10%;" class="btn-group btn-group-lg" role="group" aria-label="...">
          <label for='step2' id="continue-step2" class="continue">
            <div class="btn btn-default btn-success btn-lg">Continue</div>
          </label>
        </div>
      </div>
    </div>

    <div id="part2" class="form-group">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">{{question.second}}</h3>
        </div>
        <input type="text" id="name" v-model="reponses.second" class="form-control" placeholder="Full Name" aria-describedby="sizing-addon1">
        <div style="margin-top:10%;float:right;padding-left:10%;" class="btn-group btn-group-lg btn-group-justified" role="group" aria-label="...">

          <label for='step2' id="back-step2" class="back">
            <div class="btn btn-default btn-primary btn-lg" role="button">Back</div>
          </label>
          <label style="padding-left:2%;" for='step3' id="continue-step3" class="continue">
            <div class="btn btn-default btn-success btn-lg" role="button">Continue</div>
          </label>

        </div>
      </div>
    </div>

    <div id="part3" class="form-group">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">{{question.third}}</h3>
        </div>
                <input type="text" id="name" v-model="reponses.third" class="form-control" placeholder="Full Name" aria-describedby="sizing-addon1">
        <div style="margin-top:10%;float:right;padding-left:10%;" class="btn-group btn-group-lg" role="group" aria-label="...">
          <label for='step3' id="back-step3" class="back">
            <div class="btn btn-default btn-primary btn-lg">Retour</div>
          </label>
          <label class="continue">
            <button type="button" @click="closeModal()" class="btn btn-default btn-success btn-lg">Valider</button>
          </label>
        </div>
      </div>
    </div>
  </form>
          </div>
          <br><br>
        </div>
      </div>
    </div>
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
      toAutour() {
              this.$router.push({ path: 'autour' });
    },
    toUca() {
              this.$router.push({ path: 'uca' });
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
<style lang="scss">
.form-container {
  width: 100%;
  max-width: 320px;
  margin: 0 auto;
  input[type=text], input[type=email], input[type=phone], input[type=number], textarea {
    width: 90%;
    margin: 20px auto;
    border: 1px solid white;
    box-shadow: 0  0 1px 1px white;
  }
  textarea {
    min-height: 150px;
  }
  .panel {
    background: rgba(0,0,0,.2);
    .panel-heading {
      margin-bottom: 20px;
    }
  }
  .btn-group {
    width: 90%;
    margin: 0 auto 10px auto;
  }
  .back {
    float: left;
  }
  .continue {
    float: right;
  }
}

/* Multi-Part CSS */
input[type=checkbox] {
  position: absolute;
  /* Position the checkbox in upper left corner */
  opacity: 0;
}

/* Styling Parts */
#part1,
#part2,
#part3 {
  z-index: 2;
  display: block;
  height: auto;
  opacity: 1;
  transition: opacity 1s ease-in-out;
}

/* Hidden Parts */
#part2,
#part3 {
  opacity: 0;
  height: 0;
  overflow: hidden;
}

/* Show Step 2 & Hide Step 1 */
#step2:checked ~ #part2 {
  opacity: 1;
  height: auto;
}
#step2:checked ~ #part1 {
  opacity: 0;
  height: 0;
  display: none;
}

/* Show Step 3  & Hide Step 2 */
#step3:checked ~ #part3 {
  opacity: 1;
  height: auto;
}
#step3:checked ~ #part2 {
  opacity: 0;
  width: 0;
  height: 0;
}
</style>
