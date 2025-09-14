    <div class="custom-header">
        <div class="header-inner">
            
            <!-- Logo -->
            <div class="customp-left-element col-sm-8">
                <div class="custompage-logo">
                    <a class="navbar-brand custom-logo-widget" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php if ( get_theme_mod('ajs_logo') ) : ?>
                            <img src="<?php echo esc_url(get_theme_mod('ajs_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php elseif ( has_custom_logo() && get_custom_logo() ) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <span class="site-title"><?php bloginfo('name'); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="search-bar">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <!-- Cart + Account -->
            <div class="customp-right-element col-sm-4">
                <div class="header-offer">
                    <div style="display: flex; align-items: center; justify-content: space-evenly;">
                        <span class="dashicons dashicons-store"></span>
                        <strong>Offers</strong>
                    </div>
                    <div>
                        <a href="<?php echo esc_url( home_url( '/offers' ) ); ?>">
                            <div class="offertext">Latest Offers</div>
                        </a>
                    </div>
                </div>
                <div class="header-cart">
                    <a href="<?php echo esc_url( home_url( '/cart' ) ); ?>"><i class="fas fa-shopping-cart"></i> Cart</a>
                </div>
                <div class="header-account">
                    <a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" class="custom-logincss">
                        <span class="dashicons dashicons-admin-users"></span>
                    </a>
                    <span><strong>Account</strong><br>
                    <a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" class="custom-logincss">Login</a>
                    or
                    <a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" class="custom-logincss">Register</a></span>
                </div>
                <div class="mobile-card">
                    <a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" class="mobile-customcss"><span class="dashicons dashicons-admin-users"></span></a>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="mobile-customcss"><span class="dashicons dashicons-cart"></span></a>
                    <button class="search-toggle" id="search-toggle"><span class="dashicons dashicons-search"></span></button>
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="search-container">
            <div class="search-box" id="search-box">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

     <style>
        header{border-bottom: none;}
        .custom-header-container { width: 100%; font-family: Arial, sans-serif; }
        .header-top { display: flex; justify-content: space-between; background: #f5f5f5; padding: 5px 20px; font-size: 14px; }
        .customp-customp-header-main {display: flex;align-content: center;align-items: center;justify-content: space-between;padding: 10px 0px; background: #fff; flex-wrap: wrap;}
        .custompage-logo img { max-height: 90px; }
        .search-bar {flex: 1;margin: 0 20px;position: relative;}
        .search-bar input {width: 100%;border: none;padding: 10px 45px 10px 15px;font-weight: normal;border-radius: 4px;margin-bottom: 0;box-shadow: 1px 1px 5px #ccc;}
        .search-bar button {position: absolute;top: 55%;right: 10px;transform: translateY(-50%);border: none;background: none;cursor: pointer;color: #666;font-size: 18px;}
        .search-bar button:hover {color: #0f4148;}
        /*.customp-left-element{width: 65%;}
        input.searchinputbox {
            min-width: 500px;
        }*/
        .customp-left-element,.customp-right-element {display: flex;align-items: center;justify-content: space-around;}
        .header-offer {margin: 5px;padding: 5px;background: #ddd;border-radius: 5px;}
        .header-offer a{display: inline-block;padding: 5px 10px;color: #0f4148 !important;text-decoration: none;border-radius: 3px;}
        .header-offer a:hover {color: #ff0000 !important;}
        
        .header-cart a {display: inline-block;padding: 5px 10px;background: #0f4148;color: #fff !important;text-decoration: none;border-radius: 3px;}
        .header-cart a:hover {background: #ddd;color: #0f4148 !important;}
        .header-account{padding: 10px;}
        .header-account a {text-decoration: none;color:#0f4148 !important;}
        .header-account a:hover, a.custom-logincss:hover {color: #ff0000 !important;}
        /* Basic responsive header */
        .custom-header { display: flex; flex-direction: column; width: 100%;}
        /* Make the header sticky */
        header.elementor-element {position: sticky; top: 0;width: 100%;z-index: 9999;background: #fff;box-shadow: 0 1px 0px rgba(0,0,0,0.1);top: 0;transition: top 0.5s ease;}

        .header-inner { display: flex; align-items: center; justify-content: space-between; padding: 10px 5px; }
        .custom-navbar { display: none; flex-direction: column; padding: 10px; }
        .custom-navbar.active { display: flex; }
        .menu-toggle { display: none; border: none; font-size: 22px; cursor: pointer; }
        .search-container { display: none; }
        .search-box { display: none; }
        .mobile-card{ display: none; }

        nav#customnavbar { display: flex ; justify-content: center; }
        .home-icon a{padding:5px;border-radius: 5px;text-decoration:none;}
        .home-icon:hover a{background:#0f4148;color: #f5f5f5 !important;}
        .nav-list ul{ display: flex; flex-wrap: wrap; list-style: none; margin: 0; padding: 0; }
        .nav-list li { margin: 0; position: relative;font-size: 1rem;}
        .nav-list li a { display: block; padding: 10px 15px; color: #fff; text-decoration: none;border-bottom: 3px solid transparent; }
        .nav-list li:hover a{border-bottom: 3px solid #0f4148;}
        .nav-list li ul { display: none; position: absolute; top: 100%; left: 0; background: #333; list-style: none; padding: 0; margin: 0; min-width: 200px; z-index: 999; }
        .nav-list li:hover > ul { display: block; }
        .nav-list li ul li a { padding: 10px 15px; color: #fff; }
        @media (max-width: 991.98px) {
            form.search-form { display: flex ; align-items: center; align-content: center; justify-content: center; padding: 0 30px; flex-direction: row;}
         }
            
        /* Mobile styles */
        @media (max-width: 768px) {
            .menu-toggle {display: block;padding: 0 5px;}
            .search-container {order: 2;margin-left: auto;}
            .custom-navbar {order: 4;}
            .search-container,.mobile-card{display: flex ; font-size: 20px; align-items: center; justify-content: space-around; align-content: center;}
            .header-offer,.search-bar,.header-cart,.header-account{display: none;}
            .customp-right-element { display: flex ; align-items: center; justify-content: space-evenly; align-content: center; }
            button.search-toggle {border: none;font-size: 20px;background: none;}
            #search-box {max-height: 0;opacity: 0;overflow: hidden;transition: all 0.4s ease-in-out;}
            #search-box.active {display: block;max-height: 100px;opacity: 1;padding: 10px 0;}
            .dashicons, .dashicons-before:before{font-size: 25px;margin: 5px;}
            .customnavbar{display: none;}
         }
    </style>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const searchToggle = document.getElementById("search-toggle");
                const searchBox    = document.getElementById("search-box");
                const searchInput  = searchBox ? searchBox.querySelector('input[type="search"], input') : null;

                // 🎛️ Set your animation duration (in SECONDS)
                const DURATION_S = 0.4; // 0.4s = 400ms

                // Ensure baseline styles from JS (in case CSS is missing/overridden)
                Object.assign(searchBox.style, {
                    overflow: 'hidden',
                    maxHeight: '0px',
                    opacity: '0',
                    transition: `max-height ${DURATION_S}s ease, opacity ${DURATION_S}s ease`
                });

                // If any CSS elsewhere sets display:none, override it:
                searchBox.style.display = 'block';

                let open = false;

                function openSearch() {
                    // Set to full content height
                    const h = searchBox.scrollHeight;       // measure natural height
                    searchBox.style.maxHeight = h + 'px';
                    searchBox.style.opacity   = '1';
                    open = true;

                    // focus after the expand finishes
                    if (searchInput) {
                    setTimeout(() => searchInput.focus(), DURATION_S * 1000);
                    }
                }

                function closeSearch() {
                    // Start from current full height then collapse
                    searchBox.style.maxHeight = searchBox.scrollHeight + 'px';
                    // force reflow so transition runs from current value
                    void searchBox.offsetHeight;
                    searchBox.style.maxHeight = '0px';
                    searchBox.style.opacity   = '0';
                    open = false;
                }

                if (searchToggle && searchBox) {
                    searchToggle.addEventListener("click", function () {
                    if (open) {
                        closeSearch();
                    } else {
                        openSearch();
                    }
                    });
                }
            });

            let lastScroll = 0;
            const header = document.querySelector('header.elementor-element');

            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;

                if (currentScroll > lastScroll + 10) {
                    // Scrolling down -> hide header
                    header.style.top = '-120px'; // adjust according to header height
                } else if (currentScroll < lastScroll - 10) {
                    // Scrolling up -> show header
                    header.style.top = '0';
                }

                lastScroll = currentScroll;
            });
            
        </script>

