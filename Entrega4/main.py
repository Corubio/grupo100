from pymongo import MongoClient, ASCENDING
from flask import Flask, jsonify
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
    consulta = [i for i in usuarios.find({},{"_id":0}).sort("uid", ASCENDING)]
    return jsonify(consulta)

@app.route("/users/<int:uid>")
def get_user(uid):
    consulta = [i for i in usuarios.find({"uid":uid},{"_id":0})]
    mensajes_usuario = [i for i in mensajes.find({"sender":uid},
        {"_id":0}).sort("date", ASCENDING)]
    for i in mensajes_usuario:
        consulta.append(i)
    return jsonify(consulta)

@app.route("/messages-<int:uid1>&<int:uid2>")
def get_messages_between(uid1, uid2):
    consulta = [i for i in mensajes.find( {"$and": [
        {"$or": [{"sender":uid1},{"sender":uid2}]},
        {"$or": [{"receptant":uid1},{"receptant":uid2}]}]},
        {"_id":0}).sort("date", ASCENDING)]
    return jsonify(consulta)

#Rutas Busqueda de texto
@app.route("/text-search&&&&", defaults={'ojala': ''})
def get_busqueda_ojala(ojala):
    if ojala == '':
        consulta = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
    return jsonify(consulta)

@app.route("/text-search&&<necesario>&<prohibido>&<int:uid>", defaults={'ojala': ''})
@app.route("/text-search&<ojala>&&<prohibido>&<int:uid>", defaults={'necesario': ''})
@app.route("/text-search&<ojala>&<necesario>&&<int:uid>", defaults={'prohibido': ''})
@app.route("/text-search&<ojala>&<necesario>&<prohibido>&", defaults={'uid': 0})
@app.route("/text-search&<ojala>&<necesario>&&", defaults={'uid': 0, 'prohibido': ''})
@app.route("/text-search&<ojala>&&<prohibido>&", defaults={'uid': 0, 'necesario': ''})
@app.route("/text-search&&<necesario>&<prohibido>&", defaults={'uid': 0, 'ojala': ''})
@app.route("/text-search&<ojala>&&&<int:uid>", defaults={'prohibido': '', 'necesario': ''})
@app.route("/text-search&&<necesario>&&<int:uid>", defaults={'prohibido': '', 'ojala': ''})
@app.route("/text-search&&&<prohibido>&<int:uid>", defaults={'necesario': '', 'ojala': ''})
@app.route("/text-search&<ojala>&<necesario>&<prohibido>&<int:uid>")
@app.route("/text-search&<ojala>&&&", defaults={'necesario': '', 'prohibido': '', 'uid': 0})
@app.route("/text-search&&<necesario>&&", defaults={'ojala': '', 'prohibido': '', 'uid': 0})
@app.route("/text-search&&&<prohibido>&", defaults={'ojala': '', 'necesario': '', 'uid': 0})
@app.route("/text-search&&&&<int:uid>", defaults={'ojala': '', 'necesario': '', 'prohibido': ''})
def get_busqueda(ojala, necesario, prohibido, uid):
    consulta_final = []
    if ojala != '':
        ojala = ojala.split(';')
        mensajes.create_index([("message", 'text')])
        consulta = []
        for j in ojala:
            buscar = j
            consulta_porfrase = [i for i in mensajes.find({"$text": {"$search": buscar}},
                {"_id": 0}).sort("mid", ASCENDING)]
            for h in consulta_porfrase:
                consulta.append(h)
        consulta_final = consulta
    if necesario != '':
        necesario = necesario.split(';')
        mensajes.create_index([("message", 'text')])
        consulta = []
        for j in necesario:
            buscar = '\"' + j + '\"'
            consulta_porfrase = [i for i in mensajes.find({"$text": {"$search": buscar}},
                {"_id": 0}).sort("mid", ASCENDING)]
            for h in consulta_porfrase:
                consulta.append(h)
        consulta_final = consulta
    if prohibido != '':
        prohibido = prohibido.split(';')
        mensajes.create_index([("message", 'text')])
        consulta_prohibida = []
        mensajes_totales = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
        for j in prohibido:
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
    if uid != 0:
        consulta = [i for i in mensajes.find({"sender":uid}, {"_id":0}).sort("date", ASCENDING)]
        if consulta_final == []:
            consulta_final = consulta
        else:
            consulta2 = []
            for i in consulta_final:
                if i in consulta:
                    consulta2.append(i)
            consulta_final = consulta2
    return jsonify(consulta_final)


if os.name == 'nt':
    app.run()
