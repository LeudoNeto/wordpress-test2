<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress-test' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E<uFw}n2yi(s8MWg!fHB:A=X8][^Z~i~9POyd/zpz N6-bG#7.iu|IJ!r)`OFlCx' );
define( 'SECURE_AUTH_KEY',  '1!D#WqRmb;f*Nwj[g2*?2B}in/HAFQ[s3a&)h`tK)n!m6hQ,`CR>V[ezY_uJRJwy' );
define( 'LOGGED_IN_KEY',    '`!h}#;a#n9,evg5QunPBak,>9s4G+TtOdR|NdO?QvEHxHg9WJ4?k7_]k&=:c80.a' );
define( 'NONCE_KEY',        'n}3.]R^(g]@J6?S`c]dFRzr&z;t!%mp2: uw4xRG PZN>_?cH;ESD}L_y`QyRL8!' );
define( 'AUTH_SALT',        'ZAOXI[MAG0E^^iAL3F&*?f&.}wytR4B}_(+,S@PaQOjw<Va,A/a<u`Y!%gwXaNJA' );
define( 'SECURE_AUTH_SALT', 'SeKC;` 8M_tK!OJhEPK|<ut^sCA 8`>8sN*].+@T4D-1$$xGzo|zwkE%VB0aWs`Z' );
define( 'LOGGED_IN_SALT',   '+$Ej}J*$>GU+.<E|_JnfFE+s03/Y]N58ZR,5gYF_<cIL9( A|ZnXw!S.U G#Jo|<' );
define( 'NONCE_SALT',       'Bd9WRJi|U{%}.{4:A 0_w=iOenD7#<mQmFsJMR+;5cL7IoI#CwFFGfu#x<c!-W49' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
