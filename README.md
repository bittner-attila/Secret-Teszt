# FPS user-lister-task

## SETUP
- Klónozni a repository-t.
- Belépni a project könyvtárába, ahol a docker-compose.yml file található.
- Futtatni a `docker-compose up -d` parancsot.
- localhost 80 as portján érhető el.
## Megoldásom
- A kód futtatásához alkalmas környezetet docker-compose -al hoztam létre.
- A projectbe autoloader-t használok psr-4 es szabvánnyal.
- Próbáltam MVC szerint feldarabolni a kódot.
- Az alábbi részekre bontottam: controllers, dblayer, managers, models
- Az UserManager class-t a BaseManager class-ból származtatom ahol a kódot kibővítettem a `setDatabaseDriver` statikus function-nal, amivel a `DB` Driver-t lehet váltogatni.
- Módosítottam a konstruktort, mivel a UserManager `listUsers` fügvénye példányosítja önnmagát és visszaállítja a db kapcsolatot az alapértelmezettre.
- Mostmár a konstruktor csak akkor állítja be a statikus database változót, ha az `null` értékű.
- Az index.php -ban 14 sorban átváltok pdo driverre `UserManager::setDatabaseDriver('pdo');`
- Majd újra ki dumpolom az array-t, amit visszakapok a UserController `listUsers` fügvénnyle.

