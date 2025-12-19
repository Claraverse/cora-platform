<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function cora_icon( $name ) {
    $icons = [
        'dashboard' => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>',
        'design'    => '<svg viewBox="0 0 24 24"><path d="M4 20l4-1 10-10-3-3L5 16l-1 4z"/></svg>',
        'develop'   => '<svg viewBox="0 0 24 24"><path d="M8 17l-5-5 5-5M16 7l5 5-5 5"/></svg>',
        'marketing' => '<svg viewBox="0 0 24 24"><path d="M3 11l18-5v12l-18-5z"/></svg>',
        'operations'=> '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.6 1.6 0 0 0 .3 1.7l.1.1-1.6 2.8"/></svg>',
        'ai'        => '<svg viewBox="0 0 24 24"><path d="M12 2v20M2 12h20"/></svg>',
        'seo'       => '<svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><line x1="16" y1="16" x2="22" y2="22"/></svg>',
        'finance'   => '<svg viewBox="0 0 24 24"><path d="M12 1v22M5 6h14M5 18h14"/></svg>',
        'wp'        => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>',
    ];

    return $icons[$name] ?? '';
}
