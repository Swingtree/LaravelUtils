<?php

namespace Swingtree\LaravelUtils\Helpers\Crucible;

class Crucible {

  /**
   * The used encryption algo
   */
  private static $ENCRYPT_ALGO;

  /**
   * @var string The real encryption key
   */
  private static $ENCRYPT_ENCRYPTED_KEY;

  /**
   * @var string the IV of encryption
   */
  private static $IV;


  /**
   * Init the crucible helper class
   *
   * @param \Swingtree\LaravelUtils\Helpers\Crucible\CrucibleDefinition $def
   */
  public static function init( CrucibleDefinition $def){
    if( empty( self::$ENCRYPT_ENCRYPTED_KEY ) && !empty($def)){
      // real key is encrypted
      self::$ENCRYPT_ENCRYPTED_KEY = substr(hash($def->Ha(), $def->Ek(), true), 0, 32);
      // IV must be exact 16 chars (128 bit)
      self::$IV = $def->Ei();

      // THe encryption algorithm
      self::$ENCRYPT_ALGO = $def->Ea();
    }
  }

  /**
   * @param $string
   *
   * @return string
   */
  public static function encrypt( $string ){
      return base64_encode(openssl_encrypt($string, self::$ENCRYPT_ALGO, self::$ENCRYPT_ENCRYPTED_KEY, OPENSSL_RAW_DATA, self::$IV));
  }

  /**
   * @param $encrypted
   *
   * @return string
   */
  public static function decrypt( $encrypted ){
    $answer = openssl_decrypt(base64_decode($encrypted), self::$ENCRYPT_ALGO, self::$ENCRYPT_ENCRYPTED_KEY, OPENSSL_RAW_DATA, self::$IV);
    return $answer;
  }

}