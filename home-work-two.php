<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Empty Document</title>
</head>

<body>
<?php

error_reporting(0);
function rgb2hex($rgb) {
   $hex = "#";
   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

   return $hex; // returns the hex value including the number sign (#)
}


$source_file = "https://alef.im/php-test-colors.jpg";

// опции для гистограммы

$maxheight = 300;
$barwidth = 2;

$im = ImageCreateFromJpeg($source_file);

$imgw = imagesx($im);
$imgh = imagesy($im);

// n = максимальный номер или пиксель

$n = $imgw*$imgh;

$histo = array();

for ($i=0; $i<$imgw; $i++)
{
        for ($j=0; $j<$imgh; $j++)
        {

                // получим  rgb значение для текущего пикселя

                $rgb = ImageColorAt($im, $i, $j);
                //echo $rgb."<br>";
                // извлечем каждое значение для  r, g, b

                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;

                // получим значение для RGB

                $V = round(($r + $g + $b) / 3);
                //echo $V."<br>";
                // добавим точки в нашу гистограмму

                $histo[$V] += $V / $n;
                $histo_color[$V] = rgb2hex([$r,$g,$b]);

        }
}

// найдем максимум в нашей гистограмме в порядке расположения

$max = 0;
for ($i=0; $i<255; $i++)
{
        if ($histo[$i] > $max)
        {
                $max = $histo[$i];
        }
}

echo "<div style='width: ".(256*$barwidth)."px; border: 1px solid'>";
for ($i=0; $i<255; $i++)
{
        $val += $histo[$i];

        $h = ( $histo[$i]/$max )*$maxheight;

        echo "<img src=\"img.gif\" width=\"".$barwidth."\"
height=\"".$h."\" border=\"0\">";
}
echo "</div>";

$key = array_search ($max, $histo);
$col = $histo_color[$key];
echo "в данном изображении самый популярный цвет - ";
echo $col;
?>

<p style="min-width:100px; min-height:100px; background-color:<?php echo $col?>;"></p>
<img src="<?php echo $source_file?>">
</body>
</html>
