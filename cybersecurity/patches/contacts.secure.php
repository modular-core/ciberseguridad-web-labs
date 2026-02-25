<?php
// Only these internal fragments are allowed to be included.
$allowed = ['embed.html', 'embed2.html'];

// Default view if no parameter is provided.
$content = isset($_GET['content']) ? trim($_GET['content']) : 'embed.html';

// Enforce allowlist: any other value falls back to the default.
if (!in_array($content, $allowed, true)) {
    $content = 'embed.html';
}

// Static inclusion from the current directory.
include __DIR__ . '/' . $content;
?>