<style>
.coverimage {
    position: relative;
    background-image: url("http://givenget.eu/place4/ruelle.png");
    height: 200px;
}

</style>

        <div class='coverimage'> <!-- coverimage background -->
        
        
          <!--  MAP ZONE -->
          <!--<div id="map"></div>-->
          
          <!--  END MAP ZONE -->
    
        </div> <!-- end coverimage -->



<section class='street-header'>   <!-- begin section -->
  
  
  <!--  MAP ZONE == 0 -->
  
          <div class='wrapper'>
          <div class='street-logo'> <a href='#'> <img alt="User_logo" src="assets/img/louve.jpg" /> </a> </div>
          <div class='street-intro'>
            <div class='intro-wrapper'>
              <h1><?php echo $users->firstname; ?>
              <?php echo $users->lastname; ?></h1>
              <p> Je m'appelle <?php echo $users->firstname; ?>
              <?php echo $users->lastname; ?> 23 ans, je vie avec mes parents et mon grand frère 015463829</p>
            </div>
          </div>
          
  <div class='street-navigation'>
    <div class='wrapper'>
      <!--   menu quartier --> 
      <nav class='street-actions actions-menu'> 
      
        <a class='first-child selected' href='membre.html' title='Home'> <i class='#'></i><div class='text-with-icon hidden'>Home</div></a> 
        
        <a class='' href='#i' title='New listing'> <i class='#'></i><div class='text-with-icon hidden'>New Annonces</div></a> 
        
        <a class='' href='#' title='Community'> <i class='#'></i><div class='text-with-icon hidden'>Voisinage</div></a>
      </nav> <!--  end menu quartier --> 
      
    </div>
  </div>
</div>
</section> <!-- end real header -->

<section id="profile-infos">

<?php 
	$announces = $this->request('Announces', 'getAnnounces');
	$user = $this->request('Users','admin_getUsers');
	$comments = $this->request('Comments','getCom');
?>


<div id="profil-infobox">
    <div class="buble zoombox infos-left">

        <div class="arrow"></div>
        
         <h3 href="#" class="buble-title"> BLABLA1
         <a href="#about" class="announce-comments">Read more</a> </h3>
         
        <div class="buble-content">
            
               <!-- text annonce -->
               <p class="bubletxt"> 
                   BIO
               
               
               </p>
               
			<ul class='buble-info'>
				<li class='icon-with-text-container'>
					<i class='ss-calendar icon-part'></i>
					<div class='text-part'>
                               	<?php echo $users->address; ?>


					</div>
				</li>
			</ul>

	    </div>
    </div>
    
</div> <!-- END PROFILE INFO BOX -->



<div id="profilemasterbox"><!-- master buble box -->  
<?php foreach ($announces as $a): ?>
	<?php if ($a->user_id == $users->id): ?>
		<div class="buble zoombox">
                <div class="arrow"></div>
                 <h3 href="#" class="buble-title"  data-lat="<?php echo $a->lat; ?>" data-lng="<?php echo $a->lng; ?>" ><?php echo $users->firstname.' '.$users->lastname; ?> - <?php echo $a->user_id; ?> <a href="#about" class="announce-comments">Read more</a> </h3></a>
                <div class="buble-content">
                    
                       <!-- text annonce -->
                       <p class="bubletxt">
			<?php echo $a->content; ?>
			<?php foreach ($comments as $c): ?>
				<?php if ($c->announce_id == $a->id): ?>
					</p>
					<ul class='buble-info'>
						<li class='icon-with-text-container'>
							<i class='ss-calendar icon-part'></i>
							<div class='text-part'>
								<?php foreach ($user as $u): ?>
									<?php if ($u->id == $a->user_id): ?>
										<b><?php echo $u->firstname.' '.$u->lastname; ?></b>
									<?php endif ?>
								<?php endforeach ?>
								<?php echo $c->content; ?>
							</div>
						</li>
					</ul>
				<?php endif ?>
			<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
<?php endforeach ?>

</div> <!-- end profile masterbox -->



</section> <!--  END PROFILE NFOS -->