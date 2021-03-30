<template>
  <div class="app-container">
    <div class="site">
  <div class="nav">
  <ul>
    <li>
      <a href="#">
        <i class="fa fa-info"></i>
        <span>ABOUT</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-pencil"></i>
        <span>BLOG</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-folder-open-o"></i>
        <span>WORKS</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-comments-o"></i>
        <span>TALK</span>
      </a>
    </li>
  </ul>  
  </div>
  <div class="content">
    <div class="overlay"></div>
    <h2>WORATANA PERTH</h2>
    <h1>FRONT-END DEVELOPER<br>& WORDPRESS LOVER</h1>
    <h3>I craft meaningful experiences for design-inspired<br>
    and mission-driven companies.</h3>
    <a href="#"><button>GET IN TOUCH</button></a>
  </div>
</div>
  </div>
</template>
<style lang="scss">
$main_color: #1F1F24;
$text_color: #B89775;

body, html {
  height: 100%;
  font-family: 'Montserrat', sans-serif;
}

.site {
  min-height: 100%;
  display: flex;
}

.nav {
  background: $main_color;
  color: $text_color;
  width: 15px;
  overflow: hidden;
  transition: 0.5s;
  display: flex;
  
  &.active {
    width: 111px;
    
    ul {
      opacity: 1;
    }
    
    & + .content .overlay {
      opacity: 0.5;
    }
  }
}

ul {
  opacity: 0;
  transition: 0.5s;
  width: 111px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  
  li {
    width: 80px;
    text-align: center;
    margin-bottom: 1em;
    padding-bottom: 1em;
    border-bottom: 1px solid rgba(235,237,242,0.47);
  }
  
  li:last-child {
    border-bottom: 0;
  }
  
  a {
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    letter-spacing: 2px;
    transition: 0.2s;
    
    &:hover {
      color: $text_color;
    }
  }
  
  i.fa {
    display: block;
    font-size: 40px;
    margin-bottom: 0.2em;
  }
}

.content {
  position: relative;
  background: #B89775 url(https://i.imgur.com/Ls5KVai.jpg) 50% 50%;
  background-size: cover;
  flex: 1;
  text-align: center;
  
  h2 {
    margin-top: 3em;
    font-size: 1.7vw;
    letter-spacing: 0.54;
    margin-bottom: 1em;
  }
  
  h1 {
    font-size: 4vw;
    font-weight: bold;
  }
  
  h3 {
    margin: 1em 0;
    font-size: 1.6vw;
    line-height: 1.5em;
    letter-spacing: -0.4;
  }
  
  button {
    padding: 12px 15px;
    background: transparent;
    border: 2px solid $main_color;
    font-size: 1vw;
    font-family: 'Montserrat', sans-serif;
    cursor: pointer;
    transition: 0.5s;
    
    &:hover {
      color: $text_color;
      background: $main_color;
    }
  }
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: $main_color;
  opacity: 0;
  transition: 0.3s;
  pointer-events: none;
}
</style>
