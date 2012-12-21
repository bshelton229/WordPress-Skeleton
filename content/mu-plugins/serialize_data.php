<?php
/*
Plugin Name: Data Serializer
Version: 0.1
Author: Nick Weaver
*/

/**
 * Encode serialized data for wordpress transient caches
 */
class SerializeData {
  /**
   * serialize and compress response
   *
   * @param $response {array}
   * @return serialized object
   *  Return serialized and compressed response object
   */
  static public function serialize($response) {
    $response_serialized = serialize($response);
    if (extension_loaded('zlib')) {
      $response_serialized = base64_encode(gzcompress($response_serialized));
    }
    return $response_serialized;
  }

  /**
   * Unserialize and decompress response
   *
   * @param $response {array}
   * @return object
   *  Return unserialized and uncompressed object
   */
  static public function unserialize($response) {
    if (extension_loaded('zlib')) {
      $response = gzuncompress(base64_decode($response));
    }
    $response_unserialized = unserialize($response);
    return $response_unserialized;
  }
}
