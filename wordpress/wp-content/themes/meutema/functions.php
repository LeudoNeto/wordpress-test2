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

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

function mostrar_competidores($atts)
{

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores ORDER BY name", ARRAY_A );

    $tabela = '<table class="styled-table">
                <thead>
                    <tr style = "text-align: left;">
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Pontos</th>
                    </tr>
                </thead>
                <tbody><br><br>';

    foreach ($results as $line)
    {
        $line_id = $line["id"];
        $tabela .= "<tr>";
        $tabela .= "<td>".$line["name"]."</td>";
        $tabela .= "<td><a href='imagem_dos_competidores/$line_id.png'>ver foto</a></td>";
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
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}competidores ORDER BY name", ARRAY_A );

    $tabela = '<table class="styled-table">
                <thead>
                    <tr style = "text-align: left;">
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
        $tabela .= "<td><a href='imagem_dos_competidores/$line_id.png'>ver foto</a></td>";
        $tabela .= "<td>".$line["points"]."</td>";
        $tabela .= "</tr>";
    }

    $tabela .= "</tbody>
              </table>";

    return $tabela;
}
add_shortcode('ranking','mostrar_ranking');


?>