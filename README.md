# jdump
Create a dump of variables like var_dump and output them as a JSON string.

If the variable is a Boolean or a number, it is returned directly. Other types are returned as application/json.

## install
composer require braesident/jdump

## howto
```jdump($anyVar);```
