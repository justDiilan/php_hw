<?php
spl_autoload_register(function ($class) {
    require_once __DIR__ . "/classes/{$class}.php";
});

$agency = new TransportAgency("GlobalTrans", [
    new City("Kyiv", true),
    new City("Lviv", true),
    new City("Kharkiv", true),
    new City("Odesa", false),
    new City("Dnipro", false)
]);

$agency->initializeRoutes();

do {
    echo "\n===== Transport Agency: GlobalTrans =====\n";
    echo "1. Create Order\n";
    echo "2. Show Statistics\n";
    echo "3. Exit\n";
    echo "Enter your choice: ";
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            $agency->createOrderInteractive();
            break;
        case 2:
            $agency->showStatistics();
            break;
        case 3:
            echo "Exiting program...\n";
            break;
        default:
            echo "Invalid choice. Please try again.\n";
    }
} while ($choice != 3);
?>
