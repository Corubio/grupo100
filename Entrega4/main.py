from pymongo import MongoClient, ASCENDING
from flask import Flask, jsonify, request
import os


USER = "grupo100"
PASS = "grupo100"
DATABASE = "grupo100"

URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}?authSource=admin"
client = MongoClient(URL)

db = client["grupo100"]

# Local Host
# client = MongoClient('localhost', connect=False)
# db = client["test"]

usuarios = db.usuarios
mensajes = db.mensajes

app = Flask(__name__)
app.config['JSON_AS_ASCII'] = False

#Rutas GET básicas
@app.route("/")
def home():
    return '<h1>Entrega 4: grupos 100 y 127</h1>'

@app.route("/messages")
def get_messages():
    consulta = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
    return jsonify(consulta)

@app.route("/messages/<int:mid>")
def get_message(mid):
    consulta = [i for i in mensajes.find({"mid":mid},{"_id":0}).sort("mid", ASCENDING)]
    return jsonify(consulta)

@app.route("/users")
def get_users():
    consulta = [i for i in usuarios.find({},{"_id":0}).sort("userId", ASCENDING)]
    return jsonify(consulta)

@app.route("/users/<int:userId>")
def get_user(userId):
    consulta = [i for i in usuarios.find({"userId":userId},{"_id":0})]
    mensajes_usuario = [i for i in mensajes.find({"sender":userId},
        {"_id":0}).sort("date", ASCENDING)]
    for i in mensajes_usuario:
        consulta.append(i)
    return jsonify(consulta)

@app.route("/messages&<int:uid1>&<int:uid2>")
def get_messages_between(uid1, uid2):
    consulta = [i for i in mensajes.find( {"$and": [
        {"$or": [{"sender":uid1},{"sender":uid2}]},
        {"$or": [{"receptant":uid1},{"receptant":uid2}]}]},
        {"_id":0}).sort("date", ASCENDING)]
    return jsonify(consulta)

#Rutas Busqueda de texto
@app.route("/text-search&&&&", defaults={'desired': ''})
def get_busqueda_ojala(desired):
    if desired == '':
        consulta = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
    return jsonify(consulta)

@app.route("/text-search&&<required>&<forbidden>&<int:userId>", defaults={'desired': ''})
@app.route("/text-search&<desired>&&<forbidden>&<int:userId>", defaults={'required': ''})
@app.route("/text-search&<desired>&<required>&&<int:userId>", defaults={'forbidden': ''})
@app.route("/text-search&<desired>&<required>&<forbidden>&", defaults={'userId': 0})
@app.route("/text-search&<desired>&<required>&&", defaults={'userId': 0, 'forbidden': ''})
@app.route("/text-search&<desired>&&<forbidden>&", defaults={'userId': 0, 'required': ''})
@app.route("/text-search&&<required>&<forbidden>&", defaults={'userId': 0, 'desired': ''})
@app.route("/text-search&<desired>&&&<int:userId>", defaults={'forbidden': '', 'required': ''})
@app.route("/text-search&&<required>&&<int:userId>", defaults={'forbidden': '', 'desired': ''})
@app.route("/text-search&&&<forbidden>&<int:userId>", defaults={'required': '', 'desired': ''})
@app.route("/text-search&<desired>&<required>&<forbidden>&<int:userId>")
@app.route("/text-search&<desired>&&&", defaults={'required': '', 'forbidden': '', 'userId': 0})
@app.route("/text-search&&<required>&&", defaults={'desired': '', 'forbidden': '', 'userId': 0})
@app.route("/text-search&&&<forbidden>&", defaults={'desired': '', 'required': '', 'userId': 0})
@app.route("/text-search&&&&<int:userId>", defaults={'desired': '', 'required': '', 'forbidden': ''})
def get_busqueda(desired, required, forbidden, userId):
    consulta_final = []
    if desired != '':
        desired = desired.split(';')
        mensajes.create_index([("message", 'text')])
        consulta = []
        for j in desired:
            buscar = j
            consulta_porfrase = [i for i in mensajes.find({"$text": {"$search": buscar}},
                {"_id": 0}).sort("mid", ASCENDING)]
            for h in consulta_porfrase:
                consulta.append(h)
        consulta_final = consulta
    else: desired = []
    if required != '':
        required = required.split(';')
        mensajes.create_index([("message", 'text')])
        consulta = []
        for j in required:
            buscar = '\"' + j + '\"'
            consulta_porfrase = [i for i in mensajes.find({"$text": {"$search": buscar}},
                {"_id": 0}).sort("mid", ASCENDING)]
            for h in consulta_porfrase:
                consulta.append(h)
        consulta_final = consulta
    else: required = []
    if forbidden != '':
        forbidden = forbidden.split(';')
        mensajes.create_index([("message", 'text')])
        consulta_prohibida = []
        mensajes_totales = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
        for j in forbidden:
            buscar = j
            consulta_porfrase = [i for i in mensajes.find({"$text": {"$search": buscar}},
                {"_id":0}).sort("mid", ASCENDING)]
            for h in consulta_porfrase:
                consulta_prohibida.append(h)
        if consulta_final == []:
            for j in mensajes_totales:
                if j not in consulta_prohibida:
                    consulta_final.append(j)
        else:
            consulta = []
            for j in consulta_final:
                if j not in consulta_prohibida:
                    consulta.append(j)
            consulta_final = consulta
    else: forbidden = []
    if userId != 0:
        consulta = [i for i in mensajes.find({"sender":userId}, {"_id":0}).sort("date", ASCENDING)]
        if consulta_final == []:
            consulta_final = consulta
        else:
            consulta2 = []
            for i in consulta_final:
                if i in consulta:
                    consulta2.append(i)
            consulta_final = consulta2
        userId = [userId]
    else: userId = []
    data = {
        "desired" : desired,
        "required" : required,
        "forbidden" : forbidden,
        "userId" : userId
    }
    return jsonify(data, consulta_final)

#agregar mensaje
@app.route("/messages_add", methods = ['POST'])
def post_crear_mensaje():
    formato = ['message', 'sender', 'receptant', 'lat', 'long', 'date']
    data = {key: request.json[key] for key in formato}
    agregar = usuarios.insert_one(data)
    if (agregar):
        return jsonify({'respuesta': 'Mensaje agregado'})
    else:
        return jsonify({'respuesta': 'Mensaje no agregado'})

#borrar mensaje
@app.route("/messages/:<int:mid>", methods = ['DELETE'])
def post_borrar_mensaje(mid):
    mensajes.delete_one(mensajes.find({"mid": mid}, {"_id": 0}))
    return jsonify({'respuesta': 'El mensaje se ha eliminado'})

if os.name == 'nt':
    app.run()
