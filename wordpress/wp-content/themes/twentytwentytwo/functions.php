<style>

.styled-table {
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1em;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 70em;
}

.styled-table thead tr {
    background-color: black;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid black;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

</style>

<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


function mostrar_competidores($atts)
{

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores ORDER BY name", ARRAY_A );

    $tabela = '<table class="styled-table">
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
        $tabela .= "<tr>";
        $tabela .= "<td>".$line["name"]."</td>";
        $tabela .= "<td><a href='/wordpress/imagem_dos_competidores/$line_id.png'>ver foto</a></td>";
        $tabela .= "<td>".$line["points"]."</td>";
        $tabela .= "</tr>";
    }

    $tabela .= "</tbody>
              </table>";

    return $tabela;
}
add_shortcode('competidores','mostrar_competidores');

function mostrar_ranking($atts)
{

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores ORDER BY points DESC", ARRAY_A );

    $tabela = '<table class="styled-table">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Pontos</th>
                    </tr>
                </thead>
                <tbody>';

	$i = 1;
    foreach ($results as $line)
    {
        $tabela .= "<tr>";
		$tabela .= "<td>$i"."º</td>";
        $tabela .= "<td>".$line["name"]."</td>";
        $tabela .= "<td>".$line["points"]."</td>";
        $tabela .= "</tr>";

		$i++;
    }

    $tabela .= "</tbody>
              </table>";

    return $tabela;
}
add_shortcode('ranking','mostrar_ranking');

function detalhes_dos_competidores($atts)
{

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores ORDER BY name", ARRAY_A );

    $tabela = '<table class="styled-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
						<th>Foto</th>
                        <th>Pontos</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($results as $line)
    {
		$line_id = $line['id'];
        $tabela .= "<tr>";
        $tabela .= "<td>".$line["name"]."</td>";
		$tabela .= "<td>".$line['descricao']."</td>";
		$tabela .= "<td>"."<img src='/wordpress/imagem_dos_competidores/$line_id.png' height='80' >"."</td>";
        $tabela .= "<td>".$line["points"]."</td>";
        $tabela .= "</tr>";
    }

    $tabela .= "</tbody>
              </table>";

    return $tabela;
}
add_shortcode('detalhes','detalhes_dos_competidores');