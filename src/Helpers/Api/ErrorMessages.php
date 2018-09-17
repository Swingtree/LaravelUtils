<?php

namespace Swingtree\LaravelUtils\Helpers\Api;


class ErrorMessages {
  // Basic
  const REQUEST__MISSING_PARAMETER            = 'api.message.request.missing_parameter';// Missing the %1 parameter

  // Key secret
  const KEYSECRET__AUTHORITY_NOT_DEFINED      = 'api.message.authority.not_defined'; //'The requested caller identity has not been defined for this route'
  const KEYSECRET__AUTHORITY_NOT_SET          = 'api.message.authority.not_set'; //'The requested caller is not set
  const KEYSECRET__AUTHORITY_MISSING          = 'api.message.authority.missing'; //'Anonymous authority not allowed
  const KEYSECRET__AUTHORITY_UNKNOWN          = 'api.message.authority.unknown'; //'Unknown authority

  // Token identity -- JWT
  const TOKEN_IDENTITY__INVALID_FORMAT        = 'api.message.identity.invalid_format'; //'The identity not well formatted
  const TOKEN_IDENTITY__INVALID_SIGNATURE     = 'api.message.identity.invalid_signature'; //'The identity could not be signed
  const TOKEN_IDENTITY__EXPIRED               = 'api.message.identity.expired'; //The identity has expired
  const TOKEN_IDENTITY__UNKNOWN               = 'api.message.identity.unknown'; //The identity is not valid for unknown reason
  const TOKEN_IDENTITY__NOT_READY             = 'api.message.identity.not_ready'; //The identity is not yet ready. Please try again later.

  // Token identity - Custom
  const TOKEN_IDENTITY__IDENTITY_ANONYMOUS    = 'api.message.identity.anonymous'; //Unknown identity
  const TOKEN_IDENTITY__IDENTITY_OUTDATED     = 'api.message.identity.outdated'; //A new identity has been issued at %1
  const TOKEN_IDENTITY__IDENTITY_VERSATILE    = 'api.message.identity.versatile'; //A versatile identity has been detected



}