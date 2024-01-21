Um ein PHP-Skript zu erstellen, das Bilder aus einem Verzeichnis `/www/img` ausliest und diese in einem Carousel auf einer statischen HTML-Seite darstellt, gehen wir folgendermaßen vor:

1. Das PHP-Skript liest alle Bilddateien aus dem angegebenen Verzeichnis.
2. Es generiert HTML-Code, der ein Carousel (z.B. mit Bootstrap) enthält.
3. Die Bilder werden als Carousel-Items eingefügt.
4. Das generierte HTML wird in eine Datei geschrieben, um eine statische Webseite zu erzeugen.

Hier ist ein einfaches Beispiel für ein solches PHP-Skript:

```php
<?php
$directory = '/www/img';
$images = glob($directory . '/*.jpg'); // Annahme, dass alle Bilder JPGs sind

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chris Craft Image Carousel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';

// Indikatoren für jedes Bild
foreach ($images as $index => $image) {
    $html .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $index . '" ' . ($index == 0 ? 'class="active"' : '') . '></li>';
}

$html .= '</ol>
        <div class="carousel-inner">';

// Carousel-Items
foreach ($images as $index => $image) {
    $html .= '<div class="carousel-item ' . ($index == 0 ? 'active' : '') . '">
                <img src="' . $image . '" class="d-block w-100" alt="...">
              </div>';
}

$html .= '</div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="