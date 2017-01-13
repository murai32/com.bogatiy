<?php if (!defined('FW')) die('Forbidden'); ?>


<?php

$svg11 = "<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'  xml:space='preserve'>
<!-- фильтра -->
<!--defs>
	<filter id='matrix-invert'>
		<feColorMatrix in='SourceGraphic' type='matrix' values='-1 0 0 0 1 
		0 -1 0 0 1 
		0 0 -1 0 1
		0 0 0 1 0'/>
	</filter>
	<pattern id='img1' patternUnits='userSpaceOnUse' width='100' height='100'>
		<image xlink:href='wall.jpg' x='0' y='0' width='100' height='100' />
	</pattern>
</defs-->


<!--маски-->			
<!--symbol id='owner-img-mask'-->

<!--могу использовать сложные конструкции для построения масок-->	
<!--g>
	<rect x='0' y='0' width='100' height='600' fill='black'/>
	<rect x='0' y='0' width='100%' height='3.75em' fill='white'/>	
</g>
</symbol-->

<!--mask id='mask-rect' fill='black'>
	<use xlink:href='#owner-img-mask' />
</mask-->


<!--изображения-->
<symbol id='owner-img'>
	<image xlink:href= '" .$atts['image']['url'] . "' x='0' y='0' height='541' width='406'/>
</symbol>


<!-- g mask='url(#mask-rect)'>
	<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#owner-img' ></use>
</g -->


</svg>";

// var_dump($atts['image']);

$size = getimagesize ("http:" . $atts['image']['url']);

$svg ="
<svg version='1.1' id='Pasha-img' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
viewBox='0 0 " . ($size[0]+150) . " 541' enable-background='new 0 0 406 541' xml:space='preserve'>

        <mask id='mask-circles'>
            <g>
            	<rect x='0' y='0' width='100%' height='100%' fill='black'/>
              <rect x='0' y='150' width='100%' height='100' fill='white'/>  
            </g>
        </mask>

        <mask id='mask-circles-invert'>
            <g>
            	<rect x='0' y='0' width='100%' height='100%' fill='white'/>
              <rect x='0' y='150' width='100%' height='100' fill='black'/>  
            </g>
        </mask>

	<symbol id='owner-img'>
		<image overflow='visible' " . $size[3] . " xlink:href='" .$atts['image']['url'] . "' >
	</symbol>



  <g mask='url(#mask-circles)'>
		<use  id='img-patch-indent' xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#owner-img' x='.75rem' y='0' " . $size[3] . "></use>
  </g>

   <g mask='url(#mask-circles-invert)'>
		<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#owner-img' x='0' y='0' " . $size[3] . "></use>
  </g>


</image>
</svg>";




if ( !empty( $atts['image']))  { 
	$content = "<div class='page-about-aside__photo'>" . $svg . "</div>";
} 

/*if ( !empty( $atts['image']))  { 
	$content = "<div class='page-about-aside__photo'><img src=" . $atts['image']['url'] . "></div>";
} */


echo $content;
?>