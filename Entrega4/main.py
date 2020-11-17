from pymongo import MongoClient, ASCENDING
from flask import Flask, render_template, request, abort, json
import os

client = MongoClient('localhost', connect=False)

db = client["test"]

usuarios = db.usuarios
mensajes = db.mensajes

app = Flask(__name__)

@app.route("/")
def home():
    return '<h1>Entrega 4: grupos 100 y 127</h1>'

@app.route("/messages")
def get_messages():
    consulta = [i for i in mensajes.find({},{"_id":0}).sort("mid", ASCENDING)]
    visual = ""
    for i in consulta:
        visual += '<h4>' + str(i) + '</h4>'
    return visual

@app.route("/messages/<int:mid>")
def get_message(mid):
    consulta = [i for i in mensajes.find({"mid":mid},{"_id":0})]
    return '<h4>' + str(consulta[0]) + '</h4>'

@app.route("/users")
def get_users():
    consulta = [i for i in usuarios.find({},{"_id":0}).sort("uid", ASCENDING)]
    visual = ""
    for i in consulta:
        visual += '<h4>' + str(i) + '</h4>'
    return visual

@app.route("/users/<int:uid>")
def get_user(uid):
    consulta = [i for i in usuarios.find({"uid":uid},{"_id":0})]
    mensajes_usuario = [i["message"] for i in mensajes.find({"sender":uid},
        {"_id":0}).sort("date", ASCENDING)]
    visual = '<h4>' + str(consulta[0]) + '</h4>'
    for i in mensajes_usuario:
        visual += '<h4>' + str(i) + '</h4>'
    return visual

@app.route("/messages/<int:uid1>&<int:uid2>")
def get_messages_between(uid1, uid2):
    consulta = [i["message"] for i in mensajes.find( {"$and": [
        {"$or": [{"sender":uid1},{"sender":uid2}]},
        {"$or": [{"receptant":uid1},{"receptant":uid2}]}]}, 
        {"_id":0}).sort("date", ASCENDING)]
    visual = ''
    for i in consulta:
        visual += '<h4>' + str(i) + '</h4>'
    return visual

if os.name == 'nt':
    app.run()