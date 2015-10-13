<?php 

$url = "http://elasticaccess.herokuapp.com/api/cars/". $_GET['id'];
$r = wp_remote_get( $url, array(
    'timeout'     => 30,
    'redirection' => 10,
    'httpversion' => '1.1',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
    'blocking'    => true,
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null,
    'headers' => array( "x-authentication" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZWFsZXIiOiJ1cHBsYW5kc21vdG9yIn0.mq-UIAa7nlZJ3Sct5XLn1N6FONKjHhCI2ePJZoakoZc")
));
   	$car = json_decode($r['body']);
   	$car->similarCars = null;
 ?>
 
<!-- google stuff -->
<?php foreach ($car->images->image as $key => $value): ?>
	<img src="<?php echo $value ?>" alt="">
<?php endforeach ?>
<h1><?php echo $car->brand ?> <?php echo $car->model ?> <?php echo $car->modeldescription ?></h1>
<p><?php echo $car->{"price-sek"} ?> SEK</p>
<!-- end of google stuff -->
<dl class="dl-horizontal">
    <dt>Årsmodell</dt><dd class="ng-binding"><?php echo $car->yearmodel ?></dd>
    <dt>Miltal</dt><dd class="ng-binding"><?php echo $car->miles ?></dd>
    <dt>Växellåda</dt><dd class="ng-binding"><?php echo $car->gearboxtype ?></dd>
    <dt>Kaross</dt><dd class="ng-binding"><?php echo $car->bodytype ?></dd>
    <dt>Färg</dt><dd class="ng-binding"><?php echo $car->color_raw ?></dd>
    <dt>Bränsle</dt><dd class="ng-binding"><?php echo $car->fueltype ?></dd>
    <dt>Reg.nr</dt><dd class="ng-binding"><?php echo $car->regno ?></dd>
    <dt>Anläggning</dt><dd class="ng-binding"><?php echo $car->city ?></dd>
</dl>
<h2>Utrustning</h2>
<p>Läs mer om bilens utrustning nedan eller kontakta en säljare för mer information.</p>
<?php 
	$infoArr = explode(",", $car->info);
 ?>
 <ul>
 	<?php foreach ($infoArr as $key => $value): ?>
 			<li><?php echo $value ?></li>
 	<?php endforeach ?>	
 </ul>