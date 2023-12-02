<?php
function echo_star($a)
{
    $b = 5 - $a;
    if ($a == 1 || $a == 2 || $a == 3 || $a == 4 || $a == 5) {
        for ($i = 0; $i < $a; $i++) {
            echo '<i class="fa fa-star" aria-hidden="true" style="color: #f6931f;"></i>';
        }
        for ($i = 0; $i < $b; $i++) {
            echo '<i class="fa fa-star-o" aria-hidden="true" ></i>';
        }
    } else {
        for ($i = 0; $i < $a - 1; $i++) {
            echo '<i class="fa fa-star" aria-hidden="true" style="color: #f6931f;"></i>';
        }
        echo '<i class="fa fa-star-half-o" aria-hidden="true" style="color: #f6931f;></i>';
        for ($i = 0; $i < $b; $i++) {
            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
        }
    }
}
