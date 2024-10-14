const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const userRoutes = require('./routes/userRoutes');
const dotenv = require('dotenv');

dotenv.config();

const app = express();
const PORT = process.env.PORT || 3001;

app.use(cors());
app.use(bodyParser.json());

// Rutas
app.use('/api/users', userRoutes);

// Inicia el servidor y la base de datos
app.listen(PORT, () => {
    console.log(`Servidor corriendo en el puerto ${PORT}`);
    require('./config'); // Conexión a la base de datos
});
