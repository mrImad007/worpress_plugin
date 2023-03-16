<?php
/**
 * @package imad-Plugin
 */
/*
Plugin Name: imad plugin
Plugin URI: https://github.com/Achchaimae/imadPlugin.git
Description: A plugin to create a feedback form
Version: 1.0.0
Author: Achchaimae "imad" Khalaf
Author URI: https://www.linkedin.com/in/achchaimae-khalaf/
License: GPLv2 or later
Text Domain: imad-plugin
*/

/*
    this program is free software; you can redistribute it and/or 
    modify it under the terms of the gnu general public license 
    as published by the free software foundation; either version 2 
    of the license, or (at your option) any later version.

    this program is distributed in the hope that it will be useful,
    but without any warranty; without even the implied warranty of
    merchantability or fitness for a particular purpose.  see the
    gnu general public license for more details.

    you should have received a copy of the gnu general public license
    along with this program; if not, write to the free software
    foundation, inc., 51 franklin street, fifth floor, boston, ma  02110-1301, usa.

    or see <http://www.gnu.org/licenses/>.

    copyright (c) 2023 imad plugin
*/

// Define the feedback form shortcode
function feedback_form_shortcode() {
    ob_start();
    ?>
    <form method="post" action="" style="display:flex; flex-direction: column; justify-items:center; background-color: rgb(187 247 208); padding:2rem ;">
        <label for="note">Note (obligatoire):</label>
        <input type="number" name="note" min="0" max="5" required  style="border-radius: 0.25rem; padding:1rem ; " >
        <br><br>
        <label for="remarque">Remarque (obligatoire):</label>
        <textarea name="remarque" rows="5" required style="border-radius: 0.25rem; padding:1rem ; "></textarea>
        <br><br>
        <label for="post_id">ID de post ou de page (obligatoire):</label>
        <input type="text" name="post_id" required style="border-radius: 0.25rem; padding:1rem ; ">
        <br><br>
        <input type="submit" name="submit_feedback" value="Envoyer" style="border-radius: 0.25rem; padding:1rem ; ">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'feedback_form', 'feedback_form_shortcode' );

// Save feedback data to the database
function save_feedback() {
    if ( isset( $_POST['submit_feedback'] ) ) {
        global $wpdb;
        $imad_feedback = $wpdb->prefix . 'feedback_data';
        $note = sanitize_text_field( $_POST['note'] );
        $remarque = sanitize_textarea_field( $_POST['remarque'] );
        $post_id = sanitize_text_field( $_POST['post_id'] );
        $wpdb->insert(
            $imad_feedback,
            array(
                'note' => $note,
                'remarque' => $remarque,
                'post_id' => $post_id
            ),
            array(
                '%d',
                '%s',
                '%s'
            )
        );
    }
}
add_action( 'init', 'save_feedback' );

// Create the feedback data table in the database on plugin activation
function create_feedback_table() {
    global $wpdb;
    $imad_feedback = $wpdb->prefix . 'feedback_data';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $imad_feedback (
        id int(11) NOT NULL AUTO_INCREMENT,
        note int(1) NOT NULL,
        remarque text NOT NULL,
        post_id varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'create_feedback_table' );

// Add an admin menu item for the feedback data
function feedback_menu_item() {
    add_menu_page(
        'Feedback Data',
        'Feedback Data',
        'manage_options',
        'feedback-data',
        'feedback_data_page'
    );
}
add_action( 'admin_menu', 'feedback_menu_item' );

// Create the feedback data page in the admin panel
function feedback_data_page() {
    global $wpdb;
    $imad_feedback = $wpdb->prefix . 'feedback_data';
    $feedback_data = $wpdb->get_results( "SELECT * FROM $imad_feedback" );
    ?>
    <div class="wrap">
        <h1>Feedback Data</h1>
        <table class="widefat" >
            <thead style="background-color: rgb(147 197 253); font-weight: bold; ">
                <tr>
                    <th>ID</th>
                    <th  >    Note</th>
                    <th>Remarque</th>
                    <th>Post ID</th>
            </tr>
        </thead>
        <tbody style="background-color: rgb(219 234 254);">
            <?php foreach ( $feedback_data as $feedback ) : ?>
                <tr>
                    <td><?php echo $feedback->id; ?></td>
                    <td><?php echo $feedback->note; ?></td>
                    <td><?php echo $feedback->remarque; ?></td>
                    <td><?php echo $feedback->post_id; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
}