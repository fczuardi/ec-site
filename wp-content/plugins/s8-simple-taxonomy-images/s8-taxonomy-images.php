<?php
/**
 * Plugin Name: Sideways8 Simple Taxonomy Images
 * Plugin URI: http://sideways8.com/plugins/s8-simple-taxonomy-images/
 * Description: This plugin was designed with themers and developers in mind. It allows for an easy way to quickly add category, tag, and custom taxonomy images to your taxonomy terms. Check our site (http://sideways8.com/plugins/s8-simple-taxonomy-images/) or the WordPress repository (http://wordpress.org/extend/plugins/s8-simple-taxonomy-images) for documentation on how to use this plugin.
 * Tags: taxonomy images, category images, taxonomy
 * Version: 0.8.2
 * Author: Sideways8 Interactive
 * Author URI: http://sideways8.com/
 * License: GPLv3
 */

define('S8_STI_FILE', __FILE__);

// Include additional files
require_once(plugin_dir_path(S8_STI_FILE).'inc/functions.php');

class s8_simple_taxonomy_images {
    function __construct() {
        // Add base actions
        add_action('admin_head', array($this, 'init'));
        add_action('edit_term', array($this, 'save_fields'), 10, 3);
        add_action('create_term', array($this, 'save_fields'), 10, 3);
        //add_action('get_terms_args', 's8_taxonomy_images_filter_order', 10, 2); TODO: Evaluate how well our filter would work
        //add_shortcode('s8-taxonomy-list', array($this, 'shortcode_term_list')); TODO: Get shortcode working
    }

    /**
     * Adds our form fields to the WP add/edit term forms
     */
    function init() {
        $taxes = get_taxonomies();
        if(is_array($taxes)) {
            foreach($taxes as $tax) {
                add_action($tax.'_add_form_fields', array($this, 'add_fields'));
                add_action($tax.'_edit_form_fields', array($this, 'edit_fields'));
            }
        }
    }

    /**
     * Adds our custom fields to the WP add term form
     */
    function add_fields() {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('s8-taxonomy-images', plugins_url('/js/s8-taxonomy-images.js', S8_STI_FILE), array('jquery'));
        /*?>
        <div class="form-field">
            <label for="s8_tax_order">Sort Order</label>
            <input type="number" name="s8_tax_order" id="s8_tax_order" size="4" min="0" max="9999" value="" />
        </div>*/ ?>
    <div class="form-field">
        <label for="s8_tax_image">Image</label>
        <input type="text" name="s8_tax_image" id="s8_tax_image" value="" />
        <input type="hidden" name="s8_tax_image_classes" id="s8_tax_image_classes" value="" />
    </div>
    <?php
    }

    /**
     * Adds our custom fields to the WP edit term form
     * @param $taxonomy Object A WP Taxonomy term object
     */
    function edit_fields($taxonomy) {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('s8-taxonomy-images', plugins_url('/js/s8-taxonomy-images.js', S8_STI_FILE), array('jquery'));
        /*?>
        <tr class="form-field">
            <th><label for="s8_tax_order">Sort Order</label></th>
            <td><input type="number" name="s8_tax_order" id="s8_tax_order" size="4" min="0" max="9999" value="<?php echo $taxonomy->term_group; ?>" /></td>
        </tr>*/ ?>
    <tr class="form-field">
        <th><label for="s8_tax_image">Image</label></th>
        <td>
            <input type="text" name="s8_tax_image" id="s8_tax_image" value="<?php $image = s8_get_taxonomy_image_src($taxonomy, 'full'); echo ($image)?$image['src']:''; ?>" />
            <input type="hidden" name="s8_tax_image_classes" id="s8_tax_image_classes" value="" />
        </td>
    </tr>
    <?php
    }

    /**
     * Saves the data from our custom fields on the WP add/edit term form
     * @param $term_id
     * @param null $tt_id
     * @param null $taxonomy
     */
    function save_fields($term_id, $tt_id = null, $taxonomy = null) {
        if(isset($_POST['s8_tax_order']) && ($order = (int)$_POST['s8_tax_order'])) {
            global $wpdb;
            $wpdb->query($wpdb->prepare("UPDATE $wpdb->terms SET term_group = $order WHERE term_id = $term_id;"));
            //wp_update_term($term_id, $taxonomy, array('term_group' => $order));
        }
        if(isset($_POST['s8_tax_image']) && ($src = $_POST['s8_tax_image'])) {
            if($src != '') {
                if(isset($_POST['s8_tax_image_classes']) && preg_match('/wp-image-([0-9]{1,99})/', $_POST['s8_tax_image_classes'], $matches)) {
                    update_option('s8_tax_image_'.$taxonomy.'_'.$term_id, $matches[1]);
                }
                else {
                    global $wpdb;
                    $prefix = $wpdb->prefix;
                    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $src . "';"));
                    if(is_numeric($attachment[0]))
                        update_option('s8_tax_image_'.$taxonomy.'_'.$term_id, $attachment[0]);
                    else
                        update_option('s8_tax_image_'.$taxonomy.'_'.$term_id, $src);
                }
            }
        }
    }

    /**
     * Changes orderby to term_group for specific queries, not in use yet...
     * @param $args
     * @param $taxonomies
     * @return mixed
     */
    function filter_order($args, $taxonomies) {
        if(is_admin()) return $args; // Avoid doing anything in the admin area.
        $args['orderby'] = 'term_group';
        return $args;
    }

    /**
     * For our future shortcode...still working out what it will actually do.
     * @param $atts
     */
    function shortcode_term_list($atts) {
        extract(shortcode_atts(array(
            'taxonomy' => 'category',
            'show_children' => 0,
            'show_titles' => 0,
        ), $atts));
    }
}
new s8_simple_taxonomy_images;
