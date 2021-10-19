<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <?php wp_head(); ?>
<body <?php body_class('page'); ?>>
    
    <!-- Modal-form -->
    <div class="modal js-modal" data-modal="modal-form">
        <div class="modal__close">
            <svg class="modal__close-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="357px" height="357px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
                <polygon points="357,35.7 321.3,0 178.5,142.8 35.7,0 0,35.7 142.8,178.5 0,321.3 35.7,357 178.5,214.2 321.3,357 357,321.3 214.2,178.5"/>
            </svg>
        </div>
        <div class="modal__body">
            <?php echo do_shortcode('[contact-form-7 id="36" title="Модальное окно" html_class="modal__form"]'); ?>
        </div>
    </div>
    <!-- Modal-form -->

    <!-- Modal-search -->
    <div class="modal js-modal" data-modal="modal-search">
        <div class="modal__close">
            <svg class="modal__close-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="357px" height="357px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
                <polygon points="357,35.7 321.3,0 178.5,142.8 35.7,0 0,35.7 142.8,178.5 0,321.3 35.7,357 178.5,214.2 321.3,357 357,321.3 214.2,178.5"/>
            </svg>
        </div>
        <div class="modal__body  modal__body--search">
            <?php get_search_form(); ?>
        </div>
    </div>
    <!-- Modal-search -->
    
    <!-- Header -->
    <header class="header js-header">
        <div class="header__body container">
            <a href="<?php echo home_url(); ?>" class="header__logo">
                <?php $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
                <?php if( !empty($custom_logo__url[0])) : ?>
                    <img src="<?php echo $custom_logo__url[0]; ?>" alt="Логотип" class="header__logo-img">
                <?php else : ?>
                    <img src="<?php echo STANDART_DIR; ?>img/logo-header.svg" alt="Логотип" class="header__logo-img">
                <?php endif; ?>
            </a>
            <div class="header__inner">
                <div class="header__menu js-menu">
                    <?php
                        wp_nav_menu([
                            'theme_location'  => 'header-menu',
                            'container'       => 'nav',
                            'container_class' => 'menu',
                            'menu_class'      => '',
                            'items_wrap'      => '<ul class="%2$s menu__list header__menu-list">%3$s</ul>'
                        ]);
                    ?>
                    <div class="header__search js-search" data-modal-trigger="modal-search">
                        <div class="header__search-icon">
                            <svg class="header__search-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2941 14.5699 18.0029 12.8204 18 11C18 7.132 14.867 4 11 4C7.132 4 4 7.132 4 11C4 14.867 7.132 18 11 18C12.8204 18.0029 14.5699 17.2941 15.875 16.025L16.025 15.875Z"/>
                            </svg>
                        </div>
                    </div>
                    <a href="#" class="header__basket hide">
                        <svg class="header__basket-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.99984 6.41408L0.756836 3.17208L2.17184 1.75708L5.41384 5.00008H20.6558C20.8117 5.00007 20.9654 5.03649 21.1047 5.10645C21.244 5.1764 21.365 5.27794 21.4581 5.40298C21.5511 5.52801 21.6137 5.67306 21.6407 5.82657C21.6678 5.98007 21.6586 6.13777 21.6138 6.28708L19.2138 14.2871C19.1521 14.4932 19.0255 14.6738 18.853 14.8023C18.6804 14.9307 18.471 15.0001 18.2558 15.0001H5.99984V17.0001H16.9998V19.0001H4.99984C4.73462 19.0001 4.48027 18.8947 4.29273 18.7072C4.10519 18.5197 3.99984 18.2653 3.99984 18.0001V6.41408ZM5.99984 7.00008V13.0001H17.5118L19.3118 7.00008H5.99984ZM5.49984 23.0001C5.10201 23.0001 4.72048 22.842 4.43918 22.5607C4.15787 22.2794 3.99984 21.8979 3.99984 21.5001C3.99984 21.1023 4.15787 20.7207 4.43918 20.4394C4.72048 20.1581 5.10201 20.0001 5.49984 20.0001C5.89766 20.0001 6.27919 20.1581 6.5605 20.4394C6.8418 20.7207 6.99984 21.1023 6.99984 21.5001C6.99984 21.8979 6.8418 22.2794 6.5605 22.5607C6.27919 22.842 5.89766 23.0001 5.49984 23.0001ZM17.4998 23.0001C17.102 23.0001 16.7205 22.842 16.4392 22.5607C16.1579 22.2794 15.9998 21.8979 15.9998 21.5001C15.9998 21.1023 16.1579 20.7207 16.4392 20.4394C16.7205 20.1581 17.102 20.0001 17.4998 20.0001C17.8977 20.0001 18.2792 20.1581 18.5605 20.4394C18.8418 20.7207 18.9998 21.1023 18.9998 21.5001C18.9998 21.8979 18.8418 22.2794 18.5605 22.5607C18.2792 22.842 17.8977 23.0001 17.4998 23.0001Z"/>
                        </svg>
                    </a>
                    <a href="tel:+79958896169" class="header__phone js-phone">
                        +7 995 889 6169
                    </a>
                </div>
            </div>
            <div class="burger-menu header__burger-menu js-burger">
                <span class="burger-menu__line"></span>
            </div>
        </div>
    </header>
    <!-- /. Header -->

    <!-- MAIN -->
    <main class="main page__container bg--white">