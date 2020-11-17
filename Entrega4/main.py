from pymongo import MongoClient, ASCENDING
from flask import Flask, jsonify
import os

client = MongoClient('localhost', connect=False)

db = client["test"]

usuarios = db.usuarios
mensajes = db.mensajes

app = Flask(__name__)
app.config['JSON_AS_ASCII'] = False

@app.route("/")
def home():
    return '<h1>Entrega 4: grupos 100 y 127</h1>'

@app.route("/messages")
def get_messages():
    consulta = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
    return jsonify(consulta)

@app.route("/messages/<int:mid>")
def get_message(mid):
    consulta = [i for i in mensajes.find({"mid":mid},{"_id":0})]
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

@app.route("/messages/<int:uid1>&<int:uid2>")
def get_messages_between(uid1, uid2):
    consulta = [i for i in mensajes.find( {"$and": [
        {"$or": [{"sender":uid1},{"sender":uid2}]},
        {"$or": [{"receptant":uid1},{"receptant":uid2}]}]}, 
        {"_id":0}).sort("date", ASCENDING)]
    return jsonify(consulta)

if os.name == 'nt':
    app.run()