Aquest projecte tracta sobre la creacio de una pagina web de gestio de articles en la cual es pot inserir modificar cercar i eliminar articles de una BD a través de formularis executats per botons.

El projecte esta dividit en 3 parts vista, model controlador:

1- Vista perteneixen els arxius que contenen HTML
- index.php: es la pagina principal a la cual es deriva a les demes, inclou botón amb le diferents accions que es podden realizar

- inserir.php: es la pagina encarregada de mostrar el formulari que a de introduir l'usuari per poder carregar un titol y un article a la BD

- modificar.php: es la pagina encarregada de mostrar el formulari que a de introduir l'usuari per poder modificar un titol y un article a la BD

- eliminar.php: es la pagina encarregada de mostrar el formulari que a de introduir l'usuari per poder eliminar un titol y un article a la BD

- cerca.php: es la pagina encarregada de mostrar el formulari que a de introduir l'usuari per poder cercar un titol y un article a la BD

2- Controlador perteneixen els arxius encarregats de getionar la conexio amb la base de dades fer les comprovacions necesarie per la correcta introduccio de dades als formularis per aixi el model pugui gestionar les peticions a la B correctment

-controlador.php: es l'arxiu encarregat de comprovar si els camps introduits per cualsevol dels formularis es correcte, primer comprova si hi ha algún post y si els camps no son nulls cridara a les funcions de model corresponents pasantli la conexio y les variables necesaries

3- Model perteneixen els arxius encarregats de comunicarse am la BD a través de sentencias sql amb PDO preparet statement

Paginacio: 
L'arxiu cerca.php conte codi per fer paginacio, a l'hora de mostrar els diferents articles trobats el primer que fa es contar el numero d'articles que hi ha per poder separarlos en pagines, despres si hi ha molts articles els divideix en aquestes posant un limit de article mostrat per pagina, si hi ha 1 mostrara que ets a la pagina 1 si hi ha mes mostrara el boto de seguent y ultima, si cambias de pagina envia un post de la pagina actual per poer gestionar els botons visibles perque al principi si trobaba 1000 resultats em mostraba 1000 botons i per aixo vaig posar limit de botons visibles, els numeros d'aquets es modifiquen segons el rang de botons numerics visibles per tant si ents a la pagina 4 y el rang es de 4 mostrara del 1 al 4 pero si ents a la 8 mostrara del 8 al 12 i si la ultima pagina es la 13 mostrara del 9 al 13, a mes he posat els botons de primera pagina i ultima per saltar a aquestes y els botons de seguent y anterior per avançar de 1 en 1