DELETE FROM MENUS;
DELETE FROM ROLE;
DELETE FROM FUNCTIONS;
DELETE FROM MINISTRYS;
DELETE FROM MEMBERS;
DELETE FROM EVENTS;


#INSERT INTO MENUS
INSERT INTO MENUS(POSITION, NAME, PATH)
VALUES(1, 'Home', 'home/home.php'),(2, 'Membros', 'membros/membros.php'),(3, 'Eventos', 'eventos/eventos.php'),(4, 'Ministérios', 'ministerios/ministerios.php'),(5, 'Cargos','cargos/cargos.php');
#(5, 'Sobre', 'sobre/sobre.php'),(6, 'Contato', 'contato/contato.php');

#INSERT INTO ROLE
INSERT INTO ROLE(NAME)
VALUES('admin'),('demo'),('membro');

#INSERT INTO USERS
INSERT INTO USERS (NAME, USERNAME, EMAIL, PASSWORD, ROLE_ID, IMAGE )
VALUES('LEVY MEIRELES RODRIGUES DOS SANTOS', 'levymeireles', 'levymeireles518@gmail.com', '12345', 1, 'images/Levy_Meireles_ProfilePic.jpeg');

#INSERT INTO FUNCTIONS
INSERT INTO FUNCTIONS(NAME, DESCRIPTION)
VALUES('Diácono', 'Ajuda a manter o templo'),
('Professor', 'Ensina na EBD'),
('Pastor', 'Líder espiritual');

#INSERT INTO MINISTRYS
INSERT INTO MINISTRYS(NAME, DESCRIPTION)
VALUES('Louvor', 'Ministério de louvor da igreja'),
('Diaconato', 'Ministério de diaconato da igreja');

#INSERT INTO MEMBERS
INSERT INTO MEMBERS(NAME, BIRTH_DATE, ADDRESS, EMAIL, PHONE, MINISTRY_ID, ROLE_ID, FUNCTION_ID)
VALUES('Membro 1', '2002-03-08', 'Rua 1, 100, Bairro novo, SP', 'membro1@gmail.com', '1999998888', 1, 3, 1),
('Membro 2', '2003-04-09', 'Rua 2, 200, Bairro velho, SP', 'membro2@gmail.com', '1999997777', 1, 3, 1),
('Membro 3', '2004-05-10', 'Rua 3, 300, Bairro novo, SP', 'membro3@gmail.com', '1999996666', 1, 3, 2),
('Membro 4', '2005-06-11', 'Rua 4, 400, Bairro velho, SP', 'membro4@gmail.com', '1999995555', 2, 3, 2),
('Membro 5', '2006-07-12', 'Rua 5, 500, Bairro novo, SP', 'membro5@gmail.com', '1999994444', 2, 3, 3);


#INSERT INTO EVENTS
INSERT INTO EVENTS (NAME, DATE, LOCAL, DESCRIPTION, MEMBER_ID) 
VALUES ('Culto de Domingo', '2023-06-18', 'Igreja Nazareno Novo Tempo', 'Culto regular de domingo - Culto da Família.', 1),
('Acampamento Reset', '2023-09-01', 'Chacará para Acampamento', 'Acampamento de Jovens (JNI RESGATE).', 1),
('CULTO JNI - LOUVORZÃO', '2023-06-24', 'Anexo Novo Tempo', 'Noite de Louvor e Adoração.', 2),
('EBD', '2023-06-18', 'Anexo Novo Tempo', 'Escola Bíblica Dominical - Tema: Batismo com Espírito Santo.', 3),
('Festa Julina JNI', '2023-07-15', 'A Definir', 'Festa da Fogueira/Julina - JNI Resgate.', 4);


    