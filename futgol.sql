/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : futgol

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 01/12/2020 21:00:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE USER 'usuario'@'%' identified by 'Usuario_2019';
GRANT all on futgol.* to 'usuario'@'%';
-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos`  (
  `nombre_equipo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nombre_equipo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES ('Athletic de Bilbao');
INSERT INTO `equipos` VALUES ('Atlético de Madrid');
INSERT INTO `equipos` VALUES ('Celta de Vigo');
INSERT INTO `equipos` VALUES ('Deportivo Alavés');
INSERT INTO `equipos` VALUES ('Eibar');
INSERT INTO `equipos` VALUES ('Espanyol');
INSERT INTO `equipos` VALUES ('FC Barcelona');
INSERT INTO `equipos` VALUES ('Getafe');
INSERT INTO `equipos` VALUES ('Granada CF');
INSERT INTO `equipos` VALUES ('Leganés');
INSERT INTO `equipos` VALUES ('Levante UD');
INSERT INTO `equipos` VALUES ('Osasuna');
INSERT INTO `equipos` VALUES ('Real Betis');
INSERT INTO `equipos` VALUES ('Real Madrid');
INSERT INTO `equipos` VALUES ('Real Mallorca');
INSERT INTO `equipos` VALUES ('Real Sociedad');
INSERT INTO `equipos` VALUES ('Sevilla CF');
INSERT INTO `equipos` VALUES ('Valencia CF');
INSERT INTO `equipos` VALUES ('Valladolid');
INSERT INTO `equipos` VALUES ('Villarreal');

-- ----------------------------
-- Table structure for jugadores
-- ----------------------------
DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores`  (
  `nombre_completo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dorsal` int(2) NULL DEFAULT NULL,
  `equipo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pais` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `posicion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `goles` int(3) NULL DEFAULT NULL,
  `goles_encajados` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`nombre_completo`) USING BTREE,
  INDEX `pais_fk`(`pais`) USING BTREE,
  INDEX `equipo_fk`(`equipo`) USING BTREE,
  INDEX `posicion_fk`(`posicion`) USING BTREE,
  CONSTRAINT `equipo_fk` FOREIGN KEY (`equipo`) REFERENCES `equipos` (`nombre_equipo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pais_fk` FOREIGN KEY (`pais`) REFERENCES `pais` (`nombre_pais`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `posicion_fk` FOREIGN KEY (`posicion`) REFERENCES `posicion` (`nombre_posicion`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jugadores
-- ----------------------------
INSERT INTO `jugadores` VALUES ('Antoine Griezmann', 17, 'FC Barcelona', 'Francia', 'Delantero', 5, 0);
INSERT INTO `jugadores` VALUES ('Antonio Puertas', 10, 'Granada CF', 'España', 'Centrocampista', 4, 0);
INSERT INTO `jugadores` VALUES ('Aritz Aduriz', 19, 'Athletic de Bilbao', 'España', 'Delantero', 2, 0);
INSERT INTO `jugadores` VALUES ('Dani Parejo', 10, 'Valencia CF', 'España', 'Centrocampista', 5, 0);
INSERT INTO `jugadores` VALUES ('Diego Carlos', 4, 'Sevilla CF', 'Brasil', 'Defensa', 1, 0);
INSERT INTO `jugadores` VALUES ('Enis Bardhi', 10, 'Levante UD', 'Macedonia del Norte', 'Centrocampista', 1, 0);
INSERT INTO `jugadores` VALUES ('Eric Cabaco', 18, 'Levante UD', 'Uruguay', 'Defensa', 0, 0);
INSERT INTO `jugadores` VALUES ('Gareth Bale', 11, 'Real Madrid', 'Gales', 'Delantero', 2, 0);
INSERT INTO `jugadores` VALUES ('Iñaki Williams', 9, 'Athletic de Bilbao', 'España', 'Delantero', 8, 0);
INSERT INTO `jugadores` VALUES ('Jan Oblak', 13, 'Atlético de Madrid', 'Eslovenia', 'Portero', 0, 9);
INSERT INTO `jugadores` VALUES ('Joaquín Hulio', 17, 'Real Betis', 'España', 'Centrocampista', 6, 0);
INSERT INTO `jugadores` VALUES ('Karim Benzema', 9, 'Real Madrid', 'España', 'Delantero', 11, 0);
INSERT INTO `jugadores` VALUES ('Kenedy', 25, 'Getafe', 'Brasil', 'Delantero', 1, 0);
INSERT INTO `jugadores` VALUES ('Leo Messi', 10, 'FC Barcelona', 'Argentina', 'Delantero', 5, 0);
INSERT INTO `jugadores` VALUES ('Luka Modric', 10, 'Real Madrid', 'Croacia', 'Centrocampista', 2, 0);
INSERT INTO `jugadores` VALUES ('Marc Navarro', 2, 'Leganés', 'España', 'Defensa', 0, 0);
INSERT INTO `jugadores` VALUES ('Marko Dmitrovic', 1, 'Eibar', 'Serbia', 'Portero', 0, 26);
INSERT INTO `jugadores` VALUES ('Martin Odegaard', 21, 'Real Sociedad', 'Noruega', 'Centrocampista', 3, 0);
INSERT INTO `jugadores` VALUES ('Maxi Gómez', 9, 'Valencia CF', 'Uruguay', 'Delantero', 6, 0);
INSERT INTO `jugadores` VALUES ('Néstor Araújo', 4, 'Celta de Vigo', 'México', 'Defensa', 1, 0);
INSERT INTO `jugadores` VALUES ('Nikola Vukcevic', 17, 'Levante UD', 'Montenegro', 'Centrocampista', 0, 0);
INSERT INTO `jugadores` VALUES ('Oliver Burke', 24, 'Deportivo Alavés', 'Escocia', 'Centrocampista', 0, 0);
INSERT INTO `jugadores` VALUES ('Roberto Torres', 10, 'Osasuna', 'España', 'Centrocampista', 4, 0);
INSERT INTO `jugadores` VALUES ('Rubén Alcaraz', 14, 'Valladolid', 'España', 'Centrocampista', 0, 0);
INSERT INTO `jugadores` VALUES ('Samu Chukwueze', 11, 'Villarreal', 'Nigeria', 'Centrocampista', 3, 0);
INSERT INTO `jugadores` VALUES ('Santiago Cazorla', 8, 'Villarreal', 'España', 'Centrocampista', 5, 0);
INSERT INTO `jugadores` VALUES ('Takefusa Kubo', 26, 'Real Mallorca', 'Japón', 'Centrocampista', 1, 0);
INSERT INTO `jugadores` VALUES ('Thibaut Curtois', 13, 'Real Madrid', 'Bélgica', 'Portero', 0, 21);
INSERT INTO `jugadores` VALUES ('Vinicius Junior', 25, 'Real Madrid', 'Brasil', 'Delantero', 0, 0);
INSERT INTO `jugadores` VALUES ('Wu Lei', 7, 'Espanyol', 'China', 'Delantero', 0, 0);

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais`  (
  `nombre_pais` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nombre_pais`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('Argentina');
INSERT INTO `pais` VALUES ('Bélgica');
INSERT INTO `pais` VALUES ('Brasil');
INSERT INTO `pais` VALUES ('China');
INSERT INTO `pais` VALUES ('Croacia');
INSERT INTO `pais` VALUES ('Escocia');
INSERT INTO `pais` VALUES ('Eslovenia');
INSERT INTO `pais` VALUES ('España');
INSERT INTO `pais` VALUES ('Francia');
INSERT INTO `pais` VALUES ('Gales');
INSERT INTO `pais` VALUES ('Inglaterra');
INSERT INTO `pais` VALUES ('Japón');
INSERT INTO `pais` VALUES ('Macedonia del Norte');
INSERT INTO `pais` VALUES ('México');
INSERT INTO `pais` VALUES ('Montenegro');
INSERT INTO `pais` VALUES ('Nigeria');
INSERT INTO `pais` VALUES ('Noruega');
INSERT INTO `pais` VALUES ('Portugal');
INSERT INTO `pais` VALUES ('Serbia');
INSERT INTO `pais` VALUES ('Uruguay');

-- ----------------------------
-- Table structure for posicion
-- ----------------------------
DROP TABLE IF EXISTS `posicion`;
CREATE TABLE `posicion`  (
  `nombre_posicion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nombre_posicion`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posicion
-- ----------------------------
INSERT INTO `posicion` VALUES ('Centrocampista');
INSERT INTO `posicion` VALUES ('Defensa');
INSERT INTO `posicion` VALUES ('Delantero');
INSERT INTO `posicion` VALUES ('Portero');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nombre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `apellido` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`usuario`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('DiegoFH', '123456', 'Diego', 'Fernández');

-- ----------------------------
-- Function structure for volumen_esfera
-- ----------------------------
DROP FUNCTION IF EXISTS `volumen_esfera`;
delimiter ;;
CREATE FUNCTION `volumen_esfera`(radio FLOAT)
 RETURNS float
  DETERMINISTIC
BEGIN
DECLARE volume FLOAT;
SET volume=(4/3)*PI()*POW(radio,3);
RETURN volume;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
