require("./bootstrap");

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

try {
    window.$ = window.jQuery = require("jquery");
} catch (e) {}
