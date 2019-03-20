<!-- BEGIN THE BACKGROUND -->
<div class="bonfire-pageloader-background<?php if(is_singular() ) { ?> <?php echo $bonfire_pageloader_display; ?><?php } ?><?php if( get_theme_mod('bonfire_pageloader_progressbar_only') != '') { ?> pageloader-hide<?php } ?>">
</div>
<!-- END THE BACKGROUND -->

<!-- BEGIN THE BACKGROUND PATTERN -->
<?php if( get_theme_mod('pageloader_background_image') != '') { ?>
    <div class="bonfire-pageloader-background-image<?php if(is_singular() ) { ?> <?php echo $bonfire_pageloader_display; ?><?php } ?><?php if( get_theme_mod('bonfire_pageloader_progressbar_only') != '') { ?> pageloader-hide<?php } ?>" style="background-image:url(<?php echo get_theme_mod('pageloader_background_image'); ?>);">
    </div>
<?php } ?>
<!-- END THE BACKGROUND PATTERN -->

<!-- BEGIN THE LOADING IMAGE/ICON/TEXT -->
<div class="bonfire-pageloader-icon-wrapper<?php if(is_singular() ) { ?> <?php echo $bonfire_pageloader_display; ?><?php } ?>">
    <div class="bonfire-pageloader-icon">

        <div class="<?php if( get_theme_mod('bonfire_pageloader_progressbar_only') != '') { ?> pageloader-hide<?php } ?>">

            <!-- BEGIN THE CLOSE BUTTON -->
            <div class="close-pageloader"><?php if( get_theme_mod('bonfire_pageloader_custom_close_text') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_custom_close_text'); ?><?php } else { ?><?php _e( 'Taking too long? Close loading screen.', 'bonfire' ); ?><?php } ?></div>
            <!-- END THE CLOSE BUTTON -->
            
            <div<?php if( get_theme_mod('pageloader_elements_slidein') != '') { ?> class="loading-elements-wrapper"<?php } ?>>

                <!-- BEGIN LOADING IMAGE/ICON -->
                <?php if( get_theme_mod('bonfire_pageloader_hide_icon_image') == '') { ?>
                    <?php if( get_theme_mod('pageloader_custom_loading_image') != '' || get_theme_mod('pageloader_custom_loading_image_url') != '' ) { ?>
                        <div class="icon-wrapper"><img src="<?php if( get_theme_mod('pageloader_custom_loading_image_url') != '') { ?><?php echo get_theme_mod('pageloader_custom_loading_image_url'); ?><?php } else { ?><?php echo get_theme_mod('pageloader_custom_loading_image'); ?><?php } ?>" alt="<?php echo get_theme_mod('pageloader_custom_loading_image_alt_text'); ?>" class="<?php if( get_theme_mod('bonfire_pageloader_fade_animation') != '') { ?>pageloader-animate-fade <?php } ?><?php $bonfire_pageloader_animation_speed = get_theme_mod( 'pageloader_animation_speed' ); if( $bonfire_pageloader_animation_speed != '' ) { switch ( $bonfire_pageloader_animation_speed ) { case 'slow': echo 'pageloader-iconspeedslow'; break; case 'fast': echo 'pageloader-iconspeedfast'; break; case 'none': echo 'pageloader-iconspeednone'; break; }} ?> pageloader-<?php if( get_theme_mod('bonfire_pageloader_clockwise_animation') != '') { ?>counter<?php } ?>clockwise"></div>
                    <?php } else { ?>
                        <div class="pageloader-iconsize100 <?php $bonfire_pageloader_icon_size = get_theme_mod( 'pageloader_icon_size' ); if( $bonfire_pageloader_icon_size != '' ) { switch ( $bonfire_pageloader_icon_size ) { case '25': echo 'pageloader-iconsize25'; break; case '50': echo 'pageloader-iconsize50'; break; case '75': echo 'pageloader-iconsize75'; break; }} ?>">
                        
                            <div class="icon-wrapper"><svg class="<?php if( get_theme_mod('bonfire_pageloader_fade_animation') != '') { ?>pageloader-animate-fade <?php } ?><?php $bonfire_pageloader_animation_speed = get_theme_mod( 'pageloader_animation_speed' ); if( $bonfire_pageloader_animation_speed != '' ) { switch ( $bonfire_pageloader_animation_speed ) { case 'slow': echo 'pageloader-iconspeedslow'; break; case 'fast': echo 'pageloader-iconspeedfast'; break; case 'none': echo 'pageloader-iconspeednone'; break; }} ?> pageloader-<?php if( get_theme_mod('bonfire_pageloader_clockwise_animation') != '') { ?>counter<?php } ?>clockwise" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            
                                <?php $bonfire_pageloader_icon_selection = get_theme_mod( 'pageloader_icon_selection' ); if( $bonfire_pageloader_icon_selection != '' ) { switch ( $bonfire_pageloader_icon_selection ) {
                                    case 'icon1':
                                        echo '
                                        <path id="loading-12-icon" d="M291,82.219c0,16.568-13.432,30-30,30s-30-13.432-30-30s13.432-30,30-30S291,65.65,291,82.219z
                                            M261,404.781c-15.188,0-27.5,12.312-27.5,27.5s12.312,27.5,27.5,27.5s27.5-12.312,27.5-27.5S276.188,404.781,261,404.781z
                                            M361.504,113.167c-4.142,7.173-13.314,9.631-20.487,5.489c-7.173-4.141-9.631-13.313-5.49-20.487
                                        c4.142-7.173,13.314-9.631,20.488-5.489C363.188,96.821,365.645,105.994,361.504,113.167z M188.484,382.851
                                        c-14.348-8.284-32.697-3.368-40.98,10.98c-8.285,14.349-3.367,32.696,10.98,40.981c14.35,8.283,32.697,3.367,40.98-10.981
                                        C207.75,409.482,202.834,391.135,188.484,382.851z M421.33,184.888c-8.368,4.831-19.07,1.965-23.901-6.404
                                        c-4.832-8.368-1.965-19.07,6.404-23.902c8.368-4.831,19.069-1.964,23.9,6.405C432.566,169.354,429.699,180.056,421.33,184.888z
                                            M135.399,329.767c-8.285-14.35-26.633-19.266-40.982-10.982c-14.348,8.285-19.264,26.633-10.979,40.982
                                        c8.284,14.348,26.632,19.264,40.981,10.98C138.767,362.462,143.683,344.114,135.399,329.767z M436.031,277.249
                                        c-11.044,0-20-8.953-20-19.999c0-11.045,8.955-20.001,20.001-20.001c11.044,0,19.999,8.955,19.999,20.002
                                        C456.031,268.295,447.078,277.249,436.031,277.249z M115.97,257.251c-0.001-16.57-13.433-30.001-30.001-30.002
                                        c-16.568,0.001-29.999,13.432-30,30.002c0.001,16.566,13.433,29.998,30.001,30C102.538,287.249,115.969,273.817,115.97,257.251z
                                            M401.333,364.248c-10.759-6.212-14.446-19.97-8.234-30.73c6.212-10.759,19.971-14.446,30.731-8.233
                                        c10.759,6.211,14.445,19.971,8.232,30.73C425.852,366.774,412.094,370.46,401.333,364.248z M135.398,184.736
                                        c8.285-14.352,3.368-32.698-10.98-40.983c-14.349-8.283-32.695-3.367-40.981,10.982c-8.282,14.348-3.366,32.696,10.981,40.981
                                        C108.768,204,127.115,199.082,135.398,184.736z M326.869,421.328c-6.902-11.953-2.807-27.242,9.148-34.145
                                        s27.243-2.806,34.146,9.149c6.902,11.954,2.806,27.243-9.15,34.145C349.059,437.381,333.771,433.284,326.869,421.328z
                                            M188.482,131.649c14.352-8.286,19.266-26.633,10.982-40.982c-8.285-14.348-26.631-19.264-40.982-10.98
                                        c-14.346,8.285-19.264,26.633-10.98,40.982C155.787,135.017,174.137,139.932,188.482,131.649z"/>
                                        ';
                                        break;
                                    case 'icon2':
                                        echo '
                                        <path id="loading-10-icon" d="M303.5,92.984c0,22.092-17.908,40-40,40s-40-17.908-40-40s17.908-40,40-40S303.5,70.893,303.5,92.984z
                                            M263.5,389.016c-19.33,0-35,15.67-35,35s15.67,35,35,35s35-15.67,35-35S282.83,389.016,263.5,389.016z M429.016,283.5
                                        c-13.808,0-25-11.192-25-25s11.192-25,25-25s25,11.192,25,25S442.823,283.5,429.016,283.5z M137.984,258.5c0-22.092-17.908-40-40-40
                                        s-40,17.908-40,40s17.908,40,40,40S137.984,280.592,137.984,258.5z M174.748,113.179c15.621,15.621,15.621,40.947,0,56.568
                                        c-15.622,15.621-40.948,15.621-56.569,0c-15.622-15.621-15.622-40.947,0-56.569C133.8,97.557,159.126,97.557,174.748,113.179z
                                            M359.325,354.324c-11.717,11.716-11.717,30.71-0.001,42.426s30.71,11.716,42.427,0c11.716-11.716,11.716-30.71,0-42.426
                                        S371.041,342.608,359.325,354.324z M394.681,155.605c-7.811,7.81-20.475,7.81-28.285,0c-7.811-7.812-7.811-20.475,0-28.284
                                        c7.811-7.812,20.474-7.812,28.285,0C402.491,135.131,402.491,147.795,394.681,155.605z M174.748,347.253
                                        c-15.622-15.622-40.947-15.621-56.569,0c-15.621,15.621-15.622,40.947,0,56.568c15.621,15.621,40.947,15.621,56.568,0
                                        C190.369,388.2,190.369,362.874,174.748,347.253z"/>
                                        ';
                                        break;
                                    case 'icon3':
                                        echo '
                                        <path id="loading-9-icon" d="M296,90.484c0,22.092-17.908,40-40,40s-40-17.908-40-40s17.908-40,40-40S296,68.393,296,90.484z
                                                M256,381.516c-22.092,0-40,17.908-40,40s17.908,40,40,40s40-17.908,40-40S278.092,381.516,256,381.516z M421.516,296
                                            c-22.092,0-40-17.908-40-40s17.908-40,40-40s40,17.908,40,40S443.607,296,421.516,296z M130.484,256c0-22.092-17.908-40-40-40
                                            s-40,17.908-40,40s17.908,40,40,40S130.484,278.092,130.484,256z M167.248,110.679c15.621,15.621,15.621,40.947,0,56.568
                                            c-15.622,15.621-40.948,15.621-56.569,0c-15.622-15.621-15.622-40.947,0-56.569C126.3,95.057,151.626,95.057,167.248,110.679z
                                                M344.754,344.753c-15.622,15.621-15.622,40.947-0.001,56.568s40.947,15.621,56.569,0c15.621-15.621,15.621-40.947,0-56.568
                                            S360.375,329.132,344.754,344.753z M401.322,167.247c-15.621,15.621-40.947,15.621-56.568,0c-15.622-15.622-15.621-40.947,0-56.568
                                            s40.946-15.622,56.568,0C416.943,126.3,416.943,151.626,401.322,167.247z M167.248,344.753c-15.622-15.622-40.947-15.621-56.569,0
                                            c-15.621,15.621-15.622,40.947,0,56.568c15.621,15.621,40.947,15.621,56.568,0C182.869,385.7,182.869,360.374,167.248,344.753z"/>
                                        ';
                                        break;
                                    case 'icon4':
                                        echo '
                                        <path id="loading-13-icon" d="M296,90.484c0,22.092-17.908,40-40,40s-40-17.908-40-40s17.908-40,40-40S296,68.393,296,90.484z
                                                M256,381.516c-22.092,0-40,17.908-40,40s17.908,40,40,40s40-17.908,40-40S278.092,381.516,256,381.516z M421.516,296
                                            c-22.092,0-40-17.908-40-40s17.908-40,40-40s40,17.908,40,40S443.607,296,421.516,296z M90.484,236c11.028,0,20,8.972,20,20
                                            s-8.972,20-20,20s-20-8.972-20-20S79.456,236,90.484,236 M90.484,216c-22.092,0-40,17.908-40,40s17.908,40,40,40s40-17.908,40-40
                                            S112.576,216,90.484,216z M138.966,118.962c5.34,0,10.362,2.081,14.14,5.859c7.798,7.798,7.799,20.485,0.001,28.283
                                            c-3.778,3.777-8.801,5.858-14.144,5.858c-5.342,0-10.364-2.08-14.143-5.858c-3.777-3.777-5.858-8.8-5.858-14.142
                                            c0-5.343,2.081-10.365,5.859-14.144c3.776-3.776,8.8-5.857,14.143-5.857 M138.963,98.962c-10.236,0.001-20.475,3.906-28.284,11.716
                                            c-15.622,15.622-15.622,40.948,0,56.569c7.811,7.811,18.047,11.716,28.284,11.716s20.474-3.905,28.285-11.716
                                            c15.621-15.621,15.621-40.947,0-56.568C159.437,102.866,149.2,98.961,138.963,98.962z M344.754,344.753
                                            c-15.622,15.621-15.622,40.947-0.001,56.568s40.947,15.621,56.569,0c15.621-15.621,15.621-40.947,0-56.568
                                            S360.375,329.132,344.754,344.753z M401.322,167.247c-15.621,15.621-40.947,15.621-56.568,0c-15.622-15.622-15.621-40.947,0-56.568
                                            s40.946-15.622,56.568,0C416.943,126.3,416.943,151.626,401.322,167.247z M138.964,353.037c5.342,0,10.364,2.08,14.142,5.858
                                            c3.778,3.777,5.858,8.8,5.858,14.142s-2.081,10.364-5.859,14.142c-3.777,3.778-8.8,5.858-14.142,5.858s-10.364-2.08-14.143-5.858
                                            c-3.777-3.777-5.857-8.8-5.857-14.142s2.08-10.364,5.857-14.142C128.599,355.117,133.622,353.037,138.964,353.037 M138.964,333.037
                                            c-10.238,0-20.473,3.904-28.285,11.716c-15.621,15.621-15.622,40.947,0,56.568c7.811,7.811,18.047,11.716,28.284,11.716
                                            s20.474-3.905,28.284-11.716c15.622-15.621,15.622-40.947,0.001-56.568C159.438,336.942,149.199,333.037,138.964,333.037z"/>
                                        ';
                                        break;
                                    case 'icon5':
                                        echo '
                                        <path id="loading-14-icon" d="M256,50C142.23,50,50,142.23,50,256s92.23,206,206,206s206-92.23,206-206S369.77,50,256,50z
                                                M256.001,124.6c72.568,0,131.399,58.829,131.399,131.401c0,72.568-58.831,131.398-131.399,131.398
                                            c-72.572,0-131.401-58.83-131.401-131.398C124.6,183.429,183.429,124.6,256.001,124.6z M70,256
                                            c0-49.682,19.348-96.391,54.479-131.521S206.318,70,256,70v34.6c-83.482,0.001-151.4,67.918-151.4,151.401
                                            c0,41.807,17.035,79.709,44.526,107.134l-24.269,24.757c-0.125-0.125-0.254-0.245-0.379-0.37C89.348,352.391,70,305.682,70,256z"/>
                                        ';
                                        break;
                                    case 'icon6':
                                        echo '
                                        <path id="loading-4-icon" d="M136.577,250.095l-85.618-15.097l5.209-29.544l85.59,15.092
                                            C138.853,229.954,137.073,239.856,136.577,250.095z M256.432,136c5.08,0,10.086,0.319,15,0.932V50h-30v86.932
                                            C246.346,136.319,251.352,136,256.432,136z M191.39,155.145l-55.878-66.593l-22.98,19.283l55.889,66.605
                                            C175.229,167.096,182.942,160.603,191.39,155.145z M160.827,183.479l-75.294-43.471l-15,25.98l75.267,43.455
                                            C149.724,200.129,154.794,191.418,160.827,183.479z M229.804,138.97l-29.729-81.679l-28.191,10.261l29.728,81.676
                                            C210.43,144.691,219.884,141.218,229.804,138.97z M303.07,145.401l29.455-80.927L321.25,60.37l-29.456,80.93
                                            C295.639,142.483,299.401,143.853,303.07,145.401z M375.843,244.081l85.024-14.992l-3.125-17.727l-85.005,14.989
                                            C374.2,232.106,375.246,238.027,375.843,244.081z M364.139,203.051l74.695-43.125l-8-13.856L356.13,189.2
                                            C359.096,193.617,361.771,198.244,364.139,203.051z M338.793,168.734l55.416-66.042l-10.725-8.999l-55.409,66.035
                                            C331.823,162.521,335.399,165.531,338.793,168.734z M168.417,337.557l-55.89,66.605l22.98,19.283l55.878-66.593
                                            C182.938,351.394,175.226,344.9,168.417,337.557z M323.993,355.181l55.664,66.338l18.385-15.428l-55.674-66.349
                                            C336.781,345.475,330.628,350.652,323.993,355.181z M354.425,325.274l74.912,43.251l11-19.053l-74.9-43.244
                                            C362.342,312.934,358.651,319.307,354.425,325.274z M285.026,372.562l29.649,81.46l24.432-8.893l-29.649-81.461
                                            C301.745,367.475,293.565,370.475,285.026,372.562z M375.933,266.914c-0.608,6.743-1.771,13.326-3.448,19.7l85.085,15.003
                                            l3.473-19.695L375.933,266.914z M136.577,261.9l-85.619,15.097l5.209,29.545l85.59-15.092
                                            C138.852,282.042,137.073,272.14,136.577,261.9z M145.798,302.553l-75.267,43.455l15,25.98l75.293-43.471
                                            C154.792,320.577,149.722,311.866,145.798,302.553z M201.607,362.77l-29.728,81.677l28.191,10.26l29.729-81.677
                                            C219.88,370.781,210.426,367.307,201.607,362.77z M256.432,376c-4.736,0-9.406-0.283-14-0.817V462h28v-86.817
                                            C265.838,375.717,261.168,376,256.432,376z"/>
                                        ';
                                        break;
                                    case 'icon7':
                                        echo '
                                        <path id="loading-2-icon" d="M236,163.117V50h40v113.117c-6.449-1.382-13.139-2.116-20-2.116S242.449,161.735,236,163.117z
                                                M227.021,165.509L170.322,67.6l-34.641,20l56.678,97.873C202.248,176.542,214.027,169.667,227.021,165.509z M185.479,192.351
                                            L87.6,135.681l-20,34.641l97.912,56.689C169.672,214.017,176.547,202.24,185.479,192.351z M161,256.001
                                            c0-6.861,0.734-13.551,2.117-20H50v40h113.117C161.734,269.552,161,262.862,161,256.001z M256,351c-5.979,0-11.826-0.559-17.5-1.615
                                            V462h35V349.385C267.828,350.441,261.98,351,256,351z M165.592,285.24L67.6,341.681l20,34.641l98.053-56.475
                                            C176.693,309.98,169.787,298.22,165.592,285.24z M331.289,313.934l96.863,55.893l12.5-21.65l-96.84-55.879
                                            C340.59,300.086,336.361,307.351,331.289,313.934z M290.008,344.725l56.002,97.177l25.98-15l-56.025-97.221
                                            C308.23,335.983,299.484,341.09,290.008,344.725z M192.139,326.334l-56.459,98.068l34.641,20l56.42-98.001
                                            C213.762,342.203,202.002,335.295,192.139,326.334z M350.477,246.001c0.344,3.287,0.523,6.622,0.523,10c0,3.377-0.18,6.713-0.523,10
                                            H462v-20H350.477z M309.602,177.562l56.457-98.197l-12.124-7l-56.436,98.159C301.718,172.577,305.761,174.933,309.602,177.562z
                                                M342.252,216.143l97.266-56.282l-8.5-14.722l-97.26,56.279C337.009,206.04,339.855,210.966,342.252,216.143z"/>
                                        ';
                                        break;
                                    case 'icon8':
                                        echo '
                                        <path id="loading-5-icon" d="M50.969,236c10.059-104.384,98.01-186,205.03-186c107.022,0,194.974,81.616,205.032,186h-40.223
                                            c-4.387-36.769-20.84-70.79-47.43-97.38C342.025,107.267,300.34,90,255.999,90c-44.34,0-86.026,17.267-117.38,48.62
                                            c-26.589,26.59-43.041,60.611-47.43,97.38H50.969z M420.809,276c-4.387,36.769-20.84,70.79-47.43,97.38
                                            C342.025,404.733,300.34,422,255.999,422c-44.34,0-86.026-17.267-117.38-48.62c-26.589-26.59-43.042-60.611-47.43-97.38H50.969
                                            c10.058,104.385,98.009,186,205.03,186c107.022,0,194.974-81.615,205.032-186H420.809z"/>
                                        ';
                                        break;
                                    case 'icon9':
                                        echo '
                                        <path id="loading-6-icon" d="M50.969,236.001C60.393,138.198,138.198,60.394,236,50.97V91.19
                                            c-36.768,4.388-70.789,20.84-97.379,47.43s-43.043,60.612-47.431,97.381H50.969z M276,91.19c36.768,4.388,70.789,20.84,97.379,47.43
                                            s43.043,60.612,47.431,97.381h40.222C451.607,138.198,373.802,60.394,276,50.97V91.19z M236,420.81
                                            c-36.769-4.388-70.79-20.84-97.379-47.43c-26.589-26.589-43.042-60.61-47.431-97.379H50.97
                                            C60.394,373.804,138.199,451.606,236,461.03V420.81z M420.81,276.001c-4.389,36.769-20.842,70.79-47.431,97.379
                                            c-26.589,26.59-60.61,43.042-97.379,47.43v40.221c97.801-9.424,175.606-87.227,185.03-185.029H420.81z"/>
                                        ';
                                        break;
                                    case 'icon10':
                                        echo '
                                        <path id="loading-8-icon" d="M50.97,236c4.035-41.876,20.599-80.088,45.91-110.835l28.439,28.439
                                            C106.525,177.492,94.792,205.819,91.19,236H50.97z M275.999,50.969V91.19c30.181,3.602,58.508,15.335,82.396,34.129l28.44-28.44
                                            C356.087,71.568,317.875,55.004,275.999,50.969z M153.604,125.319c23.888-18.794,52.215-30.527,82.395-34.129V50.97
                                            c-41.875,4.035-80.087,20.6-110.834,45.91L153.604,125.319z M125.319,358.395C106.525,334.507,94.792,306.181,91.19,276H50.97
                                            c4.034,41.876,20.599,80.088,45.909,110.835L125.319,358.395z M358.396,386.681c-23.889,18.794-52.216,30.527-82.396,34.129v40.222
                                            c41.876-4.035,80.089-20.6,110.836-45.911L358.396,386.681z M386.681,153.604c18.794,23.888,30.527,52.215,34.129,82.396h40.221
                                            c-4.035-41.876-20.6-80.089-45.91-110.836L386.681,153.604z M420.81,276c-3.602,30.181-15.335,58.508-34.129,82.396l28.439,28.439
                                            c25.312-30.747,41.875-68.959,45.91-110.835H420.81z M235.999,420.81c-30.18-3.602-58.508-15.335-82.395-34.13l-28.44,28.44
                                            c30.747,25.311,68.96,41.875,110.835,45.91V420.81z"/>
                                        ';
                                        break;
                                    }
                                } else {
                                    echo '
                                    <path id="loading-12-icon" d="M291,82.219c0,16.568-13.432,30-30,30s-30-13.432-30-30s13.432-30,30-30S291,65.65,291,82.219z
                                            M261,404.781c-15.188,0-27.5,12.312-27.5,27.5s12.312,27.5,27.5,27.5s27.5-12.312,27.5-27.5S276.188,404.781,261,404.781z
                                            M361.504,113.167c-4.142,7.173-13.314,9.631-20.487,5.489c-7.173-4.141-9.631-13.313-5.49-20.487
                                        c4.142-7.173,13.314-9.631,20.488-5.489C363.188,96.821,365.645,105.994,361.504,113.167z M188.484,382.851
                                        c-14.348-8.284-32.697-3.368-40.98,10.98c-8.285,14.349-3.367,32.696,10.98,40.981c14.35,8.283,32.697,3.367,40.98-10.981
                                        C207.75,409.482,202.834,391.135,188.484,382.851z M421.33,184.888c-8.368,4.831-19.07,1.965-23.901-6.404
                                        c-4.832-8.368-1.965-19.07,6.404-23.902c8.368-4.831,19.069-1.964,23.9,6.405C432.566,169.354,429.699,180.056,421.33,184.888z
                                            M135.399,329.767c-8.285-14.35-26.633-19.266-40.982-10.982c-14.348,8.285-19.264,26.633-10.979,40.982
                                        c8.284,14.348,26.632,19.264,40.981,10.98C138.767,362.462,143.683,344.114,135.399,329.767z M436.031,277.249
                                        c-11.044,0-20-8.953-20-19.999c0-11.045,8.955-20.001,20.001-20.001c11.044,0,19.999,8.955,19.999,20.002
                                        C456.031,268.295,447.078,277.249,436.031,277.249z M115.97,257.251c-0.001-16.57-13.433-30.001-30.001-30.002
                                        c-16.568,0.001-29.999,13.432-30,30.002c0.001,16.566,13.433,29.998,30.001,30C102.538,287.249,115.969,273.817,115.97,257.251z
                                            M401.333,364.248c-10.759-6.212-14.446-19.97-8.234-30.73c6.212-10.759,19.971-14.446,30.731-8.233
                                        c10.759,6.211,14.445,19.971,8.232,30.73C425.852,366.774,412.094,370.46,401.333,364.248z M135.398,184.736
                                        c8.285-14.352,3.368-32.698-10.98-40.983c-14.349-8.283-32.695-3.367-40.981,10.982c-8.282,14.348-3.366,32.696,10.981,40.981
                                        C108.768,204,127.115,199.082,135.398,184.736z M326.869,421.328c-6.902-11.953-2.807-27.242,9.148-34.145
                                        s27.243-2.806,34.146,9.149c6.902,11.954,2.806,27.243-9.15,34.145C349.059,437.381,333.771,433.284,326.869,421.328z
                                            M188.482,131.649c14.352-8.286,19.266-26.633,10.982-40.982c-8.285-14.348-26.631-19.264-40.982-10.98
                                        c-14.346,8.285-19.264,26.633-10.98,40.982C155.787,135.017,174.137,139.932,188.482,131.649z"/>
                                    ';
                                } ?>
                            </svg></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!-- END LOADING IMAGE/ICON -->
                
                <!-- BEGIN WIDGETS -->
                <?php if ( is_active_sidebar( 'pageloader-widgets' ) ) { ?>
                    <div class="pageloader-widgets-wrapper">
                        <?php dynamic_sidebar( 'pageloader-widgets' ); ?>
                    </div>
                <?php } ?>	
                <!-- END WIDGETS -->
                
                <!-- BEGIN LOADING SENTENCE -->
                <div class="bonfire-pageloader-sentence">
                    <?php if( get_theme_mod('bonfire_pageloader_custom_loading_text') != '') { ?>
                        <div class="bonfire-pageloader-sentence-inner">
                            <?php echo get_theme_mod('bonfire_pageloader_custom_loading_text'); ?>
                        </div>
                    <?php } ?>

                    <?php if( get_theme_mod('bonfire_pageloader_custom_loading_text2') != '') { ?>
                        <div class="bonfire-pageloader-sentence-inner">
                            <?php echo get_theme_mod('bonfire_pageloader_custom_loading_text2'); ?>
                        </div>
                    <?php } ?>

                    <?php if( get_theme_mod('bonfire_pageloader_custom_loading_text3') != '') { ?>
                        <div class="bonfire-pageloader-sentence-inner">
                            <?php echo get_theme_mod('bonfire_pageloader_custom_loading_text3'); ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- END LOADING SENTENCE -->

                <!-- BEGIN ANIMATED DOTS -->
                <?php if( get_theme_mod('bonfire_pageloader_show_dots') != '') { ?>
                <div class="bonfire-pageloader-dots">
                    <div class="dots-one"></div>
                    <div class="dots-two"></div>
                </div>
                <?php } ?>
                <!-- END ANIMATED DOTS -->
                
            </div>
        
        </div>

        <!-- BEGIN PROGRESS BAR -->
        <?php if( get_theme_mod('bonfire_pageloader_progressbar_disable') == '') { ?>
            <?php if( get_theme_mod('bonfire_pageloader_progressbar_disable_touch') == '') { ?>
                <div id="nprogress-wrapper"></div>
            <?php } else { ?>
                <?php if ( !wp_is_mobile() ) { ?>
                    <div id="nprogress-wrapper"></div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <!-- END PROGRESS BAR -->

    </div>
</div>
<!-- END THE LOADING IMAGE/ICON/TEXT -->

<!-- BEGIN SLOWER FADE-OUT VARIATION -->
<style>
/* background image as 'cover' */
<?php if( get_theme_mod('bonfire_pageloader_background_cover') != '') { ?>
.bonfire-pageloader-background-image { background-size:cover; background-position:top center; }
<?php } ?>
/* icon/image hide */
<?php if( get_theme_mod('bonfire_pageloader_icon_scale') != '') { ?>
/* icon/image hide */
.bonfire-pageloader-icon-hide .icon-wrapper {
    -webkit-transform:scale(.5);
    -moz-transform:scale(.5);
    transform:scale(.5);
    
    -webkit-transition:-webkit-transform .85s ease;
    -moz-transition:-moz-transform .85s ease;
    transition:transform .85s ease;
}
<?php } ?>
/* icon/image blur effect */
.icon-wrapper {
    filter:blur(<?php echo get_theme_mod('pageloader_icon_image_blur'); ?>px);
    -moz-filter:blur(<?php echo get_theme_mod('pageloader_icon_image_blur'); ?>px);
    -webkit-filter:blur(<?php echo get_theme_mod('pageloader_icon_image_blur'); ?>px);
    <?php if( get_theme_mod('pageloader_icon_image_opacity') != '') { ?>opacity:0;<?php } ?>

	animation:plblur <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards, plopacity <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards;
	-moz-animation:plblur <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards, plopacity <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards;
	-webkit-animation:plblur <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards, plopacity <?php if( get_theme_mod('pageloader_icon_image_animation_speed') != '') { ?><?php echo get_theme_mod('pageloader_icon_image_animation_speed'); ?><?php } else { ?>2<?php } ?>s ease forwards;
}
@keyframes plopacity { 100% { opacity:1; } }
@-moz-keyframes plopacity { 100% { opacity:1; } }
@-webkit-keyframes plopacity { 100% { opacity:1; } }
@keyframes plblur { 100% { filter:blur(0); } }
@-moz-keyframes plblur { 100% { -moz-filter:blur(0); } }
@-webkit-keyframes plblur { 100% { -webkit-filter:blur(0); } }
/* slide-in content */
<?php if( get_theme_mod('bonfire_pageloader_slidein_content') != '') { ?>
.pageloader-move-wrapper {
    -webkit-transform:translateY(<?php if( get_theme_mod('bonfire_pageloader_slidein_distance') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_distance'); ?><?php } else { ?>-100<?php } ?>px)<?php if( get_theme_mod('bonfire_pageloader_content_scaling') != '') { ?> scale(<?php echo get_theme_mod('bonfire_pageloader_content_scaling'); ?>)<?php } ?>;
    -moz-transform:translateY(<?php if( get_theme_mod('bonfire_pageloader_slidein_distance') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_distance'); ?><?php } else { ?>-100<?php } ?>px)<?php if( get_theme_mod('bonfire_pageloader_content_scaling') != '') { ?> scale(<?php echo get_theme_mod('bonfire_pageloader_content_scaling'); ?>)<?php } ?>;
    transform:translateY(<?php if( get_theme_mod('bonfire_pageloader_slidein_distance') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_distance'); ?><?php } else { ?>-100<?php } ?>px)<?php if( get_theme_mod('bonfire_pageloader_content_scaling') != '') { ?> scale(<?php echo get_theme_mod('bonfire_pageloader_content_scaling'); ?>)<?php } ?>;
    opacity:<?php if( get_theme_mod('bonfire_pageloader_content_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_content_opacity'); ?><?php } else { ?>1<?php } ?>;
}
.pageloader-move-wrapper-active {
    -webkit-transform:translateY(0) scale(1);
    -moz-transform:translateY(0) scale(1);
    transform:translateY(0) scale(1);
    opacity:1;
    
    -webkit-transition:-webkit-transform <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease, opacity <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease;
	-moz-transition:-moz-transform <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease, opacity <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease;
	transition:transform <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease, opacity <?php if( get_theme_mod('bonfire_pageloader_slidein_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_slidein_speed'); ?><?php } else { ?>1<?php } ?>s ease;
}
<?php } ?>
/* loading screen disappearance speed */
.bonfire-pageloader-icon-hide,
.bonfire-pageloader-hide {
    transition:opacity <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease, transform <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease, left 0s ease <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s;
    -moz-transition:opacity <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease, transform <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease, left 0s ease <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s;
    -webkit-transition:opacity <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease,transform <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s ease, left 0s ease <?php if( get_theme_mod('bonfire_pageloader_disappearance_speed') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_disappearance_speed'); ?><?php } else { ?>1<?php } ?>s;
    
    transform:scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -moz-transform:scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -webkit-transform:scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
}
/* background slide animations */
<?php $bonfire_pageloader_background_animation = get_theme_mod('pageloader_background_animation'); if($bonfire_pageloader_background_animation != '') { switch ($bonfire_pageloader_background_animation) { ?>
<?php case 'top': ?>
.bonfire-pageloader-background.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_opacity'); ?><?php } else { ?>1<?php } ?> !important; }
.bonfire-pageloader-background-image.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_image_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_image_opacity'); ?><?php } else { ?>.2<?php } ?> !important; }
.bonfire-pageloader-icon-hide,
.bonfire-pageloader-hide {
    transform:translateY(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -moz-transform:translateY(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -webkit-transform:translateY(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
}
<?php break; case 'left': ?>
.bonfire-pageloader-background.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_opacity'); ?><?php } else { ?>1<?php } ?> !important; }
.bonfire-pageloader-background-image.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_image_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_image_opacity'); ?><?php } else { ?>.2<?php } ?> !important; }
.bonfire-pageloader-icon-hide,
.bonfire-pageloader-hide {
    transform:translateX(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -moz-transform:translateX(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -webkit-transform:translateX(-100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
}
<?php break; case 'right': ?>
.bonfire-pageloader-background.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_opacity'); ?><?php } else { ?>1<?php } ?> !important; }
.bonfire-pageloader-background-image.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_image_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_image_opacity'); ?><?php } else { ?>.2<?php } ?> !important; }
.bonfire-pageloader-icon-hide,
.bonfire-pageloader-hide {
    transform:translateX(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -moz-transform:translateX(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -webkit-transform:translateX(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
}
<?php break; case 'bottom': ?>
.bonfire-pageloader-background.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_opacity'); ?><?php } else { ?>1<?php } ?> !important; }
.bonfire-pageloader-background-image.bonfire-pageloader-hide { opacity:<?php if( get_theme_mod('bonfire_pageloader_background_image_opacity') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_image_opacity'); ?><?php } else { ?>.2<?php } ?> !important; }
.bonfire-pageloader-icon-hide,
.bonfire-pageloader-hide {
    transform:translateY(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -moz-transform:translateY(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
    -webkit-transform:translateY(100%) scale(<?php if( get_theme_mod('bonfire_pageloader_background_scaling') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_background_scaling'); ?><?php } else { ?>1<?php } ?>);
}
<?php break; } } ?>
</style>
<!-- END SLOWER FADE-OUT VARIATION -->

<script>
// BEGIN SLIDE-DOWN jQuery (if not hidden on singular and slide-down setting enabled)
<?php $meta_value = get_post_meta( get_the_ID(), 'bonfire_pageloader_display', true ); if( !empty( $meta_value ) ) { ?>
<?php } else { ?>
    <?php if( get_theme_mod('bonfire_pageloader_slidein_content') != '') { ?>
        /* move entire body unless target element(s) specified */
        <?php if( get_theme_mod('bonfire_pageloader_slidein_custom_elements') != '') { ?>
            jQuery(document).ready(function() {
                jQuery("<?php echo get_theme_mod('bonfire_pageloader_slidein_custom_elements'); ?>").addClass('pageloader-move-wrapper');
            });
        <?php } else { ?>
            jQuery(document).ready(function() {
                /* detach PageLoader and add after body */
                jQuery(".bonfire-pageloader-background, .bonfire-pageloader-background-image, .bonfire-pageloader-icon-wrapper, #nprogress").each(function(){
                    jQuery(this).detach().insertAfter("body");
                });
                /* wrap body div */
                jQuery("body").wrapInner("<div class='pageloader-move-wrapper'></div>");
            });
        <?php } ?>
    <?php } ?>
<?php } ?>
// END SLIDE-DOWN jQuery (if not hidden on singular and slide-down setting enabled)

// BEGIN LOADING SCREEN FADE-OUT
$(document).ready(function() {
'use strict';
    setTimeout(function(){
		/* fade out the loading icon */
        jQuery(".bonfire-pageloader-icon-wrapper").addClass('bonfire-pageloader-icon-hide');
        /* hide the loading screen */
        jQuery(".bonfire-pageloader-background, .bonfire-pageloader-background-image").addClass('bonfire-pageloader-hide');
        /* slide down site */
        <?php if( get_theme_mod('bonfire_pageloader_slidein_content') != '') { ?>
            setTimeout(function(){
                jQuery(".pageloader-move-wrapper").addClass('pageloader-move-wrapper-active');
            },50);
        <?php } ?>
    },<?php if( get_theme_mod('bonfire_pageloader_custom_delay') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_custom_delay'); ?><?php } else { ?>0<?php } ?>);
});
// END LOADING SCREEN FADE-OUT

// BEGIN SHOW CLOSE BUTTON
setTimeout(function(){
    jQuery(".close-pageloader").addClass('close-pageloader-active');
},<?php if( get_theme_mod('bonfire_pageloader_custom_close_delay') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_custom_close_delay'); ?><?php } else { ?>6000<?php } ?>);
// END SHOW CLOSE BUTTON

// BEGIN CLOSE LOADING SCREEN WHEN CLOSE BUTTON CLICKED/TAPPED
jQuery('.close-pageloader').on('click', function(e) {
	'use strict';
		e.preventDefault();
			/* hide close button */
			jQuery(".close-pageloader").addClass('close-pageloader-active');
			/* fade out the loading icon */
            jQuery(".bonfire-pageloader-icon-wrapper").addClass('bonfire-pageloader-icon-hide');
            /* fade out loader */
            jQuery(".bonfire-pageloader-background, .bonfire-pageloader-background-image").addClass('bonfire-pageloader-hide');
            /* slide down site */
            setTimeout(function(){
                jQuery(".pageloader-move-wrapper").addClass('pageloader-move-wrapper-active');
            },50);
});
// END CLOSE LOADING SCREEN WHEN CLOSE BUTTON CLICKED/TAPPED

// BEGIN Nprogress SNIPPET (if not disabled)
<?php if( get_theme_mod('bonfire_pageloader_progressbar_disable') == '') { ?>
    <?php if( get_theme_mod('bonfire_pageloader_progressbar_disable_touch') == '') { ?>
        NProgress.start();
        $(document).ready(function() {
        'use strict';
            NProgress.done();
        });
        NProgress.configure({ trickleRate: 0.20, trickleSpeed: 300 });
    <?php } else { ?>
        <?php if ( !wp_is_mobile() ) { ?>
            NProgress.start();
            $(document).ready(function() {
            'use strict';
                NProgress.done();
            });
            NProgress.configure({ trickleRate: 0.20, trickleSpeed: 300 });
        <?php } ?>
    <?php } ?>
<?php } ?>
// END Nprogress SNIPPET (if not disabled)
</script>