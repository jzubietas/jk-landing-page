<?php
/**
 * Database - DuckBrain
 *
 * Clase diseñada para crear y devolver una única instancia PDO (database).
 * Hace uso de las siguientes constantes:
 * DB_TYPE, DB_NAME, DB_HOST, DB_USER, DB_PASS
 *
 * Si DB_TYPE es sqlite, usará DB_NAME como el nombre del archivo sqlite.
 * Además DB_USER y DB_PASS, no será necesariop que estén definidos.
 *
 * @author KJ
 * @website https://kj2.me
 * @licence MIT
 */

namespace Libs;

use PDO;
use PDOException;
use Exception;

class Database extends PDO {
    static private ?PDO $db = null;

    private function __construct() {}

    /**
     * Devuelve una instancia homogénea (singlenton) de la base de datos (PDO).
     *
     * @return PDO
     */
    static public function getInstance() : PDO {
        if (is_null(self::$db)) {

            if (DB_TYPE == 'sqlite') {
                $dsn = DB_TYPE .':'. DB_NAME;
                !defined('DB_USER') && define('DB_USER', '');
                !defined('DB_PASS') && define('DB_PASS', '');
            } else
                $dsn = DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST;

            try {
                self::$db = new PDO($dsn, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                echo "<pre>";
                throw new Exception(
                    'Error at connect to database: ' . $e->getMessage()
                );
            }

            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return self::$db;
    }
}
?>
