const bcrypt = require('bcrypt');
const mysql = require('mysql2');
const connection = require('../config');

// Registro de usuario
exports.registerUser = (req, res) => {
    const { Nombre, Primer_Apellido, Segundo_Apellido, Fecha_de_nacimiento, Contraseña, CURP, Activo, Sexo } = req.body;
    const hashedPassword = bcrypt.hashSync(Contraseña, 10);

    const query = `INSERT INTO Usuario (Nombre, Primer_Apellido, Segundo_Apellido, Fecha_de_nacimiento, Contraseña, CURP, Activo, Sexo) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)`;
    connection.query(query, [Nombre, Primer_Apellido, Segundo_Apellido, Fecha_de_nacimiento, hashedPassword, CURP, Activo, Sexo], (err, results) => {
        if (err) {
            console.error(err);
            return res.status(500).send('Error al registrar el usuario');
        }
        res.status(201).send('Usuario registrado con éxito');
    });
};

// Inicio de sesión
exports.loginUser = (req, res) => {
    const { Nombre, Contraseña } = req.body;

    const query = `SELECT * FROM Usuario WHERE Nombre = ?`;
    connection.query(query, [Nombre], (err, results) => {
        if (err) {
            console.error(err);
            return res.status(500).send('Error al iniciar sesión');
        }
        if (results.length === 0) {
            return res.status(401).send('Usuario no encontrado');
        }

        const user = results[0];
        const isPasswordValid = bcrypt.compareSync(Contraseña, user.Contraseña);
        if (!isPasswordValid) {
            return res.status(401).send('Contraseña incorrecta');
        }
        res.send('Inicio de sesión exitoso');
    });
};
