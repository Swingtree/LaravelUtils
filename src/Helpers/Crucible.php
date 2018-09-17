<?php

namespace Swingtree\LaravelUtils\Helpers;

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
   */
  public static function init(){
    if( empty( self::$ENCRYPT_ENCRYPTED_KEY ) ){
      // real key is encrypted
      self::$ENCRYPT_ENCRYPTED_KEY = substr(hash(env('SWTCRUX_HASH_A'), env('SWTCRUX_ENC_K'), true), 0, 32);
      // IV must be exact 16 chars (128 bit)
      self::$IV = env('SWTCRUX_ENC_IV');

      // THe encryption algorithm
      self::$ENCRYPT_ALGO = env('SWTCRUX_ENC_A');
    }
  }

  /**
   * @param $string
   *
   * @return string
   */
  public static function encrypt( $string ){
      self::init();
      return base64_encode(openssl_encrypt($string, self::$ENCRYPT_ALGO, self::$ENCRYPT_ENCRYPTED_KEY, OPENSSL_RAW_DATA, self::$IV));
  }

  /**
   * @param $encrypted
   *
   * @return string
   */
  public static function decrypt( $encrypted ){
    self::init();
    $answer = openssl_decrypt(base64_decode($encrypted), self::$ENCRYPT_ALGO, self::$ENCRYPT_ENCRYPTED_KEY, OPENSSL_RAW_DATA, self::$IV);
    
    return $answer;
  }

}