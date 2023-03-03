CRUD3 Será um CRUD php, sem orientação a objetos, com intersecção de tabelas com cheve estrageira.

SQL da tabela Cidades

CREATE TABLE cidades (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

Populando a tabela cidades

INSERT INTO cidades (nome) VALUES
  ('Florianópolis'),
  ('Joinville'),
  ('Blumenau'),
  ('São José'),
  ('Criciúma'),
  ('Chapecó'),
  ('Itajaí'),
  ('Jaraguá do Sul'),
  ('Lages'),
  ('Palhoça');

SQL da tabela clientes

CREATE TABLE clientes (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  cidade INT NOT NULL,
  apresentacao TEXT,
  PRIMARY KEY (id),
  FOREIGN KEY (cidade) REFERENCES cidades(id)
);

Populando a tabela clientes

INSERT INTO clientes (nome, email, cidade, apresentacao) VALUES
  ('João da Silva', 'joao.silva@email.com', 1, 'Olá, meu nome é João da Silva e sou de Florianópolis.'),
  ('Maria Souza', 'maria.souza@email.com', 2, 'Oi, meu nome é Maria Souza e moro em Joinville.'),
  ('Pedro Santos', 'pedro.santos@email.com', 3, 'Oi, eu sou o Pedro Santos e venho de Blumenau.'),
  ('Ana Rodrigues', 'ana.rodrigues@email.com', 4, 'Olá, meu nome é Ana Rodrigues e sou de São José.'),
  ('Lucas Oliveira', 'lucas.oliveira@email.com', 5, 'Oi, meu nome é Lucas Oliveira e sou de Criciúma.'),
  ('Gabriela Alves', 'gabriela.alves@email.com', 6, 'Olá, meu nome é Gabriela Alves e moro em Chapecó.'),
  ('Paulo Costa', 'paulo.costa@email.com', 7, 'Oi, eu sou o Paulo Costa e venho de Itajaí.'),
  ('Luisa Mendes', 'luisa.mendes@email.com', 8, 'Olá, meu nome é Luisa Mendes e sou de Jaraguá do Sul.'),
  ('Fernando Santos', 'fernando.santos@email.com', 9, 'Oi, eu sou o Fernando Santos e venho de Lages.'),
  ('Juliana Ribeiro', 'juliana.ribeiro@email.com', 10, 'Olá, meu nome é Juliana Ribeiro e sou de Palhoça.');
