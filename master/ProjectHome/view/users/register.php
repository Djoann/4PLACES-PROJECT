<!--  GEOCODER -->    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>

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
        	<?php echo $this->Form->input('address', 'Adresse', array( 'placeholder' => 'Adresse')); ?>
        	<input type="button" value="Geocode" onclick="codeAddress()">
        
        	<div class="form-actions">
        		<button type="submit" class="btn sendconnection">Envoyer</button>
        	</div>
        
        </form>
        
        <div id="map-test-adress"> </div>
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
  console.log("hello");
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      console.log(results[0].geometry.location.jb);
      console.log(results[0].geometry.location.kb);
      
      // end interesting function
      var lat = results[0].geometry.location.jb;
      var lng = results[0].geometry.location.kb;
      //map.setView([lat ,  lng], 16);
      

    } else {
      alert('Votre adresse est incorrecte' + status);
    }
  });
}


var map = L.map('map-test-adress').setView([48.85522811385678, 2.3531341552734375 ], 13);
L.tileLayer('http://{s}.tile.cloudmade.com/ffdd86e27a8a46129afb5e678456afaf/997/256/{z}/{x}/{y}.png', {
    attribution: 'Hello Place4Home',
    maxZoom: 1
}).addTo(map);

</script>