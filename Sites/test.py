import psycopg2

#variables
usuarios_existentes = []
nombres_usuarios = []
contraseñas = []
pasaportes =[]
#coneccion
conn = psycopg2.connect(
    database = 'grupo100e2',
    user = 'grupo100',
    host = 'codd.ing.puc.cl',
    port = 5432,
    password = 'abcabcab1'
)
#usuarios existentes
query = 'SELECT * FROM usuarios'
cur = conn.cursor()
cur.execute(query)
rows = cur.fetchall()
for r in rows:
    usuarios_existentes.append(r)
    nombres_usuarios.append(r[1])
    pasaportes.append(r[4])
    contraseñas.append(r[6])
#iniciar sesion (0)
def iniciar(nombre, contraseña):
    if nombre not in nombres_usuarios:
        print('usuario inexistente')
        return 0
    for i in range(len(nombres_usuarios)):
        if nombres_usuarios[i] == nombre:
            if contraseñas[i] == contraseña:
                print('bienvenido ' + nombre)
                return (usuarios_existentes[i])
            print('contraseña incorrecta')
            return 0
#crear usuario (1)
def crear(nombre, edad, sexo, pasaporte, nacionalidad, contraseña):
    query = 'INSERT INTO usuarios VALUES(%s)'
    uid = len(nombres_usuarios) + 1
    data = int(uid), nombre, int(edad), sexo, pasaporte, nacionalidad, contraseña
    if nombre in nombres_usuarios:
        print('usuario ya existente')
        return 1
    if pasaporte in pasaportes:
        print('pasaporte ocupado')
        return 1
    cur = conn.cursor()
    cur.execute(query, data)
    print('usuario creado exitosamente')
    return 0
#navegacion
entrada = int(input())
if entrada == 0:
    entrada = iniciar(input(), input())
elif entrada == 1:
    entrada = crear(input(), input(), input(), input(), input(), input())