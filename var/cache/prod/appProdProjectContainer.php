<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAh1qjua\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAh1qjua/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerAh1qjua.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerAh1qjua\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerAh1qjua\appProdProjectContainer([
    'container.build_hash' => 'Ah1qjua',
    'container.build_id' => 'cd82e6cf',
    'container.build_time' => 1669131539,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAh1qjua');
