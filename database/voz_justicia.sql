CREATE DATABASE IF NOT EXISTS voz_justicia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE voz_justicia;
CREATE TABLE usuarios(id INT AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(120) NOT NULL,email VARCHAR(190) UNIQUE NOT NULL,password_hash VARCHAR(255) NOT NULL,rol VARCHAR(30) DEFAULT 'admin',activo TINYINT DEFAULT 1);
CREATE TABLE denuncias(
id BIGINT AUTO_INCREMENT PRIMARY KEY,folio VARCHAR(32) UNIQUE NOT NULL,secreto_hash VARCHAR(255) NOT NULL,
anonima TINYINT DEFAULT 1,nombre VARCHAR(120),correo VARCHAR(190),estado VARCHAR(80) DEFAULT 'Morelos',
municipio VARCHAR(120) NOT NULL,localidad VARCHAR(160),fecha_hechos DATE,lugar TEXT,tipo_persona VARCHAR(100),
ambito VARCHAR(80),institucion VARCHAR(180),persona VARCHAR(180),pista TEXT,clasificacion VARCHAR(180),
relato TEXT NOT NULL,evidencia TEXT,archivo VARCHAR(255),
estatus ENUM('Recibida','Turnada','Asignada','Reasignada','En revisión','Concluida') DEFAULT 'Recibida',
nota_publica TEXT,fecha_registro DATETIME NOT NULL,actualizado_en DATETIME NULL,INDEX(estatus),INDEX(municipio),INDEX(fecha_registro));
