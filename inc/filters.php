<?php
    
    /* Убираем тег <p></p> у отрывков */
    remove_filter( 'the_excerpt','wpautop');