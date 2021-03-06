<!--  GEOCODER -->    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />

<div id="register-map"> 

        <div class="page-header">
        	<h2>S'inscrire</h2>
        </div>
        
        
        
        <form class="connection" action="<?php echo Router::url('users/register/'); ?>" method="post">
        
        	<?php echo $this->Form->input('id','hidden'); ?>
        
        	<label for="inputlogin"></label>
        	<?php echo $this->Form->input('login', 'Nom d\'utilisateur', array( 'placeholder' => 'Nom d\'utilisateur')); ?>
        
        	<label for="inputpassword"></label>
        	<?php echo $this->Form->input('password', 'Mot de passe', array(
        		'type'	=> 'password',
        		'placeholder' => 'Password'
        		)); ?>
        
        	<label for="inputfirstname"></label>
        	<?php echo $this->Form->input('firstname', 'Prénom', array( 'placeholder' => 'Prénom'));?>
        
        	<label for="inputlastname"></label>
        	<?php echo $this->Form->input('lastname', 'Nom', array( 'placeholder' => 'Nom')); ?>
        
        	<label for="inputaddress"></label>
        	<?php echo $this->Form->input('address', 'Adresse', array( 'placeholder' => 'Adresse' , 'onchange' => 'codeAddress()')); ?>
        	
        	<input id="lat-value" type="hidden" name="lat" value="" >
            <input id="lng-value" type="hidden" name="lng" value="" >
            
        	<div class="form-actions">
        		<button type="submit" class="btn sendconnection" onclick="inputlatlng()" >Envoyer</button>
        	</div>
        
        </form>
        
        <div id="map" class="test-geocoding-map"> </div>
</div> <!-- END REGISTER MAP -->

<script> 


$(".navbar-form").hide();

var geocoder;

function initialize() {
  console.log("zefzef");
  geocoder = new google.maps.Geocoder();
}  

google.maps.event.addDomListener(window, 'load', initialize);

function codeAddress() {
  var address = document.getElementById('inputaddress').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      //console.log(results[0].geometry.location.jb);
      //console.log(results[0].geometry.location.kb);
      
      // end interesting function
      var lat = results[0].geometry.location.jb;
      var lng = results[0].geometry.location.kb;
      
      $("#lat-value").val(results[0].geometry.location.jb);
      $("#lng-value").val(results[0].geometry.location.kb);
      
      //map.setView([lat ,  lng], 16);
      map.setView([lat ,  lng], 18);
      var marker =  L.marker([lat, lng]).addTo(map);
      
        
    } else {
      alert('Votre adresse est incorrecte : ' + status);
    }
  });
}



var map = L.map('map').setView([48.85522811385678, 2.3531341552734375 ], 13);
L.tileLayer('http://{s}.tile.cloudmade.com/ffdd86e27a8a46129afb5e678456afaf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Hello Place4Home',
    maxZoom: 18
}).addTo(map);


</script>