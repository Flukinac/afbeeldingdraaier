
<script language="javascript">
imgAr = new Array();
<?php
$file = "$hm/HIR/images.txt";

$lines = file($file);
$count = count($lines);
//echo("Toal Images to rotate".$count."<br>");

$i=0;
$k=0;

foreach ($lines as $line_num => $line)
{
	if($k==0)
	{
	$k=$k+1;
	$firstPos = strpos($line,'"');
	$secPos = strpos($line,'"',($firstPos+1));
	$width = substr($line,$firstPos+1,($secPos-$firstPos)-1);

	$firstPos1 = strpos($line,'"',($secPos+1));
	$secPos1 = strpos($line,'"',($firstPos1+1));
	$height = substr($line,$firstPos1+1,($secPos1-$firstPos1)-1);

	$firstPos2 = strpos($line,'"',($secPos1+1));
	$secPos2 = strpos($line,'"',($firstPos2+1));
	$speed = substr($line,$firstPos2+1,($secPos2-$firstPos2)-1);
	}
	else
	{
	//echo $line;
	$firstPos = strpos($line,'"');
	$secPos = strpos($line,'"',($firstPos+1));
	//echo "=======================$firPos-$secPos<br>";
	$img[$i] = substr($line,$firstPos+1,($secPos-$firstPos)-1);
	$imh = $img[$i];
	print "imgAr.push(\"$imh\" );";
	//echo $img[$i]."<br>";
	$i=$i+1;
	}
}
?>
</script>

<script language="javascript">
var k = 0;
var wid12 = <?php echo($width); ?>;
var hig12 = <?php echo($height); ?>;

if (document.images)
{
	var rImg = new Array();
	for (var i=0; i<imgAr.length; i++)
	{
		rImg[i] = new Image(wid12,hig12);
                rImg[i].src = imgAr[i];
	}
}

function rotater()
{
//var ssd = imgAr[k];
//document["test"].src = ssd;
document["test"].src = rImg[k].src;

if( k < (imgAr.length-1))
{
 	k= k+1;
}
else
{
	k = 0;
}

rTimer = setTimeout('rotater()', <?php echo($speed); ?> );

 }
</script>

<table align=center cellpading=0 cellspacing=0 border=0>
<tr><td>
<img width="<?php echo($width); ?>"  height="<?php echo($height); ?>" name=test src="<?php echo($img[0]); ?>">
</td></tr><tr align=right><td>
<a href="http://www.hscripts.com" style="font-size: 8px; color:green; text-decoration:none;">HIR</a>
</td></tr></table>

<script language="javascript">
rotater();
</script>
