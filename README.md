# WPforms files fix for Innocode server setup 

### Description

1. Add `wpforms_upload_root` hook to change default wpforms plugin uploads folder 
2. Disable [S3-Uploads](https://github.com/humanmade/S3-Uploads) plugin path replace for wpforms submit process

Requires to setup persistant folder on the server.


Default path:
```
trailingslashit(WP_CONTENT_DIR) . 'wpforms'
```

### Install

- Preferable way is to use [Composer](https://getcomposer.org/):

    ````
    composer require innocode-digital/wpforms-uploads-path-filter
    ````

    By default it will be installed as [Must Use Plugin](https://codex.wordpress.org/Must_Use_Plugins).
    But it's possible to control with `extra.installer-paths` in `composer.json`.

- Alternate way is to clone this repo to `wp-content/mu-plugins/` :

    ````
    cd wp-content/mu-plugins/
    git clone git@github.com:innocode-digital/wpforms-uploads-path-filter.git
    ````

### Usage

Add required constant (usually to `wp-config.php`):

````
define( 'INNOCODE_WPFORMS_UPLOADS_PATH', '' ); // E.g. "trailingslashit(WP_CONTENT_DIR) . 'wpforms'"
````

