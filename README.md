# 🏥 Sistema de Monitoramento de Saúde (POE)

Sistema desenvolvido individualmente para a disciplina de **Linguagem de Programação e Paradigmas**. O projeto consiste em uma plataforma de monitoramento de pacientes para unidades de saúde utilizando o paradigma de **Programação Orientada a Eventos (POE)**.

O sistema permite o acompanhamento dinâmico dos sinais vitais dos pacientes, disparando alertas automáticos para a equipe médica em caso de variações críticas e auxiliando na tomada de decisões clínicas rápidas.

---

## 🚀 Diferenciais e Conceitos Técnicos

* **Programação Orientada a Eventos (POE):** Arquitetura reativa que responde a mudanças de estado e gatilhos em tempo real.
* **Foco em Domínio Real:** Aplicação prática de conceitos de software para a área da saúde (HealthTech).
* **Persistência Relacional:** Modelagem de dados estruturada para garantir a consistência dos registros dos pacientes.

---

## 🛠️ Tecnologias Utilizadas

* **Paradigma:** Orientação a Eventos (POE)
* **Banco de Dados:** MariaDB / MySQL 
* **Ambiente de Desenvolvimento:** PHP 8.2+ / XAMPP

---

## 🗄️ Estrutura do Banco de Dados

Abaixo está a estrutura DDL utilizada para a criação da tabela de pacientes, contendo chaves primárias e auto-incremento configurados.

<details>
<summary>📂 Clique aqui para visualizar o Script SQL</summary>

```sql
-- Estrutura para tabela `tbpaciente`
CREATE TABLE tbpaciente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(255) NOT NULL,
  sexo char(1) NOT NULL,
  idade int(11) NOT NULL,
  cidade varchar(255) NOT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
