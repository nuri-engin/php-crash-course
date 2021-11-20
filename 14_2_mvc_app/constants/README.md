Create and use the router path constants here!

ie: 

```
// #01: Declare the constants;
$products = "products";

PRODUCTS: {
    index: "$products/index",
    create: "$products/create",
    update: "$products/update"
}

// #02: Use the constants in the app;
$PATHS = require_once "/constants/PATHS";

return $router->renderView($PATHS->PRODUCTS->index);
```