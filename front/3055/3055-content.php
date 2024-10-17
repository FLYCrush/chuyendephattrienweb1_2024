<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

$pattern_uri = '/' . preg_quote($pattern_document_root, '/') . '(.*)$/';

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div class="type-3055">
    <div class="header">
        <div class="icon">
            <div class="column">
                <i class="fa-solid fa-mobile-screen-button"></i>
                <span>WE REPAIR ALL TYPES OF ELECTRONICS</span>
            </div>
            <div class="column">
                <i class="fa-solid fa-truck-moving"></i>
                <span>ENTER THE DELIVERY ADDRESS</span>
            </div>
            <div class="column">
                <i class="fa-solid fa-sliders"></i>
                <span>FREE DIAGNOSTICS AND COST EVALUATION</span>
            </div>
            <div class="column">
                <i class="fa-solid fa-gear"></i>
                <span>HIGH QUALITY SPARE PARTS ONLY</span>
            </div>
        </div>
    </div>

    <div class="ruler"></div>
    
    <div class="content">
        <div class="content-header">
            <h2>OUR SERVICES</h2>
            <div class="swiper">
                <i class="fas fa-chevron-left"></i>
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <table>
            <tr>
                <td>
                    <img src="public/images/game.jpg" alt="Game console on a wooden table"/>
                    <h3>GAME CONSOLES REPAIR</h3>
                    <p>
                        Nullam non dignissim est, interdum ornare arcu. Morbi dignissim a ipsum in dignissim. Cras semper magna nec suscipit fermentum. Nullai iaculis dolor eu finibus imperdiet. Nullam non dignissim est, interdum ornare arcu.
                    </p>
                    <a href="#">READ MORE</a>
                </td>
                <td>
                    <img src="public/images/mac&pc.jpg" alt="Hand holding a phone with a broken screen"/>
                    <h3>MAC & PC REPAIR</h3>
                    <p>
                        Donec elementum commodo augue, vel sagittis velit vulputate sit amet. Fusce tortor libero, vulputate ac dolor a, facilisis molestie eros. In a odio lobortis enim malesuada ultrices at nec tellus.
                    </p>
                    <a href="#">READ MORE</a>
                </td>
                <td>
                    <img src="public/images/water.jpg" alt="Water damaged phone"/>
                    <h3>WATER DAMAGE</h3>
                    <p>
                        Fusce mollis turpis quis est sollicitudin bibendum. Donec laoreet leo dui, laoreet cursus metus pharetra ac. Proin condimentum dui at ipsum tempus volutpat eget eget lorem. Fusce mollis turpis quis est sollicitudin bibendum.
                    </p>
                    <a href="#">READ MORE</a>
                </td>
            </tr>
        </table>
    </div>  
      
</div>