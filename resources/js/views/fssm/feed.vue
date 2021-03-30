<template>
<div class="container" style="width:60%;margin-top:10%;">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
        <div class="w3-col m2" style="margin-left:-35%;width:30%;">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Évènements à venir:</p>
          <i class="fab fa-vuejs" style="color:green"></i>
          <p><strong>Formation en Vue.Js</strong></p>
          <p>Mardi 2021/03/30 à 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Demande d'amitié</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Mohamed Ahid Sidi</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fas fa-user-times"></i></button>
            </div>
          </div>
        </div>
      </div>
        <br>
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Demande d'amitié</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Mohamad Kardal</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fas fa-user-times"></i></button>
            </div>
          </div>
        </div>
      </div>
      </div>
        <div class="user-activity">
          <div v-for="post in posts" :key="post.id" class="post">
            <div class="user-block">
              <img
                class="img-circle"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDkaQO69Fro8SZLTVZQ75JH2R0T-sn5yIA_lKGwvvgQ0R0BoQtUQ"
                alt="user image"
              >
              <span class="username text-muted">
                <a href="#">{{post.nom}}</a>
              </span>
              <span class="description">Partagé en - {{post.date}}</span>
            </div>
            <p>
              {{post.contenue}}
            </p>
            <ul class="list-inline">
              <li @click="addReaction(post.id)" v-id="post.nom">
                <a v-if="dislike == false" class="link-black text-sm">
                  <svg-icon icon-class="like" />Like
                </a>
                <a v-if="dislike" style="color:blue" class="link-black text-sm">
                  <svg-icon icon-class="like" />Dislike
                </a>
              </li>
              <li class="pull-right">
                <a @click="getComments(post.id)" class="link-black text-sm">
                  <svg-icon icon-class="comment" />Commentaires
                  {{post.nbrComment}}
                </a>
              </li>
            </ul>
            <div :id="post.id" v-if="post.id == comment.post && visible" v-for="comment in comments" :key="comment.id" class="be-comment">
		<div class="be-img-comment">
			<a href="blog-detail-2.html">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDkaQO69Fro8SZLTVZQ75JH2R0T-sn5yIA_lKGwvvgQ0R0BoQtUQ" alt="" class="be-ava-comment">
			</a>
		</div>
        <div class="be-comment-content">
				<span class="be-comment-name">
					<a href="blog-detail-2.html">{{comment.nom}}</a>
					</span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					{{comment.date}}
				</span>

			<p class="be-comment-text">
				{{comment.contenue}}
			</p>
		</div>
	</div>
            <el-input placeholder="Type a comment" />
          </div>
  </div>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const userResource = new Resource('users');
/*eslint-disable*/
export default {
  props: {
    user: {
      type: Object,
      default: () => {
        return {
          name: '',
          email: '',
          avatar: '',
          roles: [],
          posts:[],
          visible:false,
        };
      },
    },
  },
  data() {
    return {
      activeActivity: 'first',
      carouselImages: [
        'https://cdn.laravue.dev/photo1.png',
        'https://cdn.laravue.dev/photo2.png',
        'https://cdn.laravue.dev/photo3.jpg',
        'https://cdn.laravue.dev/photo4.jpg',
      ],
      updating: false,
      posts:[],
      visible:false,
      comments:[],
      dislike:false

    };
  },
  methods: {
    handleClick(tab, event) {
      console.log('Switching tab ', tab, event);
    },
    onSubmit() {
      this.updating = true;
      userResource
        .update(this.user.id, this.user)
        .then(response => {
          this.updating = false;
          this.$message({
            message: 'User information has been updated successfully',
            type: 'success',
            duration: 5 * 1000,
          });
        })
        .catch(error => {
          console.log(error);
          this.updating = false;
        });
    },
    getPosts()
      {
           axios.get('api/posts/list').then(response=>{
            this.isLoaded = true
        this.posts = response.data.posts
        })
        .catch(e=>{
            console.log(e);
        })
      },
      getComments(id)
        {
            axios.get('api/comments/list/'+id).then(response=>{
            this.comments = response.data.comments
            this.visible = !this.visible;
            })
        .catch(e=>{
            console.log(e);
        })
        },
        addReaction(id)
        {
            axios.post('api/addReaction/'+id).then(()=>{
                this.dislike = true
                                }).catch(()=> {
                                });
        },
  },
  created()
    {
       this.getPosts();
    },
};
</script>

<style lang="scss" scoped>
.user-activity {
  .user-block {
    .username, .description {
      display: block;
      margin-left: 50px;
      padding: 2px 0;
    }
    img {
      width: 40px;
      height: 40px;
      float: left;
    }
    :after {
      clear: both;
    }
    .img-circle {
      border-radius: 50%;
      border: 2px solid #d2d6de;
      padding: 2px;
    }
    span {
      font-weight: 500;
      font-size: 12px;
    }
  }
  .post {
    font-size: 14px;
    border-bottom: 1px solid #d2d6de;
    margin-bottom: 15px;
    padding-bottom: 15px;
    color: #666;
    .image {
      width: 100%;
    }
    .user-images {
      padding-top: 20px;
    }
  }
  .list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
    li {
      display: inline-block;
      padding-right: 5px;
      padding-left: 5px;
      font-size: 13px;
    }
    .link-black {
      &:hover, &:focus {
        color: #999;
      }
    }
  }
  .el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 200px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
}
.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

</style>
