DROP DATABASE IF EXISTS monitoramento_saude;
CREATE DATABASE monitoramento_saude;
USE monitoramento_saude;

CREATE TABLE Medicamentos (
    id_medicamento INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    descricao VARCHAR(300),
    doses_totais INTEGER,
    doses_tomadas INTEGER,
    inicio_tratamento DATE,
    fim_tratamento DATE
);

CREATE TABLE Doses (
    id_dose INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_medicamento INTEGER,
    data_dose DATE,
    horario_dose TIME,
  
    FOREIGN KEY (id_medicamento)
    REFERENCES Medicamentos (id_medicamento)
    ON DELETE CASCADE
);