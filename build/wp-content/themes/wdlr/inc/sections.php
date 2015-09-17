<?php
/**
* section meta box for pages
*
* @package wdlr
*/

/**
* Define the metabox and field configurations.
*/
function page_sections_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_wdlr_';

  /**
  * Initiate the metabox
  */
  $cmb = new_cmb2_box( array(
    'id'            => 'section_metabox',
    'title'         => __( 'Inhaltsbereiche', 'cmb2' ),
    'object_types'  => array( 'page' ),
    'context'       => 'normal',
    'priority'      => 'high',
  ) );

  // Add repeatable sections
  $cmb->add_field( array(
    'id'        => $prefix . 'sections',
    'name'      => __( 'Inhaltsbereiche', 'cmb2' ),
    'desc'      => __( 'Hier können beliebig viele Inhaltsbereiche erstellt werden.', 'cmb2' ),
    'type'      => 'group',
    'options'   => array(
      'group_title'   => __( 'Inhaltsbereich {#}', 'cmb2' ),
      'add_button'    => __( 'Neuer Inhaltsbereich', 'cmb2' ),
      'remove_button' => __( 'Inhaltsbereich entfernen', 'cmb2' ),
      'sortable'      => true,
    ),
    'fields'    => array(
      array(
        'id'        => 'content',
        'name'      => __( 'Inhalt', 'cmb2' ),
        'type'      => 'wysiwyg',
        'options'   => array(
          'media_buttons' => true,
          'textarea_rows' => get_option('default_post_edit_rows', 10),
          'tinymce'       => true
        ),
      )
    )
  ) );

}
add_action( 'cmb2_init', 'page_sections_metabox' );