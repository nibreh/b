<?php

/* Get current user from URL */
preg_match('@^/([a-z0-9]+)/@i', $_SERVER['REQUEST_URI'], $m);
$user = $m[1];

/* Build this user's bookmarklet base URL */
$url = 'http'.(isset($_SERVER['HTTPS']) ? 's' : '')."://{$_SERVER['HTTP_HOST']}/$user";

/* Bookmarklet JS code */
$script = <<<EOF

(function () {
    window.open("{$url}?add="+encodeURIComponent(document.location.href), '_blank')
})()
EOF;

?>

Drag this to your bookmarks bar:

<a href="javascript:<?php echo rawurlencode($script); ?>">Bookmark</a>

