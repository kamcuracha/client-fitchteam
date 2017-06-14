<div class="section-map-locations">
    <div class="container">
        <div class="section-heading">
            <div class="section-left copy-h">
                <h3>Find your nearest location</h3>
                <p>New View Psychology operate from over 90 clinics everywhere Australia wide.</p>
            </div>
            <div class="section-right">
                <form id="search-form" class="search-form">
                    <div class="form-group form-inline">
                        <input id="search-text" class="form-control search-text" type="text" name="location" value="<?php echo isset($_GET['location']) ? $_GET['location'] : null ?>" placeholder="Your Post Code" >
                        <button id="search-button" type="button" class="btn btn-primary search-button" name="submit"><i class="icon icon-map-svg"></i> Find Now</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="map-tabbed" id="tabs">
            <!-- Nav tabs -->
            <?php
            $terms = get_terms('loc_state', array('orderby' => 'count', 'order' => 'desc', 'hide_empty' => false));
            $classbit = ' class="active"';
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="nav nav-tabs" role="tablist">';
                foreach ($terms as $term) {
                    $loc = get_field("map_centre", $term);
                    echo '<li' . $classbit . '><a id="loc-tab-' . $term->slug . '" href="#' . $term->slug . '" role="tab" data-toggle="tab" data-state="' . $term->slug . '" data-lat="' . $loc['lat'] . '" data-lng="' . $loc['lng'] . '">' . $term->name . '</a></li>';
                    $classbit = "";
                }
                echo "</ul>";
            }
            ?>

            <div class="map-box">
                <div id="map-canvas" class="map-canvas"></div>
            </div>

        </div>

        <div id="panel" class="storelocator-panel">
            <form action="" class="storelocator-panel"></form>
        </div>

        <div class="div text-center">
            <button class="btn btn-primary btn-large js-show-more-store">Show More Clinics</button>
        </div>
    </div>
</div>