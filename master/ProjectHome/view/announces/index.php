
<body>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />

<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--  GEOCODER -->    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<section class='street-header'>   <!-- begin section -->
  
  <div id="popupbox">
  
  <form action="<?php echo Router::url('announces/post/'); ?>" method="post">
  	
                        <input type="hidden" name="id" value="">                
                        <input type="hidden" name="user_id" value=""> 
                        <input type="hidden" name="lat" value="">
                        <input type="hidden" name="lng" value=""> 
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['User']->id; ?>">                
                        <a href="#"><button type="submit">Poster l'annonce !</button></a>
                        <label for="inputcontent"></label>
                        <textarea id="inputcontent" name="content" rows="10" placeholder="Annonce"></textarea>
                        <div class="coords"></div>             
       </form>
  
  </div> <!-- END FORM -->
  
  
  
  
    <div id="masterbublebox"><!-- master buble box -->  
            <a class="leaflet-popup-close-button" href="#close">×</a>
        
                <?php foreach ($announces as $k => $v): ?> 
                <!-- ZOOM bublebox CHAQUE annonce --> 
            
          <!-- ZOOM bublebox // annonce --> 
              
              <div class="buble zoombox">
                 <h3 class="buble-title"  data-lat="<?php echo $v->lat; ?>" data-lng="<?php echo $v->lng; ?>"  ><a class="geo-announce"  data-lat="<?php echo $v->lat; ?>" data-lng="<?php echo $v->lng; ?>" href="#geo-ann"> Title - user ID <?php echo $v->user_id; ?></a></h3>
                <div class="buble-content">
                       <!-- text annonce -->
                       <p class="bubletxt"><?php echo $v->content; ?></p>
                       <div class='item-image'>
  
                       </div>
                        <!-- Auteur -->
                       <div class='annonce-author'>
                           <div class='annonce-author-image'>
                               <a href="#autorprofile"><img alt="author" src="img/lea.jpg" /></a>
                           </div>
                           <div class='annonce-author-description'>
                               <h3>
                               Adresse : 
                               <a href="<?php echo Router::url("announces/view/id:{$v->id}"); ?>" id="annonce_author_link"><?php echo $v->address; ?></a>
                               </h3>
                            </div>
                        </div>
  
  
                        <!-- infos Annonce time vues -->
                       <ul class='buble-info'>
                           <li class='icon-with-text-container'>
                               <i class='ss-calendar icon-part'></i>
                               <div class='text-part'>
                                   Created 22 hours ago
                               </div>
                           </li>
                           <li class='icon-with-text-container'>
                               <i class='ss-view icon-part'></i>
                               <div class='text-part'>
                                   Viewed
                                   47 times
                               </div>
                           </li>
                       </ul>
                       
                </div>
              </div>
              
              
              	
              	<?php endforeach ?>
          </div><!-- END master buble box --> 
              
              
              
      <!-- HOME buble box -->
          <div id="my-home-bublebox">
              <div  class="buble zoombox" id="infos-home-user">
                  42 rue Miro
              </div>
          
          </div> <!-- END HOME buble box -->
              
              
  
  <!--  MAP ZONE -->
  
          <div id="map"></div>
          
          <style>
          
          #map { z-index: 10;
              width: 100%; height: 600px; margin: 0 0 0 0px;
          }
          
          .leaflet-popup-content-wrapper {
              max-width: 250px;
          }
          
          .display {
              position: fixed;
              margin-top: 2%;
              margin-left: 59%;
              z-index: 10;
          }
          
          .leaflet-popup-close-button {
              position: fixed;
              margin-top: 20px;
              margin-left: 180px;
              z-index: 1500;
          }
          </style>
          
         
          
            
  
  </div>
  
  
  <div class='menuwrapper'>
  <div class='street-logo'> <a href='/'> <img alt="street_logo" src="img/lea.jpg" /> </a> </div>
 
  <div class='street-navigation'>
    
      <!--   menu quartier --> 
      <nav class='street-actions actions-menu'> 
        <a class='first-child' href='#' title='Annonce Map'><div id="geo-home" class='text-with-icon hidden'>MapView</div></a> 
        <a class='addbox selected' href='#i' title='Announces listing'><div class='text-with-icon hidden'>Annonces List</div></a> 
        <?php if (isset($_SESSION['User'])): ?>
          <a class='' href='#homespace' title='Community'><div id="my-home" class='text-with-icon hidden' data-userlat="<?php echo $_SESSION['User']->lat; ?>"  data-userlng=" <?php echo $_SESSION['User']->lng; ?>" >Home View</div></a>
        <?php endif ?>
      </nav> <!--  end menu quartier --> 
      
    </div>
  </div>
</section>  <!-- end map header -->


<section class='wrapper'>   <!-- begin section -->
  
  
  <div class='page-content'>  <!-- ALTTTT begin annonce content -->
        
          <div class='feed-navigation'>
            
            
            <!-- feed action 2-->
            <div class='feed-actions actions-menu'> <a class='request-link' href='#'> <i class='#'></i>
              <div class='text-with-icon' id='post_new_listing'>Répondre !</div></a>
            </div>
            <div class='feed-actions actions-menu'> <a class='request-link' href='#'> <i class='#'></i>
              <div class='text-with-icon' id='post_new_listing'>BLA !</div></a>
            </div>
            <div class='feed-actions actions-menu'> <a class='request-link' href='#'> <i class='#'></i>
              <div class='text-with-icon' id='post_new_listing'>BLABLA !</div></a>
            </div>
                    
          </div> <!-- End feedaction -->
        
    </div> <!-- ALTTT  END page content -->  
  
</section>  <!-- end wrapper section -->



<!-- SCRIPTS -->

<script>
var geocoder;

function initialize() {
  geocoder = new google.maps.Geocoder();
}  

function codeAddress() {
  var address = document.getElementById('searchaddressbox').value;
  console.log("yesss");
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    
      console.log(results[0].geometry.location.jb);
      console.log(results[0].geometry.location.kb);
      // end interesting function
      var lat = results[0].geometry.location.jb;
      var lng = results[0].geometry.location.kb;
      map.setView([lat ,  lng], 16);
      

    } else {
      alert('Votre adresse est incorrecte' + status);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


// Press enter submit location in searchbar
$("input#searchaddressbox").keydown(function(e){
    if (e.keyCode == 13 && !e.shiftKey)
    {
        codeAddress();
    } else {
    console.log("pas ok");
}
});  
</script>



<script> 
// hide JS fade divs
         $("#my-home-bublebox").hide();
         $(".page-content").hide();
         $("#masterbublebox").hide();
</script>

<script> 

// Fade In Annonce list onclick
$(document).ready(function(){ 
  $(".addbox").click(function () {
      $("#my-home-bublebox").fadeOut(1000);
      $(this).addClass("on");
      $("#masterbublebox").addClass("display");
      $(".display").fadeIn(1000);
  }); 
  
  
  // Close Annonce List when click on button croix
  $(".leaflet-popup-close-button").click(function () { 
      console.log('hello');
      $(".display").fadeOut(1000);
  });
});  
    

</script>

<script>
            
           // SET MASTER MAP
           var map = L.map('map').setView([48.85522811385678, 2.3531341552734375 ], 13);
           L.tileLayer('http://{s}.tile.cloudmade.com/ffdd86e27a8a46129afb5e678456afaf/997/256/{z}/{x}/{y}.png', {
               attribution: 'Hello Place4Home',
               maxZoom: 18
           }).addTo(map);
           
           		
           
   
/*           
           
           //ALONE POPUP
           var popup = L.popup()
               .setLatLng([51.5, -0.09])
               .setContent("I am a standalone popup.")
               .openOn(map);
               
               
               
           //EVENT CLICK COORDONNÉS
           function onMapClick(e) {
               alert("You clicked the map at " + e.latlng);
           }
           
           map.on('click', onMapClick);
           */
           
           // Click Set new view from announce local
           $(".geo-announce").click( function () {
               var lat = $(this).data("lat");
               var lng = $(this).data("lng");
               console.log(lat , lng);
               map.setView([lat ,  lng], 18);
           }) 
           
           // Replace view at central Paris
           $("#geo-home").click( function () {
               $("#my-home-bublebox").hide();
               map.setView([48.85522811385678, 2.3531341552734375], 13);
           }) 
           
           // Place view at user ID home adress
           $("#my-home").click( function () {
                   $("#masterbublebox").hide();
                   $("#my-home-bublebox").fadeIn(1000);
                   
                   var userlat = $(this).data("userlat");
                   var userlng = $(this).data("userlng");
                   console.log(userlat)
                   console.log(userlng)
                   console.log("hello")
                   map.setView([userlat, userlng], 18);
            }) 
           
           
           //EVENT AFFICHER UNE ANNONCES 
           $("#masterbublebox h3").each( function () {
                   var e = $(this);
                   var lat = e.attr("data-lat");
                   var lng = e.attr("data-lng");
                   console.log(lat, lng);
                   if (lat && lng) {
                       var marker = L.marker([lat, lng]).bindPopup(e.html()).addTo(map);
                       marker.on("click", function () { marker.openPopup()})
                   }
           });
           
           
           //EVENT CLICK AND POPUP COORDONNES
           var popup = L.popup();
           
           var form = $('#popupbox');
           form.remove();
           
           function onMapClick(e) {
               var coords = e.latlng;
               form.find("[name=lat]").val(coords.lat);
               form.find("[name=lng]").val(coords.lng);
               var div = form.get(0);
               popup
                   .setLatLng(e.latlng)
                   .setContent(div) //selectionner plusieurs div et parmis ces divs le premier element
                   .openOn(map);
           }
           
           map.on('click', onMapClick);
   </script>


