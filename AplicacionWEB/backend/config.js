const mysql = require('mysql2');
const dotenv = require('dotenv');

dotenv.config();

const connection = mysql.createConnection({
    host: process.env.DB_HOST || 'localhost',
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PASSWORD || '',
    port: process.env.DB_PORT || 3306
});

connection.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL:', err);
        return;
    }
    console.log('Connected to MySQL');

    // Crear base de datos y tablas
    const dbName = process.env.DB_NAME || 'EscuelaDB';

    connection.query(`CREATE DATABASE IF NOT EXISTS \`${dbName}\`;`, (err) => {
        if (err) throw err;
        console.log(`Database ${dbName} created or already exists.`);
        connection.query(`USE \`${dbName}\`;`, (err) => {
            if (err) throw err;

            // Crear tabla Sexo
            const createSexoTable = `
            CREATE TABLE IF NOT EXISTS Sexo (
                Nombre VARCHAR(50) PRIMARY KEY,
                Descripcion VARCHAR(255)
            );`;

            connection.query(createSexoTable, (err) => {
                if (err) throw err;
                console.log('Table Sexo created or already exists.');

                // Crear tabla Usuario
                const createUsuarioTable = `
                CREATE TABLE IF NOT EXISTS Usuario (
                    ID INT PRIMARY KEY AUTO_INCREMENT,
                    Nombre VARCHAR(50) NOT NULL,
                    Primer_Apellido VARCHAR(50) NOT NULL,
                    Segundo_Apellido VARCHAR(50),
                    Fecha_de_nacimiento DATE NOT NULL,
                    Contraseña VARCHAR(255) NOT NULL,
                    CURP VARCHAR(18),
                    Activo BOOLEAN NOT NULL,
                    Sexo VARCHAR(50),
                    FOREIGN KEY (Sexo) REFERENCES Sexo(Nombre)
                );`;

                connection.query(createUsuarioTable, (err) => {
                    if (err) throw err;
                    console.log('Table Usuario created or already exists.');
                    connection.end();
                });
            });
        });
    });
});

module.exports = connection;
