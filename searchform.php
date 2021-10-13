<form class="modal__form modal__form--search" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
    <div class="modal__field modal__field--search modal__field--anim">
        <input class="modal__input" type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Например: Алла Рой">
    </div>
    <div class="modal__actions modal__actions--search modal__field--anim">
        <button type="submit" value="Поиск" class="modal__btn modal__btn--search button button--transparent">
            <span class="modal__search-icon">
                <svg class="modal__search-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2941 14.5699 18.0029 12.8204 18 11C18 7.132 14.867 4 11 4C7.132 4 4 7.132 4 11C4 14.867 7.132 18 11 18C12.8204 18.0029 14.5699 17.2941 15.875 16.025L16.025 15.875Z"/>
                </svg> 
            </span>
            Найти
        </button>
    </div>
</form>