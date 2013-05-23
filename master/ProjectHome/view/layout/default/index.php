<!DOCTYPE html>
<html lang="fr">
<meta charset='utf-8'>
<title>Place4home - Consulter les annonces</title>
<meta content='announce-website' property='og:type'>
<meta content='Place 4Voisinage Miromesnil' property='og:title'>
<meta content='Place4 Voisinage Miromesnil' property='og:site_name'>
<meta content='Site annonces entre voisins' property='og:description'>

<!-- CSS -->
<link href="<?php echo Router::webroot('css/membre.css'); ?>" rel="stylesheet">
<link href="<?php echo Router::webroot('css/bublebox.css'); ?>" rel="stylesheet">
<link href="<?php echo Router::webroot('css/connection.css'); ?>" rel="stylesheet">

<link href="<?php echo Router::webroot('css/map.css'); ?>" rel="stylesheet">
<link href="<?php echo Router::webroot('css/footer.css'); ?>" rel="stylesheet">
<link href="<?php echo Router::webroot('css/style.css'); ?>" rel="stylesheet">
<link href="<?php echo Router::webroot('css/editor.css'); ?>" rel="stylesheet">

<!-- 768 -->
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/membre-768.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/bublebox-768.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/connection-768.css'); ?>" rel="stylesheet">

<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/map-768.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/footer-768.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/style-768.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 768px)" href="<?php echo Router::webroot('css/editor-768.css'); ?>" rel="stylesheet">

<!-- 320 -->
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/membre-320.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/bublebox-320.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/connection-320.css'); ?>" rel="stylesheet">

<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/map-320.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/footer-320.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/style-320.css'); ?>" rel="stylesheet">
<link media="screen and (max-width: 320px)" href="<?php echo Router::webroot('css/editor-320.css'); ?>" rel="stylesheet">



</head>
<body>
<header id="header">  <!-- header -->
    <div class="navbar-inner">
      <div class="brandcontainer"> <a class="brand" href="<?php echo Router::url(''); ?>" style="font-family:'billabong'; font-size: 35px;">Place4home</a>
        <ul class="nav">
          <!-- Annonces  -->
          <li class="menuli"><a href="<?php echo Router::url(''); ?>">Annonces</a></li>
          
          <!-- Mon Profil  -->
          <?php if (isset($_SESSION['User'])){ ?>
            <li class="menuli"><a href="<?php echo Router::url('users/profile/id:'.$_SESSION['User']->id); ?>">Profil</a></li>
            <li class="menuli"><a href="<?php echo Router::url('users/signout'); ?>">Logout</a></li>
          <?php }else{ ?>
            <!-- Inscription  -->
            <li class="menuli"><a href="<?php echo Router::url('users/register'); ?>">S'inscrire</a></li>
            <li class="menuli"><a href="<?php echo Router::url('users/signin'); ?>">Login</a></li>
          <?php } ?>
          
          
            <!-- Annonce Title Search  -->
            <li id="searchlocation" class="navbar-form search-area">
              <input id="searchaddressbox" class="span2" type="search" placeholder="Search" value="Sydney, NSW">
              <!-- <input type="button" value="Geocode" onclick="codeAddress()"> -->
            </li>
          </li>
        </ul>
      </div>
      <!-- end nav --> 
    </div>
</header>

  

                        <?php echo $this->Session->flash(); ?>
                        <?php echo $content_for_layout; ?>
          
          




<!-- SCRIPTS -->




</body>
</html>