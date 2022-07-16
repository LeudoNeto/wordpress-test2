<?php
/**
 * Template Name: Modelo DB
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-One 1.0
 */

get_header();

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores", ARRAY_A );

// PHP
echo '<table class="styled-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Pontos</th>
            </tr>
        </thead>
        <tbody>';

foreach ($results as $line)
{
    $line_id = $line["id"];
    print("<tr>");
    print("<td>".$line["name"]."</td>");
    print("<td><a href='imagem_dos_competidores/$line_id.png'>ver foto</a></td>");
    print("<td>".$line["points"]."</td>");
    print("</tr>");
}



get_footer();
