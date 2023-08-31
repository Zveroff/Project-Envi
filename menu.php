<!DOCTYPE html>
<html lang="ru">
<head>
  <?php session_start();?>
    <meta charset="UTF-8">
      <!-- этот стиль для меню---><link rel="stylesheet" href="./css/menu.header.css" />
      <link rel="stylesheet" href="./css/reset.css" />
      <link rel="stylesheet" href="./css/base.css" />
      <div class="vip_sidebar">
      <div class="vip_sidebar-logo">
        <div class="logo">
          <img src="./img/logo.png" alt="logo" />
        </div>
      </div>

      <nav class="vip_sidebar-nav nav">
        <h2 class="vip_nav-title">Меню</h2>
        <ul class="vip_nav-list">
          <li><a href="/news_envi.php"><img src="./img/nav-icons/flash.png" alt="New In" />Новости</a></li>
          <li><a href="/women.php"><img src="./img/nav-icons/clothing.png" alt="Clothing" />Женская одежда</a></li>
          <li><a href="/man.php"><img src="./img/nav-icons/shoes.png" alt="Shoes" />Мужская одежда</a></li>
          <li><a href="/teenagers.php"><img src="./img/nav-icons/case.png" alt="Accessories" />Подростковая одежда</a></li>
          <li><a href="/sportswear.php"><img src="./img/nav-icons/acrobat.png" alt="NActivewear"/>Спортивная одежда</a></li>
          <li><a href="/scool_forms.php"><img  src="./img/nav-icons/diamond.png" alt="Inspiration"/>Школьная одежда</a></li>
        </ul>
      </nav>

      <div class="footer_sait_bar">
        <p_vip_footer>© 2023, Envi<br>Все права защищены</p_vip_footer>
      </div>
      <div class="footer_sait_bar_icon">
        <a href="https://vk.com/envi_shop"><img height="40px" width="40px" src="./img/nav-icons/vk.png" alt="vk" /></a>
        <a href="https://t.me/envi_shop"><img height="40px" width="40px" src="./img/nav-icons/tg.png" alt="tg" /></a>
      </div>
    </div>
      
  </div>
  </div>
    </div>
    <main class="vip_main">
      <header class="vip_header">
        <!-- header-links -->
        <div class="vip_header-links">
          <nav class="vip_nav-header">
            <ul class="vip_nav-header-list">
              <li class="nav-header-link-text active"><a href="/index.php">Главная</a></li>
              <li class="nav-header-link-text"><a href="/presentation.html">Наша презентация</a></li>
              <li class="nav-header-link-text"><a href="/o_nas.php">О нас</a></li>
              <li class="nav-header-link-text"><a href="/contacs_form.php">Контакты</a></li>
              
              <?php
              session_start();
              require_once('db.php');
              if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT id FROM users WHERE login = '$username'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $id = $row['id'];
                echo '<div class="vip_otstup_profile_1">'; 
                echo '<li class="nav-header-link-icon"><a href="/profile.php?id=' . $id . '"><img src="./img/icons/person.svg" alt="Cart" /></a></li>'; echo '</div>';
                echo '<div class="vip_otstup_profile_2">'; 
                echo '<li class="nav-header-link-text-vip"><a href="/logaut.php">Выйти</a></li>'; echo '</div>';
              } else {
                echo '<div class="vip_otstup_reg_log">';
                echo '<li class="nav-header-link-text-vip"><a href="/register_form.php">Регистрация</a></li>'; echo '</div>';
                echo '<div class="vip_otstup_reg_log">';
                echo '<li class="nav-header-link-text-vip"><a href="/login_form.php">Вход</a></li>';echo '</div>';
              }
              ?>
          </ul>
          </nav>
        </div>
      </head>
      <body>
      </header>
    </body>
    </html>
		<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15809124;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/15809124/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>