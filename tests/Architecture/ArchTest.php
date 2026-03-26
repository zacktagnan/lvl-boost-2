<?php

arch()->preset()->php();
arch()->preset()->security();
arch()->preset()->laravel();

arch("no debug functions")
    ->expect("App")
    ->not->toUse(["dd", "dump", "var_dump", "ray"]);

arch("no env() outside config")->expect("App")->not->toUse("env");
