CREATE DATABASE IF NOT EXISTS tirap_consultoria;
USE tirap_consultoria;

-- Tabla de Usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    rol ENUM('Cliente', 'Administrador') DEFAULT 'Cliente',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabla de Programas de Capacitación
CREATE TABLE programas (
    id_programa INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    tipo ENUM('Táctico', 'Psicológico', 'Mixto') NOT NULL,
    precio DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB;

-- Tabla de Inscripciones (Relación N:M entre Usuarios y Programas)
CREATE TABLE inscripciones (
    id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_programa INT NOT NULL,
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_programa) REFERENCES programas(id_programa) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla de Reservas de Consultoría
CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    estado ENUM('Pendiente', 'Confirmada', 'Cancelada') DEFAULT 'Pendiente',
    modalidad ENUM('Virtual', 'Presencial') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla de Pagos
CREATE TABLE pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_inscripcion INT,
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    metodo_pago ENUM('Tarjeta', 'Transferencia', 'Pasarela Virtual') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_inscripcion) REFERENCES inscripciones(id_inscripcion) ON DELETE SET NULL
) ENGINE=InnoDB;