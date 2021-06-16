/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : 127.0.0.1:3306
 Source Schema         : espredu_pap2019

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 02/06/2021 11:26:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for 06hugo_autores
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_autores`;
CREATE TABLE `06hugo_autores`  (
  `autorId` int(11) NOT NULL AUTO_INCREMENT,
  `autorNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`autorId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_autores
-- ----------------------------
INSERT INTO `06hugo_autores` VALUES (1, 'Antoine de Saint-Exupéry');
INSERT INTO `06hugo_autores` VALUES (2, 'Júlia Guarda Ribeiro');

-- ----------------------------
-- Table structure for 06hugo_generos
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_generos`;
CREATE TABLE `06hugo_generos`  (
  `generoId` int(11) NOT NULL AUTO_INCREMENT,
  `generoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`generoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_generos
-- ----------------------------
INSERT INTO `06hugo_generos` VALUES (1, ' Ficção Infantil ');
INSERT INTO `06hugo_generos` VALUES (2, 'Conto infantil');

-- ----------------------------
-- Table structure for 06hugo_livroautores
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_livroautores`;
CREATE TABLE `06hugo_livroautores`  (
  `livroAutorAutorId` int(11) NOT NULL,
  `livroAutorLivroId` int(11) NOT NULL,
  PRIMARY KEY (`livroAutorAutorId`, `livroAutorLivroId`) USING BTREE,
  INDEX `fk_autores_has_livros_livros1_idx`(`livroAutorLivroId`) USING BTREE,
  INDEX `fk_autores_has_livros_autores1_idx`(`livroAutorAutorId`) USING BTREE,
  CONSTRAINT `fk_autores_has_livros_autores1` FOREIGN KEY (`livroAutorAutorId`) REFERENCES `06hugo_autores` (`autorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_autores_has_livros_livros1` FOREIGN KEY (`livroAutorLivroId`) REFERENCES `06hugo_livros` (`livroId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_livroautores
-- ----------------------------
INSERT INTO `06hugo_livroautores` VALUES (1, 1);
INSERT INTO `06hugo_livroautores` VALUES (2, 2);

-- ----------------------------
-- Table structure for 06hugo_livrogeneros
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_livrogeneros`;
CREATE TABLE `06hugo_livrogeneros`  (
  `livroGeneroLivroId` int(11) NOT NULL,
  `livroGeneroGeneroId` int(11) NOT NULL,
  PRIMARY KEY (`livroGeneroLivroId`, `livroGeneroGeneroId`) USING BTREE,
  INDEX `fk_livros_has_generos_generos1_idx`(`livroGeneroGeneroId`) USING BTREE,
  INDEX `fk_livros_has_generos_livros1_idx`(`livroGeneroLivroId`) USING BTREE,
  CONSTRAINT `fk_livros_has_generos_generos1` FOREIGN KEY (`livroGeneroGeneroId`) REFERENCES `06hugo_generos` (`generoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_livros_has_generos_livros1` FOREIGN KEY (`livroGeneroLivroId`) REFERENCES `06hugo_livros` (`livroId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_livrogeneros
-- ----------------------------
INSERT INTO `06hugo_livrogeneros` VALUES (1, 1);
INSERT INTO `06hugo_livrogeneros` VALUES (2, 2);

-- ----------------------------
-- Table structure for 06hugo_livros
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_livros`;
CREATE TABLE `06hugo_livros`  (
  `livroId` int(11) NOT NULL AUTO_INCREMENT,
  `livroTitulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `livroSinopse` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `livroEstado` enum('disponivel','requisitado','inactivo') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'disponivel',
  `livroCapaURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `livroNumero` int(255) NOT NULL,
  PRIMARY KEY (`livroId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_livros
-- ----------------------------
INSERT INTO `06hugo_livros` VALUES (1, 'O Principezinho para crianças', 'TEXTO ADAPTADO PARA CRIANÇAS A PARTIR DOS 3 ANOS\r\n«Fiz um amigo, e agora para mim ele é único no mundo.» A maravilhosa história do Principezinho para partilhar com o seu filho . Aguarelas originais e um texto adaptado para desvendar o universo ternurento e poético do Principezinho.', 'requisitado', '06hugo/1581287137K.jpg', 1);
INSERT INTO `06hugo_livros` VALUES (2, 'A Parábola dos três Anéis', 'História inspirada na peça do dramaturgo alemão Gotthold Ephraim Lessing: \"Nathan, der Weise\", escrita e representada em 1779.', 'inactivo', '06hugo/1581437175X.jpg', 886);

-- ----------------------------
-- Table structure for 06hugo_requisicoes
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_requisicoes`;
CREATE TABLE `06hugo_requisicoes`  (
  `requisicaoId` int(11) NOT NULL AUTO_INCREMENT,
  `requisicaoDataLeva` date NOT NULL,
  `requisicaoUtilizadorId` int(11) NOT NULL,
  `requisicaoLivroId` int(11) NOT NULL,
  `requisicaoDataTraz` date NULL DEFAULT NULL,
  PRIMARY KEY (`requisicaoId`) USING BTREE,
  INDEX `fk_livros_has_utilizadores_utilizadores1_idx`(`requisicaoUtilizadorId`) USING BTREE,
  INDEX `fk_livros_has_utilizadores_livros1_idx`(`requisicaoLivroId`) USING BTREE,
  CONSTRAINT `fk_livros_has_utilizadores_livros1` FOREIGN KEY (`requisicaoLivroId`) REFERENCES `06hugo_livros` (`livroId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_livros_has_utilizadores_utilizadores1` FOREIGN KEY (`requisicaoUtilizadorId`) REFERENCES `06hugo_utilizadores` (`utilizadorId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_requisicoes
-- ----------------------------
INSERT INTO `06hugo_requisicoes` VALUES (1, '2020-02-14', 3, 1, NULL);
INSERT INTO `06hugo_requisicoes` VALUES (2, '2020-02-18', 26, 1, NULL);

-- ----------------------------
-- Table structure for 06hugo_utilizadores
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_utilizadores`;
CREATE TABLE `06hugo_utilizadores`  (
  `utilizadorId` int(11) NOT NULL AUTO_INCREMENT,
  `utilizadorNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorUtilizadorTipoId` int(11) NOT NULL,
  `utilizadorCategoria` enum('professor','funcionario','aluno') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorEstado` enum('activo','inactivo') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`utilizadorId`) USING BTREE,
  INDEX `fk_utilizadores_utilizadorTipos_idx`(`utilizadorUtilizadorTipoId`) USING BTREE,
  CONSTRAINT `fk_utilizadores_utilizadorTipos` FOREIGN KEY (`utilizadorUtilizadorTipoId`) REFERENCES `06hugo_utilizadortipos` (`utilizadorTipoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_utilizadores
-- ----------------------------
INSERT INTO `06hugo_utilizadores` VALUES (1, 'Adriana Blagodyr', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (2, 'Adriana Ferreira', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (3, 'Afonso Pereira', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (4, 'Alexandre Stefaniuk', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (5, 'Alice Ferreira', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (6, 'Ana Sousa', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (7, 'Ana Rodrigues', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (8, 'Ana Marques', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (9, 'André Batalha', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (10, 'Beatriz Belém', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (11, 'Carolina Fernandes', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (12, 'Daniel Gomes', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (13, 'Daniel Bento', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (14, 'Davi Ramos', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (15, 'Diego Lino', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (16, 'Diego Sousa', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (17, 'Dinis Faria', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (18, 'Diogo Cândido', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (19, 'Duarte Rodrigues', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (20, 'Edson Filho', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (21, 'Francisca Pereira', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (22, 'Francisco Silva', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (23, 'Gui Duarte', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (24, 'Guilherme Fonseca', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (25, 'Gustavo Tonico', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (26, 'Júlia Moraes', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (27, 'Kevin Jarjura', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (28, 'Kyara Santos', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (29, 'Lara Botas', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (30, 'Lara Costa', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (31, 'Lara Franco', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (32, 'Laura Nóbrega', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (33, 'Leonor Fortunato', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (34, 'Leonor Santos', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (35, 'Luana Batalha', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (36, 'Mafalda Nunes', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (37, 'Margarida Lucas', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (38, 'Maria Gaspar', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (39, 'Maria Santos', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (40, 'Martim Basílio', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (41, 'Matilde Valverde', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (42, 'Mel Nobre', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (43, 'Miriam Figueiredo', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (44, 'Núria Dinis', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (45, 'Rodrigo Santos', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (46, 'Rodrigo Figueiredo', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (47, 'Santiago Prior', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (48, 'Santiago Coelho', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (49, 'Tomás Basílio', 2, 'aluno', 'activo');
INSERT INTO `06hugo_utilizadores` VALUES (50, 'Valentina Fernandes', 2, 'aluno', 'activo');

-- ----------------------------
-- Table structure for 06hugo_utilizadortipos
-- ----------------------------
DROP TABLE IF EXISTS `06hugo_utilizadortipos`;
CREATE TABLE `06hugo_utilizadortipos`  (
  `utilizadorTipoId` int(11) NOT NULL AUTO_INCREMENT,
  `utilizadorTipoNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `utilizadorTipoClassificacao` enum('admin','user') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`utilizadorTipoId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 06hugo_utilizadortipos
-- ----------------------------
INSERT INTO `06hugo_utilizadortipos` VALUES (1, 'Educadora', 'admin');
INSERT INTO `06hugo_utilizadortipos` VALUES (2, 'Alunos', 'user');

SET FOREIGN_KEY_CHECKS = 1;
