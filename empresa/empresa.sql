DROP TABLE IF EXISTS departamentos CASCADE;


CREATE TABLE IF NOT EXISTS departamentos (
        id BIGSERIAL PRIMARY KEY,
        codigo NUMERIC(2) NOT NULL UNIQUE,
        denominacion VARCHAR(255) NOT NULL,
        localidad VARCHAR(255)
);

INSERT INTO departamentos(codigo,denominacion, localidad)
VALUES  (10, 'Informatica', 'Sánlucar'),
        (20, 'Administrativo', 'Jerez'),
        (30, 'Prevencion', 'Trebujena'),
        (40, 'Laboratorio', 'Chipiona')
;
