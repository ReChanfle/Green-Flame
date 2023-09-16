INSERT INTO regions
(code, name, display_order)
VALUES('NAM', 'North America & Canada', 1);
INSERT INTO regions
(code, name, display_order)
VALUES('EMEA', 'Europe, Middle East and Africa', 2);
INSERT INTO regions
(code, name, display_order)
VALUES('LAC', 'Latin America & the Caribbean', 3);
INSERT INTO regions
(code, name, display_order)
VALUES('APAC', 'Asia Pacific', 4);

INSERT INTO brands
(id, name, display_order, active)
VALUES(1, 'Avis', 10, 1);
INSERT INTO brands
(id, name, display_order, active)
VALUES(2, 'Budget', 20, 1);
INSERT INTO brands
(id, name, display_order, active)
VALUES(3, 'Payless', 30, 1);

INSERT INTO access_types
(code, name, display_order)
VALUES('A', 'Cliente Final', 1);
INSERT INTO access_types
(code, name, display_order)
VALUES('B', 'Agencia', 2);
INSERT INTO access_types
(code, name, display_order)
VALUES('C', 'Corporativo', 3);
