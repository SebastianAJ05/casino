<?php
class Database {
    public static function connect() {
        return new PDO("mysql:host=localhost;dbname=ejemplo;charset=utf8","root","");
    }
}

/*
1- Cómo se llama esta forma de conectarte ??:
    - "Clase de conexión con método estático"
    - Usa Patrón Factory simple (a veces llamado DB wrapper). Muy usado en MVC.

2- Cómo se llama la manera anterior ( de CRUD de 2 capas )
    - "Función de conexión procedural"
    - Con try/catch y configuración explícita.Enfoque más clásico.

    ¿Por qué es más larga?
    Porque:
        - Maneja errores explícitamente.
        - Configura PDO::ATTR_ERRMODE.
        - Es más robusta por defecto.

3- ¿ Son lo mismo ?
    Sí. Ambas devuelven un objeto PDO.
    La diferencia es organización y nivel de control.

4- ¿ Cuál es mejor ?
    - MVC / proyectos medianos → esta (clase estática).
    - Producción real → la Conexión Procedural, pero dentro de una clase.

5- Mejor práctica actual:
    Combinar ambas:
        - Clase Database
        - Con try/catch y setAttribute
    Eso es lo profesional.

    EJEMPLO:
        En databaseEjemplo.php

*/




